<?php
include('head.php');

if($_POST['user']){
	$sqll=db('app_admin')->where(array('username'=>$_POST['user']))->select();
	foreach($sqll as $res);
	if($sqll) {
		if($_POST['pass']){
			$sql=db('app_admin')->where(array('username'=>$_POST['user']))->update(array('password'=>$_POST['pass']));
		}
			echo "<script>alert('修改成功！');history.go(-1);</script>";
		
	}else{
		echo "<script>alert('管理员不存在！');history.go(-1);</script>";
	}
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
				<li class="active">管理员</li>
			</ol>
			</section>
			
			<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
<div class="box box-warning">
            <div class="box-header with-border">
				<h3 class="box-title">修改管理员密码</h3>
              
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">

               <form action="./adming.php" method="post" role="form">


                <!-- text input -->
                
                <div class="col-xs-6">
                <div class="form-group">
                  <label>管理员</label>
 
                  <input type="text" name="user" value="" class="form-control" placeholder="输入用户名">
                 
                </div>
                </div>
                
                <div class="col-xs-6">
               <div class="form-group">
                  <label>密码</label>

                 <input type="text" name="pass" value="" class="form-control" placeholder="输入密码">
                  
               

                </div>
                </div>
                

              <div class="box-footer">
               <button type="submit" class="btn btn-info pull-right">修改</button>
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