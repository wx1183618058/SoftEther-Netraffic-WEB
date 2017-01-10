<?php
class U{
	private $user;
	private $db;
	public $isuser = false;
	private $username;

	public function __construct($username,$password=""){
		$this->username = $username;
		$password = trim($password);
		$this->db = db(_openvpn_);
		$db = $this->db;
		if($password == ""){
			$info = $db->where(array(_iuser_=>$username))->find();
		}else{
			
			$info = $db->where(array(_iuser_=>$username,_ipass_=>$password))->find();
		}
		//echo $username;
		//print_r($info);
		//exit;
		if($info){
		//	echo "有纪律";
			$this->isuser = true;
			$this->user = $info;
		}else{
			$this->user = array();
		}
		
	}

	public function getNative(){
		return $this->user;
	}

	public function getDataused(){
		//获取已经使用的流量
		$user = $this->user;
		$irecv = $user[_irecv_];
		$isent = $user[_isent_];
		$used = $irecv+$isent;
		return $used;
	}

	public function getDatasurplus(){
		//流量剩余
		$user = $this->user;
		$used = $this->getDataused();
		$max = $user[_maxll_];
		$surplus = $max - $used;
		return $surplus;
	}

	public function getDatamax(){
		$user = $this->user;
		$max = $user[_maxll_];
		return $max;
	}
	public function getDatadays(){
		$uinfo = $this->user;
		$day = 24*60*60;
		$t1 = ($uinfo[_endtime_]-SYSTEM_T) % $day;
		return $t1  == 0 ?  ($uinfo[_endtime_]-SYSTEM_T) / $day :  ($uinfo[_endtime_]-SYSTEM_T-$t1) / $day+1;
	}
	public function setStop(){
		return $this->db->where(array(_iuser_=>$this->username))->update(array(_i_=>"0"));
	}
	
	public function setStart(){
		return $this->db->where(array(_iuser_=>$this->username))->update(array(_i_=>"1"));
	}
}