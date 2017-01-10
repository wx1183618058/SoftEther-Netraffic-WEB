<?php
include('head.php');
$u=$_SESSION["dd1"]["username"];
$p=$_SESSION["dd1"]["password"];

if($_POST['km']){
	$myrow=db("auth_kms")->where(array('km'=>$_POST['km']))->select();
	foreach($myrow as $my);
	if(!$my){
		exit("<script language='javascript'>alert('此激活码不存在');history.go(-1);</script>");
	}elseif($my['isuse']==1){
		exit("<script language='javascript'>alert('此激活码已被使用');history.go(-1);</script>");
	}else{
		$m=db("openvpn")->where(array('iuser'=>$u))->select();
		foreach($m as $res);
		$t=$res['endtime']+$my['value']*24*60*60;
		echo $t;
		db('openvpn')->where(array('iuser'=>$u))->update(array('endtime'=>$t));
		db('auth_kms')->where(array('km'=>$_POST['km']))->update(array('isuse'=>'1'));
				exit("<script language='javascript'>alert('续费成功！');history.go(-1);</script>");
	
			}


}elseif ($_POST['newpass']) {
    $sql=db('openvpn')->where(array('iuser'=>$u))->update(array('pass'=>$_POST['newpass']));
			echo "<script>alert('修改成功！');history.go(-1);</script>";
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
							<h3><?php $rs=db('openvpn')->where(array('iuser'=>$u))->select(); foreach($rs as $res) ;echo round(($res['isent']+$res['irecv'])/1024/1024)."M";?></h3>
							<p>
								使用流量
							</p>
						</div>
						<div class="icon">
							<i class="ion ion-bag"></i>
						</div>
						
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-green">
						<div class="inner">
							<h3><?php $rs=db('openvpn')->where(array('iuser'=>$u))->select(); foreach($rs as $res) ;echo round(($res['maxll']-$res['isent']-$res['irecv'])/1024/1024)."M";?></h3>
							<p>
								剩余流量
							</p>
						</div>
						<div class="icon">
							<i class="ion ion-stats-bars"></i>
						</div>
						
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-yellow">
						<div class="inner">
							<h3><?php $rs=db('openvpn')->where(array('iuser'=>$u))->select(); foreach($rs as $res) ;echo round($res['maxll']/1024/1024)."M";?></h3>
							<p>
								总流量
							</p>
						</div>
						<div class="icon">
							<i class="ion ion-person-add"></i>
						</div>
						
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-xs-6">
					<!-- small box -->
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?php $rs=db('openvpn')->where(array('iuser'=>$u))->select(); foreach($rs as $res) ;echo round(($res['endtime']-time())/24/60/60)."天";?></h3>
							<p>
								剩余时间
							</p>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						
					</div>
				</div>
			</div>
			<!-- Default box -->
      
     
        
          
            <form action="" method="POST" class="form-inline">
		<div class="form-group">
		<label>激活/续费账号</label>
		<input type="text" class="form-control" name="km" placeholder="请输入激活码卡密">
		</div>
		<button type="submit" class="btn btn-primary">确认</button>
		</form>
		
		
		
		<form action="" method="POST" class="form-inline">
        <hr/>
        <div class="form-group">
        <label>修改密码</label>
        <input type="text" class="form-control" name="newpass" placeholder="请输入新密码">
        </div>
        <button type="submit" class="btn btn-primary">确认</button>
        </form>
         
        
        
        <!-- /.col -->
      
        
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