<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 *
 * 定义抽象对象注入实际对象类
 */

return [
    'dependencies' => [
        \App\Service\UserServiceInterface::class=>\App\Service\UserService::class,
        \App\JsonRpc\CalculatorServiceInterface::class => App\JsonRpc\CalculatorServiceConsumer::class,
    ],
];
