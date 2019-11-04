<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/30
 * Time: 12:03
 */

namespace App\Service;


class UserService implements UserServiceInterface
{
    public function getInfoById(int $id)
    {
        var_dump($id);
        return 'hello';
    }
}