<?php

$mod='blank';
include("../api.inc.php");
$title='添加服务器';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php
if($_POST['name']){
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">添加结果</h3></div>
<div class="panel-body">';
$name = daddslashes($_POST['name']);
$ipport = daddslashes($_POST['ipport']);

if(!$DB->get_row("select * from `auth_fwq` where `name`='$name' limit 1")){
	$sql="insert into `auth_fwq` (`name`,`ipport`) values ('{$name}','{$ipport}')";
	if($DB->query($sql))
		echo "成功添加一个服务器";
	else
		echo "添加失败：".$DB->error();
}else{
	echo "<script>alert('该服务器已存在！');history.go(-1);</script>";
}
echo '<hr/><a href="./addfwq.php">>>返回继续添加</a><br><a href="./fwqlist.php">>>返回服务器列表</a></div></div>';
exit;
}
?>
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">添加服务器</h3></div>
        <div class="panel-body">
          <form action="./addfwq.php" method="post" class="form-horizontal" role="form">
            <div class="input-group">
			  <span class="input-group-addon">服务器名称</span>
              <input type="text" name="name" value="" class="form-control" required/>
            </div><br/>
            <div class="input-group">
              <span class="input-group-addon">ip地址:端口</span>
			  <input type="text" name="ipport" value="" placeholder="172.0.0.1:8080" class="form-control" required>
            </div><br/>
            <input type="submit" value="添加" class="btn btn-primary form-control"/>
          </form>
        </div>
      </div>
    </div>
  </div>