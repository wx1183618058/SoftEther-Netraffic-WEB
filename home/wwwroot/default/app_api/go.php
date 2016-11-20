<?php

	require('decode_client.php');
	if($_GET['act'] == 'line'){
 	include('head.php');
	
	
		$m = array(
			1=>array('name'=>'河北移不动','type'=>'稳定常规','path'=>'1.ovpn','id'=>'1'),
			2=>array('name'=>'139邮箱','type'=>'测试常规','path'=>'2.ovpn','id'=>'2'),
			3=>array('name'=>'河北移不动','type'=>'HTTP转接','path'=>'3.ovpn','id'=>'3'),
			4=>array('name'=>'电信信不过','type'=>'稳定常规','path'=>'4.ovpn','id'=>'4'),
			5=>array('name'=>'山西移不动（测试）','type'=>'测试常规','path'=>'5.ovpn','id'=>'5'),
			6=>array('name'=>'山西移不动（测试）','type'=>'测试HTTP转接','path'=>'6.ovpn','id'=>'6'),
			7=>array('name'=>'河南移不动（测试）','type'=>'测试常规','path'=>'7.ovpn','id'=>'7'),
			8=>array('name'=>'河南移不动（测试）','type'=>'测试HTTP转接','path'=>'8.ovpn','id'=>'8')
		);
	?>

<div class="main">
<div class="tip"></div>
<span class="label label-default">线路安装</span>
<div style="clear:both;height:10px;"></div>
	<ul class="list-group">
		<?php foreach($m as $vo){?>
		<li class="list-group-item"><?php echo $vo['name']?>&nbsp;<span class="badge"><?php echo $vo['type']?></span><br><button type="button" class="btn btn-primary btn-sm" onclick="addLine('<?php echo $vo['id']?>')">安装</button></li>
	<?php } ?>
	</ul>
	<script>
	var name_tmp = "";
	function addLine(id){
		$.post(
			'getLine.php',
			{
				'id':id
			},function(data){
				if(data.status == 'success'){
					//window.myObj.writeFile('test.ovpn','<?php echo base64_encode(file_get_contents('1.ovpn'))?>','download');
					name_tmp = data.name;
					window.myObj.writeFile(data.name+'.ovpn',data.content,'download'); 
				}
			},"JSON");
		  
	}
	function cli_sendData(status,type,msg){
		if(type == 'file_w'){
			if(status == 'success'){
				window.myObj.installPro('download/'+name_tmp+'.ovpn');
			}else{
				$('.tip').html("写入文件失败");
			}
		}
	}
	</script>
	</div>
		
	
	<?php
	include('footer.php');
	//=========================================
	}elseif($_GET['act'] == 'login'){
		include("login.php");
	}elseif($_GET['act'] == 'info'){
		include('head.php');
		$u = $_GET['username'];
		$p = $_GET['password'];
		
		$u = db('openvpn')->where(array('iuser'=>$u,'pass'=>$p))->find();
		if($u){
			$now = getInfo_i($_POST['username']);
			$uinfo = $u;
			
			$count =  printmb($uinfo['maxll']);
		
			$isuse = printmb($uinfo['irecv']+$uinfo['isent']+$now[2]+$now[3]);
		
			$sy = printmb($uinfo['maxll']-($uinfo['irecv']+$uinfo['isent']+$now[2]+$now[3]));
		
			$_sy = ($uinfo['maxll']-($uinfo['irecv']+$uinfo['isent']+$now[2]+$now[3])) / $uinfo['maxll'] * 100;
			
			$upload = printmb($uinfo['irecv']+$now[2]);
			$download = printmb($uinfo['isent']+$now[3]);
			if($sy['n'] <= 0){
				$t = 'tips_user';
				$s = round($sy['n'],2).$sy['p'];
			}else{
				$t = 'success';
				$s = round($sy['n'],2).$sy['p'];
			}
			include("info.php");
			include('footer.php');
		}
	}elseif($_GET['act'] == 'load_info'){
		$u = $_POST['username'];
		$p = $_POST['password'];
		
		$u = db('openvpn')->where(array('iuser'=>$u,'pass'=>$p))->find();
		if($u){
			$now = getInfo_i($_POST['username']);
			$uinfo = $u;
			
			$count =  printmb($uinfo['maxll']);
		
			$isuse = printmb($uinfo['irecv']+$uinfo['isent']+$now[2]+$now[3]);
		
			$sy = printmb($uinfo['maxll']-($uinfo['irecv']+$uinfo['isent']+$now[2]+$now[3]));
		
			$_sy = ($uinfo['maxll']-($uinfo['irecv']+$uinfo['isent']+$now[2]+$now[3])) / $uinfo['maxll'] * 100;
			
			$upload = printmb($uinfo['irecv']+$now[2]);
			$download = printmb($uinfo['isent']+$now[3]);
			if($sy['n'] <= 0){
				$t = 'tips_user';
				$s = round($sy['n'],2).$sy['p'];
			}else{
				$t = 'success';
				$s = round($sy['n'],2).$sy['p'];
			}
			die(json_encode(array('status'=>$t,'all'=>round($count['n'],2).$count['p'],'sy'=>$s,'stime'=>'2','etime'=>'2')));
			exit;
		}else{
			die(json_encode(array('status'=>'success','all'=>'100M','sy'=>'未知','stime'=>'2','etime'=>'2')));
			exit;
		}
		
	//=======================================
	}elseif($_GET['act'] == 'login_in'){
		
		$u = $_POST['username'];
		$p = $_POST['password'];
		
		$u = db('openvpn')->where(array('iuser'=>$u,'pass'=>$p))->find();
		if($u){
			$uinfo = $u;
			
			$count =  printmb($uinfo['maxll']);
		
			$isuse = printmb($uinfo['irecv']+$uinfo['isent']);
		
			$sy = printmb($uinfo['maxll']-($uinfo['irecv']+$uinfo['isent']));
		
			$_sy = ($uinfo['maxll']-($uinfo['irecv']+$uinfo['isent'])) / $uinfo['maxll'] * 100;
			
			$upload = printmb($uinfo['irecv']);
			$download = printmb($uinfo['isent']);
			die(json_encode(array(
				'status'=>'success',
				'msg'=>base64_encode($u['iuser']."\n".$u['pass']."\n".round($sy['n'],2).$sy['p']),
				'username'=>$uinfo['iuser'],
				'password'=>$uinfo['pass'],
				'liuliang'=>round($sy['n'],2).$sy['p']
			)));
		}else{
			die(json_encode(array(
				'status'=>'error',
				'msg'=>'用户不存在或者密码错误'
			)));
		}
		
	}elseif($_GET['act'] == 'login_check'){
		$u = $_POST['username'];
		$p = $_POST['pass'];
		
		$u = db('openvpn')->where(array('iuser'=>$u,'pass'=>$p))->find();
		if($u){
			$uinfo = $u;
			
			$count =  printmb($uinfo['maxll']);
		
			$isuse = printmb($uinfo['irecv']+$uinfo['isent']);
		
			$sy = printmb($uinfo['maxll']-($uinfo['irecv']+$uinfo['isent']));
		
			$_sy = ($uinfo['maxll']-($uinfo['irecv']+$uinfo['isent'])) / $uinfo['maxll'] * 100;
			
			$upload = printmb($uinfo['irecv']);
			$download = printmb($uinfo['isent']);
			
			//die(json_encode(array('status'=>'success','all'=>round($count['n'],2).$count['p'],'sy'=>round($sy['n'],2).$sy['p'],'stime'=>'2','etime'=>'2')));
			die('success_need_login'."\n".$u['iuser']."\n".$u['pass']."\n".round($sy['n'],2).$sy['p']);
			exit;
		}else{
			die('error_need_login'."\n".''."\n".''."\n".'');
			exit;
		}
		
		
	//=======================================
	}elseif($_GET['act'] == 'video'){
		include('video.php');	
	}elseif($_GET['act'] == 'help'){
		include('help.php');	
	}elseif($_GET['act'] == 'more'){
		
		include('head.php');
		?>
		<div class="main">
		<?php
		//$db = db('meun');
		
		//$meun = $db->where(array('show'=>'1'))->order('id DESC')->select();
		$meun = array(
			array(
				'url'=>'?act=video','name'=>'流量影院(公测)'
			),
			array(
				'url'=>'?act=login','name'=>'账户切换'
			)
		);
		if(!$meun){
			//print_r($_GET);
			echo '正在开发中请耐心等待';
		}else{
			echo '<ul class="list-group">';
			foreach($meun as $vo){
				echo '<li class="list-group-item"><a href="'.$vo['url'].'">'.$vo['name'].'</a></li>';
			}
			echo '</ul>';
		}
		?>
		</div>	
		
	<?php
		include('footer.php');  
	}else{
		
		include('head.php');
		?>
		<div class="main">
		<?php
		$db = db('meun');
		
		$meun = $db->where(array('show'=>'1'))->order('id DESC')->select();
		if(!$meun){
			//print_r($_GET);
			echo '正在开发中请耐心等待';
		}else{
			echo '<ul class="list-group">';
			foreach($meun as $vo){
				echo '<li class="list-group-item"><a href="'.$vo['url'].'">'.$vo['name'].'</a></li>';
			}
			echo '</ul>';
		}
		?>
		</div>	
		
	<?php
		include('footer.php');  
	} ?>
