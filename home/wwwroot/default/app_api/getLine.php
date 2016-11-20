<?php
	require("system.php");
	$id = $_POST['id'];
	$u = $_POST["username"];
	$p = $_POST["password"];
		$db = db(_openvpn_);
		$info = $db->where(array(_iuser_=>$u,_ipass_=>$p))->find();
		if($info){
			if($info[_i_] == 1){
			$line = db('line')->where(array('id'=>$id))->find();	
			$data = array(
				'status'=>'success',
				'name'=>$line['name'],
				'type'=>$line['type'],
				'content'=>base64_encode(html_decode($line['content']))
			);
			die(json_encode($data));
			}else{
				$data = array(
				'status'=>'error',
				'msg'=>"您的身份信息处于未激活状态 不可安装"
				);
				die(json_encode($data));
			}
		}else{
			$data = array(
				'status'=>'error',
				'msg'=>"您的身份信息未能经过验证"
			);
			die(json_encode($data));
		}