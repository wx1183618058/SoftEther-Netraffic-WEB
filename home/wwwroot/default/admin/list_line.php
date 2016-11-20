<?php

	
	function success_go($msg,$url){
		echo '<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">
                &times;
            </button>
            '.$msg.',系统将在3秒后跳转。<a href="'.$url.'">等不及了！</a>
        </div> ';
        echo '<script>setTimeout(function(){
        	window.location.href="'.$url.'";
        },3000)</script>';
	}
	function error_go($msg,$url){
		echo '<div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">
                &times;
            </button>
            '.$msg.',系统将在3秒后跳转。<a href="'.$url.'">等不及了！</a>
        </div> ';
        echo '<script>setTimeout(function(){
        	window.location.href="'.$url.'";
        },3000)</script>';
	}
	
 	include('head.php');
	include('nav3.php');
 	if($_GET['act'] == 'del'){
		$db = db('line');
		if($db->where(array('id'=>$_POST['id']))->delete()){
			die(json_encode(array("status"=>'success')));
		}else{
			die(json_encode(array("status"=>'error')));
		}
		
	}elseif($_GET['act'] == 'show'){
		$show = $_POST['show'] == '1' ? "1" : "0";
		$db = db('line');
		if($db->where(array('id'=>$_POST['id']))->update(array('show'=>$show))){
			die(json_encode(array("status"=>'success')));
		}else{
			die(json_encode(array("status"=>'error')));
		}
		
	}else{
 ?>
<div class="main">
<div style="clear:both;height:10px;"></div>
<?php
$db = db('line');
if($_GET["gid"] == ""){
	echo '&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-info" ><a href="?'.$t_str.'" style="color:#fff">全部</a></span>';
	$list = $db->where(array())->order('id DESC')->fpage($_GET["page"],20)->select();
}else{
	echo '&nbsp;&nbsp;&nbsp;&nbsp;<span ><a href="?'.$t_str.'" >全部</a></span>';
	$list = $db->where(array("group"=>$_GET["gid"]))->order('id DESC')->fpage($_GET["page"],20)->select();
}
$rs=db("line_grop")->where()->fpage($_GET["page"],20)->select();
foreach($rs as $res)
{
	if($res['id'] == $_GET["gid"]){
		echo '&nbsp;&nbsp;&nbsp;&nbsp;<span class="label label-info" ><a href="?gid='.$res["id"].'" style="color:#fff">'.$res['name'].'</a></span>';
	}else{
		echo '&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="?gid='.$res["id"].'">'.$res['name'].'</a></span>';
	}
}
$numrows = $db->getnums();
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

?>

<div style="clear:both;height:10px;"></div>
	<ul class="list-group">
	<?php 
		
		
		foreach($list as $vo){
			echo ' <li class="list-group-item line-id-'.$vo['id'].'">
        <span class="badge">'.$vo['type'].'</span>
        ID:'.$vo['id'].':'.$vo['name'].'
		<p>'.$vo["label"].'</p>
		<button type="button" class="btn btn-primary btn-xs" onclick="window.location.href=\'add_line.php?act=mod&id='.$vo['id'].'\'">编辑</button>&nbsp;';
		echo $vo['show'] == '1'? '<button type="button" class="btn btn-primary btn-xs showstatus" onclick="qiyong(\''.$vo['id'].'\')" data="1">已启用</button>&nbsp;':'<button type="button" class="btn btn-primary btn-xs showstatus" onclick="qiyong(\''.$vo['id'].'\')" data="0">已禁用</button>&nbsp;';
		echo '<button type="button" class="btn btn-danger btn-xs" onclick="delLine(\''.$vo['id'].'\')">删除</button>
    </li>';
		}
	?>
   
</ul><?php
echo'<ul class="pagination">';
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;
if ($page>1)
{
echo '<li><a href="?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';

?>
</div>

<?php
	}
	include('footer.php');
	
?>
<script>
function qiyong(id){
	var doc = $('.line-id-'+id+' .showstatus');
	if(doc.attr('data') == "1"){
		doc.html("已禁用").attr({'data':'0'});
	}else{
		doc.html("已启用").attr({'data':'1'});
	}
	var url = "list_line.php?act=show";
		var data = {
			"id":id,
			"show":doc.attr('data')
		};
		$.post(url,data,function(data){
			if(data.status == "success"){

			}else{
				alert("操作失败");
			}
		},"JSON");
}
function delLine(id){
	if(confirm('确认删除吗？删除后不可恢复哦！')){
		$('.line-id-'+id).slideUp();
		var url = "list_line.php?act=del";
		var data = {
			"id":id
		};
		$.post(url,data,function(data){
			if(data.status == "success"){

			}else{
				alert("删除失败");
			}
		},"JSON");
	}
}
</script>