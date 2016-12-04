<?php
	require("../system.php");
	if(@$_GET["act"]=="mod"){
		$db = db(_openvpn_);
		if($db->where(array(_iuser_=>$_POST["username"],_ipass_=>$_POST["pass"]))->find()){
			if($_POST["passnew"] == $_POST["passnew2"]){
				$db->where(array(_iuser_=>$_POST["username"],_ipass_=>$_POST["pass"]))->update(array(_ipass_=>trim($_POST["passnew"])));
				$u=$_POST["username"];
				$p=$_POST["passnew"];
				shell_exec("/bin/sh /vpnserver/cmd/UserPasswordSet.sh ${u} ${p}");
				
				$db = db('server');
				$list = $db->where(array())->order('id DESC')->select();
				foreach($list as $vo){
					$server=$vo['ip'];
					file_get_contents("http://${server}/shell.php?act=mod&user=${u}&pass=${p}");
				}
	
				die(json_encode(array("status"=>"success","msg"=>"修改成功")));
			}else{
				die(json_encode(array("status"=>"error","msg"=>"两次密码不一致")));
			}
		}else{
			die(json_encode(array("status"=>"error","msg"=>"用户不存在或者密码错误")));
		}
	}else{
	require("../api_head.php");
	?>
	<div class="panel panel-default">
    <div class="panel-heading">
        用户密码修改
    </div>
    <div class="panel-body">
	<div class="form-group">
    <label for="name">请输入您的密码</label>
    <input type="text" class="form-control" id="pass" placeholder="">
  </div>
  <div class="form-group">
    <label for="name">请输入的新密码</label>
    <input type="password" class="form-control" id="passnew" placeholder="">
  </div>
  
  <div class="form-group">
    <label for="name">请再次确认您的新密码</label>
    <input type="password" class="form-control" id="passnew2" placeholder="">
  </div>
  <button type="button" class="btn btn-default mod">确认修改</button>
  </div>
  </div>
  <script>
  $(function(){
	  $(".mod").click(function(){
		//  alert("修改密码后您必须重新切换账号登录！");
		  $.post(
			"?act=mod",{
				"username":'<?php echo $_GET["user"]?>',
				"pass":$("#pass").val(),
				"passnew":$("#passnew").val(),
				"passnew2":$("#passnew2").val()
			},function(data){
				if(data.status == "success"){
					alert("密码修改成功");
					window.myObj.goLogin();
				}else{
					alert(data.msg);
				}
			},"JSON"
		  );
	  });
  });
  </script>
	<?php
	
	require("../api_footer.php");}?>