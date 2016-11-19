<?php
$mod='blank';
include("../api.inc.php");
$title='服务器列表';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php

$my=isset($_GET['my'])?$_GET['my']:null;

if($my=='del'){
echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">删除服务器</h3></div>
<div class="panel-body box">';
$id=$_GET['id'];
$sql=$DB->query("DELETE FROM `auth_fwq` WHERE id='$id'");
if($sql){echo '删除成功！';}
else{echo '删除失败！';}
echo '<hr/><a href="./fwqlist.php">>>返回服务器列表</a></div></div>';
}

else
{

echo '<form action="fwqlist.php" method="get" class="form-inline">
  <div class="form-group">
    <label>搜索</label>
    <input type="text" class="form-control" name="kw" placeholder="服务器名称">
  </div>
  <button type="submit" class="btn btn-primary">搜索</button>
  <a href="addfwq.php" class="btn btn-success">添加服务器</a>
  <a href="online.php" class="btn btn-success">当前服务器在线用户</a>
</form>';


if(!empty($_GET['kw'])) {
	$sql=" `name`='{$_GET['kw']}'";
	$numrows=$DB->count("SELECT count(*) from `auth_fwq` WHERE{$sql}");
	$con='包含 '.$_GET['kw'].' 的共有 <b>'.$numrows.'</b> 个服务器';
}else{
	$numrows=$DB->count("SELECT count(*) from `auth_fwq` WHERE 1");
	$sql=" 1";
	$con='平台共有 <b>'.$numrows.'</b> 个服务器';
}

echo $con;
?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>服务器名称</th><th>地址</th><th>在线人数</th><th>添加时间</th><th>操作</th></tr></thead>
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
$rs=$DB->query("SELECT * FROM `auth_fwq` WHERE{$sql} order by id desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{
$str=file_get_contents('http://'. $res['ipport'] .'/res/openvpn-status.txt',false,stream_context_create(array('http' => array('method' => "GET", 'timeout' => 1))));
$onlinenum = (substr_count($str,date('Y'))-1)/2;
if($onlinenum < 0)
	$onlinetext = '<span style="color:red;">超时</span>';
else
	$onlinetext = '<a href="online.php?id='.$res['id'].'">'.(int)$onlinenum.'</a>';
?>
<tr>
<td><?=$res['name']?></td>
<td><?=$res['ipport']?></td>
<td><?=$onlinetext?></td>
<td><?=$res['time']?></td>
<td><a href="./fwqlist.php?my=del&id=<?=$res['id']?>" class="btn btn-xs btn-danger" onclick="if(!confirm('你确实要删除此记录吗？')){return false;}">删除</a></td>
</tr>

<?php }
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
echo '<li><a href="fwqlist.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="fwqlist.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="fwqlist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="fwqlist.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="fwqlist.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="fwqlist.php?page='.$last.$link.'">尾页</a></li>';
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