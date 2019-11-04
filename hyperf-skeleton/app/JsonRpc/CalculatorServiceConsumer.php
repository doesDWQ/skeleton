<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/19
 * Time: 16:21
 */

namespace App\JsonRpc;

use Hyperf\RpcClient\AbstractServiceClient;

class CalculatorServiceConsumer extends AbstractServiceClient implements CalculatorServiceInterface
{
    /**
     * 定义对应服务提供者的服务名称
     * @var string
     */
    protected $serviceName = 'CalculatorService';

    /**
     * 定义对应服务提供者的服务协议
     * @var string
     */
    protected $protocol = 'jsonrpc';

    public function add(int $a, int $b): int
    {
        //echo '111';
        return $this->__request(__FUNCTION__, compact('a', 'b'));
    }

    public function sub(int $a, int $b): int
    {
        //echo '111';
        return $this->__request(__FUNCTION__, compact('a', 'b'));
    }

}