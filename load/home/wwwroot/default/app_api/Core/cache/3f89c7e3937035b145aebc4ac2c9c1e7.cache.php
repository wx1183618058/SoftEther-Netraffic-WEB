<?php if(!defined('INCLUDE_PATH')){die('error!this is a cache file!');};?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<link rel="stylesheet" type="text/css" href="http://public.dingd.cn/css/header.css" />
<link href="http://public.dingd.cn/css/index.css" rel="stylesheet" type="text/css">
<link href="http://public.dingd.cn/css/layout.css" rel="stylesheet" type="text/css">
<script src="http://public.dingd.cn/js/jquery.js"></script>
<script src="http://public.dingd.cn/js/ddcms.js"></script>
<title><?php if(!empty($_page['title'])){;?><?php echo $_page['title'];?>-叮咚社区-IT职业社交平台-IT社区<?php }else{ ?><?php if(empty($_DDCMS['classinfo']['title'])){;?><?php echo $_SERVER['ddcms']['cfg']['site']['name'];?><?php }else{ ?><?php echo $_DDCMS['classinfo']['title'];?>-叮咚社区-IT职业社交平台-IT社区<?php }; ?><?php }; ?></title>
<meta name="keywords" content="IT社区,IT职业社交平台,IT社交,社交平台,程序员之家,IT教程,IT资讯">
<meta name="description" content="IT社区(叮咚IT社交平台)是国内首个IT资讯和社交为一体的大型IT职业社交平台，为个人站长与IT从业者提供全面的IT资讯、海量建站素材、强大的搜索优化辅助工具、网络产品设计与运营理念以及一站式网络解决方案和社交平台，我们一直致力为中文网站提供动力。">
</head>
<body>
<div class="head_float">
<div class="head_top">
	<div style="margin:auto;width:1000px;">
		<div class="head_left">
		<a href="<?php echo INDEX_DOMAIN;?>" title="叮咚IT社区首页">叮咚首页</a>&nbsp;·&nbsp;<a href="http://zone.dingd.cn" title="叮咚社区">IT社区</a>&nbsp;&nbsp;&nbsp;<IFRAME id="tianqi8_wetherinfo" name="tianqi8_wetherinfo" src="http://tq.ss256.com/code/freeweather8.htm?id=&fcolor=&imgurl=tb/tbs/tb1&bimg=&bcolor=&fsize=12" frameBorder=0 width=260 height=25 ALIGN=CENTER MARGINWIDTH=0 MARGINHEIGHT=0 HSPACE=0 VSPACE=0 SCROLLING=NO allowtransparency=true style=""></IFRAME>
		</div>
		<div class="head_right"><?php if($_DDCMS['userinfo'] == null){;?>
			<a href="<?php echo USER_DOMAIN;?>/index.php?c=Index&a=login">登录</a>|<a href="<?php echo USER_DOMAIN;?>/index.php?c=Index&a=reg">注册</a>
			<?php }else{ ?>
			<a href="<?php echo USER_DOMAIN;?>/index.php?"><?php echo $_DDCMS['userinfo']['nickname'];?></a><a href="<?php echo USER_DOMAIN;?>/index.php?">[个人中心]</a>
			<?php }; ?>
		</div>
	</div>
</div>
</div>
<div class="header">
	<div class="head_logo">
		<a href="<?php echo INDEX_DOMAIN;?>" title="叮咚IT社区首页"><img src="/style/dingd.png" alt="叮咚IT社区首页"></a>
	</div>
	<div class="head_banner">
		<a href="#">
			<img src="/file/images/banner.jpg"/>
		</a>
	</div>
</div>
<div class="clear"></div>
 <div class="page_nav">
<?php $class = getSubClass();?>
<?php if($class){;?>
<ul class="nav_left">
		<li>
			<a href="/index.php?cid=<?php echo $_DDCMS['classinfo']['id'];?>"  class="on"><?php echo $_DDCMS['classinfo']['title'];?>首页</a>
		</li>
	<?php
unset($row);
unset($db);
$db = db('class');
 $row = $db->where(array('grop'=>$_DDCMS['classinfo']['id']))->limit(10)->select();
foreach($row as $vo){
?>
			<li><a href="/article/<?php echo $vo['id'];?>"<?php if($vo['id'] == $_GET['cid']){;?> class="on" <?php }; ?>><?php echo $vo['title'];?></a></li>
	<?php }; ?>
   </ul>
<?php }else{ ?>
<?php if($_DDCMS['classinfo']['grop'] == '' || $_DDCMS['classinfo']['grop'] == '0'){;?>
   <ul class="nav_left">
		<li>
			<a href="<?php echo INDEX_DOMAIN;?>"  >首页</a>
		</li>
		<li>
			<a href="/article/<?php echo $_DDCMS['classinfo']['id'];?>.html"  class="on"><?php echo $_DDCMS['classinfo']['title'];?></a>
		</li>
   </ul>
<?php }else{ ?>
   <ul class="nav_left">
   <?php
unset($row);
unset($db);
$db = db('class');
 $row = $db->where(array('id'=>$_DDCMS['classinfo']['grop']))->limit(1)->select();
foreach($row as $vo){
?>
		<li>
			<a href="/article/<?php echo $vo['id'];?>.html" ><?php echo $vo['title'];?>首页</a>
		</li>
	<?php }; ?>
	<?php
unset($row);
unset($db);
$db = db('class');
 $row = $db->where(array('grop'=>$_DDCMS['classinfo']['grop']))->limit(10)->select();
foreach($row as $vo){
?>
			<li><a href="/article/<?php echo $vo['id'];?>.html"<?php if($vo['id'] == $_GET['cid']){;?> class="on" <?php }; ?>><?php echo $vo['title'];?></a></li>
	<?php }; ?>
   </ul>
<?php }; ?>
<?php }; ?>
  </div>