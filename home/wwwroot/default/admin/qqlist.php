<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
$mod='blank';
include("../api.inc.php");
$title='账号列表';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-11 col-lg-11 center-block" style="float: none;">
<?php

$my=isset($_GET['my'])?$_GET['my']:null;

if($my=='del'){
echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">删除账号</h3></div>
<div class="panel-body box">';
$user=$_GET['user'];
$sql=$DB->query("DELETE FROM `openvpn` WHERE iuser='$user'");
shell_exec("/bin/sh /vpnserver/cmd/UserDelete.sh ${user}");
shell_exec("/bin/sh /vpnserver/cmd/UserDeleteCount.sh ${user}");
if($sql){echo '删除成功！';}
else{echo '删除失败！';}
echo '<hr/><a href="./qqlist.php">>>返回账号列表</a></div></div>';
}

else
{

echo '<form action="qqlist.php" method="get" class="form-inline">
  <div class="form-group">
    <label>搜索账号</label>
    <input type="text" class="form-control" name="kw" placeholder="账号">
  </div>
  <button type="submit" class="btn btn-primary">搜索</button>
  <a href="addqq.php" class="btn btn-success">添加账号</a>
  <a href="online.php" class="btn btn-success">在线用户</a>
</form>';


if(!empty($_GET['kw'])) {
	$sql=" `iuser`='{$_GET['kw']}'";
	$numrows=$DB->count("SELECT count(*) from `openvpn` WHERE{$sql}");
	$con='包含 '.$_GET['kw'].' 的共有 <b>'.$numrows.'</b> 个账号';
}else{
	$numrows=$DB->count("SELECT count(*) from `openvpn` WHERE 1");
	$sql=" 1";
	$con='平台共有 <b>'.$numrows.'</b> 个账号';
}

echo $con;
?>
      <div class="table-responsive">
        <table class="table">
          <thead><tr><th>账号</th><th>密码</th><th>添加时间</th><th>到期时间</th><th>剩余流量</th><th>总流量</th><th>上传宽带</th><th>下载宽带</th><th>多登陆数</th><th>状态</th><th>操作</th></tr></thead>
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
//$zt = array('0'=>'<font color=green>正常</font>','1'=>'<font color=red>密码错误</font>','2'=>'<font color=red>冻结</font>','3'=>'<font color=red>开启设备锁</font>');
//代码修改段
$rs=$DB->query("SELECT * FROM `openvpn` WHERE{$sql} order by id desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{ 
$upl=$res['upload'];
$down=$res['down'];
$log=$res['logins'];
if($upl==0) {
	$upl="无限制";
} else {
	$upl="${upl}KB/S";
}
if($down==0) {
	$down="无限制";
} else {
	$down="${down}KB/S";
}
if($log==0) {
	$log="无限制";
}
?>
<tr>
<td><?=$res['iuser']?></td>
<td><?=$res['pass']?></td>
<td><?=date("Y-m-d",$res['starttime'])?></td>
<td><?=date("Y-m-d",$res['endtime'])?></td>
<td><?=round(($res['maxll']-$res['isent']-$res['irecv'])/1024/1024)?>MB</td>
<td><?=round(($res['maxll'])/1024/1024)?>MB</td>
<td><?=$upl?></td>
<td><?=$down?></td>
<td><?=$log?></td>
<td><?=($res['i']?'开通':'禁用')?></td>
<td><a class="btn btn-xs btn-success" href="./qset.php?user=<?=$res['iuser']?>">配置</a>&nbsp;<a href="./qqlist.php?my=del&user=<?=$res['iuser']?>" class="btn btn-xs btn-danger" onclick="if(!confirm('你确实要删除此记录吗？')){return false;}">删除</a></td>
</tr>

<?php }
//代码修改段
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
echo '<li><a href="qqlist.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="qqlist.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="qqlist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="qqlist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="qqlist.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="qqlist.php?page='.$last.$link.'">尾页</a></li>';
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