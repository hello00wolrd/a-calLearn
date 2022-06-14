<?php
/*$i = date("s");
$s = 0;
date_default_timezone_set( 'Asia/Shanghai' );
while($s<5){
    $s++;
    ob_flush();
    flush();
    echo date("Y-m-d H:i:s")."<br>";
    $i=date("s");
    sleep(1);
}
function calc($a){
    echo "the result is :$a <br>";
}
calc(100);*/
function re_01($pattern, $source)
{
    $result = preg_match($pattern, $source);
    if ($result) {
        echo "匹配成功<br>";
    } else {
        echo "匹配失败<br>";
    }
}

function re_phone(){
    return $pattern="/^1[3-9]\d{9}$/";
}
function re_ip($source)
{
    return $pattern = "/(^[01]?\d?\d$)|(^2[0-4]$)\d|(^25[0-5]$)\.(^[01]?\d?\d$)|(^2[0-4]$)\d|(^25[0-5]$)\.(^[01]?\d?\d$)|(^2[0-4]$)\d|(^25[0-5]$)\.(^[01]?\d?\d$)|(^2[0-4]$)\d|(^25[0-5]$)/";
}

