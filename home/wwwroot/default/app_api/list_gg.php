<?php
include('head.php');
	
 	include('nav.php');
 	if($_GET['act'] == 'del'){
		$db = db('app_gg');
		if($db->where(array('id'=>$_POST['id']))->delete()){
			die(json_encode(array("status"=>'success')));
		}else{
			die(json_encode(array("status"=>'error')));
		}
		
	}elseif($_GET['act'] == 'show'){
		$show = $_POST['show'] == '1' ? "1" : "0";
		$db = db('app_gg');
		if($db->where(array('id'=>$_POST['id']))->update(array('show'=>$show))){
			die(json_encode(array("status"=>'success')));
		}else{
			die(json_encode(array("status"=>'error')));
		}
		
	}else{
 ?>
<div class="main">
<span class="label label-default">公告列表</span>
<div style="clear:both;height:10px;"></div>
	<ul class="list-group">
	<?php 
		$db = db('app_gg');
		$list = $db->where(array())->order('id DESC')->select();
		foreach($list as $vo){
			echo ' <li class="list-group-item line-id-'.$vo['id'].'">
        <span class="badge">'.date('Y/m/d H:i:s',$vo['time']).'</span>
        ID:'.$vo['id'].':'.$vo['name'].'<br>
		<button type="button" class="btn btn-primary btn-xs" onclick="window.location.href=\'add_gg.php?act=mod&id='.$vo['id'].'\'">编辑</button>&nbsp;';
		echo '<button type="button" class="btn btn-danger btn-xs" onclick="delLine(\''.$vo['id'].'\')">删除</button>
    </li>';
		}
	?>
   
</ul>
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
	var url = "list_gg.php?act=show";
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
		var url = "list_gg.php?act=del";
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