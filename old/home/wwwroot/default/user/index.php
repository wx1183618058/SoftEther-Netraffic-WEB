<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
$mod='blank';
include("../api.inc.php");

$u = daddslashes($_GET['user']);
$p = daddslashes($_GET['pass']);
$res=$DB->get_row("SELECT * FROM `openvpn` where `iuser`='$u' && `pass`='$p' limit 1");
if(!$res){
	header('location: login.php');
	exit;
}
if($_POST['km']){
	$km = daddslashes($_POST['km']);
	$myrow=$DB->get_row("select * from auth_kms where kind=1 and km='$km' limit 1");
	if(!$myrow){
		exit("<script language='javascript'>alert('此激活码不存在');history.go(-1);</script>");
	}elseif($myrow['isuse']==1){
		exit("<script language='javascript'>alert('此激活码已被使用');history.go(-1);</script>");
	}else{
		$duetime = ($res['endtime'] < time() ? time() : $res['endtime']) + $myrow['value']*24*60*60;
		$addll = $myrow['values']*1024*1024*1024;
		if($res['endtime'] < time()){//已到期
			$sql="update `openvpn` set `isent`='0',`irecv`='0',`maxll`='{$addll}',`endtime`='{$duetime}',`dlid`='{$myrow['daili']}',`i`='1' where `iuser`='{$u}' && `pass`='{$p}'";
			if($DB->query($sql)){
				$DB->query("update `auth_kms` set `isuse` ='1',`user` ='$u',`usetime` ='$date' where `id`='{$myrow['id']}'");
				wlog('账号激活','用户'.$u.'使用激活码'.$km.'开通账号['.$date.']');
				exit("<script language='javascript'>alert('开通成功！');history.go(-1);</script>");
			}else{
				exit("<script language='javascript'>alert('开通失败！');history.go(-1);</script>");
			}
		}else{
			$sql="update `openvpn` set `maxll`=`maxll` + '{$addll}',`endtime`='{$duetime}',`dlid`='{$myrow['daili']}',`i`='1' where `iuser`='{$u}' && `pass`='{$p}'";
			if($DB->query($sql)){
				$DB->query("update `auth_kms` set `isuse` ='1',`user` ='$u',`usetime` ='$date' where `id`='{$myrow['id']}'");
				wlog('账号激活','用户'.$u.'使用激活码'.$km.'续费账号['.$date.']');
				exit("<script language='javascript'>alert('续费成功！');history.go(-1);</script>");
			}else{
				exit("<script language='javascript'>alert('续费失败！');history.go(-1);</script>");
			}
		}
		//$duetime = ($res['endtime'] < time() ? time() : $res['endtime']) + $myrow['value']*24*60*60;
		//$addll = ($res['endtime'] < time() ? $myrow['values'] : $res['endtime']) + $myrow['values'];
		//$sql="update `openvpn` set `maxll`=`maxll` + '0',`endtime`='{$duetime}' where `iuser`='{$u}' && `pass`='{$p}'";
		
	}
	//if($DB->query("update `openvpn` set `pass`='$pass',`maxll`='$maxll',`i`='$state',`endtime`='$endtime' where iuser='$user'"))
}

$title='用户中心';
include './head.php';

$config = $DB->get_row("SELECT * FROM auth_config");
$gonggao=$config['ggs'];//公告获取
?>
  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">导航按钮</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">管理中心</a>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="./login.php"><span class="glyphicon glyphicon-user"></span> 登陆</a>
          </li>
          <li>
            <a href="./reg.php"><span class="glyphicon glyphicon-user"></span> 注册</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">用户中心</h3></div>
        <div class="panel-body">
		<div class="col-xs-12">
<?php
echo "<p>账号:".$res['iuser'];
echo "</p><p>发送:".round($res['isent']/1024/1024);
echo "MB</p><p>接收:".round($res['irecv']/1024/1024);
echo "MB</p><p>总量:".round($res['maxll']/1024/1024);
echo "MB</p><p>剩余:".round(($res['maxll']-$res['isent']-$res['irecv'])/1024/1024);
echo "MB</p><p>注册时间:".date('Y-m-d',$res['starttime']);
echo "</p><p>到期时间:".date('Y-m-d',$res['endtime']);
echo "</p><p>到期时间:".round(($res['endtime']-$res['starttime'])/86400)."天";
echo "</p><p>1.流量有效期以到期时间为准。<br />2.如果流量数据没有更新请断开VPN连接重新查询！</p>";
?>
		<br>
        <span class="glyphicon glyphicon-info-sign">公告:<br><?php echo $gonggao;?></span> <br> <br>
        </div>
		<div class="panel-footer"><br>
          <span class="glyphicon glyphicon-info-sign">如需流量请联系管理员</span> 
        </div>
      </div>
    </div>
  </div>
  </center>