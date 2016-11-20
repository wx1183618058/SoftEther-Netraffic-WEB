<?php 
	function stime(){
		//返回系统时间
		return $_SERVER['REQUEST_TIME'];
	}
	function myvar($key='',$value=''){
		if(is_array($key)){
			$_SERVER['SYSTEM_MY'] = $key; 
		}elseif(isset($value)){
			$_SERVER['SYSTEM_MY'][$key] = $value;
		}elseif(isset($key)){
			return $_SERVER['SYSTEM_MY'][$key];
		}else{
			return $_SERVER['SYSTEM_MY'];
		}
	}
	function template($str,$var = ''){
		$t = new T;
		$t->set($var);
		$t->load($str);
	}
	
	function db($dbname){
		//$ddcms = $_SERVER['ddcms']['cfg']['host']['ddcms'];
		$db = new D($dbname);
		return $db;
	}
	
	function dbstr($dbname){
		$ddcms = $_SERVER['ddcms']['cfg']['host']['ddcms'];
		$db = $ddcms.$dbname;
		return $db;
	}
	function getHostString(){
		$http = isSsl() == true ? 'https://' : 'http://';
		return $http.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}
	function isSsl(){  
		if(!isset($_SERVER['HTTPS']))  return FALSE;  
		if($_SERVER['HTTPS'] === 1){  //Apache  
			return TRUE;  
		}elseif($_SERVER['HTTPS'] === 'on'){ //IIS  
			return TRUE;  
		}elseif($_SERVER['SERVER_PORT'] == 443){ //其他  
			return TRUE;  
		}  
		return FALSE;  
	}  
	function html_encode($content,$style=ENT_QUOTES){
		return htmlspecialchars($content,$style);
	}
	
	function html_decode($content,$style=ENT_QUOTES){
		return htmlspecialchars_decode($content,$style);
	}
	function navBar($id = null,$index=false){ 
		$cid = $id == null ? $_GET['cid'] : $id;
		$db = db('class');
		$check = $db->where()->select();	
		foreach($check as $value){
			$vid = $value['id'];
			$class[$vid] = $value;
		}
		$stop = 1;
		$temp = $class;
		$cid = $cid;
		
		while($stop==1){
			if($temp[$cid]['grop'] != '0'){
				$b[] = $temp[$cid];
				$cid = $temp[$cid]['grop'];
				$stop = 1;
			}else{
				$b[] = $temp[$cid];
				$cid = $temp[$cid]['grop'];
				$stop = 2;
				sort($b);
				return $b;
			}
			
		}
		return $b;
	} 
function moduleReg($mName = null){
	$info = include(RI.'/conf/module.conf.php');
	if(empty($m)){
		return $info;
	}
	return $info[$m];
}

function index($cid){
	$db = db('class');
	$row = $db->where(array('id'=>(int)$cid))->find();
	if(!$row){
		return '0';
	}
	if($row['grop'] != '0'){
		return index($row['grop']);
	}
	return $row['id'];
}
function str_length($str) 
{ 
if(empty($str)){ 
return 0; 
} 
if(function_exists('mb_strlen')){ 
return mb_strlen($str,'utf-8'); 
} 
else { 
preg_match_all("/./u", $str, $ar); 
return count($ar[0]); 
} 
}

function checkStr($str){
 $output='';
 $a=ereg('/[^'.chr(0xa1).'-'.chr(0xff).'0-9a-zA-Z_\.]/', $str);
 if(!$a){
	 return 8;
 }
}

function admin($str=null){
	/*
	system 系统管理员权限 最高权限
	0 完全开放权限
	1 修改系统配置
	2 修改模板
	3 添加/删除栏目
	4 添加栏目
	5 添加/修改内容
	*/
	$a = explode('&&&',$_SESSION['admin']);
	$p = explode(',',$str);
	$username = $a[0];
	$password = $a[1];
	$d = db('admin');
	if($str == null or $str == '0'){
		$info = $d->where(array('username'=>$username,'password'=>$password))->find();
		if($info){
			return $info;
		}
		$t = new T;
		$t->tip('请登录','login2.php');
	}
	$info = $d->where(array('username'=>$username,'password'=>$password))->find();
	if($info){
		$p_str = explode(',',$info['permissions']);
		if($info['type'] == 'system'){
			return true;
		}
		foreach($p as $v){
			if(!in_array($v,$p_str)){
				die('You dont have this permissions!');
			}
			return true;
		}
		die('You dont have this permissions!');
		return false;
	}else{
		$t = new T;
		$t->tip('请登录','login2.php');
	}
}

