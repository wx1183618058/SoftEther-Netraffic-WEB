
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>安装后台数据库</title>

<?php
error_reporting(0);
include_once("/admin/head.php");
if(file_exists("dg.lock")) {
	echo'您已经安装过，如需重新安装请删除<font color=red> dg.lock </font>文件后再安装!如果你不是管理员请自觉离开!';
} else {
$do=$_GET['do'];
if($do=='') {
	echo <<<HTML
	<div class="container" style="padding-top:70px;">
<form  class="glyphicon glyphicon-lock" action="{$_SERVER['PHP_SELF']}?do=1" method='post'>
<br>数据库地址:<br>
<input type='text' name='host' value='localhost'/>
<br>数据库端口:<br>
<input type='text' name='port' value='3306'/>
<br>数据库用户名:<br>
<input type='text' name='user' value=''/>
<br>数据库密码:<br>
<input type='text' name='pwd' value=''/>
<br>数据库名:<br>
<input type='text' name='db' value=''/><br/>
<br>管理员用户名:<br>
<input type='text' name='authuser' value=''/><br/>
<br>管理员密码:<br>
<input type='text' name='authpass' value=''/><br/>
<input class="btn btn-primary form-control" type='submit' value='保存'/>
</form><br/>
（如果已事先填写好config.php相关数据库配置，请 <a href="{$_SERVER['PHP_SELF']}?do=2">点击此处</a> 跳过这一步！</div>）
HTML;
}elseif($do=="1"){
		$host=isset($_POST['host'])?$_POST['host']:NULL;
	$port=isset($_POST['port'])?$_POST['port']:NULL;
	$user=isset($_POST['user'])?$_POST['user']:NULL;
	$pwd=isset($_POST['pwd'])?$_POST['pwd']:NULL;
	$db=isset($_POST['db'])?$_POST['db']:NULL;
	$adminuser=isset($_POST['authuser'])?$_POST['authuser']:NULL;
	$adminpass=isset($_POST['authpass'])?$_POST['authpass']:NULL;
	if($host==NULL or $user==NULL or $pwd==NULL or $db==NULL or $adminuser==NULL or $adminpass==NULL){
		echo '保存错误,请确保每项都不为空';
	} else {
				$config='<?php
/*数据库配置*/
$host = "'.$host.'"; //MYSQL主机
$port = '.$port.'; //MYSQL主机
$user = "'.$user.'"; //MYSQL用户
$pwd ="'.$pwd.'"; //MYSQL密码
$dbname = "'.$db.'"; //数据库名
$adminuser="'.$adminuser.'";//管理员用户名
$adminpass="'.$adminpass.'";//管理员密码
//JXL_add for 2016-04-16 begin
$conf_rate="0";//推荐人返现折扣率，如：0为不返现，1为全额返现，返点5%填0.05，返点10%填0.1，正常情况下，取值范围（0~1），请须知
//JXL_add for 2016-04-16 end
?>';
		file_put_contents('config.php',$config);
		echo "保存成功!<br><a href='{$_SERVER['PHP_SELF']}?do=2'>下一步</a>";
	
	}
}elseif($do=="2"){
include_once 'config.php';
$sql=file_get_contents("install.sql");
$sql=explode(';',$sql);
$cn = mysql_connect($host.':'.$port,$user,$pwd);
if (!$cn)
die('err:'.mysql_error());
mysql_select_db($dbname,$cn) or die('err:'.mysql_error());
mysql_query("set names utf8",$cn);
$t=0;
$e=0;
$error='';
for($i=0;$i<count($sql);$i++) {
if ($sql[$i]!='') {
if(mysql_query($sql[$i],$cn)) {
++$t;
} else {
++$e;
$error.=mysql_error().'<br/>';
}
}
}
if($e==0) {
echo "安装成功<br/>SQL成功{$t}句/失败{$e}句 <a href='{$_SERVER['PHP_SELF']}?do=3'>下一步</a>";
} else {
echo "安装失败<br/>SQL成功{$t}句/失败{$e}句<br/>错误信息：{$error}<br/><a href='{$_SERVER['PHP_SELF']}?do=2'>点此进行重试</a>";
}
}elseif($do=="3"){
	@file_put_contents("dg.lock",'安装锁');
	echo '<font color="green">安装完成！</font>';
	echo "<a href='./admin'>进入管理页</a>";
}




}

?>