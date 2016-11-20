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
 	if($_GET['act'] == 'update'){
		
		file_put_contents(R."/data/default.txt",$_POST["name"]);
		file_put_contents(R."/data/content.txt",$_POST["content"]);
		file_put_contents(R."/data/max_limit.txt",$_POST["max_limit"]);
		success_go("修改成功",'qq_admin.php?act=mod&id='.$_GET['id']);
		
	}else{
	
	$action = '?act=update';
	$info["name"] = @file_get_contents("data/default.txt");
	$info["content"] = @file_get_contents("data/content.txt");
	$info["max_limit"] = @file_get_contents("data/max_limit.txt");
	
		
 ?>
 <link rel="stylesheet" href="/admin/Core/KE/themes/default/default.css" />
	<link rel="stylesheet" href="/admin/Core/KE/plugins/code/prettify.css" />
	<script charset="utf-8" src="/admin/js/jquery.js"></script>
	<script charset="utf-8" src="/admin/Core/KE/kindeditor.js"></script>
	<script charset="utf-8" src="/admin/Core/KE/lang/zh_CN.js"></script>
	<script charset="utf-8" src="/admin/Core/KE/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : '/admin/Core/KE/plugins/code/prettify.css',
				uploadJson : '/admin/Core/KE/php/upload_json.php',
				fileManagerJson : '/admin/Core/KE/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=add]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=add]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
<div class="main">
<div style="clear:both;height:10px;"></div>
<div class="alert alert-danger">为了安全起见、短信接口请您于 sms.config.php中配置、切记。无使用记事本。电脑请使用<a href="http://sw.bos.baidu.com/sw-search-sp/software/4adc9ccbdd40a/npp_7.1_Installer.exe">notepad++</a></div>
	<form class="form-horizontal" role="form" method="POST" action="<?php echo $action?>" onsubmit="return checkStr()">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">QQ列表 多个请用 换行 区分。显示名字用|区分</label>
        <div class="col-sm-10">
            <div class="col-sm-10"><textarea class="form-control" rows="10" name="name"><?php echo $info['name'] ?></textarea></div>
        </div>
    </div>
    
    
    
    <div class="form-group" >
        <label for="firstname" class="col-sm-2 control-label">说明性文字可以写一些简单介绍（支持HTML）</label>
        <div class="col-sm-10">
		
            <div class="col-sm-10">
			
			<textarea class="form-control" rows="10" name="content" id="myEditor"><?php echo $info['content'] ?></textarea>
			<script>UE.getEditor('myEditor');</script>
			</div>
        </div>
    </div> 
    <div class="form-group" >
        <label for="firstname" class="col-sm-2 control-label">请设置无限套餐封底(流量达到这个数值自动识别为无限/单位：GB)</label>
        <div class="col-sm-10">
            <div class="col-sm-10"><textarea class="form-control" rows="10" name="max_limit"><?php echo $info['max_limit'] ?></textarea></div>
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
