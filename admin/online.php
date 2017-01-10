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
				<li><a href="index.php"><i class="fa fa-dashboard"></i> 主页</a></li>
				<li class="active">在线用户</li>
			</ol>
			</section>

			<section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">在线列表</h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>用户名</th>
                  <th>上传流量</th>
                  <th>下载流量</th>
                  <th>登录数</th>
                </tr>
             
<?php

$rs=db("openvpn")->where("online >'0'")->select();
foreach($rs as $res) {
?>

<tr>
<td><?=$res['iuser']?></td>
<td><?=round($res['osent']/1024/1024)?>MB</td>
<td><?=round($res['orecv']/1024/1024)?>MB</td>
<td><?=$res['online']?></td>
</tr>

<?php }
//代码修改段
?>

              </table>
            </div>
          </div>

            </div>
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