<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
$mod='blank';
include("../api.inc.php");
$title='操作记录';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php

$my=isset($_GET['my'])?$_GET['my']:null;

if($my=='del'){
echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">删除记录</h3></div>
<div class="panel-body box">';
$id=$_GET['id'];
$sql=$DB->query("DELETE FROM `auth_log` WHERE id='$id'");
if($sql){echo '删除成功！';}
else{echo '删除失败！';}
echo '<hr/><a href="./log.php">>>返回操作记录</a></div></div>';
}

elseif($my=='qk2'){//清空记录结果
echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">清空记录</h3></div>
<div class="panel-body box">';
if($DB->query("DELETE FROM auth_log WHERE 1")==true){
echo '<div class="box">清空成功.</div>';
}else{
echo'<div class="box">清空失败.</div>';
}
echo '<hr/><a href="./log.php">>>返回操作记录</a></div></div>';
}

else
{


$numrows=$DB->count("SELECT count(*) from `auth_log` WHERE 1");
$sql=" 1";
$con='<a href="log.php?my=qk2" class="btn btn-danger">清空</a> 平台共有 <b>'.$numrows.'</b> 个记录';

echo $con;
?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>类型</th><th>内容</th><!--th>时间</th--><th>操作</th></tr></thead>
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

$rs=$DB->query("SELECT * FROM `auth_log` WHERE{$sql} order by id desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{ ?>
<tr>
<td><?=$res['action']?></td>
<td><?=$res['msg']?></td>
<!--td><?=$res['time']?></td-->
<td><a href="./log.php?my=del&id=<?=$res['id']?>" class="btn btn-xs btn-danger" onclick="if(!confirm('你确实要删除此记录吗？')){return false;}">删除</a></td>
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
echo '<li><a href="log.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="log.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="log.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="log.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="log.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="log.php?page='.$last.$link.'">尾页</a></li>';
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