<?php 
/*
*------------------------------------------------------
*	系统核心控制类  负责系统操作与请求的分发和预处理
*	author:2207134109          e-mail:admin@dingd.cn
*   禁止修改  版权所有  筑梦聚力网络工作室
*------------------------------------------------------
*/
class C extends T{
	
	private $id = 0;
	private $classinfo;
	public 	$config = array();
	private $m = 'Index'; //模块选择器 指定选择的模块
	private $mdefault = 'Index'; //模块选择器 指定选择的模块
	private $c = 'Index'; //类选择 指定某模块下的某类
	private $a = 'index'; //操作选择 某类下的某操作

	/*
	*---------------------------------------------
	*		构造函数 执行地址编码的预处理
	*---------------------------------------------
	*/
	function __construct($m = 'Index',$c = 'Index',$a = 'index',$id = 0){
		
		$this->config['zhiye'] = zhiye();
		
		$module =  $_GET['m'];
		$class = $_GET['c'] == null ? $c : $_GET['c'];
		$action = $_GET['a'] == null ? $a : $_GET['a'];
		$classid = $_GET['cid'] == null ? $id : $_GET['cid'];	
		
		$this -> m = $module;			//获取指定模块
		$this -> mdefault = $m;			//获取指定模块
		$this -> c = $class;			//获取指定类
		$this -> a = $action;			//获取用户动作
		$this -> id = (int)$classid; 	//获取栏目ID
	}
	
	/*
	*----------------------------------------------
	*		类的主函数 入口 
	*	@ int $id 指定栏目ID 不指定默认$_GET['cid']
	*----------------------------------------------
	*/
	public function run(){
		
		if($this->m == null){
			$mName = $this->selModule($this->id);	
		}else{
			$mName = $this->m;
		}
		//die('tip:'.$this->mdefault);
		$this->loadModule($mName,$this->c);
	}
	 
	public function selModule($id){
		if($id == '0'){
			return $this->mdefault;
		}
		$res = cInfo::set($id);
		if($res){
			$this->classinfo = $res;
			return $res['module'];
		}
		die("此栏目不存在");
	}
	
	public function loadModule($mName,$cName){
		if($this->id != 0){
			$Type = 'Module';
			}else{
			$Type = 'Realize';//Controller
		}
		$modulePath = R.'/Module/'.$mName;
		$moduleClass = $modulePath.'/'.$cName.'.class.php';
		if(!file_exists($moduleClass)){
			$this->tips('模块文件不存在！'.$moduleClass);
		}else{
			require($moduleClass);
			$mNameModule = $cName.$Type;
			if(!class_exists($mNameModule)){
				$this->tips('指定的类不存在！'.$modulePath.'/'.$mNameModule);
			}
			$system = new $mNameModule;
			$function = $this->a;
			if(!method_exists($system,$function)){
				$this->tips('找不到您要执行的操作');			
			}
			$system->$function();
		}
	}
	

}