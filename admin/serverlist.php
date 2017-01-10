<?php
include('head.php');

$my=isset($_GET['my'])?$_GET['my']:null;

if($my=='del'){
	$ip=$_GET['ip'];
	echo $ip;
$sql=db('server')->where("ip='$ip'")->delete();
$sql=db('server_list')->where("ip='$ip'")->delete();
if($sql) {
	echo "<script>alert('删除成功！');history.go(-1);</script>";
	} else {
		echo "<script>alert('删除失败！');history.go(-1);</script>";
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
				<li class="active">服务器列表</li>
			</ol>
			</section>
			<section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">服务器列表</h3>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>服务器IP</th>
                  <th>上传流量</th>
                  <th>下载流量</th>
                  <th>在线人数</th>
                  <th>操作</th>
                </tr>
             
<?php

$rs=db("server")->select();
foreach($rs as $res) {
?>

<tr>
<td><?=$res['ip']?></td>
<td><?=round($res['sent']/1024/1024)?>MB</td>
<td><?=round($res['recv']/1024/1024)?>MB</td>
<td><?=$res['online']?></td>
<td><a href="./serverlist.php?my=del&ip=<?=$res['ip']?>" class="btn btn-xs btn-danger" onclick="if(!confirm('你确实要删除此记录吗？')){return false;}">删除</a></td>
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