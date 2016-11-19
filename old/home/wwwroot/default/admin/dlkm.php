<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
/**
 * 卡密列表
**/
$mod='blank';
include("../api.inc.php");
$title='代理卡密列表';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
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

$my=isset($_GET['my'])?$_GET['my']:null;

if($my=='add'){
$kind=2;
$num=intval($_POST['num']);
$value=intval($_POST['value']);
echo "<ul class='list-group'><li class='list-group-item active'>成功生成以下卡密</li>";
for ($i = 0; $i < $num; $i++) {
	$km=getkm(18);
	$sql=$DB->query("insert into `auth_kms` (`kind`,`km`,`value`,`addtime`) values ('".$kind."','".$km."','".$value."','".$date."')");
	if($sql) {
		echo "<li class='list-group-item'>$km</li>";
	}
}

echo '<a href="./dlkm.php" class="btn btn-default btn-block">>>返回卡密列表</a>';
}

elseif($my=='del'){
echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">删除卡密</h3></div>
<div class="panel-body box">';
$id=$_GET['id'];
$sql=$DB->query("DELETE FROM auth_kms WHERE id='$id'");
if($sql){echo '删除成功！';}
else{echo '删除失败！';}
echo '<hr/><a href="./dlkm.php">>>返回卡密列表</a></div></div>';
}

elseif($my=='qk'){//清空卡密
echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">清空卡密</h3></div>
<div class="panel-body box">
您确认要清空所有卡密吗？清空后无法恢复！<br><a href="./dlkm.php?my=qk2">确认</a> | <a href="javascript:history.back();">返回</a></div></div>';
}
elseif($my=='qk2'){//清空卡密结果
echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">清空卡密</h3></div>
<div class="panel-body box">';
if($DB->query("DELETE FROM auth_kms WHERE kind='$kind'")==true){
echo '<div class="box">清空成功.</div>';
}else{
echo'<div class="box">清空失败.</div>';
}
echo '<hr/><a href="./dlkm.php">>>返回卡密列表</a></div></div>';
}
else
{

echo '<form action="dlkm.php?my=add" method="POST" class="form-inline">
  <div class="form-group">
    <label>代理余额卡密生成</label>
    <input type="text" class="form-control" name="num" placeholder="生成的个数">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="value" placeholder="面值">
  </div>
  <button type="submit" class="btn btn-primary">生成</button>
  <a href="dlkm.php?my=qk" class="btn btn-danger">清空</a>
</form>';

if(isset($_GET['kw'])) {
	if($_GET['type']==1) {
		$sql=" `km`='{$_GET['kw']}' and kind=2";
		$numrows=$DB->count("SELECT count(*) from auth_kms WHERE{$sql}");
		$con='包含 '.$_GET['kw'].' 的共有 <b>'.$numrows.'</b> 个卡密';
	}elseif($_GET['type']==2) {
		$sql=" `user`='{$_GET['kw']}' and kind=2";
		$numrows=$DB->count("SELECT count(*) from auth_kms WHERE{$sql}");
		$con='包含 '.$_GET['kw'].' 的共有 <b>'.$numrows.'</b> 个卡密';
	}
}else{
	$numrows=$DB->count("SELECT count(*) from auth_kms WHERE kind=2");
	$sql=" kind=2";
	$con='平台共有 <b>'.$numrows.'</b> 个代理余额卡密';
}
echo $con;
?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>卡密</th><th>状态</th><th>金额</th><th>添加时间</th><th>使用时间</th><th>操作</th></tr></thead>
          <tbody>
<?php
$pagesize=30;
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

$rs=$DB->query("SELECT * FROM auth_kms WHERE{$sql} order by id desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{
if($res['isuse']==1) {
	$isuse='<font color="red">已使用</font><br/>使用者:'.$res['user'];
} elseif($res['isuse']==0) {
	$isuse='<font color="green">未使用</font>';
}
echo '<tr><td><b>'.$res['km'].'</b></td><td>'.$isuse.'</td><th>'.number_format($res['value'],2).'</th><td>'.$res['addtime'].'</td><td>'.$res['usetime'].'</td><td><a href="./dlkm.php?my=del&id='.$res['id'].'" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此卡密吗？\');">删除</a></td></tr>';
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
echo '<li><a href="dlkm.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="dlkm.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="dlkm.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="dlkm.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="dlkm.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="dlkm.php?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';
#分页
}
?>
    </div>
  </div>