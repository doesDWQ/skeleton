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

use Hyperf\HttpServer\Router\Router;

//Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');
//Router::addRoute(['GET', 'POST', 'HEAD'], '/go', 'App\Controller\IndexController@go');
//Router::addRoute(['GET', 'POST', 'HEAD'], '/go1', 'App\Controller\IndexController@go1');

Router::addServer('grpc', function () {
    Router::addGroup('/Grpc.hi', function () {
        Router::post('/sayHello', 'App\Controller\HiController@sayHello');
    });
});