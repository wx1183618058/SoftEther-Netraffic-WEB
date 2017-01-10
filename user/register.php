<?php
$login_allow = true;
include("head.php");

if($_GET['my']=="add")
{
	$p=$_POST['pass'];
	$p2=$_POST['pass2'];
	if($p==$p2){
		if(!db('openvpn')->where(array('iuser'=>$_POST['user']))->select()) {
		$starttime=time();
		$endtime=$starttime+1*24*60*60;
			if(db('openvpn')->insert(array(
				'iuser'=>$_POST['user'],
				'pass'=>$_POST['pass'],
				'maxll'=>'1024',
				'starttime'=>$starttime,
				'endtime'=>$endtime,
				'upload'=>'1',
				'down'=>'1',
				'logins'=>'1',
				'i'=>'1',
				))) {
					echo "<script>alert('添加成功！');history.go(-1);</script>";
				}else{
					echo "<script>alert('添加失败！');history.go(-1);</script>";
				}
			}else{
				echo "<script>alert('账号已存在！');history.go(-1);</script>";
			}
		}else {
		echo "<script>alert('密码错误！');history.go(-1);</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>注册</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a ><b>注册</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">注册一个账户</p>

    <form action="register.php?my=add" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="用户名" name="user">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="密码" name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="再次输入密码" name="pass2">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">注册</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="login.php" class="text-center">我已经有账户</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
