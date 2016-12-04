<?php
/*
	筑梦工作室
	Author ： 2207134109
*/
set_time_limit(0);
error_reporting(0);
//强制使用中国（上海）时区
date_default_timezone_set('Asia/Shanghai');
define('R',dirname( __FILE__));
define('RI',dirname( __FILE__).'/Core');
define('RT',dirname( __FILE__).'/Core/templates/tpl');
require(R.'/config.php');
require(RI.'/fun/html.fun.php');
require(RI.'/fun/function.fun.php');
require(RI.'/class/T.class.php');
require(RI.'/class/D.class.php');
require(RI.'/class/C.class.php');
require(RI.'/class/F.class.php');
require(RI.'/class/U.class.php');
require(RI.'/class/File.class.php');
require(RI.'/class/Page.class.php');
require(RI.'/class/Base.class.php');
require(RI.'/class/cInfo.class.php');
session_start();
//全局SQL注入
SqlBase::_deal();
//时区有问题请把下面的true改成false
if(true){
 define("SYSTEM_T",time());
}else{
  define("SYSTEM_T",time()+8*60*60);
}

$MAX_LIMIT = trim(file_get_contents(R."/data/max_limit.txt"));
if($MAX_LIMIT == ""){
	$MAX_LIMIT = 100;
}
define("_MAX_LIMIT_",$MAX_LIMIT);

$t = explode(":",$_SERVER["HTTP_HOST"]);
$_SERVER["HTTP_HOST"] = $t[0];

if(is_file(R."/licences.key")){
	$licences = @file_get_contents(R."/licences.key");
	define("APP_KEY",$licences);
}else{
	define("APP_KEY","许可证文件丢失");
}