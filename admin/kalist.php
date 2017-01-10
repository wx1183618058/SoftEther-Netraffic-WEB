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
				<li class="active">用户管理</li>
			</ol>
			</section>
			<section class="content">
			
			<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">用户管理</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<?php
function getkm($len = 18)
{
	$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	$strlen = strlen($str);
	$randstr = "";
	for ($i = 0; $i < $len; $i++) {
		$randstr .= $str[mt_rand(0, $strlen - 1)];
	}
	return $randstr;
}
$kind=1;
$my=isset($_GET['my'])?$_GET['my']:null;

if($my=='add'){
$kind=1;
$num=intval($_POST['num']);
$value=intval($_POST['value']);
$values=round($_POST['values'],2);
for ($i = 0; $i < $num; $i++) {
	$km=getkm(18);
	$date=date("y-m-d h:i:s",time());
	$sql=db('auth_kms')->insert(array('kind'=>$kind,'km'=>$km,'value'=>$value,'values'=>$starttime,'money'=>'0.00','addtime'=>$date));
}
if($sql) {
		echo "<script>alert('添加成功！');</script>";
	} else {
		echo "<script>alert('添加失败！');</script>";
	}
}

if($my=='del'){
$id=$_GET['id'];
$sql=db('auth_kms')->where(array('id'=>$id))->delete();
if($sql){echo "<script>alert('删除成功！')</script>";}
else{echo "<script>alert('删除失败！')</script>";}
}

if($my=='qk2'){//清空卡密结果

if(db('auth_kms')->where(array('kind'=>$kind))->delete()) {
echo "<script>alert('清空成功！');</script>";
}else{
echo "<script>alert('清空失败！');</script>";
}
}

if(isset($_GET['kw'])) {
	if($_GET['type']==1) {
		$sql="`km`='{$_GET['kw']}' and kind='1'";
		$numrows=db('auth_kms')->where($sql)->getnums();
	}elseif($_GET['type']==2) {
		$sql="`user`='{$_GET['kw']}' and kind='1'";
		$numrows=db('auth_kms')->where($sql)->getnums();
	}
}else{
	echo '<form action="kalist.php?my=add" method="POST" class="form-inline">
  <div class="form-group">
    <label>激活码生成</label>
    <input type="text" class="form-control" name="num" placeholder="生成的个数">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="value" placeholder="每个开通的天数">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="values" placeholder="每个充值多少GB流量">
  </div>
  <button type="submit" class="btn btn-primary">生成</button>
  <a href="./kalist.php?my=qk2" class="btn btn-default" onclick="if(!confirm(\'你确实要删除此记录吗？\')){return false;}">清空</a>
  </form>';
	$numrows=db('auth_kms')->where(array('kind'=>'1'))->getnums();
	$sql="kind='1'";
}
echo $con;
?>
          <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>卡密</th><th>信息</th><th>状态</th><th>代理ID</th><th>添加时间</th><th>使用时间</th><th>操作</th></tr></thead>
          <tbody>
<?php
$pagesize=20;
$pages=intval($numrows/$pagesize);
if ($numrows%$pagesize)
{
 $pages++;
 }
if (isset($_GET['page'])){
$page=intval($_GET['page']);
}
else{
$page=1;
}
$offset=$pagesize*($page - 1);
$rs=db("auth_kms")->where($sql)->limit($offset,$pagesize)->select();
foreach($rs as $res)
{
if($res['isuse']==1) {
	$isuse='<font color="red">已使用</font><br/>使用者:'.$res['user'];
} elseif($res['isuse']==0) {
	$isuse='<font color="green">未使用</font>';
}
echo '<tr><td><b>'.$res['km'].'</b></td><td>'.$res['value'].'天/'.$res['values'].'GB/￥'.$res['money'].'</td><td>'.$isuse.'</td><td>'.($res['daili']?$res['daili']:'管理员').'</td><td>'.$res['addtime'].'</td><td>'.$res['usetime'].'</td><td><a href="./kalist.php?my=del&id='.$res['id'].'" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此卡密吗？\');">删除</a></td></tr>';
}
?>         
          </tbody>
        </table>
      </div>
<?php
echo'<ul class="pagination">';
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;

if ($page>1)
{
echo '<li><a href="kalist.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="kalist.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="kalist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="kalist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="kalist.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="kalist.php?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';
#分页

?>
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