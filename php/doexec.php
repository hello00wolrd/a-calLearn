<?php
/*使用PHP执行操作系统命令
1.使用反引号直接执行*/
$result =`ipconfig`;
$result=iconv("GBK","UTF-8",$result);
echo $result;