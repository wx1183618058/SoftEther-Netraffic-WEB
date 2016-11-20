<?php
class SqlBase{

	 static function _deal(){
		 $_POST =  SqlBase::voArr($_POST);
		 $_GET =  SqlBase::getArr($_GET);
	 }
	
	static function voArr($data){
		if(is_array($data)){
			foreach($data as $key => $value){
				if(is_array($value)){
					$temp[$key] = SqlBase::voArr($value);
				}else{
					$temp[$key] = SqlBase::baseCode(html_encode($value));
				}
			}
		}else{
			return SqlBase::baseCode(html_encode($data));
		}
		return $temp;
	 }
	 static function getArr($data){
		if(is_array($data)){
			foreach($data as $key => $value){
				if(is_array($value)){
					$temp[$key] = SqlBase::getArr($value);
				}else{
					$temp[$key] = SqlBase::baseGET(html_encode($value));
				}
			}
		}else{
			return SqlBase::baseGET(html_encode($data));
		}
		return $temp;
	 }
	 
	 static function baseCode($str){
		 $old = array(
			"/and/i",
			"/union/i",
			"/from/i",
			"/select/i",
			"/delete/i",
			"/insert/i",
			"/updata/i"
		 );
		 $new = array(
			'an\d',
			'un\ion',
			'fr\om',
			'sel\ect',
			'del\ete',
			'ins\ert',
			'upd\ate"'
		 );
		 
		 $str = preg_replace($old,$new,$str);
		 return $str;
	 }
	 static function baseGET($str){
		 if(preg_match('/and|select|updata|insert|union/i',$str,$m)){
			die('<b>您的地址包含非法字符[<a href="/">Go to website home page!</a>]</b>');
			//return true;
		 };
		 return $str;
	 }
}