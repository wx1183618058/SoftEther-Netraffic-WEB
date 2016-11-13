<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
$mod='blank';
include("../api.inc.php");
$title='账号列表';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php
$user = daddslashes($_GET['user']);
if(!$user || !$row = $DB->get_row("select * from `openvpn` where iuser='$user' limit 1")){ exit("账号不存在!");}
if($_POST['type']=="update"){
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">修改账号结果</h3></div>
<div class="panel-body">';
$pass = daddslashes($_POST['pass']);
$maxll = daddslashes($_POST['maxll'])*1024*1024;
$state = daddslashes($_POST['state']);
$upload = daddslashes($_POST['upload']);
$down = daddslashes($_POST['down']);
$logins = daddslashes($_POST['logins']);
$endtime = strtotime($_POST['enddate']);
$u=$_GET['user'];
$p=$_POST['pass'];
$s=$_POST['state'];
$v=$_POST['maxll'];
$up=$_POST['upload'];
$do=$_POST['down'];
$log=$_POST['logins'];
$date3=date('Y/m/d H:i:s',${endtime});
	if($DB->query("update `openvpn` set `pass`='$pass',`maxll`='$maxll',`logins`='$logins',`upload`='$upload',`down`='$down',`i`='$state',`endtime`='$endtime' where iuser='$user'")){
		shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${u} ${p}");
		shell_exec("/bin/sh /vpnserver/cmd/Access.sh ${u} ${s}");
		shell_exec("/bin/sh /vpnserver/cmd/ShelChangelCount.sh ${u} ${v}");
		shell_exec("/bin/sh /vpnserver/cmd/UserExpiresSet.sh ${u} ${date3}");
		shell_exec("/bin/sh /vpnserver/cmd/MaxUpload.sh ${u} ${up}");
		shell_exec("/bin/sh /vpnserver/cmd/MaxDownload.sh ${u} ${do}");
		shell_exec("/bin/sh /vpnserver/cmd/MultiLogins.sh ${u} ${log}");
		echo '修改成功！';
	}else{
		echo '修改失败！'.$DB->error();
	}
echo '<hr/><a href="./qqlist.php">>>返回账号列表</a></div></div>';
exit;
}
?>
<div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">账号:<?=$user?> 配置</h3></div>
        <div class="panel-body">
          <form action="./qset.php?user=<?=$user?>" method="post" class="form-horizontal" role="form">
          <input type="hidden" name="type" value="update" />
          	<div class="input-group">
              <span class="input-group-addon">密码</span>
			  <input type="text" name="pass" value="<?=$row['pass']?>" class="form-control">
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon">账号状态</span>
			  <select name="state" class="form-control">
              	<option value="0">0_禁用</option>
				<option value="1" <?=$row['i']?"selected":''?>>1_开通</option>
              </select>
            </div><br/>
          	<div class="input-group">
              <span class="input-group-addon">总流量(M)</span>
			  <input type="text" name="maxll" value="<?=round($row['maxll']/1024/1024)?>" class="form-control">
            </div><br/>
			<div class="input-group">
              <span class="input-group-addon">到期日期</span>
			  <input type="text" name="enddate" value="<?=$row['enddate']?>" class="form-control Wdate" onClick="WdatePicker({isShowClear:false})" autocomplete="off" required>
            </div><br/>
			  <div class="input-group">
              <span class="input-group-addon">上传宽带</span>
			  <input type="text" name="upload" value="<?=$row['upload']?>" class="form-control">
            </div><br/>
			   <div class="input-group">
              <span class="input-group-addon">下载宽带</span>
			  <input type="text" name="down" value="<?=$row['down']?>" class="form-control">
            </div><br/>
			   <div class="input-group">
              <span class="input-group-addon">多登陆数</span>
			  <input type="text" name="logins" value="<?=$row['logins']?>" class="form-control">
            </div><br/>
            <div class="form-group">
              <div class="col-sm-12"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="../datepicker/WdatePicker.js"></script>