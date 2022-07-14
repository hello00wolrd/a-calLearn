<?php
//xpath定位元素
$doc = new DOMDocument();
$doc ->preserveWhiteSpace = false;
$doc->load('../xml/student.xml');
$xpath = new DOMXPath($doc);//实例化XPATH对象
//第一种查询方式
//$expression = "/class/student[@sequence = '1']/school";
//第二种查询方式  简化前缀
$expression = "//student[@sequence = '1']/school";
//第三种查询方法  简化寻找条件   中括号内的二表示的是第二个student的节点
$expression = "//student[2]/school";
//模糊匹配
$expression = "//student/school[contains(text(),'科技')]";
$nodes = $xpath->query($expression);
echo $nodes->item(0)->nodeValue;