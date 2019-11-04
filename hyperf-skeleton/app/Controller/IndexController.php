<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\Helper\HelperFunction;
use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Logger\LoggerFactory;
use Hyperf\Utils\Context;
use Hyperf\Utils\Coroutine;

use Swoole\Coroutine\Channel;
use App\JsonRpc\CalculatorServiceConsumer;

/**
 * Class IndexController
 * @package App\Controller
 * @AutoController()
 */
class IndexController extends Controller
{
    /**
     * @Inject()
     * @var UserService
     */
    private $userService;

    /**
     * @Inject()
     * @var CalculatorServiceConsumer
     */
    private $client;

    // 通过在构造函数的参数上声明参数类型完成自动注入
//    public function __construct(UserService $userService)
//    {
//        var_dump('hello');
//        $this->userService = $userService;
//    }

    public function index()
    {
        return $this->client->add(1,2);
    }

//    public function service()
//    {
//
//
//        $sum = $this->client->add(intval($this->request->input('a',1)),intval($this->request->input('b',2)));
//        var_dump($sum);
//
//        return $sum;
//    }



    public function go(){
//        $redis = ApplicationContext::getContainer()->get(Redis::class);
//        $redis->set('hello','it me!');
//        return $redis->get('hello');
        //$channel = new Channel(10);
//
//        $word = 'hello';
//        ob_start();
//        co(function ()use($channel,$word){
//            defer(function (){
//                $word = 'hello1';
//                var_dump($word);
//            });
//            $channel->push($word);
//        });
//        $word = ob_get_contents();
//        ob_end_clean();

        $chan = new Channel(10);
        //使用parallel函数会让协程更清晰一点
        \parallel([
            function () use ($chan) {
                // some code
                $chan->push('hello');
            },
            function () use ($chan) {
                // some code
                $chan->push('it me');
            }
        ]);

//        $wg = new \Hyperf\Utils\WaitGroup();
//        // 计数器加二
//        $wg->add(2);
//        // 创建协程 A
//        co(function () use ($wg,$chan) {
//            // some code
//            $chan->push('hello');
//            // 计数器减一
//            $wg->done();
//        });
//        // 创建协程 B
//        co(function () use ($wg,$chan) {
//            // some code
//            $chan->push('it me');
//            // 计数器减一
//            $wg->done();
//        });
//        // 等待协程 A 和协程 B 运行完成
//        $wg->wait();

        $length = $chan->length();
        $data = [];
        for ($i=0; $i<$length; $i++){
            $data[] = $chan->pop();
        }

        return [
            'inCoroutine'=>Coroutine::inCoroutine(),
            'coroutineId'=>Coroutine::id(),
            'chanData'=>$data,
        ];
        //return $channel->pop();
    }

    public function go1(){
        $concurrent = new Coroutine\Concurrent(10,1);

        // Context 的 set 和 get只有在同一个协程中才有意义
        Context::set('name','小白');
        echo Context::get('name').PHP_EOL;

        for($i=0; $i<15; $i++){
            $concurrent->create(function (){
                echo Context::get('name').PHP_EOL;
                echo Coroutine::id().PHP_EOL;
            });
        }


        sleep(10);
        return [
            'inCoroutine'=>Coroutine::inCoroutine(),
        ];
        //return $channel->pop();
    }
}
