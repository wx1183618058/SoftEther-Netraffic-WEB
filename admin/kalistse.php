<?php
include('head.php');
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
				<li><a href="#"><i class="fa fa-dashboard"></i> 主页</a></li>
				<li class="active">搜索卡密</li>
			</ol>
			</section>
			<section class="content">
			
			<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">搜索卡密</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="./kalist.php" method="get" role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>类别</label>
                  <select name="type" class="form-control">
                    <option value="1">卡密</option>
              		  <option value="2">账号</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>内容</label>
                  <input type="text" name="kw" value="" class="form-control">
                </div>
                <input type="submit" value="查询" class="btn btn-primary form-control"/>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
      
			
        
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