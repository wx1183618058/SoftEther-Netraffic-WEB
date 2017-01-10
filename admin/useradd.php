<?php
include('head.php');

$my=isset($_GET['my'])?$_GET['my']:null;
if($my=='setu'){
	$u=$_GET['user'];
  	$sql=db("openvpn")->where(array('iuser'=>$u))->select();
  	foreach($sql as $res);
}

if($my=='set' && $_POST['user']){
	$sqll=db('openvpn')->where(array('iuser'=>$_POST['user']))->select();
	foreach($sqll as $res);
	if($sqll) {
		if($_POST['pass']){
			$sql=db('openvpn')->where(array('iuser'=>$_POST['user']))->update(array('pass'=>$_POST['pass']));
		}

		if($_POST['maxll']){
			$sql=db('openvpn')->where(array('iuser'=>$_POST['user']))->update(array('maxll'=>$_POST['maxll']*1024*1024));
		}

		if($_POST['time']){
			$endtime=$res['endtime']+$_POST['time']*24*60*60;
			$sql=db('openvpn')->where(array('iuser'=>$_POST['user']))->update(array('endtime'=>$endtime));
		}
		
		if($_POST['up']){
			$sql=db('openvpn')->where(array('iuser'=>$_POST['user']))->update(array('upload'=>$_POST['up']*1024));
		}
		
		if($_POST['down']){
			$sql=db('openvpn')->where(array('iuser'=>$_POST['user']))->update(array('down'=>$_POST['down']*1024));
		}
		
		if($_POST['logins']){
			$sql=db('openvpn')->where(array('iuser'=>$_POST['user']))->update(array('logins'=>$_POST['logins']));
		}
		
		if($_POST['state']){
			$sql=db('openvpn')->where(array('iuser'=>$_POST['user']))->update(array('i'=>$_POST['state']));
		}
		
			echo "<script>alert('修改成功！');history.go(-1);</script>";
		
	}else{
		echo "<script>alert('账号不存在！');history.go(-1);</script>";
	}
}


if($_POST['user'] && $my!='set' && $my!='setu'){
if(!db('openvpn')->where(array('iuser'=>$_POST['user']))->select()) {
$starttime=time();
$endtime=$starttime+$_POST['time']*24*60*60;
		if(db('openvpn')->insert(array(
			'iuser'=>$_POST['user'],
			'pass'=>$_POST['pass'],
			'maxll'=>$_POST['maxll']*1024*1024,
			'starttime'=>$starttime,
			'endtime'=>$endtime,
			'upload'=>$_POST['up']*1024,
			'down'=>$_POST['down']*1024,
			'logins'=>$_POST['logins'],
			'i'=>$_POST['state'],
		))) {
			echo "<script>alert('添加成功！');history.go(-1);</script>";
		}else{
			echo "<script>alert('添加失败！');history.go(-1);</script>";
		}
}else{
	echo "<script>alert('账号已存在！');history.go(-1);</script>";
}
exit;
}

?>
<!DOCTYPE html>
<html>
<title>管理中心</title>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	<?php
include('nav.php');
?>
	<div class="content-wrapper">
		<div class="container">
			<section class="content-header">
			<h1>
        管理中心
			</h1>
				<ol class="breadcrumb">
				<li><a href="index.php"><i class="fa fa-dashboard"></i> 主页</a></li>
				<li class="active">添加帐号</li>
			</ol>
			</section>
			
			<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
