<html>

<head>

<title>html5响应式九宫格</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;" />

<meta name="apple-mobile-web-app-capable" content="yes" />

<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<meta name="format-detection" content="telephone=no" />

<meta charset="utf-8" />

<style type="text/css">

html, body { color:#222; font-family:Microsoft YaHei, Helvitica, Verdana, Tohoma, Arial, san-serif; margin:0; padding: 0; text-decoration: none; }

img { border:0; }

ul { list-style: none outside none; margin:0; padding: 0; }

body {

background-color:#eee;

}

body .mainmenu:after { clear: both; content: " "; display: block; }

 

body .mainmenu li{

float:left;

margin-left: 2.5%;

margin-top: 2.5%;

width: 30%; 

border-radius:3px;

overflow:hidden;

}

 

body .mainmenu li a{ display:block;  color:#FFF;   text-align:center }

body .mainmenu li a b{

display:block; height:80px;

}

body .mainmenu li a img{

margin: 15px auto 15px;

width: 50px;

height: 50px;

}

 

body .mainmenu li a span{ display:block; height:30px; line-height:30px;background-color:#FFF; color: #999; font-size:14px; }

 

body .mainmenu li:nth-child(8n+1) {background-color:#36A1DB}

body .mainmenu li:nth-child(8n+2) {background-color:#678ce1}

body .mainmenu li:nth-child(8n+3) {background-color:#8c67df}

body .mainmenu li:nth-child(8n+4) {background-color:#84d018}

body .mainmenu li:nth-child(8n+5) {background-color:#14c760}

body .mainmenu li:nth-child(8n+6) {background-color:#f3b613}

body .mainmenu li:nth-child(8n+7) {background-color:#ff8a4a}

body .mainmenu li:nth-child(8n+8) {background-color:#fc5366}

</style>

</head>

 

<body>

<ul class="mainmenu">

<!--li><a href="<?php echo '?act=top&app_key='.$_GET['app_key'].'&username='.$_GET['username'].'&password='.$_GET['password'];?>"><b><img src="images/001.png" /></b>流量排行</a></li-->

<li><a href="<?php echo '?act=theme&app_key='.$_GET['app_key'].'&username='.$_GET['username'].'&password='.$_GET['password'];?>" ><b><img src="images/002.png" /></b>主题切换</a></li>

<li><a href="<?php echo '?act=list_gg&app_key='.$_GET['app_key'].'&username='.$_GET['username'].'&password='.$_GET['password'];?>" ><b><img src="images/003.png" /></b>消息通知</a></li>

<li><a href="<?php echo '?act=info&app_key='.$_GET['app_key'].'&username='.$_GET['username'].'&password='.$_GET['password'];?>" ><b><img src="images/004.png" /></b>使用记录</a></li>

<li><a href="<?php echo '?act=line&app_key='.$_GET['app_key'].'&username='.$_GET['username'].'&password='.$_GET['password'];?>" ><b><img src="images/005.png" /></b>线路安装</a></li>

<li><a href="<?php echo '?act=user_info&app_key='.$_GET['app_key'].'&username='.$_GET['username'].'&password='.$_GET['password'];?>" ><b><img src="images/006.png" /></b>个人中心</a></li>
<li><a href="html/help.html" ><b><img src="images/007.png" /></b>使用帮助</a></li>


<li><a href="javascript:void(0)" onclick="window.myObj.goUpdate()"><b><img src="images/008.png" /></b>检测更新</a></li>

<li><a href="javascript:void(0)" onclick="window.myObj.goLogin()"><b><img src="images/006.png" /></b>账户切换</a></li>         

</ul>

<!-- 欢迎大家关注我的博客！如有疑问,请加QQ群：135430763共同学习！ -->

</body>

</html></code>