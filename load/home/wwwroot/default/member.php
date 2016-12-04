<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
if(!defined('IN_CRONLITE'))exit();

$my=isset($_GET['my'])?$_GET['my']:null;

$clientip=$_SERVER['REMOTE_ADDR'];

if(isset($_COOKIE["ol_token"]))
{
	$row2 = $DB->get_row("SELECT * FROM `app_admin`");
	$u=$row2['username'];
	$p=$row2['password'];
	$token=authcode(daddslashes($_COOKIE['ol_token']), 'DECODE', SYS_KEY);
	list($user, $sid) = explode("\t", $token);
	$session=md5($u.$p.$password_hash);
	if($session==$sid) {
		$islogin2=1;
	}
}
?>