function getSubClass($id=null){
	$cid = empty($id) ? $_GET['cid'] : $id;
	$db = db('class');
	$row = $db->where(array('grop'=>$cid))->order('id ASC')->select();
	return $row;
}
/*
	空间类函数
*/
function feed($arr){
	if(!isset($arr)){
		die('函数参数不能为空');
	}
	$db = db('feed');
	if($db->insert($arr)){
		return $db->auto_id();
	}
	return false;
}

function like($param){
	if(isset($param)){
		$d = db('like');
		$n = $d->where($param)->getnums();
		if(!$n || $n < 1){
			return '0';
		}
		return $n;
	}else{
		die('参数错误');
	}
}
function json_base($data,$mix=null){
	if($mix == null){
		if(is_array($data)){
			foreach($data as $key=>$value){
				$res[$key] = urlencode($value);
			}
		}else{
			$res = urlencode($data);
		}
		return json_encode($res);
	}else{
		$res = json_decode($data,true);
		if(is_array($res)){
			foreach($res as $key=>$value){
				$res_de[$key] = urldecode($value);
			}
		}else{
			$res_de = urldecode($data);
		}
		return $res_de;
	}
}

function Cache($name,$data = null,$time = 60){
	$filename = RI.'/Runtime/cache_'.md5($name).'.php';
	if($data == null){
		if(is_file($filename)){
			$arr = explode('//',file_get_contents($filename));
			unset($arr[0]);
			$data = unserialize(implode('\\',$arr));
			if(time() - $data['time'] < $data['savetime']){
				return $data['data'];
			}else{
				unlink($filename);
				return false;
			}
		}
		return false;
	}else{
		$tmp = array(
			'time' => time(),
			'savetime' => $time,
			'data' => $data,
			'data2' => '"23"',
			'data3' => "'23'"
		);
		$str = '<?php //'.serialize($tmp);
		file_put_contents($filename,$str);
		unset($tmp);
	}
}



/* * ************************************************************
 *  生成指定长度的随机码。
 *  @param int $length 随机码的长度。
 *  @access public
 * ************************************************************ */

function createRandomCode($length) {
    $randomCode = "";
    $randomChars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $randomChars { mt_rand(0, 35) };
    }
    return $randomCode;
}

/* * ************************************************************
 *  将物理路径转为虚拟路径。
 *  @param string $physicalPpath 物理路径。
 *  @access public
 * ************************************************************ */

function toVirtualPath($physicalPpath) {
    $virtualPath = str_replace($_SERVER['DOCUMENT_ROOT'], "", $physicalPpath);
    $virtualPath = str_replace('\\', '/', $virtualPath);
    return $virtualPath;
}

function get_ip(){
	if ($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"])  
	{  
	$ip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];  
	}  
	elseif ($HTTP_SERVER_VARS["HTTP_CLIENT_IP"])  
	{  
	$ip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];  
	}  
	elseif ($HTTP_SERVER_VARS["REMOTE_ADDR"])  
	{  
	$ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];  
	}  
	elseif (getenv("HTTP_X_FORWARDED_FOR"))  
	{  
	$ip = getenv("HTTP_X_FORWARDED_FOR");  
	}  
	elseif (getenv("HTTP_CLIENT_IP"))  
	{  
	$ip = getenv("HTTP_CLIENT_IP");  
	}  
	elseif (getenv("REMOTE_ADDR"))  
	{  
	$ip = getenv("REMOTE_ADDR");  
	}  
	else  
	{  
	$ip = "Unknown";  
	}  
	return $ip;
}


