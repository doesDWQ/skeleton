<?php
namespace App\Client;
use Grpc\HiReply;
use Grpc\HiUser;
use Hyperf\GrpcClient\BaseClient;

class HiClient extends BaseClient
{
    public function sayHello(HiUser $argument)
    {
        return $this->simpleRequest(
            '/Grpc.hi/sayHello',
            $argument,
            [HiReply::class, 'decode']
        );
    }
}