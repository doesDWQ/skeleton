<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/19
 * Time: 16:30
 */

namespace App\JsonRpc;


interface CalculatorServiceInterface
{
    public function add(int $a, int $b);

    public function sub(int $a, int $b);
}