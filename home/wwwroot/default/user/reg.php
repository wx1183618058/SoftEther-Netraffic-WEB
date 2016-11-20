<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
/**
 * 注册
**/
$mod='blank';
include("../api.inc.php");
$dlconfig=$DB->get_row("SELECT * FROM auth_config WHERE 1");
if($_POST['user'] && $_POST['pass']){
	$u=$_POST['user'];
	$p=$_POST['pass'];
	$user=daddslashes($_POST['user']);
	$pass=daddslashes($_POST['pass']);
	$verifycode=daddslashes($_POST['verifycode']);
	$row = $DB->get_row("SELECT * FROM `openvpn` WHERE `iuser`='$user' limit 1");
	if(!is_username($user)){
		exit("<script language='javascript'>alert('用户名只能是2~20位的字母数字！');history.go(-1);</script>");
	}elseif($row){
		exit("<script language='javascript'>alert('用户名已被使用！');history.go(-1);</script>");
	}elseif(!$verifycode || $verifycode!=$_SESSION['verifycode']){
			exit("<script language='javascript'>alert('验证码不正确！');history.go(-1);</script>");
	}else{
		$DB->query("insert `openvpn`(`iuser`,`pass`,`isent`,`irecv`,`maxll`,`i`,`starttime`,`endtime`) values('{$user}','{$pass}',0,0,0,0,'".time()."','".time()."')");
		$row = $DB->get_row("SELECT * FROM `openvpn` WHERE `iuser`='$user' limit 1");
		if($row['id']){
			$yes=yes;
			$zero=0;
			shell_exec("/bin/sh /vpnserver/cmd/UserCreate.sh ${u}");
			shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${u} ${p}");
			shell_exec("/bin/sh /vpnserver/cmd/Access.sh ${u} ${yes}");
			shell_exec("/bin/sh /vpnserver/cmd/ShellCreateCount.sh ${u} ${zero}");
			unset($_SESSION['verifycode']);
			exit("<script language='javascript'>alert('注册成功！');window.location.href='./index.php?u={$row['iuser']}&p={$row['pass']}';</script>");	
		}else{
			exit("<script language='javascript'>alert('注册失败，请联系管理员！');history.go(-1);</script>");
		}
	}
}
	

$title='用户注册';
include './head.php';
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
          <li>
            <a href="./login.php"><span class="glyphicon glyphicon-user"></span> 登录</a>
          </li>
          <li class="active">
            <a href="./reg.php"><span class="glyphicon glyphicon-user"></span> 注册</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">用户注册</h3></div>
        <div class="panel-body">
          <form action="./reg.php" method="post" class="form-horizontal" role="form">
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" name="user" value="" class="form-control" placeholder="用户名" required="required"/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" name="pass" class="form-control" placeholder="密码" required="required"/>
            </div><br/>
			<div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-unchecked"></span></span>
              <input type="text" name="verifycode" class="form-control" placeholder="验证码" required="required" style="max-width: 65%;display:inline-block;vertical-align:middle;"/>&nbsp;<img title="点击刷新" src="verifycode.php" onclick="this.src='verifycode.php?'+Math.random();" style="max-height:32px;vertical-align:middle;" class="img-rounded">
            </div><br/>
            <div class="form-group">
              <div class="col-xs-4"><input type="submit" value="注册" class="btn btn-primary form-control"/></div>
              <div class="col-xs-4"></div>
              <div class="col-xs-4"><a href="login.php" class="btn btn-info form-control"/>登陆</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php footer(); ?>