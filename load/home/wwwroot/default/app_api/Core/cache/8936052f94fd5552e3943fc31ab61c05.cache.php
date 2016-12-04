<?php if(!defined('INCLUDE_PATH')){die('error!this is a cache file!');};?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<!--<link href="/style/require.php?css=header.css,layout.css,index.css&2" rel="stylesheet" type="text/css">-->
<link href="/style/css/header.css" rel="stylesheet" type="text/css">
<link href="/style/css/index.css" rel="stylesheet" type="text/css">
<link href="/style/css/layout.css" rel="stylesheet" type="text/css">
<script src="/style/js/jquery.js"></script>
<script src="/style/js/ddcms.js"></script>
<script src="/style/js/cookie.js"></script>
<title><?php if(!empty($_page['title'])){;?><?php echo $_page['title'];?>-叮咚社区-IT职业社交平台-IT社区<?php }else{ ?><?php if(empty($_DDCMS['classinfo']['title'])){;?><?php echo $_SERVER['ddcms']['cfg']['site']['name'];?><?php }else{ ?><?php echo $_DDCMS['classinfo']['title'];?>-叮咚社区-IT职业社交平台-IT社区<?php }; ?><?php }; ?></title>
<meta name="keywords" content="IT社区,IT职业社交平台,IT社交,社交平台,程序员之家,IT教程,IT资讯">
<meta name="description" content="IT之家(中国站长站)是国内首个IT资讯和社交为一体的大型IT职业社交平台，为个人站长与IT从业者提供全面的IT资讯、海量建站素材、强大的搜索优化辅助工具、网络产品设计与运营理念以及一站式网络解决方案和社交平台，我们一直致力为中文网站提供动力。">
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
 <!--new head-->

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


<div class="head_box">
	<div class="head_row frist">
		
		<div class="head_line">
			<b><a href="/article/17.html">资讯</a></b>
			<a href="/article/20.html">业界</a>
			<a href="/article/21.html">网络</a>
			<a href="/article/22.html">评论</a>
			<a href="/article/23.html">科技</a>
		</div>
		
		<div class="head_line">
			<b><a href="/article/68.html">电商</a></b>
			<a href="/article/76.html">要闻</a>
			<a href="/article/77.html">分析</a>
			<a href="/article/78.html">淘宝</a>
			<a href="/article/79.html">微商</a>
		</div>
	</div>
	
	<div class="head_row">
		
		<div class="head_line">
			<b><a href="/article/65.html">建站</a></b>
			<a href="/article/83.html">经验</a>
			<a href="/article/84.html">SEO</a>
			<a href="/article/85.html">策划</a>
			<a href="/article/85.html">策划</a>
		</div>
		
		<div class="head_line">
			<b><a href="/article/67.html">创业</a></b>
			<a href="/article/70.html">点评</a>
			<a href="/article/71.html">经验</a>
			<a href="/article/73.html">模式</a>
			<a href="/article/72.html">APP</a>
		</div>
	</div><div class="head_row">
		
		<div class="head_line">
			<b><a href="/article/66.html">运营</a></b>
			<a href="/article/80.html">产品</a>
			<a href="/article/81.html">交互</a>
			<a href="/article/82.html">推广</a>
		</div>
		
		<div class="head_line">
			<b><a href="/article/86.html">移动</a></b>
			<a href="/article/87.html">通信</a>
			<a href="/article/88.html">数码</a>
			<a href="/article/90.html">评测</a>
		</div>
	</div><div class="head_row">
		
		<div class="head_line">
			<b><a href="/article/1.html">编程</a></b>
			<a href="/article/9.html">PHP</a>
			<a href="/article/82.html">前端</a>
			<a href="/article/13.html">安卓</a>
		</div>
		
		<div class="head_line">
			<b><a href="/article/30.html">软件</a></b>
			<a href="/article/31.html">网页</a>
			<a href="/article/32.html">修图</a>
			<a href="/article/34.html">剪辑</a>
		</div>
	</div>
	
	<div class="head_row">
		
		<div class="head_line">
			<b><a href="/index.php?m=Blog">博客大厅</a></b>
				<b><a href="/index.php?m=tool">工具</a></b>
		</div>
		
		<div class="head_line">
			<b><a href="/article/44.html">操作系统</a></b>
		
			<b><a href="/index.php?m=Game">游戏</a></b>
		</div>
	</div>
	
	<div class="head_row last">
		
		<div class="head_line">
			<b><a href="http://zone.dingd.cn">社区空间</a></b>
				
		</div>
		
		<div class="head_line">
		<b><a href="/index.php?m=Weibo">微博互动</a></b>
		</div>
	</div>
</div>
<script>
document.domain = "<?php echo MAIN_DOMAIN;?>";
</script>
 <!--end-->.html">经验</a>
			<a href="/article/84.html">SEO</a>
			<a href="/article/85.html">策划</a>
			<a href="/article/85.html">策划</a>
		</div>
		
		<div class="head_line">
			<b><a href="/article/67.html">创业</a></b>
			<a href="/article/70.html">点评</a>
			<a href="/article/71.html">经验</a>
			<a href="/article/73.html">模式</a>
			<a href="/article/72.html">APP</a>
		</div>
	</div><div class="head_row">
		
		<div class="head_line">
			<b><a href="/article/66.html">运营</a></b>
			<a href="/article/80.html">产品</a>
			<a href="/article/81.html">交互</a>
			<a href="/article/82.html">推广</a>
		</div>
		
		<div class="head_line">
			<b><a href="/article/86.html">移动</a></b>
			<a href="/article/87.html">通信</a>
			<a href="/article/88.html">数码</a>
			<a href="/article/90.html">评测</a>
		</div>
	</div><div class="head_row">
		
		<div class="head_line">
			<b><a href="/article/1.html">编程</a></b>
			<a href="/article/9.html">PHP</a>
			<a href="/article/82.html">前端</a>
			<a href="/article/13.html">安卓</a>
		</div>
		
		<div class="head_line">
			<b><a href="/article/30.html">软件</a></b>
			<a href="/article/31.html">网页</a>
			<a href="/article/32.html">修图</a>
			<a href="/article/34.html">剪辑</a>
		</div>
	</div>
	
	<div class="head_row">
		
		<div class="head_line">
			<b><a href="/index.php?m=Blog">博客大厅</a></b>
				<b><a href="/index.php?m=tool">工具</a></b>
		</div>
		
		<div class="head_line">
			<b><a href="/article/44.html">操作系统</a></b>
		
			<b><a href="/index.php?m=Game">游戏</a></b>
		</div>
	</div>
	
	<div class="head_row last">
		
		<div class="head_line">
			<b><a href="http://zone.dingd.cn">社区空间</a></b>
				
		</div>
		
		<div class="head_line">
		<b><a href="/index.php?m=Weibo">微博互动</a></b>
		</div>
	</div>
</div>
<script>
document.domain = "<?php echo MAIN_DOMAIN;?>";
</script>
 <!--end-->