<?php
//file_get_contents()函数获取百度的页面源码
$html = file_get_contents("https://www.baidu.com/index.html");
//通过preg_replace()函数使页面源码由多行变为单行
$htmlOneLine=preg_replace("/[\r\n\t]/","",$html);
//preg_match来提取页面标题信息
preg_match("/<title>(.*)<\/title>/iu",$htmlOneLine,$titleArr);
//preg_match的返回值使数组形式
$title = $titleArr[1];
echo $title;