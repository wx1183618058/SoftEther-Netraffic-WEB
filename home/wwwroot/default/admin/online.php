<?php
$mod='blank';
include("../api.inc.php");
$title='当前在线用户';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
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
		<thead><tr><th>ID</th><th>用户名</th></tr></thead>
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
$rs=$DB->query("SELECT `iuser` FROM `openvpn` WHERE `online`='1'");
while($res = $DB->fetch($rs))
{ 
$j+=1;
?>
<tr>
<td><?=$j?></td>
<td><?=$res['iuser']?></td>
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