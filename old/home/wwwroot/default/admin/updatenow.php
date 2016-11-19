<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
/**
 * 管理中心
**/
$mod='blank';
include("../api.inc.php");
$title='管理中心';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
$count=$DB->count("SELECT count(*) from `openvpn` WHERE 1");
$count2=$DB->count("SELECT count(*) from `openvpn` WHERE i=1");
$countdaili=$DB->count("SELECT count(*) from `auth_daili` WHERE 1");
$mysqlversion=$DB->count("select VERSION()");




//error_reporting(E_ALL);
//ini_set('display_errors', '1');
  

		include('Update.class.php');
		$version = '../version.php';
		$ver = include($version);
		$ver = $ver['ver'];
                $ver = substr($ver,-3);
		$hosturl= urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
		$updatehost = 'http://97cn.top/up.php';
		$updatehosturl = $updatehost.'?a=update&v='.$ver.'&u='.$hosturl;
		$updatenowinfo = file_get_contents($updatehosturl);
                if (strstr($updatenowinfo, 'zip')) {
			$pathurl = $updatehost.'?a=down&f='.$updatenowinfo;
			$updatedir = '../updata';
			delDirAndFile($updatedir);
			get_file($pathurl,$updatenowinfo,$updatedir); //下载补丁
			$updatezip = $updatedir.'/'.$updatenowinfo;
			
			$archive = new PclZip($updatezip);
            if ($archive -> extract(PCLZIP_OPT_PATH, '../', PCLZIP_OPT_REPLACE_NEWER) == 0){
				$updatenowinfo = "远程升级文件不存在.升级失败</font>";
            }else{
				$sqlfile = $updatedir.'/update.sql';
				$sql = file_get_contents($sqlfile);
				if(!empty($sql)){
					//echo $sql;
					$DB->query($sql);
				}
                $updatenowinfo = "<font color=red>升级完成 {$sqlinfo}</font><span><a href=./index.php?g=System&m=Update>点击这里 查看是否还有升级包</a></span>";
		}
	}
	delDirAndFile($updatedir);
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">管理中心首页</h3></div>
          <ul class="list-group">
            <li class="list-group-item"><span class="glyphicon glyphicon-stats"></span> <b>平台统计：</b>共有<font color=red><?php echo $count?></font>个账号，状态正常的有<font color=red><?php echo $count2?></font>个账号</li>
            <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>当前时间：</b> <?=$date?></li>
          </ul>
      </div>
      
      <div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">在线升级</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<?php echo $updatenowinfo; ?>
		</li>
	</ul>
</div>