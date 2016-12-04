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
	
 	include('head2.php');
	include('nav2.php');
 	if($_GET['act'] == 'update'){
		$key = $_GET["id"]== "" ? $_POST["id"] : $_GET["id"];
		file_put_contents(R."/data/daili_".$key.".txt",$_POST["name"]);
		file_put_contents(R."/data/daili_".$key."_content.txt",$_POST["content"]);
		//file_put_contents(R."/data/max_limit.txt",$_POST["max_limit"]);
		success_go("修改成功",'?act=mod&id='.$key);
		
	}else{
	
	
	
	
		
 ?>
<div class="main">
<button type="button" class="btn btn-primary btn-xs" onclick="window.location.href='?act=mod'">新增代理</button>
<div style="clear:both;height:10px;"></div>
<?php
if($_GET["act"] == "del"){
	$key = $_GET["id"]== "" ? $_POST["id"] : $_GET["id"];
	@unlink("data/daili_".$key.".txt");
}elseif($_GET["act"] == "mod"){
$key = $_GET["id"]== "" ? $_POST["id"] : $_GET["id"];
$action = '?act=update&id='.$key;
$info["name"] = @file_get_contents("data/daili_".$key.".txt");
$info["content"] = @file_get_contents(R."/data/daili_".$key."_content.txt");
//$info["max_limit"] = @file_get_contents("data/max_limit.txt");
?>



<div class="alert alert-danger">代理自定义价格表等功能开发中...</div>
	<form class="form-horizontal" role="form" method="POST" action="<?php echo $action?>" onsubmit="return checkStr()">
	<?php
	if($_GET["id"] == ""){
		?>
		 <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">请设置代理ID 请保持其唯一性 并且只能有数字和英文</label>
        <div class="col-sm-10">
            <div class="col-sm-10"><textarea class="form-control" rows="10" name="id"><?php echo $info['id'] ?></textarea></div>
        </div>
    </div>
		<?php
	}
	?>
	
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">HTML顶部说明</label>
        <div class="col-sm-10">
            <div class="col-sm-10"><textarea class="form-control" rows="10" name="content"><?php echo $info['content'] ?></textarea></div>
        </div>
    </div>

	<div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">QQ列表 多个请用 换行 区分。显示名字用|区分</label>
        <div class="col-sm-10">
            <div class="col-sm-10"><textarea class="form-control" rows="10" name="name"><?php echo $info['name'] ?></textarea></div>
        </div>
    </div>
   
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">提交数据</button>
        </div>
    </div>
</form> 
<script>
	function checkStr(){
		var title = $('[name="name"]').val();
		if(title == ""){
			alert("不得为空");
			return false;
		}
		return true;
	}
	</script>
<?php
}else{
function tree($directory)
{

    $mydir = dir($directory);
    echo "<ul>\n";

    while($file = $mydir->read())
    {

        $a[] = $file;
    }
    $mydir->close();
	
	return $a;
}
$list = tree(R."/data");
echo 	'<ul class="list-group">';
$liskey = file_get_contents(R."/");
	foreach($list as $file){
		if(is_file(R.'/data/'.$file)){
			$file_ext = explode("_",$file);
			if($file_ext[0] == "daili"){
			
				$data = explode(".",$file_ext[1]);
			
			echo ' <li class="list-group-item line-id-'.$data[0].'">
        APP_KEY:&nbsp;&nbsp;<span style="color:red">'.APP_KEY."_".$data[0].'</span><br>
		<button type="button" class="btn btn-primary btn-xs" onclick="window.location.href=\'?act=mod&id='.$data[0].'\'">编辑</button>&nbsp;';
		echo '<button type="button" class="btn btn-danger btn-xs" onclick="delDLine(\''.$data[0].'\')">删除</button>
    </li>';
			}
		}
	}
		echo "</ul>";
}

?>
	</div>
	
<?php
	}
	include('footer.php');
	
?>
