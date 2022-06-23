<?php
//$doc = new DOMDocument();//实例化DOMDocument类
//$doc->load('../xml/student.xml');
////读取class节点的属性
//$nodes = $doc->getElementsByTagName('class');
//$nodeName=$nodes->item(0)->nodeName;//取得class标签的第一个节点的名称,输出class
//$attr = $nodes ->item(0)->attributes->item(0)->nodeName; //输出第一个class标签的第一个属性的节点名字  输出为id
//$attr = $nodes ->item(0)->attributes->item(0)->nodeValue; //输出值,WNCDC085
////读取第二个学生的所有信息
//$nodes = $doc->getElementsByTagName('student');
//$students = $nodes->item(1)->childNodes;
//foreach ($students as $nodes){
//    echo $nodes->nodeValue;
//}


////将xml文件读取为PHP的二维数组
//$nodes = $doc->getElementsByTagName("student");
//$students = array();
//foreach ($nodes as $k => $v) {
//    $students[$k]["id"] = $v->getElementsByTagName('id')->item(0)->nodeValue;
//}
//print_r($students);


////修改xml的内容
$doc = new DOMDocument();
$doc->preserveWhiteSpace = false;//不保留空白节点(要是为true则会在每个节点前都会有一个空白节点)
$doc->formatOutput = true;//格式化输出
$doc->load('../xml/student.xml');
$nodes = $doc->getElementsByTagName('student');
////修改节点的属性值
//$nodes->item(2)->attributes->item(0)->nodeValue = '5';
////修改节点的值
//$nodes->item(2)->childNodes->item(1)->nodeValue='杨大言';
//$parent = $nodes->item(2);//先找到父节点再找到子节点,调用父节点的removeChild方法删除
//$child= $parent->childNodes->item(4);
//$parent->removeChild($child);

////也可以直接找到要删除的节点自身,再向上一层找到父节点,再调用removeChild进行删除
$child = $doc->getElementsByTagName('degree')->item(2);
$child->parentNode->removeChild($child);
$doc ->save('../xml/student.xml');//保存
