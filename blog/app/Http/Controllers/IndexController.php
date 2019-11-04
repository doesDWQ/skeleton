<?php

namespace App\Http\Controllers;

use App\Services\Client;
use App\Services\HyperfJsonRpc;
use App\Services\Services\CalculatorService;

class IndexController extends Controller
{
    public function hello(){
        var_dump(CalculatorService::add(1,2));

//        $i=0;
//        $start = time();
//        while(true){
//            $i++;
//            if($i>2){
//                break;
//            }
            //var_dump(HyperfJsonRpc::callRpcMethod('/calculator/add',['a'=>1,'b'=>2]));echo PHP_EOL;
//            var_dump(HyperfJsonRpc::callRpcMethod('/calculator/sub',['a'=>15,'b'=>10]));echo PHP_EOL;
//            var_dump(HyperfJsonRpc::callRpcMethod('/calculator/sub',['a'=>15,'b'=>10]));echo PHP_EOL;
//        }
        //$end = time();
        //var_dump($end-$start);


        //$client->close();

//        $client = new hiClient('192.168.141.131:9502', [
//            'credentials' => ChannelCredentials::createInsecure(),
//        ]);
//
//        $request = new HiUser();
//        $request->setName('hyperf');
//        $request->setSex(1);
//
//        list($reply, $status) = $client->sayHello($request)->wait();
//
//
//        $message = $reply->getMessage();
//        $user = $reply->getUser();
//
//        $client->close();
//        var_dump(memory_get_usage(true));
//        return $message;


    }
}
