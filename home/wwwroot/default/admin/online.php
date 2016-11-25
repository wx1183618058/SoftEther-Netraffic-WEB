<?php
$mod='blank';
include("../api.inc.php");
$title='当前在线用户';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
$my=isset($_GET['my1'])?$_GET['my1']:null;
if($my=='del1'){
	echo '<div class="panel panel-primary">
	<div class="panel-heading w h"><h3 class="panel-title">正在断开</h3></div>
	<div class="panel-body box">';
	$sid=$_GET['sid'];
	shell_exec("/bin/sh /vpnserver/cmd/SessionDisconnect.sh ${sid}");
	echo '断开成功！';
	echo '<hr/><a href="./online.php">>>返回在线列表</a></div></div>';
}
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$rs = $DB->get_row("SELECT * FROM `auth_fwq` WHERE `id`='$id' limit 1");
	if(!$rs){
		echo "此服务器不存在";
	}else{
		$file = 'http://'.$rs['ipport'].'/res/openvpn-status.txt';
	}
}else{
	$file = '../res/openvpn-status.txt';
}

?>
<div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<div class="table-responsive">
<table class="table table-bordered">
   <thead>
		<thead><tr><th>ID</th><th>用户名</th><th>上传流量</th><th>下载流量</th><th>协议</th><th>登陆数</th><th>操作</th></tr></thead>
         <tbody>
<?php


$str=file_get_contents($file);
$num=(substr_count($str,date('Y'))-1)/2;
$fp=fopen($file,"r");
fgets($fp);
fgets($fp);
fgets($fp);
//在线列表代码
$j=0;
$rs=$DB->query("SELECT * FROM `openvpn` WHERE `online`<>'0'");
while($res = $DB->fetch($rs))
{ 
$j+=1;
?>
<tr>
<td><?=$j?></td>
<td><?=$res['iuser']?></td>
<td><?=round($res['osent']/1024/1024)?>M</td>
<td><?=round($res['orecv']/1024/1024)?>M</td>
<td><?=$res['mode']?></td>
<td><?=$res['online']?></td>
<td><a href="./online.php?my1=del1&sid=<?=$res['sid']?>" class="btn btn-xs btn-danger" onclick="if(!confirm('你确实要断开此用户吗？')){return false;}">断开</a></td>
</tr>
<?php }
?>
     </tbody>
   </thead>
</table>
      </div>
    </div>
  </div>
</body>
</html>