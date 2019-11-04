<?php

namespace App\Services;

class HyperfJsonRpc
{
    private static $client = null;
    private static $host = '';
    private static $port = 0;

    private static function createClient() {
        //初始化端口和ip
        if(empty(self::$host) || empty(self::$port)){
            self::$host = config('hyperf_rpc.host');
            self::$port = config('hyperf_rpc.port');
        }

        //创建新的client并且返回
        $client = new \Swoole\Client(SWOOLE_SOCK_TCP);  //默认创建的client就是同步阻塞的
        try{
            //连接超时时间设置为2秒
            if(!$client->connect(self::$host, self::$port, 2)){
                throw new \Error("connect failed. Error: {$client->errCode}\n");    //正常情况下应该写日志
            }
        }catch (\Exception $e){
            throw new \Error('rpc服务端连接失败:'.$e->getMessage());
        }

        self::$client = $client;
    }

    //为什么不每次连接tcp客户端后都关闭连接呢？因为频繁的连接和关闭会消耗服务端的性能，非常多的tcp连接会处于close_wait的状态下面，实际上swoole在收到关闭信号的时候会自动关闭掉客户端，即使不关闭每条进程一个close_wai也不影响服务端的性能,返回数据为空字符串的情况，1重试次数超过3次，2 hyperf rpc服务端关闭
    public static function callRpcMethod(string $method,array $params){
        $data = [
            'jsonrpc'=>'2.0',
            'method'=>$method,
            'params'=>$params,
            'id'=>null,
        ];

        if(!self::$client){
            self::createClient();
        }

        $message = json_encode($data)."\r\n";
        $data = "";
        //当rpc-tcp服务端报错的时候send函数和recv函数都会报错，所以这里需要捕捉异常
        $i = 0;
        while(true){
            try{
                self::$client->send($message);
                $data = self::$client->recv();
            }catch (\Exception $e){
                //在hyperf重启时tcp连接会丢失产生错误，此时需要重新连接
                self::createClient();
            }
            //数据不为空，或者重试超过3次时退出循环，一般来说就是三次，次数太多会出现问题
            if(!empty($data) || $i>3){
                break;
            }
            $i++;
        }

        //return $data;
        //处理一下结果
        if(!empty($data)){
            $data = (array)json_decode($data,true);
            if(isset($data['result'])){
                return $data['result'];
            }else{
                return false;
            }
        }else{
            return false;   //不存在的时候返回false
        }

    }
}