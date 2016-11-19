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

		$version = '../version.php';
		$ver = include($version);
		$ver = $ver['ver'];
        $ver = substr($ver,-3);
		$updatehost = 'http://97cn.top/up.php';
		$lastver = file_get_contents(($updatehost. '?a=check&v=') . $ver);
                if($lastver!==$ver){
			$updateinfo = ('<p class="red">官方最新版本为: V ' . $lastver) . '</p><span>
		  <a href="javascript:if(confirm(\'升级前,请确认已经做好数据库和程序备份!\'))location=\'./updatenow.php\'">点击这里在线升级</a>
          </span>';
			$chanageinfo = file_get_contents(($updatehost . '?a=chanage&v=') . $lastver);
		}else{
			$updateinfo = ('<p class="red">官方最新版本：V ' . $lastver) . '</p><span>已经是新版，不需要升级</span>';
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
		<h3 class="panel-title">在线升级</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<?php echo $updateinfo; ?>
		</li>
        <li class="list-group-item"><b>升级内容：</b></li>
		<li class="list-group-item">
			<?php echo $chanageinfo; ?>
		</li>
	</ul>
</div>