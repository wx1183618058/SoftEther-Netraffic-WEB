<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php

$mod='blank';
include("../api.inc.php");
$title='添加账号';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php
if($_POST['user']){
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">添加账号结果</h3></div>
<div class="panel-body">';
$user = daddslashes($_POST['user']);
$pass = daddslashes($_POST['pass']);
$maxll = daddslashes($_POST['maxll'])*1024*1024;
$state = daddslashes($_POST['state']);
$endtime = strtotime($_POST['enddate']);
$date3=date('Y/m/d H:i:s',${endtime});
$u=$_POST['user'];
$p=$_POST['pass'];
$s=$_POST['state'];
$v=$_POST['maxll'];
if(!$DB->get_row("select * from `openvpn` where `iuser`='$user' limit 1")){
	$id=strtoupper(substr(md5($uin.time()),0,8).'-'.uniqid());
	$sql="insert into `openvpn` (`iuser`,`pass`,`isent`,`irecv`,`maxll`,`i`,`starttime`,`endtime`) values ('{$user}','{$pass}',0,0,'{$maxll}','{$state}','".time()."','{$endtime}')";
	shell_exec("/bin/sh /vpnserver/cmd/UserCreate.sh {$u}");
	shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${u} ${p}");
	shell_exec("/bin/sh /vpnserver/cmd/Access.sh ${u} ${s}");
	shell_exec("/bin/sh /vpnserver/cmd/UserExpiresSet.sh ${u} ${date3}");
	shell_exec("/bin/sh /vpnserver/cmd/ShellCreateCount.sh ${u} ${v}");
	if($DB->query($sql))
		echo "成功添加一个账号";
		
	else
		echo "添加失败：".$DB->error();
}else{
	echo "<script>alert('该账号已存在！');history.go(-1);</script>";
}
echo '<hr/><a href="./addqq.php">>>返回继续添加</a><br><a href="./qqlist.php">>>返回账号列表</a></div></div>';
exit;
}
?>
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">添加账号</h3></div>
        <div class="panel-body">
          <form action="./addqq.php" method="post" class="form-horizontal" role="form">
            <div class="input-group">
			  <span class="input-group-addon">账号</span>
              <input type="text" name="user" value="" class="form-control" required/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon">密码</span>
			  <input type="text" name="pass" value="" class="form-control" required>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon">账号状态</span>
			  <select name="state" class="form-control">
              	<option value="0">0_禁用</option>
				<option value="1">1_开通</option>
              </select>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon">总流量(M)</span>
			  <input type="text" name="maxll" value="" class="form-control" required>
            </div><br/>
			<div class="input-group">
              <span class="input-group-addon">到期日期</span>
			  <input type="text" name="enddate" value="" class="form-control Wdate" onClick="WdatePicker({isShowClear:false})" autocomplete="off" required>
            </div><br/>
            <input type="submit" value="添加" class="btn btn-primary form-control"/>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="../datepicker/WdatePicker.js"></script>