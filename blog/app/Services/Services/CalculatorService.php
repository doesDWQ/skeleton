<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/4
 * Time: 11:08
 */

namespace App\Services\Services;


use App\Services\HyperfJsonRpc;

class CalculatorService
{

    //调用add服务
    public static function add($a,$b){
        return HyperfJsonRpc::callRpcMethod('/calculator/add',['a'=>$a,'b'=>$b]);
    }

}