<?php
class cInfo{
	static $cache = array();
	
	static function set($id){
		if($id<=0 || empty($id)){
			return false;
		}
		$db = db('class');
		$res = $db->where(array('id'=>$id))->find();
		cInfo::$cache[$id] = $res;
		return $res;
	}
	
	static function get($id){
		if($id<=0 || empty($id)){
			return false;
		}
		if(empty(cInfo::$cache[$id])){
			return cInfo::set($id);
		}else{
			return cInfo::$cache[$id];
		}
	}
}