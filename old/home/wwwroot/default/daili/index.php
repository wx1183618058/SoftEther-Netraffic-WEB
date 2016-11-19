<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
$mod='blank';
include("../api.inc.php");
$title='代理中心';
include './head.php';
$dlid=$_SESSION['dlid'];
$row = $DB->get_row("SELECT * FROM auth_daili WHERE id='$dlid' limit 1");
$rs=$DB->get_row("SELECT * FROM auth_config WHERE 1");
$vip=$row['vip'];
$rmb=$row['rmb'];
if($vip==1){
	$dljg=$rs['dl1'];
	$dljgs=$rs['dls1'];
	$v="<font color='#FFB200'>铜牌代理</font>";
}elseif($vip==2){
	$dljg=$rs['dl2'];
	$dljgs=$rs['dls2'];
	$v="<font color='#80FE80'>银牌代理</font>";
}elseif($vip==3){
	$dljg=$rs['dl3'];
	$dljgs=$rs['dls3'];
	$v="<font color='#FEE680'>金牌代理</font>";
}elseif($vip==0){
	$dljg=$rs['dl0'];
	$dljgs=$rs['dls0'];
	$v="<font color='#B26B00'>普通代理</font>";
	//exit("<script language='javascript'>window.location.href='./login.php';</script>");
}elseif($vip==4){
	$dljg=$rs['dl4'];
	$dljgs=$rs['dls4'];
		$v="<font color='#2D006B'>钻石代理</font>";
}elseif($vip==5){
	$dljg=$rs['dl5'];
	$dljgs=$rs['dls5'];
	$v="<font color='red'>至</font><font color='green'>尊</font><font color='#2D006B'>代</font><font color='#E60066'>理</font>";
}
//$v="<font color='red'>VIP$vip</font>";
$config = $DB->get_row("SELECT * FROM auth_config");
$gonggao=$config['gg'];//公告获取
if($dlid<>""){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">代理中心</h3></div>
        <div class="panel-body">
          <!-- 代理中心 信息等 -->
		<div class="col-xs-12">代理ID：<?php echo $_SESSION['dlid'];?><br><br>
		代理VIP等级：<?php echo $v;?><br><br>
		代理拿货价格：<?php echo $dljg."元/天 + ".$dljgs."元/GB";?><br><br>
        账户余额：<?php echo $rmb."元";?><br><br>
		<!-- JXL_add for 2016-04-16 begin --><?php echo '<p>你的推荐余额：'.$row['tj_rmb'].'<br>你的推荐链接：<a href="./reg.php?tj_user='.$row['user'].'" target="_blank">点击这里</a></p>'; ?><!-- JXL_add for 2016-04-16 end -->
        <span class="glyphicon glyphicon-info-sign">公告:<br><?php echo $gonggao;?></span> <br> <br>
          <a href="./kmlist.php" class="btn btn-primary form-control">卡密管理</a><br><br>
         	<a href="./addmoney.php" class="btn btn-primary form-control">充值余额</a><br><br>
			<!--a href="./pay.php" class="btn btn-primary form-control">在线购买</a><br-->
        </div>
		<div class="panel-footer"><br>
          <span class="glyphicon glyphicon-info-sign">如需购买充值卡卡密请联系管理员</span> 
        </div>
      </div>
    </div>
  </div>
  </center>