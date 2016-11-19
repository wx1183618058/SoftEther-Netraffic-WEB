<?php
error_reporting(0);
/*  function getTopDomainhuo() {
	$host=$_SERVER['HTTP_HOST'];
	$host=strtolower($host);
	if(strpos($host,'/')!==false) {
	$parse = @parse_url($host);
	$host = $parse['host'];
   }
     $topleveldomaindb=array('com','edu','gov','int','mil','net','org','biz','info','pro','name','museum','coop','aero','xxx','idv','mobi','cc','me','cn','club','ren','site','top');
	$str='';
	foreach($topleveldomaindb as $v) {
	$str.=($str ? '|':'').$v;
    }
    $matchstr="[^\.]+\.(?:(".$str.")|\w {2}|((".$str.")\.\w {2}))$";
	if(preg_match("/".$matchstr."/ies",$host,$matchs)) {
	   $domain=$matchs['0'];
      }
     else {
	   $domain=$host;
           }
     return $domain;
	 }
	 
	$domain=getTopDomainhuo();
	$real_domain='baidu.com';
	$check_host='http://97cn.top/up.php?a=client_check&u='.$domain;
	$check_info=file_get_contents($check_host);
	if($check_info=='1') {
	echo '&#21464;&#33080;&#29399;&#32;&#26410;&#25480;&#26435;&#65292;&#21152;&#81;&#65306;&#49;&#51;&#53;&#54;&#57;&#51;&#53;&#54;&#48;&#53;';
	die;
}
elseif($check_info=='2') {
	echo '&#25480;&#26435;&#38169;&#35823;&#19968;';
	die;
}
if($check_info!=='0') {
	if($domain!==$real_domain) {
	echo '&#25480;&#26435;&#38169;&#35823;&#20108;';
	die;
}
}unset($domain);
*/

define('IN_CRONLITE', true);
define('ROOT', dirname(__FILE__).'/');
define('TEMPLATE_ROOT', ROOT.'/template/');
define('SYS_KEY', 'authadmin');
session_start();
header('Content-Type: text/html; charset=UTF-8');

$stop='<!DOCTYPE html><html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head><link rel="shortcut icon" href="./res/api.ico"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0"><style type="text/css">
html{background:#eee}body{background:#fff;color:#333;font-family:"微软雅黑","Microsoft YaHei",sans-serif;margin:2em auto;padding:1em 2em;max-width:700px;-webkit-box-shadow:10px 10px 10px rgba(0,0,0,.13);box-shadow:10px 10px 10px rgba(0,0,0,.13);opacity:.8}h1{border-bottom:1px solid #dadada;clear:both;color:#666;font:24px "微软雅黑","Microsoft YaHei",,sans-serif;margin:30px 0 0 0;padding:0;padding-bottom:7px}#error-page{margin-top:50px}h3{text-align:center}#error-page p{font-size:9px;line-height:1.5;margin:25px 0 20px}#error-page code{font-family:Consolas,Monaco,monospace}ul li{margin-bottom:10px;font-size:9px}a{color:#21759B;text-decoration:none;margin-top:-10px}a:hover{color:#D54E21}.button{background:#f7f7f7;border:1px solid #ccc;color:#555;display:inline-block;text-decoration:none;font-size:9px;line-height:26px;height:28px;margin:0;padding:0 10px 1px;cursor:pointer;-webkit-border-radius:3px;-webkit-appearance:none;border-radius:3px;white-space:nowrap;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;-webkit-box-shadow:inset 0 1px 0 #fff,0 1px 0 rgba(0,0,0,.08);box-shadow:inset 0 1px 0 #fff,0 1px 0 rgba(0,0,0,.08);vertical-align:top}.button.button-large{height:29px;line-height:28px;padding:0 12px}.button:focus,.button:hover{background:#fafafa;border-color:#999;color:#222}.button:focus{-webkit-box-shadow:1px 1px 1px rgba(0,0,0,.2);box-shadow:1px 1px 1px rgba(0,0,0,.2)}.button:active{background:#eee;border-color:#999;color:#333;-webkit-box-shadow:inset 0 2px 5px -3px rgba(0,0,0,.5);box-shadow:inset 0 2px 5px -3px rgba(0,0,0,.5)}table{table-layout:auto;border:1px solid #333;empty-cells:show;border-collapse:collapse}th{padding:4px;border:1px solid #333;overflow:hidden;color:#333;background:#eee}td{padding:4px;border:1px solid #333;overflow:hidden;color:#333}
        </style>
    </head>
    <body id="error-page"><center>';
date_default_timezone_set("PRC");
$date = date("Y-m-d H:i:s");

if(is_file(ROOT.'360safe/360webscan.php')){//360网站卫士
    require_once(ROOT.'360safe/360webscan.php');
}

require ROOT.'config.php';

if(!isset($port))$port='3306';
//连接数据库
include_once(ROOT."db.class.php");
$DB=new DB($host,$user,$pwd,$dbname,$port);

$conf=$DB->get_row("SELECT * FROM auth_config WHERE id='1' limit 1");//获取系统配置
/*$sql = $DB->query("select * from auth_configs");
while($r = $DB->fetch($sql)){
	$configs[$r['k']] = $r['v'];
}*/
$password_hash='!@#%!s!0';
include_once(ROOT."function.php");
include_once(ROOT."member.php");