<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
$mod='blank';
include("../api.inc.php");

$u = daddslashes($_GET['user']);
$p = daddslashes($_GET['pass']);
$us=$_GET['user'];
$pa=$_POST['newpass'];
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
		$duetime = time() + $myrow['value']*24*60*60;
		$addll = $myrow['values']*1024*1024*1024;
			$sql="update `openvpn` set `isent`='0',`irecv`='0',`maxll`='{$addll}',`endtime`='{$duetime}',`dlid`='{$myrow['daili']}',`i`='1' where `iuser`='{$u}' && `pass`='{$p}'";
			if($DB->query($sql)){
				$res1=$DB->get_row("SELECT * FROM `openvpn` where `iuser`='$u' && `pass`='$p' limit 1");
				$endtime=$res1['endtime'];
				//$date3=date('Y/m/d H:i:s',${duetime});
				$date3=date('Y/m/d',${duetime});
				$date4="${date3} 00:00:00";
				$u=$res1['iuser'];
				$p=$res1['pass'];
				$s=$res1['i'];
				$v=$res1['maxll'];
				$vs=${v}/1024/1024;
				$up=$res1['upload'];
				$do=$res1['down'];
				$log=$res1['logins'];
				shell_exec("/bin/sh /vpnserver/cmd/UserDelete.sh ${u}");
				shell_exec("/bin/sh /vpnserver/cmd/UserDeleteCount.sh ${u}");
				shell_exec("/bin/sh /vpnserver/cmd/UserCreate.sh {$u}");
				shell_exec("/bin/sh /vpnserver/cmd/ShellCreateCount.sh ${u} ${vs}");
				shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${u} ${p}");
				shell_exec("/bin/sh /vpnserver/cmd/Access.sh ${u} ${s}");
				shell_exec("/bin/sh /vpnserver/cmd/UserExpiresSet.sh ${u} ${date4}");
				shell_exec("/bin/sh /vpnserver/cmd/MaxUpload.sh ${u} ${up}");
				shell_exec("/bin/sh /vpnserver/cmd/MaxDownload.sh ${u} ${do}");
				shell_exec("/bin/sh /vpnserver/cmd/MultiLogins.sh ${u} ${log}");
				
				$rs=$DB->query("SELECT * FROM `server`");
				while($res = $DB->fetch($rs)) {
					$server=$res['ip'];
					file_get_contents("http://${server}/shell.php?act=kami&user=${u}&pass=${p}&access=${s}&time=${date4}&maxll=${vs}&up=${up}&down=${do}&logins=${log}");
				}
		
				$DB->query("update `auth_kms` set `isuse` ='1',`user` ='$u',`usetime` ='$date' where `id`='{$myrow['id']}'");
				wlog('账号激活','用户'.$u.'使用激活码'.$km.'续费账号['.$date.']');
				exit("<script language='javascript'>alert('续费成功！');history.go(-1);</script>");
			}else{
				exit("<script language='javascript'>alert('续费失败！');history.go(-1);</script>");
			}
		//$duetime = ($res['endtime'] < time() ? time() : $res['endtime']) + $myrow['value']*24*60*60;
		//$addll = ($res['endtime'] < time() ? $myrow['values'] : $res['endtime']) + $myrow['values'];
		//$sql="update `openvpn` set `maxll`=`maxll` + '0',`endtime`='{$duetime}' where `iuser`='{$u}' && `pass`='{$p}'";
		
	}
	//if($DB->query("update `openvpn` set `pass`='$pass',`maxll`='$maxll',`i`='$state',`endtime`='$endtime' where iuser='$user'"))
}elseif ($_POST['newpass']) {
    $newpass = daddslashes($_POST['newpass']);
    if ($DB->query("update `openvpn` set `pass` ='$newpass' where `iuser`='$u' && `pass`='$p' limit 1")) {
		shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${us} ${pa}");
		
		$rs=$DB->query("SELECT * FROM `server`");
				while($res = $DB->fetch($rs)) {
					$server=$res['ip'];
					file_get_contents("http://${server}/shell.php?act=mod&user=${us}&pass=${pa}");
				}
				
        exit("<script language='javascript'>alert('密码修改成功！');history.go(-1);</script>");
    } else {
        exit("<script language='javascript'>alert('密码修改失败！');history.go(-1);</script>");
    }
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
echo "</p><p>到期时间:".round(($res['endtime']-time())/86400)."天";
echo "</p><p>1.流量有效期以到期时间为准。<br />2.如果流量数据没有更新请断开VPN连接重新查询！</p>";
?>
		<form action="" method="POST" class="form-inline">
        <hr/>
        <div class="form-group">
        <label>修改密码</label>
        <input type="text" class="form-control" name="newpass" placeholder="请输入新密码">
        </div>
        <button type="submit" class="btn btn-primary">确认</button>
        </form>
		<form action="" method="POST" class="form-inline">
		<div class="form-group">
		<label>激活/续费账号</label>
		<input type="text" class="form-control" name="km" placeholder="请输入激活码卡密">
		</div>
		<button type="submit" class="btn btn-primary">确认</button>
		</form>
		<br>
        <span class="glyphicon glyphicon-info-sign">公告:<br><?php echo $gonggao;?></span> <br> <br>
		<br>
        <span class="glyphicon glyphicon-info-sign">如需流量请联系管理员</span> 
      </div>
    </div>
  </div>
    </div>
	  </div>
  </center>