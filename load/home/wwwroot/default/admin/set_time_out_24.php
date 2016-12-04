<?php
//每天24点自动执行
require("system.php");

$file = R."/res/user-status.txt";

echo "自动执行流量按日统计";

$str=file_get_contents($file);
$num=(substr_count($str,date('Y'))-1)/2;
$fp=fopen($file,"r");
fgets($fp);
fgets($fp);
fgets($fp);
if(!is_dir("res/tmp")){
	mkdir(R."/res/tmp");
}
for($i=0;$i<$num;$i++){
	
	$j=$i+1;
	$line=fgets($fp);
	$arr=explode(",",$line);
	$username=$arr[0];
	$recv=$arr[2];
	$sent=$arr[3];
	$s = $sent;
	$r = $recv;
	$c = $s+$r;
	$time = time() - 3600;//减去一小时确保统计结果是昨天的
	if($username != ""){
		$user_tmp = R."/res/tmp/".$arr[0].".tmp";
		file_put_contents($user_tmp,$recv."|".$sent);
		$db = db('top');
		$u = $db->where(array('username'=>$username,'time'=>date('Y-m-d',$time)))->find();
		if($u){
			$new = $u['data']+$c;
				$db->where(array('id'=>$u['id']))->update(array('data'=>$new));
		}else{
			$db->insert(array('username'=>$username,'data'=>$c,'time'=>date('Y-m-d',$time)));
		}
	}else{
		echo "没有这个用户";
	}
	
	//$sy = ($row['maxll']-$row['isent']-$row['irecv']-$arr[2]-$arr[3]);
	//$value = round($sy/1024/1024,3);
	
}
