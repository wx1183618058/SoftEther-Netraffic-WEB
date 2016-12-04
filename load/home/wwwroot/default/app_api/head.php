   <?php
		require('system.php');
		$admin = db("app_admin")->where(array("username"=>$_SESSION["dd"]["username"],"password"=>$_SESSION["dd"]["password"]))->find();
		if(!$admin){
			if(!$login_allow){
				header("location:login.php?head=no");	
				exit;
			}
		
		}
		
		
?>
<?php
	if(!is_mobile_request()){
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />  
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<title><?=$title?></title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<link href="/app_api/css/bootstrap.min.css" rel="stylesheet">
<script src="/app_api/css/bootstrap-theme.min.css"></script>
<script src="/app_api/css/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
<script src="http://libs.useso.com/js/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" href="/app_api/css/font-awesome.min.css">
<link rel="stylesheet" href="/app_api/nav_files/sidebar-menu.css">
<style type="text/css">
body,html{
	background:#efefef;
	padding:0px;margin:0px;height:100%;
	font-family: "Microsoft Yahei","Hiragino Sans GB","Helvetica Neue",Helvetica,tahoma,arial,Verdana,sans-serif,"WenQuanYi Micro Hei","\5B8B\4F53";
}
*{
	padding:0px;
	list-style:none;
}
.main-sidebar{
	
	height: 100%;
	min-height: 100%;
	width: 200px;
	z-index: 810;
	background-color: #2c2e2f;
	overflow-y:auto;
	overflow-x:auto;
 }

.header-logo{
	height: 70px;
    line-height: 70px;
    font-size: 12px;
    background: #2c2e2f;
    text-transform: uppercase;
    box-shadow: 1px 0px 2px rgba(0,0,0,0.2);
    border-bottom: 1px solid #ccc;
 }
 .container{
	
}
.content-main{
	background:#fff;
	padding:20px 20px;

}
.btn{
	    border-radius: 0px;
}
</style>
</head>
<body>
	<?php }else{?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>叮咚流量卫士云端控制台</title>
<meta charset="utf-8"> 
<link href="/app_api/css/bootstrap.min.css" rel="stylesheet">
<script src="/app_api/css/bootstrap-theme.min.css"></script>

<script src="/app_api/css/jquery.min.js"></script>

<script src="/app_api/css/bootstrap.min.js"></script>
</head>
<style>
body,html{
	background:#efefef;
	background-attachment:fixed;
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
</style>
<body>
<div style="padding:0px;padding-bottom:20px;"><!--//head-->
	<?php } ?>