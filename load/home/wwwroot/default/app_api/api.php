<?php
	require('system.php');
	require('decode_client.php');
	require("sms.config.php");
	function checkUsername($str)
	{
			$output='';
			$a=preg_match('/['.chr(0xa1).'-'.chr(0xff).']/', $str);
			$b=preg_match('/[0-9]/', $str);
			$c=preg_match('/[a-zA-Z]/', $str);
			if($a && $b && $c){
				$output='汉字数字英文的混合字符串';
			}elseif($a && $b && !$c){
				$output='汉字数字的混合字符串';
			}elseif($a && !$b && $c){
				$output='汉字英文的混合字符串';
			}elseif(!$a && $b && $c){
				$output='数字英文的混合字符串';
				return true;
			}elseif($a && !$b && !$c){
				$output='纯汉字';
				return true;
			}elseif(!$a && $b && !$c){
				$output='纯数字';
				return true;
			}elseif(!$a && !$b && $c){
				$output='纯英文';
				return true;
			}
			//return $output;
			return false;
	}
	if($_GET['act'] == 'line'){
		include('api_head.php');
		include('line.php');
		include("api_footer.php");
	//=========================================
	}elseif($_GET['act'] == 'app_check'){
		include("shengji.php");
	}elseif($_GET['act'] == 'login_sms'){
		if(trim($_POST['username']) == ''){
			die(json_encode(array('status'=>'error','msg'=>'手机号码尚未填写')));
		}
		$db= db(_openvpn_);
		if($db->where(array(_iuser_=>$_POST['username']))->find()){	
			die(json_encode(array('status'=>'error','msg'=>'此手机号码已经被注册！无法再次注册！')));
		}else{
			$code = rand(1000,9999);
			$_SESSION['code'] = $code;
			$_SESSION["last_send"] = time();
			$c = senddx($_POST['username'],$code);
			$resp = json_decode($c,true);
			if($resp['resp']['respCode'] == "000000"){
				die(json_encode(array('status'=>'success')));
			}else{
				die(json_encode(array('status'=>'error','msg'=>"短信发送失败 错误代码：".$resp["resp"]["respCode"],'time'=>date("YmdHis",SYSTEM_T))));
				//die(json_encode(array('status'=>'error','msg'=>"短信发送失败")));
			}
		}
	}elseif($_GET['act'] == 'reg_in'){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$code = $_POST['code'];

		if($_SESSION['code'] != $code){
			die(json_encode(array('status'=>'error','msg'=>'验证码错误')));
		}

		if(trim($username) == '' || trim($password) == '' ){
			die(json_encode(array('status'=>'error','msg'=>'用户密码不能为空')));
		}

		if(!checkUsername($username)){
			die(json_encode(array('status'=>'error','msg'=>'用户名只能是英文和数字')));
		}
		if(!checkUsername($password)){
			die(json_encode(array('status'=>'error','msg'=>'密码只能是英文和数字')));
		}

		$db= db(_openvpn_);
		
		if($db->where(array(_iuser_=>$username))->find()){
			
			die(json_encode(array('status'=>'error','msg'=>'已经注册过了哦')));
		}else{
			$date[_iuser_] = $username;
			$date[_ipass_] = $password;
			$date[_maxll_] = SMS_L*1024*1024;
			$date[_isent_] = '0';
			$date[_irecv_] = '0';
			$date[_i_] = SMS_I;
			$date[_starttime_] = SYSTEM_T;
			$date[_endtime_] = SYSTEM_T+(SMS_T*24*60*60);
			
			$arr = explode(",",_other_);
			foreach($arr as  $v){
				$date[$v] = "";
			}
			if($db->insert($date)){
				$_SESSION['code'] = '';
				die(json_encode(array('status'=>'success','msg'=>'100')));
			
			}else{
				die(json_encode(array('status'=>'error','msg'=>'102')));
				
			}
			
		}
	}elseif($_GET['act'] == 'app_reg'){
		include("app_reg.php");
	}elseif($_GET['act'] == 'dx_reg'){
		include("dx_reg.php");
	}elseif($_GET['act'] == 'info'){
		include("api_head.php");
		include("llog.php");
		include("api_footer.php");
	}elseif($_GET['act'] == 'user_info'){
		header("location:user/index.php?user=".$_GET['username'].'&pass='.$_GET['password']);
	}elseif($_GET['act'] == 'Shop'){
	//流量购买
		include("api_head.php");
		include("ad.php");
		include("api_footer.php");
	}elseif($_GET['act'] == 'list_gg'){
		include('api_head.php');
		//include('list_gg.php');
		$u = $_GET['username'];
		$p = $_GET['password'];
		$db = db('app_gg');
		$list = $db->where(array())->order('id DESC')->select();
		echo '<div style="margin:10px 10px;">';
			echo '<div class="alert alert-warning">您可以在这看到最近30条消息通知</div>';
		
			echo '</div>';
		if($list){
			echo '<ul class="list-group">';
			foreach($list as $v){
				$is_read = db("app_read")->where(array("readid"=>$v["id"],"username"=>$_GET["username"]))->find();
				$pre = $is_read ? '' :'<span class="badge">未读</span>'; 
				echo '<li class="list-group-item"><a href="?act=gg&id='.$v['id'].'&username='.$_GET['username'].'&app_key='.$_GET['app_key'].'">'.$pre.$v['name'].'</a></li>
				';
			}
		echo '</ul>';
		}else{
			echo '消息已经删除或者不存在！';
		}
		
		include("api_footer.php");
	}elseif($_GET['act'] == 'gg'){
		include('api_head.php');
		include('mode/gg_view.php');
		include("api_footer.php");
		
	}elseif($_GET['act'] == 'load_gg'){
		$u = $_POST['username'];
		$p = $_POST['password'];
		$db = db('app_gg');
		$vo = $db->where(array())->order('id DESC')->find();
		$is_read = db("app_read")->where(array("readid"=>$vo["id"],"username"=>$u))->find();
		if($vo && !$is_read){
			die(json_encode(array('status'=>'success','url'=>'http://'.$_SERVER["HTTP_HOST"].':'.$_SERVER["SERVER_PORT"].'/app_api/api.php?act=gg&id='.$vo['id'].'&username='.$u.'&','title'=>$vo['name'],'content'=>$vo['content'])));
		}else{
			die(json_encode(array('status'=>'error','url'=>'no data','title'=>'no data')));
		}
		
	}elseif($_GET['act'] == 'load_info'){
		$u = $_POST['username'];
		$p = $_POST['password'];
		
		$u = db(_openvpn_)->where(array(_iuser_=>$u,_ipass_=>$p))->find();
		if($u){
			$now = getInfo_i($_POST['username']);
			$uinfo = $u;
			
			$count =  printmb($uinfo[_maxll_]);
		
			$isuse = printmb($uinfo[_irecv_]+$uinfo[_isent_]+$now[2]+$now[3]);
		
			$sy = printmb($uinfo[_maxll_]-($uinfo[_irecv_]+$uinfo[_isent_]));
		
			$_sy = ($uinfo[_maxll_]-($uinfo[_irecv_]+$uinfo[_isent_]+$now[2]+$now[3])) / $uinfo[_maxll_] * 100;
			
			$upload = printmb($uinfo[_irecv_]+$now[2]);
			$download = printmb($uinfo[_isent_]+$now[3]);
			//system("/home/wwwroot/default/res/sha ".$u[_iuser_]);
			if($sy['n'] <= 0 && $sy['p'] == 'M'){
				$t = 'tips_user';
				$s = round($sy['n'],1).$sy['p'];
			}elseif($sy['n'] <= 100 && $sy['p'] == 'M'){
				$t = 'tips_user';
				$s = round($sy['n'],1).$sy['p'];
			}else{
				$t = 'success';
				$s = round($sy['n'],1).$sy['p'];
			}
			$_sy = ($uinfo['endtime']-SYSTEM_T) % (24*60*60) == 0 ?  ($uinfo['endtime']-SYSTEM_T) / (24*60*60) :  ($uinfo['endtime']-SYSTEM_T) / (24*60*60);
			$_all = $uinfo[_maxll_] >= _MAX_LIMIT_*1024*1024*1024 ? "NO_LIMIT" : $s;
			die(json_encode(array('status'=>$t,'all'=>$uinfo[_maxll_]-($uinfo[_irecv_]+$uinfo[_isent_]),'sy'=>$_all,'stime'=>'2','etime'=>'2','bl'=>round($_sy,0))));
			exit;
		}else{
			
			die(json_encode(array('status'=>'success','all'=>'0','sy'=>'未知','stime'=>'2','etime'=>'2','bl'=>round($_sy,0))));
			exit;
		}
		
	//=======================================
	}elseif($_GET['act'] == 'top'){
		include('api_head.php');
		$u = $_GET['username'];
		$p = $_GET['password'];
		$db = db('top');
		$list = $db->limit('20')->where(array("time"=>date("Y-m-d",time())))->order('data DESC')->select();
		echo ' 	<div class="alert alert-success">每天流量使用排名前20的会显示在这里哦！【按日结算】</div>
		<style>.topline{border:1px solid #ccc;height:100px;margin:10px;background:#6aafd7;background-image:url("images/topbg.png");background-repeat:no-repeat;color:#fff;}
		.topline h3{color:#fff}
		.topn{font-size:40px;color:#fff;float:left;line-height:100px;margin-left:15px;width:100px;}
		.topc{
			float:left;
			margin-top:10px;
			text-align:left;
		}
		</style>';
  $i = 1;
		foreach($list as $vo){	
			$l = printmb($vo['data']);
			echo '<div class="topline"><div class="topn">'.$i.'</div><div class="topc"><h3>'.round($l['n'],2).$l['p'].'</h3><div class="topu">'.substr_replace($vo["username"],'****',3,4).'</div></div></div>';
	$i++;
		}
		echo '</tbody>
</table>';
		include("api_footer.php");
	}elseif($_GET['act'] == 'login_in'){
		
		$u = $_POST['username'];
		$p = $_POST['password'];
		
		$ud = new U($u,$p);

		if($ud->isuser){
			$uinfo = $ud->getNative();
			$sydata =$ud->getDatasurplus();
			$_sy = $ud->getDatadays();
			$max = $ud->getDatamax();
			$count =  printmb($max);
			$isuse = printmb($ud->getDataused());
			$sy = printmb($sydata);
			$s = $count>=_MAX_LIMIT_*1024*1024*1024 ? "NO_LIMIT" : round($sy['n'],1)." ".$sy['p'];
			die(json_encode(array(
				'status'=>'success',
				'msg'=>base64_encode($u[_iuser_]."\n".$u[_ipass_]."\n".round($sy['n'],1).$sy['p']."\n".$count."\n".round($_sy,0)),
				'username'=>$uinfo[_iuser_],
				'password'=>$uinfo[_ipass_],
				'liuliang'=>$s,
				'all'=>$sydata,
				'bl'=>$_sy
			)));
			//exec("/home/wwwroot/default/res/sha ".$u[_iuser_]);
		}else{
			die(json_encode(array(
				'status'=>'error',
				'msg'=>'用户不存在或者密码错误'
			)));
		}
		
	}elseif($_GET['act'] == 'login_check'){
		$u = $_POST['username'];
		$p = $_POST['pass'];
		//echo "系统紧急调试 请稍等几分钟";
		//	exit;
		$ud = new U($u,$p);

		if($ud->isuser){
			
			$uinfo = $ud->getNative();
			
			$sydata =$ud->getDatasurplus();
			$_sy = $ud->getDatadays();
			$max = $ud->getDatamax();
			$count =  printmb($max);
			$isuse = printmb($ud->getDataused());
			$sy = printmb($sydata);
			
			
			$s = $max>=_MAX_LIMIT_*1024*1024*1024 ? "NO_LIMIT" : round($sy['n'],1)." ".$sy['p'];
			$data = "success_need_login\n";
			$data .= $uinfo[_iuser_]."\n";
			$data .= $uinfo[_ipass_]."\n";
			$data .= $s."\n";
			$data .= $sydata."\n";
			$data .= $_sy;
			
			die($data);
			
			exit;
		}else{
			die('error_need_login'."\n".''."\n".''."\n".'');
			exit;
		}
		
		
		
	//=======================================
	}elseif($_GET['act'] == 'theme'){
		include('api_head.php');
		include('theme.php');	
		include("api_footer.php");
	}elseif($_GET['act'] == 'help'){
		include('api_head.php');
		include('help.php');	
		include("api_footer.php");
	}elseif($_GET['act'] == 'more'){
		include('api_head.php');
		include('all.php');
		include("api_footer.php");  
	}else{
		
		include('api_head.php');
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
		include("api_footer.php");  
	} ?>