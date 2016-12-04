<?php
//错误处理和记录类
class E{
static public logFIle = 'error.log';
static public path;
	static function __construct(){
		E::path = RI.'/error/'.E::logFile;
		
	}

	static function getErr(){
		$content = file_get_contents(E::path);
		return $content;	
	}
	
	static function arr(){
		$content = file_get_contents(E::path);
		$arr = ecplode(PHP_EOL,$content);
		return $arr;	
	}
	
	static function in($msg = 'unknow',$path='unknow'){
		$time = date('Y/m/d H:i:s',time());		
		$msg = $msg;
		$old = E::getErr();
		$new = '['.$time.'] '.$msg.' ('.$path.') '.PHP_EOL;
		file_put_contents(E::path,$old.$new);
	}
	
	static function vo(){
		}

}
