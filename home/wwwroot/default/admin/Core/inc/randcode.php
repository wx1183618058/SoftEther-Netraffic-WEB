<?php
require('../../system.php');
//生成验证码图片
Header("Content-type: image/PNG");
$im = imagecreate(80,40); // 画一张指定宽高的图片
$back = ImageColorAllocate($im, 255,255,255); // 定义背景颜色
imagefill($im,0,0,$back); //把背景颜色填充到刚刚画出来的图片中
$vcodes = "";
srand((double)microtime()*1000000);
//生成4位数字
for($i=0;$i<4;$i++){
	$font = ImageColorAllocate($im, rand(100,255),rand(0,100),rand(100,255)); // 生成随机颜色
	$authnum=rand(1,9);
	$vcodes.=$authnum;
	imagestring($im,5, 20+$i*10, 15, $authnum, $font);
}
$_SESSION['VCODE'] = $vcodes;


ImagePNG($im);
ImageDestroy($im);
?>