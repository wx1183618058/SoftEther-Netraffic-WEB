<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
/**
 * 登录
**/
$mod='blank';
include("../api.inc.php");
if(isset($_POST['user']) && isset($_POST['pass'])){
	$user=daddslashes($_POST['user']);
	$pass=daddslashes($_POST['pass']);
	$row = $DB->get_row("SELECT * FROM auth_daili WHERE user='$user' limit 1");
	$dlid=$row['id'];
	if($row['active']=="1" && $dlid<>""){
		
	}else{exit("<script language='javascript'>alert('用户不存在或未激活，如已经注册请联系管理员付费激活！');history.go(-1);</script>");}
	
	if($user==$row['user'] && $pass==$row['pass']) {
		$session=md5($user.$pass.$password_hash);
		$token=authcode("{$user}\t{$session}", 'ENCODE', SYS_KEY);
		//setcookie("ol_token", $token, time() + 604800);
		$row = $DB->get_row("SELECT * FROM auth_daili WHERE user='$user' limit 1");
		$dlid=$row['id'];
		$_SESSION['dlid']=$dlid;
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('登陆代理中心成功！');window.location.href='./';</script>");
	}elseif ($pass != $row['pass']) {
		@header('Content-Type: text/html; charset=UTF-8');
		exit("<script language='javascript'>alert('用户名或密码不正确！');history.go(-1);</script>");
	}
}elseif(isset($_GET['logout'])){
	setcookie("ol_token", "", time() - 604800);
	@header('Content-Type: text/html; charset=UTF-8');
	exit("<script language='javascript'>alert('您已成功注销本次登陆！');window.location.href='./login.php';</script>");
}elseif($islogin2==1){
	exit("<script language='javascript'>alert('您已登陆！');window.location.href='./';</script>");
}
$title='代理登录';
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
        <div class="panel-heading"><h3 class="panel-title">代理登陆</h3></div>
        <div class="panel-body">
          <form action="./login.php" method="post" class="form-horizontal" role="form">
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" name="user" value="<?php echo @$_POST['user'];?>" class="form-control" placeholder="用户名" required="required"/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" name="pass" class="form-control" placeholder="密码" required="required"/>
            </div><br/>
            <div class="form-group">
              <div class="col-xs-4"><input type="submit" value="登陆" class="btn btn-primary form-control"/></div>
              <div class="col-xs-4"><a href="reg.php" class="btn btn-info form-control"/>注册</a></div>
              <div class="col-xs-4"><a href="../user/" class="btn btn-info form-control"/>用户中心</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php footer(); ?>