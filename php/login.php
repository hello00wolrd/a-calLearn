<?php
//POST请求
$username = $_POST['username'];
$password = $_POST['password'];
$vcode = $_POST['vcode'];
//GET请求
/*$username =$_GET['username'];
$password=$_GET['password'];
$vcode = $_GET['vcode'];*/
//echo $username . "-" . $password . "-" . $vcode . '<br>';

/*
 * 在php中如何访问mysql数据库？MYSQLi和PDO
 * 1.连接到MYSQL数据库
 * 2.执行SQL语句（CRUD）
 * 处理SQL语句的结果
 * 4.关闭数据库连接
 * 事实上，所有的I/O操作都需要实现打开和关闭两个基本操作：文件读写，网络访问，数据库访问*/
if ($vcode !== '0000') {
    die("vcodeFLASE<br>");
}

$conn = mysqli_connect("localhost", "root", "p-0p-0p-0", "learn") or die("数据库连接建立不成功");

//设置sql语句的两种方式
mysqli_query($conn, "set names utf8");
/*mysqli_set_charset($conn,'utf8');*/

//拼接sql语句并且执行
$sql = "select * from user where username= '$username' and password ='$password' ";
$result = mysqli_query($conn, $sql);//$result获取到查询结果，称为结果集

if (mysqli_num_rows($result) == 1) {
    //登陆成功后,对当前的客户端分配一个SessionID,同时再服务器端记住当前客户端的登录状态
    session_start();//启用PHP的Session模块,为客户端生成唯一ID
    $_SESSION['isLogin']='ture';
    $user = mysqli_fetch_assoc($result);
    $_SESSION['username']=$user['username'];
    $_SESSION['role']=$user['role'];
    echo "loginTRUE<br>";
} else {
    echo "loginFLASE<br>";
}
mysqli_close($conn);




