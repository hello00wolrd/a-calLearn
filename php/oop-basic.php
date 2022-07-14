<?php

class People
{
    var $name = '';//不再称为变量,而叫类属性
    var $age = 0;
    var $addr = '';
    var $nation = '';

    function test()
    {
        //$name ="李四"
        //php中默认的变量是有作用域的,如果要在函数内部使用函数外的变量,则必须为全局变量
        global $name;
        echo "你好$name";
    }
}

//默认情况下方法的定义和函数的定义是完全一致的
$p1 = new People();//实例化类people并且进行属性和方法调用
$p1->name = '张三';
$p1->age = 0;
$p1->addr = '武汉洪山区';
$p1->nation = '汉族';
$p1->test();

class man extends People{
    //man 继承了People
}
$m1 =new man();//实例化man
//子类无法直接使用父类的私有属性
//子类无法直接使用父类的私有方法
//子类直接定义一个和父类相同的属性,是可以正常工作的
//父类中的方法在子类中可以进行覆盖,也称为"重写"
//在子类中使用parent::可以调用父类方法

//只要类的方法中有一个方法使用abstract关键字定义,则该类就是抽象类,该方法就是抽象方法
//抽象类的特点,不能被实例,只能被继承
//抽象代码不能实现代码,只能定义方法名和参数

