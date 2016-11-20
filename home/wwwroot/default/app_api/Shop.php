<?php
	//检测是否是最新版本
	$u = $_GET['username'];
	$p = $_GET['password'];
if($_POST['post'] == 'submit'){


	if(empty($u) || $u == ""){
		die("请您先升级为最新版本再使用本功能！");
		exit;
	}
	//检测是否参与过抽奖
	$isJion = false;

	if(is_file('user_tmp/'.$u.'.txt')){
		$isJion = true;
		dir("您已参与过抽奖 无法继续参与哦");
	}
}
//奖品设置
$rand = array(
	0=>'500',
	1=>'1000',
	2=>'1500',
	3=>'2000',
	4=>'2500',
	5=>'3000'
);
include('head.php');
?>
<style>
html,body{
	
}
</style>
<div class="main">
<br>
<br>
<div class="alert alert-success">
【欢迎购买和使用叮咚云端流量】<br>
购买流量请联系您的代理商。

</div> 
</div>
<?php
include('footer.php');
?>