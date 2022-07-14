<?php
//此脚本用来爬bilibili主页
$content = file_get_contents("https://www.woniuxy.com/");
$html = new DOMDocument();
$html->preserveWhiteSpace = false;
@$html->loadHTML($content);
$links = $html->getElementsByTagName('a');

$linkList = array();//记录超链接的数组

foreach ($links as $link) {
    foreach ($link->attributes as $attr) {
        if ($attr->nodeName == "href") {
            //echo $attr->nodeValue . "<br>";
            //利用/,#,http三个特征来判断URL的地址类型,并且完成完整的地址拼接
            if (strpos($attr->nodeValue, '/') == 0) {
                $linkList[] = 'https://www.woniuxy.com' . $attr->nodeValue;
            }
            elseif (strpos($attr->nodeValue,'https://'==0)){
                $linkList[] = $attr->nodeValue;
            }
        }
    }
}
//print_r($linkList);
set_time_limit(0);
foreach ($linkList as $link){
    $filename = str_replace("https://www.woniuxy.com/","",$link);
    $filename = str_replace("/","-",$filename);
    $content = file_get_contents($link);
    @file_put_contents("../download/html/$filename.html",$content);
    echo "成功下载:$filename<br>";
    ob_flush();
    flush();
    sleep(0.5);
}
