<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
if(function_exists('set_time_limit')) set_time_limit(0);
if(function_exists('ignore_user_abort')) ignore_user_abort();

include("./api.inc.php");
$rs=$DB->query("SELECT * FROM `openvpn`");
while($res = $DB->fetch($rs)){
	//$res
	if( time() >= $res['endtime'] && $res['i'] == 1 ){
		//禁用账号
		$DB->query("update `openvpn` set `i`=0 where `id`='".$res['id']."'");
		echo 'close'.$res['id'].'-';
	}elseif( time() < $res['endtime'] && $res['i'] == 0 ){
		//开通账号
		$DB->query("update `openvpn` set `i`=1 where `id`='".$res['id']."'");
		echo 'open'.$res['id'].'-';
	}
}
?>