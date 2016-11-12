<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
include("../api.inc.php");
$u = daddslashes($_GET['user']);
$p = daddslashes($_GET['pass']);
$res=$DB->get_row("SELECT * FROM `openvpn` where `iuser`='$u' && `pass`='$p' limit 1");
/*if(!$res){
	header('location: login.php');
	exit;
}*/
$title='流量使用情况';
include './head.php';
echo "账号:".$res['iuser'];
echo "<br /><br />发送:".round($res['isent']/1024/1024);
echo "MB<br /><br />接收:".round($res['irecv']/1024/1024);
echo "MB<br /><br />总量:".round($res['maxll']/1024/1024);
echo "MB<br /><br />剩余:".round(($res['maxll']-$res['isent']-$res['irecv'])/1024/1024);
echo "MB<br /><br />注册时间:".date('Y-m-d',$res['starttime']);
echo "<br /><br />到期时间:".date('Y-m-d',$res['endtime']);
echo "<br /><br />1.流量有效期以到期时间为准。<br />2.如果流量数据没有更新请断开VPN连接重新查询！";
?>
</div>
</body>
</html>