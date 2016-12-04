<?php
$login_allow = true;
include("head.php");
if(isset($_POST["user"]) && isset($_POST["pass"])){
	$u = $_POST["user"];
	$p = $_POST["pass"];
	$admin = db("app_admin")->where(array("username"=>$u,"password"=>$p))->find();
	if($admin){
		$_SESSION["dd"]["username"] = $u;
		$_SESSION["dd"]["password"] = $p;
		header("location:admin.php");
	}else{
		echo "<script>alert(\"密码错误请重新输入\");</script>";
	}
}


?>
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">叮咚流量卫士_领航版v1.0</h3></div>
        <div class="panel-body">
          <form action="./login.php" method="POST" class="form-horizontal" role="form">
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" name="user" value="" class="form-control" placeholder="用户名" required="required"/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" name="pass" class="form-control" placeholder="密码" required="required"/>
            </div>
			<br>
            <div class="input-group">
             <input type="submit" value="登陆" class="btn btn-primary form-control btn-block"/>
             
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php include("footer") ?>