<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
/**
 * 注册
**/
$mod='blank';
include("../api.inc.php");
$dlconfig=$DB->get_row("SELECT * FROM auth_config WHERE 1");
if(isset($_POST['user']) && isset($_POST['pass'])){
	//JXL_add for 2016-04-16 begin
	$tj_user=daddslashes($_POST['tj_user']);
	//JXL_add for 2016-04-16 end
	$user=daddslashes($_POST['user']);
	$pass=daddslashes($_POST['pass']);
	$verifycode=daddslashes($_POST['verifycode']);
	$row = $DB->get_row("SELECT * FROM auth_daili WHERE user='$user' limit 1");
	$dlid=$row['id'];
	if($dlconfig['regok']==0){
	if($row['active']=="0" or $dlid<>""){
		exit("<script language='javascript'>alert('用户已经注册但未激活，请联系管理员激活！');window.location.href='./login.php';</script>");
	}
	if($user && $pass){
		if(!is_username($user)){
			exit("<script language='javascript'>alert('用户名只能是2~20位的字母数字！');history.go(-1);</script>");
		}elseif(!$verifycode || $verifycode!=$_SESSION['verifycode']){
			exit("<script language='javascript'>alert('验证码不正确！');history.go(-1);</script>");
		}elseif($dlconfig['activeok']==0){
			/*JXL_add for 2016-04-16
			$DB->query("insert `auth_daili`(`id`,`user`,`pass`,`rmb`,`vip`,`kmlist`,`active`,`regdate`) values(null,'$user','$pass','0',0,null,1,'$date');");
			*/
			$DB->query("insert `auth_daili`(`id`,`tj_user`,`user`,`pass`,`rmb`,`vip`,`kmlist`,`active`,`regdate`) values(null,'$tj_user','$user','$pass','0',0,null,1,'$date');");
			$row = $DB->get_row("SELECT * FROM auth_daili WHERE user='$user' limit 1");
			if($row['id']){
				unset($_SESSION['verifycode']);
				exit("<script language='javascript'>alert('注册成功，账号已经激活，请联系管理员充值使用！');window.location.href='./login.php';</script>");	
			}else{
				exit("<script language='javascript'>alert('注册失败，请联系管理员！');history.go(-1);</script>");
			}
		}else{
			/*JXL_add for 2016-04-16
			$DB->query("insert `auth_daili`(`id`,`user`,`pass`,`rmb`,`vip`,`kmlist`,`active`,`regdate`) values(null,'$user','$pass','0',0,null,0,'$date');");
			*/
			$DB->query("insert `auth_daili`(`id`,`tj_user`,`user`,`pass`,`rmb`,`vip`,`kmlist`,`active`,`regdate`) values(null,'$tj_user','$user','$pass','0',0,null,0,'$date');");
			$row = $DB->get_row("SELECT * FROM auth_daili WHERE user='$user' limit 1");
			if($row['id']){
				unset($_SESSION['verifycode']);
				exit("<script language='javascript'>alert('注册成功，请联系管理员激活！');window.location.href='./login.php';</script>");	
			}else{
				exit("<script language='javascript'>alert('注册失败，请联系管理员！');history.go(-1);</script>");
			}
		}
	}
}else{
	exit("<script language='javascript'>alert('网站已经关闭注册，请联系管理员注册！');window.location.href='./login.php';</script>");
}
}
	

$title='代理注册';
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
            <a href="./reg.php"><span class="glyphicon glyphicon-user"></span> 注册</a>
          </li>
          <li class="active">
            <a href="./login.php"><span class="glyphicon glyphicon-user"></span> 登陆</a>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">代理注册</h3></div>
        <div class="panel-body">
          <form action="./reg.php" method="post" class="form-horizontal" role="form">
		    <!-- JXL_add for 2016-04-16 begin --><input type="hidden" name="tj_user" value="<?php echo $_GET['tj_user']; ?>"><!-- JXL_add for 2016-04-16 end -->
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" name="user" value="<?php echo @$_POST['user'];?>" class="form-control" placeholder="用户名" required="required"/>
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
              <div class="col-xs-4"><a href="login.php" class="btn btn-info form-control"/>登陆</a></div>
              <div class="col-xs-4"><a href="../user/" class="btn btn-info form-control"/>用户中心</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php footer(); ?>