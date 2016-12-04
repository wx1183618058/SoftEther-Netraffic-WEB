<?php
$u = $_GET['username'];
$p = $_GET['password'];
$db = db('app_gg');
	$vo = $db->where(array('id'=>$_GET['id']))->order('id DESC')->find();
	$is_read = db("app_read")->where(array("readid"=>$vo["id"],"username"=>$u))->find();
	if(!$is_read){
		$d = db("app_read");
		$tmp["username"] = $u;
		$tmp["readid"] = $_GET['id'];
		$tmp["time"] = time();
		$d->insert($tmp);
	}
	$nums = db("app_read")->where(array("readid"=>$vo["id"]))->getnums();
	
	if($vo){
		echo '<center><h3>'.$vo['name'].'</h3><span class="label label-primary">时间</span>&nbsp;'.date("Y/m/d H:i:s",$vo['time']).'<a href="javascript:void(0)" onclick="location.reload(true)">刷新</a></center>';
		echo '<div style="margin:10px 10px;">';
		echo '<pre style="font-size:16px;">'.$vo['content'].'</pre>';
		echo '<span class="label label-primary">已经有 '.$nums.' 人阅读此文</span>';
		
		echo '</div>';
	}else{
		echo '消息已经删除或者不存在！';
	}
//添加记录
