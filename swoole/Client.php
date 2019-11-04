<?php

use Swoole\Coroutine\Client;

$c = new Client(SWOOLE_SOCK_TCP);
// 协议处理
$client->set([
    'open_length_check'     => 1,
    'package_length_type'   => 'N',
    'package_length_offset' => 0,       //第N个字节是包长度的值
    'package_body_offset'   => 4,       //第几个字节开始计算长度
    'package_max_length'    => 2000000,  //协议最大长度
]);
$c->connect('127.0.0.1', '9503');
$c->send('hello');
echo $c->recv();
$c->close();