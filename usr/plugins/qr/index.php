<?php
//载入qrcode类
include "./phpqrcode.php";

//取得GET参数
$url        = isset($_GET["url"]) ? $_GET["url"] : 'help';
$errorLevel = isset($_GET["e"]) ? $_GET["e"] : 'L';
$PointSize  = isset($_GET["p"]) ? $_GET["p"] : '3';
$margin     = isset($_GET["m"]) ? $_GET["m"] : '0';
preg_match('/https:\/\/([\w\W]*?)\//si', $url, $matches);

//简单判断
//if ( $matches[1] != 'blog.vircloud.net' || $url == 'help') { //取消此行注释并注释下面一行，就能加入自定义的url过滤功能
if ( $url == 'help'){
    header("Content-type: text/html; charset=utf-8");
    echo '<title>二维码 API 接口</title>';
    echo '<h1>二维码 API 接口</h1>
    使用前请仔细查看参数说明：<br />
    <br />
    url：二维码对应的网址<br /><br />
    m：二维码白色边框尺寸，缺省值: 3px<br /><br />
    e：容错级别(errorLevel)，可选参数如下(缺省值 L)：<br />
    &emsp;L：7% 的字码可被修正<br />
    &emsp;M：15%的字码可被修正<br />
    &emsp;Q：25%的字码可被修正<br />
    &emsp;H：30%的字码可被修正<br /><br />
    p：二维码尺寸，可选范围 1-10 (具体大小和容错级别有关)（缺省值：6）<br /><br />
    常规用法：<a href="https://blog.vircloud.net/ext/qr/?m=2&e=H&p=7&url=https://blog.vircloud.net/" target="_blank">https://blog.vircloud.net/ext/qr/?m=2&e=H&p=7&url=https://blog.vircloud.net/</a><br /><br />
    ';
	exit();
} else  {
    //调用二维码生成函数
    createqr($url, $errorLevel, $PointSize, $margin);
}

//简单二维码生成函数
function createqr($value,$errorCorrectionLevel,$matrixPointSize,$margin) {
    QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize, $margin);
}
?>