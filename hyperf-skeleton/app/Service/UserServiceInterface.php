<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/30
 * Time: 14:12
 */

namespace App\Service;

interface UserServiceInterface
{
    public function getInfoById(int $id);
}