<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/11/1
 * Time: 14:28
 */
namespace App\Helper;

use Hyperf\Utils\ApplicationContext;

class HelperFunction{
    public static function getLog(){
        return ApplicationContext::getContainer()->get(\Hyperf\Logger\LoggerFactory::class)->get('log','default');
    }
}