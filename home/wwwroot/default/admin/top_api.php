<?php
require('system.php');
$username = $_GET['name'];
@$s = $_GET['s'];
@$r = $_GET['r'];

if($_GET["version"] == "2"){
	//新版本
	$db = db(_openvpn_);
	$uinfo = $db->where(array(_iuser_=>$username))->find();
	$new_s = $s;
	$new_r = $r;
	if($new_r+$new_s > $uinfo[_maxll_]){
		//流量不足 禁用此用户
		$db->where(array("id"=>$uinfo["id"]))->update(array(_i_=>"0"));
	}
	if($db->where(array("id"=>$uinfo["id"]))->update(array(_isent_=>$new_s,_irecv_=>$new_r))){
		//更新用户数据并且更新排行榜数据
		$db2 = db('top');
		$c = $s+$r;
		$u = $db2->where(array('username'=>$username,'time'=>date('Y-m-d',time())))->find();
		if($u){
			$new = $u['data']+$c;
			$db2->where(array('id'=>$u['id']))->update(array('data'=>$new));
		}else{
			$db2->insert(array('username'=>$username,'data'=>$c,'time'=>date('Y-m-d',time())));
		}
	};
	
	
}else{
	//旧版本接口 新版本中即将弃用
	$c = $s+$r;
	$user_tmp = R."/res/tmp/".$username.".tmp";
	if(is_file($user_tmp)){
		$d = explode("|",@file_get_contents($user_tmp));
		$c = $c-($d[0]+$d[1]);
		@unlink($user_tmp);
	}
	if($username != ""){
		$db = db('top');
		$u = $db->where(array('username'=>$username,'time'=>date('Y-m-d',time())))->find();
		if($u){
				$new = $c-$u['data2']+$u['data'];
				$db->where(array('id'=>$u['id']))->update(array('data2'=>$c));
				$db->where(array('id'=>$u['id']))->update(array('data'=>$new));
			
		}else{
			//print_r($u);
			$db->insert(array('username'=>$username,'data'=>0,'data2'=>$c,'time'=>date('Y-m-d',time())));
		}
	}else{
		echo "没有这个用户";
	}
}