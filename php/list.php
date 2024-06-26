<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php date_default_timezone_set("Asia/Shanghai");
        echo date("Y-m-d H:i:s"); ?></title>
    <script type="text/javascript" src="../html/jquery-3.4.1.min.js"></script>
    <style>
        table {
            width: 800px;
            margin: auto;
            border: solid 1px green;
            border-spacing: 0;

        }

        td {
            border: solid 1px gray;
        }
    </style>
    <script type="text/javascript">
        function doDelete(articleId) {
            $.post('delete.php', 'articleId=' + articleId, function (data) {
                if (!(window.confirm("你确定删除该文章吗?"))) {
                    return false;
                }
                if (data == 'delete-ok') {
                    window.alert('删除成功');
                    // location.href ='list.php';
                    location.reload();//刷新页面
                } else {
                    window.alert('删除失败' + data);
                }
            })
        }
    </script>
</head>
<body>
<table>
    <?php
    session_start();
    if($_SESSION['isLogin']!='true'){
        die("请先登录");
    }
    $conn = mysqli_connect("localhost", "root", "p-0p-0p-0", "learn") or die("数据库连接建立不成功");
    mysqli_query($conn, "set names utf8");
    $sql = "select articleid,headline,createtime from article where articleid < 31";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_all($result);//将数据库中查询的结果集中的数据取出，保存到一个数组中
    //    mysqli_fetch_all()默认使用索引数组 ,也可以设定参数强制使用关联数组
    //    mysqli_fetch_all($result,MYSQLI_ASSOC);


    //遍历数据结果集并且输出到页面中
    //foreach($rows as $row){
    //    echo $row[0].'-'.$row[1].'-'.$row[2]."<br>";
    //}

    //遍历结果集并且表示在表格中
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row[0] . '</td>';
        echo '<td><a href="read.php?id=' . $row[0] . '">' . $row[1] . '</a></td>';
        echo '<td>' . $row[2] . '</td>';
        echo '<td><button onclick ="doDelete(' . $row[0] . ')">删除</button></td>';
        echo '</tr>';
    }
    mysqli_close($conn);
    ?>
</table>
</body>
</html>
