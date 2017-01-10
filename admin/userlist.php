<?php
include('head.php');

$my=isset($_GET['my'])?$_GET['my']:null;

if($my=='del'){
$sql=db('server_list')->where(array('user'=>$_GET['iuser']))->delete();
$sql=db('openvpn')->where(array('iuser'=>$_GET['iuser']))->delete();
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
				<li class="active">账号列表</li>
			</ol>
			</section>
			<section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">账号列表</h3>
					
              <div class="box-tools">
              <form action="userlist.php" method="get">
                <div class="input-group input-group-sm" style="width: 200px;">
                  <input type="text" name="search" class="form-control pull-right" placeholder="用户名">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>搜索</button>
                  </div>
                </div>
                 </form>
              </div>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>用户名</th>
                  <th>密码</th>
                  <th>添加时间</th>
                  <th>到期时间</th>
                  <th>剩余流量</th>
                  <th>总流量</th>
                  <th>上传宽带</th>
                  <th>下传宽带</th>
                  <th>多登录数</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
             
<?php
if(!empty($_GET['search'])){
	$rs=db("openvpn")->where(array('iuser'=>$_GET['search']))->select();
}else {
$rs=db("openvpn")->select();
}
foreach($rs as $res) {
	$up=$res['upload']/1024;
	$down=$res['down']/1024;
?>

<tr>
<td><?=$res['iuser']?></td>
<td><?=$res['pass']?></td>
<td><?=date("Y-m-d",$res['starttime'])?></td>
<td><?=date("Y-m-d",$res['endtime'])?></td>
<td><?=round(($res['maxll']-$res['isent']-$res['irecv'])/1024/1024)?>MB</td>
<td><?=round(($res['maxll'])/1024/1024)?>MB</td>
<td><?=($res['upload']?$up."KB/s":'无限制')?></td>
<td><?=($res['down']?$down."KB/s":'无限制')?></td>
<td><?=($res['logins']?$res['logins']:'无限制')?></td>
<td><?=($res['i']?'开通':'禁用')?></td>
<td><a class="btn btn-xs btn-success" href="./useradd.php?my=setu&user=<?=$res['iuser']?>">配置</a>&nbsp;<a href="./userlist.php?my=del&iuser=<?=$res['iuser']?>" class="btn btn-xs btn-danger" onclick="if(!confirm('你确实要删除此记录吗？')){return false;}">删除</a></td>
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