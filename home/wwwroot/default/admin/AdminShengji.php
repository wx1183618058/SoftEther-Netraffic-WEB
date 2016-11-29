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
	$require = true;
	include("../app_api/shengji.php");
 	if($_GET['act'] == 'update'){
		$content = '<?php	$data["status"] = "success";
	$data["versionCode"] = "'.$_POST["versionCode"].'";//请在此输入新的版本号 当版本号大于用户正在使用的版本时 将会提示升级
	$data["url"] = "'.$_POST["url"].'"; //请在此填写下载地址
	$data["content"] = "'.$_POST["content"].'";//再此处填写更新说明
	if($require != true){
		die(json_encode($data));
	}';
		file_put_contents("../app_api/shengji.php",$content);
		success_go("修改成功",'AdminShengji.php?act=mod&id='.$_GET['id']);
		
	}else{
	
	$action = '?act=update';
	
		
 ?>
<div class="main">
<div style="clear:both;height:10px;"></div>
<div class="alert alert-danger">暂时不支持自动检测更新与强制更新</div>
	<form class="form-horizontal" role="form" method="POST" action="<?php echo $action?>" onsubmit="return checkStr()">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">版本号(大于APP时才能检测到更新)</label>
        <div class="col-sm-10">
            <div class="col-sm-10"><input class="form-control" rows="10" name="versionCode" value="<?php echo $data["versionCode"] ?>"></div>
        </div>
    </div>
    
    
    
    <div class="form-group" >
        <label for="firstname" class="col-sm-2 control-label">更新说明</label>
        <div class="col-sm-10">
            <div class="col-sm-10"><textarea class="form-control" rows="10" name="content"><?php echo $data["content"] ?></textarea></div>
        </div>
    </div> 
    <div class="form-group" >
        <label for="firstname" class="col-sm-2 control-label">APP下载连接</label>
        <div class="col-sm-10">
            <div class="col-sm-10"><input class="form-control" rows="10" name="url" value="<?php echo $data["url"] ?>"></div>
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
	function checkStr(){
		var title = $('[name="title"]').val();
		var content = $('[name="content"]').val();
		if(title == "" || content ==　""){
			alert("标题与内容不得为空");
			return false;
		}
		return true;
	}
	</script>
<?php
	}
	include('footer.php');
	
?>
