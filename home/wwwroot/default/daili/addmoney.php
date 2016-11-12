<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php

$mod='blank';
include("../api.inc.php");
$title='代理中心';
include './head.php';
$dlid=$_SESSION['dlid'];
if($dlid<>""){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$row = $DB->get_row("SELECT * FROM auth_daili WHERE id='$dlid' limit 1");
$rs=$DB->get_row("SELECT * FROM auth_config WHERE 1");
$vip=$row['vip'];
$rmb=$row['rmb'];
if($_GET['do']=="cz"){
$km = daddslashes($_POST['km']);
$kmrow = $DB->get_row("SELECT * FROM auth_kms WHERE km='{$km}' and kind=2 limit 1");	
if(!$kmrow){
	exit("<script>alert('卡密不存在');window.location.href='/daili';</script>");
	}elseif($kmrow['isuse']>0){
		exit("<script>alert('卡密已被使用');window.location.href='/daili';</script>");
	}else{
		$value = $kmrow['value'];
		$now_rmb = $rmb + $value;
		$DB->query("UPDATE auth_daili SET rmb='{$now_rmb}' WHERE id='{$dlid}'");
		$DB->query("UPDATE auth_kms SET isuse=1,usetime='".date("Y-m-d H:i:s")."',user='{$row['user']}' WHERE km='{$km}' and kind=2");
		//JXL_add for 2016-04-16 begin
		if($row['tj_user']){
			$rmb2=$value*$conf_rate;
			$sql2=$DB->query("update `auth_daili` set `tj_rmb`=`tj_rmb`+{$rmb2} where `user`='{$row['tj_user']}'");
		}
		//JXL_add for 2016-04-16 end
		wlog('代理充值','代理'.$row['user'].'使用卡密'.$km.'充值'.$value.'元['.$date.']');
		exit("<script>alert('成功充值".$value."元');window.location.href='/daili';</script>");
	}
}
if($vip==1){
	$dljg=$rs['dl1'];
	$v="<font color='#FFB200'>铜牌代理</font>";
}elseif($vip==2){
	$dljg=$rs['dl2'];
	$v="<font color='#80FE80'>银牌代理</font>";
}elseif($vip==3){
	$dljg=$rs['dl3'];
	$v="<font color='#FEE680'>金牌代理</font>";
}elseif($vip==0){
	$dljg=$rs['dl0'];
	$v="<font color='#B26B00'>普通代理</font>";
	//exit("<script language='javascript'>window.location.href='./login.php';</script>");
}elseif($vip==4){
	$dljg=$rs['dl4'];
		$v="<font color='#2D006B'>钻石代理</font>";
}elseif($vip==5){
	$dljg=$rs['dl5'];
	$v="<font color='red'>至</font><font color='green'>尊</font><font color='#2D006B'>代</font><font color='#E60066'>理</font>";
}
//$v="<font color='red'>VIP$vip</font>";
$config = $DB->get_row("SELECT * FROM auth_config");
$gonggao=$config['gg'];//公告获取
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">代理中心</h3></div>
        <div class="panel-body">
          <!-- 代理中心 信息等 -->
		<div class="col-xs-12">代理ID：<?php echo $_SESSION['dlid'];?><br><br>
		代理VIP等级：<?php echo $v;?><br><br>
		 代理拿货价格：<?php echo $dljg."元";?><br><br> 
         账户余额：<?php echo $rmb."元";?><br><br> 
        <span class="glyphicon glyphicon-info-sign">公告:<br><?php echo $gonggao;?></span> <br> <br>        	
          <form action="?do=cz" method="POST" class="form-inline">
  <div class="form-group">
    <label>充值余额</label>
    <input type="text" class="form-control" name="km" placeholder="请输入充值卡卡密">
  </div>
  <button type="submit" class="btn btn-primary">充值</button>
</form>

        </div>
		<div class="panel-footer"><br>
          <span class="glyphicon glyphicon-info-sign">如需购买充值卡卡密请联系管理员</span> 
        </div>
      </div>
    </div>
  </div>
  </center>