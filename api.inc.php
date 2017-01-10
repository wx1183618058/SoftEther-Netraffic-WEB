<?php
define('R',dirname( __FILE__));
define('RI',dirname( __FILE__).'/Core');
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
?>