function timeStr($time){
	$now = time();
	//十分钟 60*10
	$m10 = 60*10;
	if($now - $time < 30){
		return '刚刚';
	}
	for($i=1;$i<=10;$i++){
		if($now - $time < $i*60){
			return $i.'分钟前'; 
		}
	}
	for($i=2;$i<=6;$i++){
		if($now - $time < $i*$m10){
			$t = ($i-1)*10;
			return $t.'分钟前'; 
		}
	}
	
	for($i=2;$i<=24;$i++){
		if($now - $time < $i*$m10*6){
			return $i.'小时前'; 
		}
	}
	for($i=2;$i<=30;$i++){
		if($now - $time < $i*$m10*6*24){
			return $i.'天前'; 
		}
	}
	
	return date('Y/m/d H:i:s',$time);
	
}
function isFriend($myid,$checkid){
	$d = db('friend');
	if($d->where(array('userid'=>$myid,'fid'=>$checkid))->find()){
		return true;
	}else{
		return false;
	}
} 
function sys_config(){
	require(R.'/config.inc.php');
	return $cfg;
}
function sendmail($to,$title,$content){
	//$smtppass = "rhglzztqhuuleahf";//SMTP服务器的用户密码

	
$mail = new MySendMail();
$mail->setServer("smtp.qq.com", "2207134109", "umgubpgdgjtfebba", 465, true); //设置smtp服务器，到服务器的SSL连接
$mail->setFrom("send@dingd.cn"); //设置发件人
$mail->setReceiver($to); //设置收件人，多个收件人，调用多次
$mail->setMail($title, $content); //设置邮件主题、内容
$state = $mail->sendMail();
if($state==""){
		return false;
	}
return true;
	/* @example
* $mail = new MySendMail();
* $mail->setServer("smtp@126.com", "XXXXX@126.com", "XXXXX"); //设置smtp服务器，普通连接方式
* $mail->setServer("smtp.qq.com", "2207134109@qq.com", "yaoyao820", 465, true); //设置smtp服务器，到服务器的SSL连接
* $mail->setFrom("admin@dingd.cn"); //设置发件人
* $mail->setReceiver($to); //设置收件人，多个收件人，调用多次
* $mail->setCc(""); //设置抄送，多个抄送，调用多次
* $mail->setBcc(""); //设置秘密抄送，多个秘密抄送，调用多次
* $mail->addAttachment(""); //添加附件，多个附件，调用多次
* $mail->setMail($title, $content); //设置邮件主题、内容
* $mail->sendMail(); //发送
* $mail->sendMail(); //发送*/
}

function urlbase($url){
	if(is_array($url)){
		
	}else{
		$temp = explode('?',$url);
		$urlData = preg_replace('/\?|\&/','/',$temp[1]);
	}
}
function is_mobile_request()  
{  
	$_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';  
	$mobile_browser = '0';  
	if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))
	{  
		$mobile_browser++;  
	}
	if((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') !== false))
	{  
		$mobile_browser++;  
	}
	if(isset($_SERVER['HTTP_X_WAP_PROFILE']))
	{  
		$mobile_browser++;  
	}
	if(isset($_SERVER['HTTP_PROFILE']))
	{  
		$mobile_browser++; 
	} 
	$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));  
	$mobile_agents = array(  
	'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',  
	'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',  
	'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',  
	'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',  
	'newt','noki','oper','palm','pana','pant','phil','play','port','prox',  
	'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',  
	'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',  
	'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',  
	'wapr','webc','winw','winw','xda','xda-'
	);  
	if(in_array($mobile_ua, $mobile_agents))
	{  
		$mobile_browser++;  
	}
	if(strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)
	{  
		$mobile_browser++;  
	}
	// Pre-final check to reset everything if the user is on Windows  
	if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)
	{
		$mobile_browser=0;  
	}
	// But WP7 is also Windows, with a slightly different characteristic  
	if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)
	{
		$mobile_browser++;
	}  
	if($mobile_browser>0){
		return true;  
	}else{
		return false;
	}
}

function printmb($ml){
	$m = abs($ml);
	if($m < 1024){ //b
		$c =  $m;
		$p = 'B';
	}elseif($m >= 1024 && $m < 1024 * 1024){
		$c = ($m/1024);
			$p = 'K';
	}elseif($m >= 1024*1024 && $m < 1024 * 1024 * 1024){
		$c = ($m/1024/1024);
			$p = 'M';
	}elseif($m >= 1024*1024*1024 && $m < 1024 * 1024 * 1024 * 1024){
		$c = ($m/1024/1024/1024);
			$p = 'G';
	}elseif($m >= 1024*1024*1024*1024){
		$c = ($m/1024/1024/1024/1024);
			$p = 'T';
	}
	$pre = $ml < 0 ? '-':'';
	return array('n'=>$pre.$c,'p'=>$p);
}


