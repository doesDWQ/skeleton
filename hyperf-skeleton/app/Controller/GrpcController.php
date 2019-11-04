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

use App\Client\HiClient;
use Grpc\HiUser;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class IndexController
 * @package App\Controller
 * @AutoController()
 */
class GrpcController extends Controller
{
    public function hello()
    {
        $client = new HiClient('127.0.0.1:9502', [
            'credentials' => null,
        ]);

        $request = new HiUser();
        $request->setName('hyperf');
        $request->setSex(1);


        list($reply, $status) = $client->sayHello($request);

        $message = $reply->getMessage();
        $user = $reply->getUser();

        $client->close();
        var_dump(memory_get_usage(true));
        return $message;
    }
}
