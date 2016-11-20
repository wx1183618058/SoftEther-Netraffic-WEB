<?php
if(is_file("../install.lock")){
	header("location:../admin.php");
}
if(is_file("../config.php")){
	include("../system.php");
}else{
	
}
	$act = @$_GET["act"];
	if($act == "creat_key"){
		$open_url = "http://www.dingd.cn/api/check.php?domain=".$_POST["domain"]."&key=".$_POST["key"];
		$status = file_get_contents($open_url);@file_put_contents("../licences.key",$_POST["key"]);
		if(trim($status) == "success"){
			
			die(json_encode(array("status"=>"success")));
		}else{
			die(json_encode(array("status"=>"error")));
		}
		
	}elseif($act == "init_data"){
		$con = mysql_connect($_POST["host"].":".$_POST["port"],$_POST["user"],$_POST["pass"]);
		if(!$con)
		{
			die(json_encode(array("status"=>"error","msg"=>mysql_error())));
		}else{
			$db_selected = mysql_select_db($_POST["ov"], $con);
			if ($db_selected){
				$php .= "<?php\n";
				$php .= "/* 本文件由系统自动生成 如非必要 请勿修改 */\n";
				foreach($_POST as $key => $value){
					$php .= 'define("_'.$key.'_","'.$value.'");'."\n";
				}
				if(file_put_contents("../config.php",$php)){
					die(json_encode(array("status"=>"success")));
				}else{
					die(json_encode(array("status"=>"error","msg"=>"无法写入配置文件 请执行 chmod 0777 -R ".R."/")));
				}
				
			}else{
				die(json_encode(array("status"=>"error","msg"=>"无法找到指定的数据库")));
			}
		}
		
	}else{
$bind_domain = explode(":",$_SERVER["HTTP_HOST"]);
?>
<html>
<head>
<title>流量卫士云端安装向导</title>    <meta charset="utf-8">
<style>
</style>
<link rel="stylesheet" href="/app_api/css/bootstrap.min.css">
<script src="/app_api/css/jquery.min.js"></script>
<script src="/app_api/css/bootstrap.min.js"></script>
<style>
body{
	background:url(bg.jpg);
}
</style>
</head>
<body>
<div class="container">
<img src="./ttt.png">
<div class="panel panel-default">
		<div class="panel-heading">
			欢迎使用流量卫士云端安装向导
		</div>
		<div class="panel-body">
<?php
if($_GET["n"] == 1 or $_GET["n"] == ""){
	$file = R."/test.txt";
	file_put_contents($file,"test");
	$get = @file_get_contents($file);
	$rand = false;
	if($get == "test"){
		@unlink($file);
		$rand = true;
	}
?>
	<!-- x -->
	文件夹权限状态:<?php echo $rand ? "<span class=\"label label-success\">[正常]</span>" : "<span class=\"label label-danger\">请给予app_api整个文件夹已经子目录0777权限</span>"?><br>
	<hr>
			<div class="form-group">
			<label for="name">请输入授权的IP或者域名，不加http://和端口</label>
			<input type="text" class="form-control" id="domain" placeholder="192.168.1.1" value="<?php echo $bind_domain[0] ?>">
		  </div>
		  
		  <div class="form-group">
			<label for="name">请输入您的授权码</label>
			<input type="text" class="form-control" id="key" placeholder="2207134109">
		  </div>
		 <div class="alert alert-danger">如果您点击确定 云端将会与 授权服务器 联系并验证您的合法性。如果您跳过此步骤可以稍后自行配置。</div>
			<!-- x -->
			<button type="button" class="btn btn-primary btn-lg btn-block creat_key">确定并验证</button>
			<a  href="?n=2" class="btn btn-default btn-lg btn-block">跳过此步</a>
<?php }elseif($_GET["n"] == 2){ ?>	

	<div class="form-group">
			<label for="name">请输入您的数据库连地址 本机请写localhost 云库请写远程IP</label>
			<input type="text" class="form-control" id="host" placeholder="" value="localhost">
		  </div>
		  
		  <div class="form-group">
			<label for="name">请输入数据库用户名</label>
			<input type="text" class="form-control" id="user" placeholder="" value="root">
		  </div> 
		  <div class="form-group">
			<label for="name">请输入数据库密码</label>
			<input type="text" class="form-control" id="pass" placeholder="" value="root">
		  </div>
		  
		  <div class="form-group">
			<label for="name">请输入数据库端口（通常为3306）</label>
			<input type="text" class="form-control" id="port" placeholder="" value="3306">
		  </div>	

		  <div class="form-group">
			<label for="name">请输入流控数据表（通常为ov）</label>
			<input type="text" class="form-control" id="ov" placeholder="" value="ov">
		  </div>
		 <div class="alert alert-danger">默认配置支持大多数流控，若您的流控较为少见 请打开 <button type="button" class="btn btn-default gaoji">高级设置</button></div>
			<div class="gjb" style="display:none">
				  <div class="form-group">
				<label for="name">用户数据表</label>
				<input type="text" class="form-control" id="openvpn" placeholder="" value="openvpn">
			  </div>
				
				<div class="form-group">
				<label for="name">用户名字段</label>
				<input type="text" class="form-control" id="iuser" placeholder="" value="iuser">
			  </div> 
			  
			  <div class="form-group">
				<label for="name">密码字段</label>
				<input type="text" class="form-control" id="ipass" placeholder="" value="pass">
			  </div> 

			  <div class="form-group">
				<label for="name">上传流量字段</label>
				<input type="text" class="form-control" id="isent" placeholder="" value="isent">
			  </div>
				<div class="form-group">
				<label for="name">下载流量字段</label>
				<input type="text" class="form-control" id="irecv" placeholder="" value="irecv">
			  </div>
			  
			  <div class="form-group">
				<label for="name">总流量</label>
				<input type="text" class="form-control" id="maxll" placeholder="" value="maxll">
			  </div> 
			  
			  <div class="form-group">
				<label for="name">开始时间</label>
				<input type="text" class="form-control" id="starttime" placeholder="" value="starttime">
			  </div>

			  <div class="form-group">
				<label for="name">结束时间</label>
				<input type="text" class="form-control" id="endtime" placeholder="" value="endtime">
			  </div> 
			  <div class="form-group">
				<label for="name">禁用与启用字段</label>
				<input type="text" class="form-control" id="i" placeholder="" value="i">
			  </div>
			  <div class="form-group">
				<label for="name">其他字段</label>
				<input type="text" class="form-control" id="other" placeholder="" value="dlid,tian">
			  </div>
			  
				
		  </div>
			<button type="button" class="btn btn-primary btn-lg btn-block init_data">确定并验证以上信息</button>
<?php }elseif($_GET["n"] == 3){ 
	$con = mysql_connect(_host_.":"._port_,_user_,_pass_);
		if(!$con)
		{
			die(json_encode(array("status"=>"error","msg"=>mysql_error())));
		}else{
			$db_selected = mysql_select_db(_ov_, $con);
			if ($db_selected){
				
			}else{
				die(json_encode(array("status"=>"error","msg"=>"无法找到指定的数据库")));
			}
		}
		//检测验证码缓存目录
	$conetnt = "test";
	$file = R."/user_tmp/rand/test.txt";
	file_put_contents($file,$conetnt);
	$get = @file_get_contents($file);
	$rand = false;
	if($get == "test"){
		@unlink($file);
		$rand = true;
	}

	
	$file = R."/data/test.txt";
	file_put_contents($file,$conetnt);
	$get = @file_get_contents($file);
	$kf = false;
	if($get == "test"){
		@unlink($file);
		$kf = true;
	}
?>	<div class="alert alert-info">如果在安装中遇到任何问题，那么有以下几个连接也许能够帮助您：
<br>
http://www.dingd.cn/doc/sms.html 短信对接教程<br>
http://www.dingd.cn/doc/query.html 常见文件解答<br>
http://www.dingd.cn/ 官网<br>
499319801 官方讨论群<br>
</div>

		验证码目录权限:<?php echo $rand ? "<span class=\"label label-success\">[正常]</span>" : "<span class=\"label label-danger\">[异常 请执行 chmod 0777 -R ".R."/user_tmp/rand 0777权限]</span>"?><br>
		<hr>
		
		客服修改缓存目录:<?php echo $kf ? "<span class=\"label label-success\">[正常]</span>" : "<span class=\"label label-danger\">[异常 请执行 chmod 0777 -R ".R."/data/ 0777权限]</span>"?><br>
		<hr>
		---------【数据库导入 <span style="color:red"><b>如果已经导入过数据那么执行报错是正常的</b></span>】----------
		<hr>
<?php
$sqlfile = "data/ov.sql";

 if(is_file($sqlfile)){
	
      //导入SQL并执行。
	$get_sql_data = file_get_contents($sqlfile);
		mysql_query("SET NAMES utf8");
		//去掉注释 
		$content=preg_replace("/--.*\n/iU","",$get_sql_data); 
	
		$sqls = explode(";",$content);
		foreach($sqls as $c) 
		{ 
			if(!mysql_query($c)){
				echo "【执行错误】---------执行失败<br>";
			}else{
				echo "【执行成功】---------成功执行<br>";
			} 
			
		}
    }else{
        echo "找不到数据库文件";
    }
	 
?>
	
	<a  href="?n=4" class="btn btn-default btn-lg btn-block">完成 进入下一步</a>
	<?php
}else{
	?>
	<div class="alert alert-success">【云端已经初始化完成 您还需要以下步骤】<br>
	【开启流量统计与排行】<br>
	请打开 /etc/openvpn/（骚逼汪的路径为/usr/share/xml）中的disconnect.sh中的内容，并查询是否与下文类似。如果相同，请安装如下步骤进行安装：<br>
	请打开 APP资源中附赠的disconnect.sh 修改红色如下红色标记的位置(ip改为您的IP 端口改为您的流控端口)。7K、大猫、康师傅等替换至<b>/etc/openvpn/</b>(骚逼汪为/usr/share/xml)目录下。如果您为康师傅最新版请复制一份重命名为<b>disconnectudp.sh</b>一并替换（两个都替换）。
	
	VPNs请使用附带的<b>VPNS_out.sh</b>替换目录暂不明确。 
	<br>
	<b><span style="color:red">严格禁止使用window自带记事本编辑！电脑务必使用 notepad++ 编辑！覆盖后请给予 0777 权限 重启VPN方可生效！！切记！切记！如您有疑问，可以访问官网查看：<a href="http://www.dingd.cn">www.dingd.cn</a></span></b>
	<br>
<pre>
<span style="color:green">#!/bin/sh</span>

curl "http://<span style="color:red;">192.168.1.1:8888</span>/app_api/top_api.php?name=$common_name&s=$bytes_sent&r=$bytes_received&version=2"

</pre>
<div class="alert alert-danger">如果您执行完上述步骤！安装功能就已经完成了！本页面只可访问一次！再度访问请删除install.lock</div>
<a type="button" class="btn btn-success" href="/app_api/admin.php">访问后台(默认账户密码 admin admin)</a>
	</div>
	
	<?php
	file_put_contents("../install.lock","安装功能锁定文件 删除此文件可以重新开始安装初始化");
 } ?>
</div>
	</div>
</div>

<script>
$(function(){
	$(".gaoji").click(function(){
		$(".gjb").toggle();
	});
	$(".creat_key").click(function(){
		$(this).html("验证中...");
		var domain = $("#domain").val();
		var key = $("#key").val();
		if(domain == "" || key == ""){
			$(".creat_key").html("确定并验证");
			alert("授权主体与授权许可均不能为空");
		}else{
			$.post(
				"?act=creat_key",{
					"key":key,
					"domain":domain
				},function(data){
					if(data.status == "success"){
						$(".creat_key").html("确定并验证");
						alert("授权已经服务器验证 点击确定进入下一步");
						window.location.href="?n=2";
						
					}else{
						$(".creat_key").html("确定并验证");
						alert("授权没有得到服务器的认可，您可能为盗版用户");
					}
				},"JSON"
			);
		}
	});
	
	$(".init_data").click(function(){
		$(this).html("验证中...");
		var host = $("#host").val();
		var user = $("#user").val();
		var pass = $("#pass").val();
		var port = $("#port").val();
		var ov = $("#ov").val();
		var openvpn = $("#openvpn").val();
		var iuser = $("#iuser").val();
		var ipass = $("#ipass").val();
		var isent = $("#isent").val();
		var irecv = $("#irecv").val();
		var starttime = $("#starttime").val();
		var endtime = $("#endtime").val();
		var maxll = $("#maxll").val();
		var other = $("#other").val();
		var i = $("#i").val();
		if(host == "" || user == ""){
			$(".init_data").html("确定并验证");
			alert("信息不完整");
		}else{
			$.post(
				"?act=init_data",{
					"host":host,
					"user":user,
					"pass":pass,
					"port":port,
					"ov":ov,
					"openvpn":openvpn,
					"iuser":iuser,
					"ipass":ipass,
					"isent":isent,
					"irecv":irecv,
					"starttime":starttime,
					"endtime":endtime,
					"maxll":maxll,
					"other":other,
					"i":i
				},function(data){
					if(data.status == "success"){
						$(".init_data").html("确定并验证");
						window.location.href="?n=3";
						
					}else{
						$(".init_data").html("确定并验证");
						alert("错误；"+data.msg);
					}
				},"JSON"
			);
		}
	});
});
</script>
</body>
</html>
<?php
	}
?>