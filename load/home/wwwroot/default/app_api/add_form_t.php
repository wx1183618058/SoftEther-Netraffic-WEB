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
 	if($_GET['act'] == 'add'){
		$db = db('line');
		$template_path = 'ovpn_template/template.ovpn';
		
		
		
		
		if(is_file($template_path)){
			$tpl = file_get_contents($template_path);
			$con = $_POST['content'];
			$list = explode("\n",$con);
			$i=0;
			foreach($list as $vo){
				$code = explode(" ",$vo);
				$name = $code[0];
				$site = $code[1];
				$new = str_replace("[linecode]",$site,$tpl);
				echo "[$i][$con]".$new;
				if($db->insert(array(
				'name'=>$name,
				'type'=>$_POST['type'],
				'label'=>$_POST['label'],
				'content'=>html_encode($new),
				'group'=>$_POST['group'],
				'time'=>time(),
				'show'=>$_POST['show'] == '1' ? '1':'0'
				))){
					echo($i.':'.$name.">新增线路成功！<br>");
				}else{
					echo($i.':'.$name.">十分抱歉修改失败<br>");
				}
				$i++;
			}
			
		}
		
		
		
		
	}else{
 ?>
<div class="main">
<span class="label label-default">线路管理</span>
<div style="clear:both;height:10px;"></div>
	<form class="form-horizontal" role="form" method="POST" action="?act=add">
  
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">线路类型</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="type" placeholder="线路类型">
        </div>
    </div>
      <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">显示标签</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="label" placeholder="显示标签">
        </div>
    </div>
      <div class="form-group" >
        <label for="name" class="col-sm-2 control-label">分组</label>
         <div class="col-sm-10"><select class="form-control" name="group">
            <option value="0">默认分组</option>
            
        </select></div>
    </div>
    <div class="form-group" >
        <label for="name" class="col-sm-2 control-label">模式列表</label>
         <div class="col-sm-10"><textarea class="form-control" rows="3" name="content"></textarea></div>
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
<?php
	}
	include('footer.php');
	
?>
