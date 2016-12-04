<?php 
$app_key = explode("_",$_GET["app_key"]);
		if($app_key[0] != $cfg['app_key']['tk']){
			header('Content-Type: text/html; charset=UTF-8');
			//die("口令与服务器不一致 已经拦截");
		}
?><html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta charset="utf-8"> 
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

<!-- 可选的Bootstrap主题文件（一般不使用） -->
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap-theme.min.css"></script>

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<title>叮咚云端访问</title>
<style>
body,html{
	background:#efefef;
	padding:0px;
	margin:0px;
	overflow-x:hidden;
}
.main{
	margin:10px;
}
.list-group-item a{
	display:block;
}
.label-t{
	margin-bottom:20px;
}
.line{
	height:1px;
	background:#ccc;
}
.btn{
	border-radius: 0px;

}
</style></head>
<body>