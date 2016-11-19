<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
/**
 * 管理中心
**/
$mod='blank';
include("../api.inc.php");
$title='管理中心';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
$count=$DB->count("SELECT count(*) from `openvpn` WHERE 1");
$count2=$DB->count("SELECT count(*) from `openvpn` WHERE i=1");
$countdaili=$DB->count("SELECT count(*) from `auth_daili` WHERE 1");
$mysqlversion=$DB->count("select VERSION()");
		// 获取版本号更新日期
		$version = '../version.php';
		$ver = include($version);										
		$hosturl= urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
		$updatehost = 'http://97cn.top/up.php';
		$updatehosturl = $updatehost.'?a=client_check_time&v='.$ver.'&u='.$hosturl;
		$domain_time = file_get_contents($updatehosturl);
		 if($domain_time=='0'){
			$domain_time="无限制";
			$time=$ver['release'];
			$time="2016-11-11 00:00:00";
		 }else {
                        $domain_time=''.date("Y-m-d",$domain_time).'';
		 }		

?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">管理中心首页</h3></div>
          <ul class="list-group">
            <li class="list-group-item"><span class="glyphicon glyphicon-stats"></span> <b>平台统计：</b>共有<font color=red><?php echo $count?></font>个账号，状态正常的有<font color=red><?php echo $count2?></font>个账号</li>
            <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>当前时间：</b> <?=$date?></li>
          </ul>
      </div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">服务器信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>PHP 版本：</b><?php echo phpversion() ?>
			<?php if(ini_get('safe_mode')) { echo '线程安全'; } else { echo '非线程安全'; } ?>
		</li>
		<li class="list-group-item">
			<b>MySQL 版本：</b><?php echo $mysqlversion ?>
		</li>
		<li class="list-group-item">
			<b>服务器软件：</b><?php echo $_SERVER['SERVER_SOFTWARE'] ?>
		</li>
		
		<li class="list-group-item">
			<b>程序最大运行时间：</b><?php echo ini_get('max_execution_time') ?>s
		</li>
		<li class="list-group-item">
			<b>POST许可：</b><?php echo ini_get('post_max_size'); ?>
		</li>
		<li class="list-group-item">
			<b>文件上传许可：</b><?php echo ini_get('upload_max_filesize'); ?>
		</li>
	</ul>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">授权信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>系统版本：</b><?php echo $ver['vername'].'V'.$ver['ver']; ?>
		</li>
		<li class="list-group-item">
			<b>最近更新时间：</b><?php echo $time; ?>
		</li>
		<li class="list-group-item">
			<b>服务到期时间：</b><?php echo $domain_time; ?>
		</li>
	</ul>
</div>
    </div>
  </div>