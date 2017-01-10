<?php
include('head.php');

$mysql_v=exec("mysql -u"._user_." -p"._pass_." -e\"select version();\"");
$mysql_s=exec("ps -e | grep mysqld");
if(empty(${mysql_s})) {
	$mysql_s=停止;
} else {
	$mysql_s=运行;
}

$php_s=exec("ps -e | grep php-fpm");
if(empty(${php_s})) {
	$php_s=停止;
} else {
	$php_s=运行;
}

$vpn_s=exec("ps -e | grep vpntool");
if(empty(${vpn_s})) {
	$vpn_s=停止;
} else {
	$vpn_s=运行;
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
			</ol>
			</section>
			<section class="content">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3><?php echo db('auth_kms')->where(array('kind'=>'1'))->getnums();?></h3>
							<p>
								卡密数量
							</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						<a href="kalist.php" class="small-box-footer">详细信息 <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<h3><?php echo db('server')->getnums();?></h3>
							<p>
								服务器数量
							</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						<a href="serverlist.php" class="small-box-footer">详细信息 <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><?php echo db('openvpn')->getnums();?></h3>
							<p>
								注册用户
							</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						<a href="userlist.php" class="small-box-footer">详细信息 <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?php echo db('openvpn')->where("online>'0'")->getnums();?></h3>
							<p>
								在线用户
							</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="online.php" class="small-box-footer">详细信息 <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- Default box -->
      
      <div class="row">
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">MySQL信息</h3>
            </div>
            <div class="box-body">
              MySQL 版本：<?php echo $mysql_v;  ?>
            </div>
            <div class="box-body">
              MySQL 运行状态：<?php echo $mysql_s; ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">PHP信息</h3>
            </div>
            <div class="box-body">
              PHP 版本：<?php echo phpversion() ?>
            </div>
            <div class="box-body">
              PHP 运行状态：<?php echo $php_s; ?>
            </div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">VpnTool信息</h3>
            </div>
            <div class="box-body">
              VpnTool 版本：2.0 BTEA
            </div>
            <div class="box-body">
              VpnTool 运行状态：<?php echo $vpn_s; ?>
            </div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">云APP信息</h3>
            </div>
            <div class="box-body">
              云APP 版本：5.1
            </div>
            <div class="box-body">
             云APP 运行状态：运行
            </div>
          </div>
        </div>
        
        <!-- /.col -->
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
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
</body>
</html>