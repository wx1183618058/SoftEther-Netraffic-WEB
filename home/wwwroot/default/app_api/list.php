<?php

 	include('head.php');
 	if($_GET['act'] == 'add'){
		$db = db('line');
		if($db->insert(array(
			'name'=>$_POST['name'],
			'type'=>$_POST['type'],
			'label'=>$_POST['label'],
			'content'=>$_POST['content'],
			'group'=>$_POST['group'],
			'time'=>time(),
			'show'=>$_POST['show'] == '1' ? '1':'0'
		))){
			success_go("新增线路【".$_POST['name']."】成功！",'add_line.php');
		}else{
			error_go("十分抱歉修改失败",'add_line.php');
		}
		
	}else{
		
	$db = db('openvpn');
	$list = $db->where(array())->order('id DESC')->select();
 ?>
<div class="main">
<span class="label label-default">用户管理</span>
<div style="clear:both;height:10px;"></div>
<table class="table table-striped"> 
    <caption>条纹表格布局</caption> 
    <thead> 
        <tr> 
            <th>用户名</th> 
            <th>等级</th> 
            <th>流量剩余</th> 
            <th>过期日期</th> 
            <th>在线</th> 
            <th>状态</th> 
        </tr> 
    </thead> 
    <tbody> 
	<?php foreach($list as $vo){?>
		<tr>
		<td><?php echo $vo['iuser'] ?></td> 
		<td><?php echo $vo[''] ?></td> 
		<td><?php echo $vo['iuser'] ?></td> 
		<td><?php echo $vo['iuser'] ?></td> 
		<td><?php echo $vo['iuser'] ?></td> 
		<td><?php echo $vo['iuser'] ?></td> 
	</tr>
		<?php } ?>
       
    </tbody> 
</table>

	</div>
<?php
	
}
	include('footer.php');
	
?>
