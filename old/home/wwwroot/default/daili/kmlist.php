<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
/**
 * 卡密列表
**/
$mod='blank';
include("../api.inc.php");
$title='卡密列表';
include './head.php';
$dlid=$_SESSION['dlid'];
if($dlid<>""){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
$row = $DB->get_row("SELECT * FROM auth_daili WHERE id='$dlid' limit 1");
$rs=$DB->get_row("SELECT * FROM auth_config WHERE 1");
$vip=$row['vip'];
if($vip==1){
	$dljg=$rs['dl1'];
	$dljgs=$rs['dls1'];
}elseif($vip==2){
	$dljg=$rs['dl2'];
	$dljgs=$rs['dls2'];
}elseif($vip==3){
	$dljg=$rs['dl3'];
	$dljgs=$rs['dls3'];
}elseif($vip==0){
	$dljg=$rs['dl0'];
	$dljgs=$rs['dls0'];
	//exit("<script language='javascript'>window.location.href='./login.php';</script>");
}elseif($vip==4){
	$dljg=$rs['dl4'];
	$dljgs=$rs['dls4'];
}elseif($vip==5){
	$dljg=$rs['dl5'];
	$dljgs=$rs['dls5'];
}

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
$kind=1;

$num=intval($_POST['num']);
$value=intval($_POST['value']);
$values=round($_POST['values'],2);
if($num<=0){exit("<script language='javascript'>alert('生成失败，卡密数量必须大于0！');history.go(-1);</script>");}
if($value<=0){exit("<script language='javascript'>alert('生成失败，生成天数必须大于0！');history.go(-1);</script>");}
if($values<=0){exit("<script language='javascript'>alert('生成失败，流量必须大于0GB！');history.go(-1);</script>");}
$money = ($value*$dljg+$values*$dljgs)*$num;
$rmb=$row['rmb']-$money;
if($rmb>=0){
	
}else{
	exit("<script language='javascript'>alert('生成失败，余额不足，请联系管理员充值！');history.go(-1);</script>");
}
$sql=$DB->query("update `auth_daili` set `rmb`='$rmb' where `id`=$dlid;");
if($sql){
	
}else{
	exit("<script language='javascript'>alert('扣款失败，请联系管理员！');history.go(-1);</script>");
}

echo "<ul class='list-group'><li class='list-group-item active'>成功生成以下卡密</li>";
for ($i = 0; $i < $num; $i++) {
	$km=getkm(18);
	$sql=$DB->query("insert into `auth_kms` (`kind`,`daili`,`km`,`value`,`values`,`money`,`addtime`) values ('".$kind."','".$dlid."','".$km."','".$value."','".$values."','".$money."','".$date."')");
	if($sql) {
		echo "<li class='list-group-item'>$km</li>";
	}
}

echo '<a href="./kmlist.php" class="btn btn-default btn-block">>>返回卡密列表</a>';
}

elseif($my=='del'){
echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">删除卡密</h3></div>
<div class="panel-body box">';
$id=$_GET['id'];
$sql=$DB->query("DELETE FROM auth_kms WHERE id='$id'");
if($sql){echo '删除成功！';}
else{echo '删除失败！';}
echo '<hr/><a href="./kmlist.php">>>返回卡密列表</a></div></div>';
}
else
{
$row = $DB->get_row("SELECT * FROM auth_daili WHERE id='$dlid' limit 1");
$dlrmb=$row['rmb'];
echo '<form action="kmlist.php?my=add" method="POST" class="form-inline">
  <div class="form-group">
    <label>卡密生成</label>
    <input type="text" class="form-control" name="num" placeholder="生成的个数">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="value" placeholder="每个开通的天数">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="values" placeholder="每个充值多少GB流量">
  </div>
  <button type="submit" class="btn btn-primary">生成</button>
</form><p>当前拿货价格：'.$dljg.'元/天 + '.$dljgs.'元/GB，当前余额 '.$dlrmb.' 元</p>';

if(isset($_GET['kw'])) {
	if($_GET['type']==1) {
		$sql=" `km`='{$_GET['kw']}'";
		$numrows=$DB->count("SELECT count(*) from auth_kms WHERE{$sql}");
		$con='包含 '.$_GET['kw'].' 的共有 <b>'.$numrows.'</b> 个卡密';
	}elseif($_GET['type']==2) {
		$sql=" `user`='{$_GET['kw']}'";
		$numrows=$DB->count("SELECT count(*) from auth_kms WHERE{$sql}");
		$con='包含 '.$_GET['kw'].' 的共有 <b>'.$numrows.'</b> 个卡密';
	}
}else{
	$numrows=$DB->count("SELECT count(*) from auth_kms WHERE daili=$dlid");
	$sql=" 1";
	$con='共拥有 <b>'.$numrows.'</b> 个卡密';
}
echo $con;
?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>卡密</th><th>信息</th><th>状态</th><th>添加时间</th><th>使用时间</th><th>操作</th></tr></thead>
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
$rs=$DB->query("SELECT * FROM auth_kms WHERE daili=$dlid order by id desc limit $offset,$pagesize");
//$rs=$DB->query("SELECT * FROM auth_kms WHERE{$sql} order by id desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{
if($res['isuse']==1) {
	$isuse='<font color="red">已使用</font><br/>使用者:'.$res['user'];
} elseif($res['isuse']==0) {
	$isuse='<font color="green">未使用</font>';
}
echo '<tr><td><b>'.$res['km'].'</b></td><td>'.$res['value'].'天/'.$res['values'].'GB/￥'.$res['money'].'</td><td>'.$isuse.'</td><td>'.$res['addtime'].'</td><td>'.$res['usetime'].'</td><td><a href="./kmlist.php?my=del&id='.$res['id'].'" class="btn btn-xs btn-danger" onclick="return confirm(\'你确实要删除此卡密吗？\');">删除</a></td></tr>';
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
echo '<li><a href="kmlist.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="kmlist.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="kmlist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="kmlist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="kmlist.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="kmlist.php?page='.$last.$link.'">尾页</a></li>';
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