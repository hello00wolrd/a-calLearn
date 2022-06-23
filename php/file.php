<?php
/*文件读写的步骤
1.打开文件:fopen
2.读写文件fgets,fwrite
3.关闭文件fclose
附加函数
1.判断文件是否已经到达末尾:feof(),到达末尾则会返回true 否则就会返回flase
2.一次性将文件所有内容读出file_get_contents($filename)
3.使用file_put_content()一次性写文件
4.使用file_put_contents一次性写入文件
5.获取当前文件指针所在位置:ftell
6.直接将文件指针指向某个位置fseek
*/

//最基本的按行读取文件
$fp = fopen("../file/test.txt","r");
while (!feof($fp)){
    $line = fgets($fp);
    $line = str_replace("\n","<br>",$line);
    echo $line;
}
echo $line;
fclose($fp);


//往文件中写入内容
$fp = fopen("../file/test.txt","a+");
fwrite($fp,"\ntest,test123,login-fail");
fclose($fp);

//可以通过file_get_contents请求访问一个网页
$baidu=file_get_contents("https://www.baidu.com");
echo $baidu;
//3.使用file_put_content()一次性写文件
file_put_contents("../file/test.txt","\nhello my friends",FILE_APPEND);

//读取CSV文件(逗号分隔符),并且解析为二维数组
$content = file_get_contents("../file/test.txt");
$row = explode("\n",$content);

//循环之前先定义一个数组
$list = array();
for ($i = 1;$i<count($row);$i++){
    $temp = explode(",",$row[$i]);
    array_push($list, $temp);
}
print_r($list);

//使用PHP模拟tail -f 实时查看文件内容
$fp = fopen("../file/test.txt","r");
fseek($fp,25);
while($line = fgets($fp)){
    echo $line."<br>";
}
fclose($fp);
//运行实例
set_time_limit(0);
$pos = 0;
while(true){
    $fp=fopen("../file/test.txt","r");
    fseek($fp,$pos);
    while ($line=fgets($fp)){
        echo $line."<br>";
    }
    $pos=ftell($fp);
    fclose($fp);
    ob_flush();
    flush();
    sleep(1);
}
//建议将以上代码段分别封装到函数中,方便调用.