<div class="box box-warning">
            <div class="box-header with-border">
            <?php
                  if($my=='setu'){
                  	echo '<h3 class="box-title">修改用户</h3>';
                  }else{
                  	echo '<h3 class="box-title">添加用户</h3>';
                  }
                  ?>
              
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
               <?php
              	if($my=='setu'){
               echo '<form action="./useradd.php?my=set" method="post" role="form">';
               }else {
               	echo '<form action="./useradd.php" method="post" role="form">';
               }
               	?>
                <!-- text input -->
                
                <div class="col-xs-6">
                <div class="form-group">
                  <label>用户名</label>
                  <?php
                  if($my=='setu'){
                  	echo '<input type="text" name="user" value="'.$res['iuser'].'" class="form-control" placeholder="输入用户名">';
                  }else{
                  	echo '<input type="text" name="user" value="" class="form-control" placeholder="输入用户名">';
                  }
                  ?>
                </div>
                </div>
                
                <div class="col-xs-6">
               <div class="form-group">
                  <label>密码</label>
                  <?php
                  if($my=='setu'){
                  	echo '<input type="text" name="pass" value="'.$res['pass'].'" class="form-control" placeholder="输入密码">';
                  }else{
                  	echo '<input type="text" name="pass" value="" class="form-control" placeholder="输入密码">';
                  }
                  ?>

                </div>
                </div>
                
                <div class="col-xs-6">
                <div class="form-group">
                  <label>总流量</label>
                  <?php
                  if($my=='setu'){
                  	$ma=$res['maxll']/1024/1024;
                  	echo '<input type="text" name="maxll" value="'.$ma.'" class="form-control" placeholder="输入总流量">';
                  }else{
                  	echo '<input type="text" name="maxll" value="" class="form-control" placeholder="输入总流量">';
                  }
                  ?>

                  
                </div>
                </div>
                
                <div class="col-xs-6">
                <div class="form-group">
                  <label>使用天数</label>
                  <?php
                  if($my=='setu'){
                  	$starttime=time();
							$endtime=($res['endtime']-$starttime)/24/60/60;

                  	echo '<input type="text" name="time" value="'.round($endtime).'" class="form-control" placeholder="输入使用天数">';
                  }else{
                  	echo '<input type="text" name="time" value="" class="form-control" placeholder="输入使用天数">';
                  }
                  ?>

                </div>
                </div>
              
              <div class="col-xs-6">
                <div class="form-group">
                  <label>上传宽带</label>
                  <?php
                  if($my=='setu'){
                  	$up=$res['upload']/1024;
                  	echo '<input type="text" name="up" value="'.$up.'" class="form-control" placeholder="输入上传宽带">';
                  }else{
                  	echo '<input type="text" name="up" value="0" class="form-control" placeholder="输入上传宽带">';
                  }
                  ?>

                  
                </div>
                </div>
                
                <div class="col-xs-6">
                <div class="form-group">
                  <label>下载宽带</label>
                  <?php
                  if($my=='setu'){
                  	$down=$res['down']/1024;
                  	echo '<input type="text" name="down" value="'.$down.'" class="form-control" placeholder="输入下载宽带">';
                  }else{
                  	echo '<input type="text" name="down" value="0" class="form-control" placeholder="输入下载宽带">';
                  }
                  ?>

                  
                </div>
                </div>
                
                <div class="col-xs-6">
                <div class="form-group">
                  <label>允许多登录数</label>
                  <?php
                  if($my=='setu'){
                  	echo '<input type="text" name="logins" value="'.$res['logins'].'" class="form-control" placeholder="输入登录数">';
                  }else{
                  	echo '<input type="text" name="logins" value="1" class="form-control" placeholder="输入登录数">';
                  }
                  ?>

                  
                </div>
                </div>

                <!-- select -->
                <div class="col-xs-6">
                <div class="form-group">
                  <label>账号状态</label>
                  <select class="form-control" name="state">
                    <option value="1">启用</option>
                    <option value="0">停用</option>
                  </select>
                </div>
                </div>
              <div class="box-footer">
              <?php
              	if($my=='setu'){
               echo '<button type="submit" class="btn btn-info pull-right">修改</button>';
               }else {
               echo '<button type="submit" class="btn btn-info pull-right">添加</button>';
               }
                
              ?>
              </div>
              </form>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        
         
	      </div>
	      </div>
        <!--/.col (right) -->
      <!-- /.row -->
    </section>
    
    
		</div>
	</div>
	<?php
	include('foot.php');
	?>
</div>
<?php
	include('js.php');
?>
</body>
</html>