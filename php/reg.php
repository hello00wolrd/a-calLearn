<?php
$username = $_POST['username'];
$password = $_POST['password'];
$tmpPath = $_FILES['photo']['tmp_name']; //获取文件的临时路径
$fileName = $_FILES['photo']['name'];//获取文件的原始文件名


$conn = mysqli_connect("localhost", "root", "p-0p-0p-0", "learn") or die("数据库连接建立不成功");

$sql = "select username from user where username='$username'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
//echo $count //调试
if ($count >= 1) {
    die("user-exists");
}
date_default_timezone_set("Asia/Shanghai");
$temp = explode(".", $fileName);
$newName = date('Ymd_His.').end($temp); //给文件加上时间戳
//echo $newName; //调试
move_uploaded_file($tmpPath, '../photo/' . $newName) or die("文件上传失败");//注册成功后，正式上传文件到指定路径
$now=date("Y-m-d H:i:s");
$sql = "insert into user(username, password, role,avatar,createtime) value ('$username','$password','user','$newName','$now')";
//echo $sql;//调试
mysqli_query($conn, $sql) or die("reg-fail");
mysqli_close($conn);


echo "reg-pass";