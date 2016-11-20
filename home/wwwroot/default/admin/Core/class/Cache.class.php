<?php
/*
 *   数组/数据缓存类
 * @key 缓存的标志key  必须保证其唯一
 * @data 缓存的数据或者数组，空则是获取数据的意思
 * */
class Cache{
	static public $path;
	static function __data($key,$data=null){
		Cache::$path = RI.'/runtime/cache/'.md5($key).'.php';
		if($data == null){
				return Cache::getDta();
			}else{
					if(is_array($data)){
							$d = Cache::arr2str($data);
						}else{
							$d = $data;
							}
							$content = '<?php if(!defined(R)){die(’您没有权限浏览‘);}; return '.$d.'; ?>';
							file_put_contents(Cache::$path,$content);
				}
		}
		static function getData(){
				if(file_exists(Cache::$path)){
						return false;
					}
				return file_get_contents(Cache::$path);
			}
		static function arr2str($data){
			if(is_array($data)){
					foreach($data as $key => $value){
							if(is_array($value)){
										$t[]  = Cache::arr2str($value);
								}else{
										$t[] = "'{$key}'=> '{$value}'";
									}
						}
						return 'array('.implode(',',$t).')';
				}
			}
		static function __del($key){
			$file = RI.'/runtime/cache/'.md5($key).'.php';
			if(file_exists($file)){
				if(unlink($file)){
					return true;
				}else{
					return false;
				};
			}
		}
}

//echo Cache::arr2str(array('1',array('2','3')));
