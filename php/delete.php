<?php
$conn = mysqli_connect("localhost", "root", "p-0p-0p-0", "learn") or die("数据库连接建立不成功");
$articleId = $_POST['articleId'];
$sql  = "delete from article where articleid=$articleId"or die("delete-fail");//直接删除删除就没有了
mysqli_query($conn,$sql);
echo "delete-ok";
//通常在进行删除操作的时候,会使用软删除:建立一个叫做回收站的表或者再设置一列来标识列表是否删除