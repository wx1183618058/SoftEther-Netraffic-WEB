<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
$mod='blank';
include("../api.inc.php");
$title='账号列表';
include './head.php';
$dlid=$_SESSION['dlid'];
if($dlid<>""){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php

echo '<form action="qqlist.php" method="get" class="form-inline">
  <div class="form-group">
    <label>搜索账号</label>
    <input type="text" class="form-control" name="kw" placeholder="账号">
  </div>
  <button type="submit" class="btn btn-primary">搜索</button>
</form>';


if(!empty($_GET['kw'])) {
	$sql=" `iuser`='{$_GET['kw']}' and `dlid`=$dlid";
	$numrows=$DB->count("SELECT count(*) from `openvpn` WHERE{$sql}");
	$con='包含 '.$_GET['kw'].' 的共有 <b>'.$numrows.'</b> 个账号';
}else{
	$numrows=$DB->count("SELECT count(*) from `openvpn` WHERE `dlid`=$dlid");
	$sql=" `dlid`=$dlid";
	$con='共有 <b>'.$numrows.'</b> 个账号';
}

echo $con;
?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>账号</th><th>添加时间</th><th>到期时间</th><th>剩余流量</th><th>总流量</th><th>状态</th></tr></thead>
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
$rs=$DB->query("SELECT * FROM `openvpn` WHERE{$sql} order by id desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{ ?>
<tr>
<td><?=$res['iuser']?></td>
<td><?=date("Y-m-d",$res['starttime'])?></td>
<td><?=date("Y-m-d",$res['endtime'])?></td>
<td><?=round(($res['maxll']-$res['isent']-$res['irecv'])/1024/1024)?>MB</td>
<td><?=round(($res['maxll'])/1024/1024)?>MB</td>
<td><?=($res['i']?'开通':'禁用')?></td>
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
?>
    </div>
  </div>