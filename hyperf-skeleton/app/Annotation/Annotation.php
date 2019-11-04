<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/30
 * Time: 11:49
 */
//declare(strict_types=1);
//namespace App\Annotation;
//use Hyperf\Di\Annotation\AbstractAnnotation;
//
///**
// * @Annotation
// * @Target({"METHOD","PROPERTY"})
// */
//class Bar extends AbstractAnnotation
//{
//    // some code
//
//    //当注解定义在类时被扫描时会触发该方法
//    public function collectClass(string $className): void{
//        var_dump($className);
//    }
//
//    //当注解定义在类方法时被扫描时会触发该方法
//    public function collectMethod(string $className, ?string $target): void{
//
//    }
//
//    //当注解定义在类属性时被扫描时会触发该方法
//    public function collectProperty(string $className, ?string $target): void {
//
//    }
//
//}
//
///**
// * @Annotation
// * @Target("CLASS")
// */
//class Foo extends AbstractAnnotation
//{
//    // some code
//}