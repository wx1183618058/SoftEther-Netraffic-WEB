<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
$mod='blank';
include("../api.inc.php");
$title='服务器管理';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php

$my=isset($_GET['my'])?$_GET['my']:null;

if($my=='add'){
	echo '<div class="panel panel-primary">
	<div class="panel-heading w h"><h3 class="panel-title">添加服务器</h3></div>
	<div class="panel-body box">';

	$user=$_POST['ip'];
	$u=$_POST['pass'];
	$server_ip=$_SERVER['SERVER_ADDR'];
	if(!$DB->get_row("select * from `server` where `ip`='$user' limit 1")) {
		if(preg_match('/^((?:(?:25[0-5]|2[0-4]\d|((1\d{2})|([1-9]?\d)))\.){3}(?:25[0-5]|2[0-4]\d|((1\d{2})|([1 -9]?\d))))$/', $user)) {
			$sql="insert into `server` (`ip`,`send`,`recv`,`online`) values ('{$user}',0,0,0)";
			$DB->query($sql);
			//添加
			shell_exec("/bin/sh /vpnserver/cmd/serveradd.sh ${user}");
			shell_exec("/bin/sh /vpnserver/cmd/config.sh");
			/*
			$rs=$DB->query("SELECT * FROM `server`");
			while($res = $DB->fetch($rs)) {
				$server=$res['ip'];
				file_get_contents("http://${server}/shell.php?act=server&pass=${u}&sip=${server_ip}");
			}
			*/
			echo '添加成功！';
		} else {
			echo '添加失败！';
		}
	} else {
		echo '服务器已经存在';
	}
	echo '<hr/><a href="./server.php">>>返回服务器列表</a></div></div>';
}

if($my=='del'){
echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">删除服务器</h3></div>
<div class="panel-body box">';
$user=$_GET['user'];
$sql=$DB->query("DELETE FROM `server` WHERE ip='$user'");
//删除

if($sql){
	shell_exec("/bin/sh /vpnserver/cmd/serverdel.sh ${user}");
	echo '删除成功！';
	}
else{echo '删除失败！';}
echo '<hr/><a href="./server.php">>>返回服务器列表</a></div></div>';
}

else
{

echo '<form action="server.php?my=add" method="POST" class="form-inline">
  <div class="form-group">
    <label>添加服务器</label>
    <input type="text" class="form-control" name="ip" placeholder="服务器IP">
  </div>
  <button type="submit" class="btn btn-primary">添加</button>
</form>';

	$numrows=$DB->count("SELECT count(*) from `server` WHERE 1");
	$sql=" 1";
	$con='平台共有 <b>'.$numrows.'</b> 台服务器';


echo $con;
?>
      <div class="table-responsive">
        <table class="table">
          <thead><tr><th>服务器IP</th><th>上传流量</th><th>下载流量</th><th>在线人数</th><th>操作</th></tr></thead>
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
$rs=$DB->query("SELECT * FROM `server` WHERE{$sql} order by id desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{ 
?>
<tr>
<td><?=$res['ip']?></td>
<td><?=round($res['send']/1024/1024)?>M</td>
<td><?=round($res['recv']/1024/1024)?>M</td>
<td><?=$res['online']?></td>
<td><a href="./server.php?my=del&user=<?=$res['ip']?>" class="btn btn-xs btn-danger" onclick="if(!confirm('你确实要删除此服务器吗？')){return false;}">删除</a></td>
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
echo '<li><a href="server.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="server.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="server.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="server.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="server.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="server.php?page='.$last.$link.'">尾页</a></li>';
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