<?php
//POST请求
$username = $_POST['username'];
$password = $_POST['password'];
$vcode = $_POST['vcode'];
//GET请求
/*$username =$_GET['username'];
$password=$_GET['password'];
$vcode = $_GET['vcode'];*/
echo $username . "-" . $password . "-" . $vcode . '<br>';

/*
 * 在php中如何访问mysql数据库？MYSQLi和PDO
 * 1.连接到MYSQL数据库
 * 2.执行SQL语句（CRUD）
 * 处理SQL语句的结果
 * 4.关闭数据库连接
 * 事实上，所有的I/O操作都需要实现打开和关闭两个基本操作：文件读写，网络访问，数据库访问*/
switch ($vcode) {
    case 0000:
        echo "验证码正确";
        break;
    default:
        die("验证码错误");
}

$conn = mysqli_connect("localhost", "root", "p-0p-0p-0", "learn") or die("数据库连接建立不成功");

//设置sql语句的两种方式
mysqli_query($conn, "set names utf8");
/*mysqli_set_charset($conn,'utf8');*/

//拼接sql语句并且执行
$sql = "select * from user where username= '$username' and password ='$password' ";
$result = mysqli_query($conn, $sql);//$result获取到查询结果，称为结果集

if (mysqli_num_rows($result) == 1) {
    echo "登录成功<br>";
} else {
    echo "登陆失败<br>";
}
mysqli_close($conn);




