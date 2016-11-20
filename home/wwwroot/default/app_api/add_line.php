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
	include('nav.php');
 	if($_GET['act'] == 'update'){
		$db = db('line');
		if($db->where(array('id'=>$_GET['id']))->update(array(
			'name'=>$_POST['name'],
			'type'=>$_POST['type'],
			'label'=>$_POST['label'],
			'content'=>$_POST['content'],
			'group'=>$_POST['group'],
			'show'=>$_POST['show'] == '1' ? '1':'0'
		))){
			success_go("修改线路【".$_POST['name']."】成功！",'add_line.php?act=mod&id='.$_GET['id']);
		}else{
			error_go("十分抱歉修改失败",'add_line.php?act=mod&id='.$_GET['id']);
		}
		
	}elseif($_GET['act'] == 'add'){
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
	
	$action = '?act=add';
	if($_GET['act'] == 'mod'){
		$info = db('line')->where(array('id'=>$_GET['id']))->find();
		$action = "?act=update&id=".$_GET['id'];
	}
		
 ?>
<div class="main">
<span class="label label-default">线路管理</span>
<div style="clear:both;height:10px;"></div>
	<form class="form-horizontal" role="form" method="POST" action="<?php echo $action?>">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">线路名称</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="线路名称" value="<?php echo $info['name'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">线路类型</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="type" placeholder="线路类型" value="<?php echo $info['type'] ?>">
        </div>
    </div>
      <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">显示标签</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="label" placeholder="显示标签" value="<?php echo $info['label'] ?>">
        </div>
    </div>
      <div class="form-group" >
        <label for="name" class="col-sm-2 control-label">分组选择</label>
         <div class="col-sm-10"><select class="form-control" name="group">
            <?php
				$list = db('line_grop')->order('id DESC')->select();
				foreach($list as $vo){
					$selected = "";
					if((int)$info['group'] == (int)$vo['id']){
						$selected = 'selected';
					}
					
					echo '<option value="'.$vo['id'].'" '.$selected.'>'.$vo['name'].'</option>';
				}
			
			?>
        </select></div>
    </div>
    <div class="form-group" >
        <label for="name" class="col-sm-2 control-label">线路内容(<span style="color:red">如果您是从其他平台复制而来 请您一定记住 换行！！！</span>)</label>
         <div class="col-sm-10">
		  <a type="submit" class="btn btn-default" onclick="autoGs()" href="javascript:void(0);">自动换行</a>
		 <textarea class="form-control" rows="10" name="content"><?php echo $info['content'] ?></textarea></div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="show" value="1">是否启用
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">提交数据</button>
        </div>
    </div>
</form> 
	</div>
	<script>
	function autoGs(){
		var content = $("[name=content]").val();
		content = content.replace("\n\r","\n");  
		content = content.replace("\n","\n\r");
		$("[name=content]").val(content);
	}
	</script>
<?php
	}
	include('footer.php');
	
?>
