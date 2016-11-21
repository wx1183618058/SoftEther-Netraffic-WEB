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
$domain_time="无期限";
$time="2016-11-20";
$mysqlversion=$DB->count("select VERSION()");
$conetnt = "test";
$file = R."/user_tmp/rand/test.txt";
file_put_contents($file,$conetnt);
$get = @file_get_contents($file);
$rand = false;
if($get == "test"){
	@unlink($file);
	$rand = true;
}
$steat=exec("ps -e | grep cmdtool");
if(!empty(${steat})) {
	$steat=1;
} else {
	$steat=0;
}
$file = R."/user_tmp/gg_read/test.txt";
file_put_contents($file,$conetnt);
$get = @file_get_contents($file);
$gg = false;
if($get == "test"){
	@unlink($file);
	$gg = true;
}

$file = R."/data/test.txt";
file_put_contents($file,$conetnt);
$get = @file_get_contents($file);
$kf = false;
if($get == "test"){
	@unlink($file);
	$kf = true;
}
//**版本信息检测
$v = explode("|",file_get_contents(R."/version.txt"));
foreach($v as $t){
	$tmp = explode(":",$t);
	$ver[trim($tmp[0])] = $tmp[1];
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
	</ul>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">监控信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>CmdTool版本：</b><?php echo "1.0";?>
		</li>
		<li class="list-group-item">
			<b>运行状态：</b><?php echo $steat ? "正在运行" : "已经停止";?>
		</li>
	</ul>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">云APP信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>验证码目录权限：</b><?php echo $rand ? "正常" : "异常 请给予 ".R."/user_tmp/rand 0777权限";?>
		</li>
		<li class="list-group-item">
			<b>客服修改缓存目录：</b><?php echo $kf ? "正常" : "异常 请给予 ".R."/data/ 0777权限";?>
		</li>
		<li class="list-group-item">
			<b>云端系统版本：</b><?php echo $ver["version"]."-".$ver["name"];?>
		</li>
	</ul>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">授权信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>系统版本：</b><?php echo "1.4"; ?>
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