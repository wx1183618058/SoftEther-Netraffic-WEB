<?php
/*
+-------------------------------------
*			模板引擎
+-------------------------------------
*
*
*
*-------------------------------------
*/


class T{
		private $DirName = '';
		private $leftLimit = '{';
		private $rightLimit = '}';
		private $vars = array();
		
		public function load($filename){
			if(!defined('INCLUDE_PATH')){
				define('INCLUDE_PATH','DDCMS');
			}
			$TplFile = R.'/Templates/'.pageType.'/'.$filename.'.html';
			$ComFile = RI.'/cache/'.md5(pageType.$filename).'.cache.php';
			
			if(!file_exists($TplFile) && pageType == 'mobile'){
				$TplFile = R.'/Templates/tpl/'.$filename.'.html';
			}
			
			if(!file_exists($TplFile) && $pageType == 'pc'){
				die('Don\'t found this templates to show pc page!');
			}
			
			if(!file_exists($ComFile) || filemtime($TplFile) > filemtime($ComFile)){
				$content = file_get_contents($TplFile);
				$cache = $this->base($content);
				$check_path = '<?php if(!defined(\'INCLUDE_PATH\')){die(\'error!this is a cache file!\');};?>';
				file_put_contents($ComFile,$check_path.$cache);
			};
			//执行编译后的文件
			//单独放置一个函数 是为了不让控制器的变量和内容的变量冲突
			$this->includeIn($ComFile);
		}
		public function includeIn($ComFile){
			extract($this->vars);
			$_DDCMS['classinfo'] = cInfo::get($_GET['cid']);
			$_DDCMS['userinfo'] = U::check();
			include($ComFile);
			unset($this->vars);
		}
		public function setPage($var,$value=''){
			if(is_array($var)){
				$this->vars['_page'] = $var;
			}else{
				$this->vars['_page'][$var] = $value;
			}
		}
		public function set($var,$value=''){
			if(is_array($var)){
				$this->vars = $var;
			}else{
				$this->vars[$var] = $value;
			}
		}
		/*
		* 一些预定义的模板
		*/
		public function tips($content){
			$this->set('content',$content);
			$this->load('public_html/tips');
			exit;
		}
		public function tip($content,$url){
			$this->set('content',$content);
			$this->set('url',$url);
			$this->load('public_html/tip');
			exit;
		}
		
		public function error($content,$url){
			$this->set('content',$content);
			$this->set('url',$url);
			$this->load('public_html/error');
			exit;
		}
		private function base($str=''){
			//执行PHP模板编译
			
			$left = preg_quote($this->leftLimit);
			$right = preg_quote($this->rightLimit);
			
			$left = '(\<\!\-\-)?'.$left;
			$right = $right.'(\-\-\>)?';
			//echo $left;
			$str = preg_replace_callback('/'.$left.'\s*foreach\sdata=(.+?)\s(.+?)\sback=\"(.+?)\"\send\s*'.$right.'(.+?)'.$left.'\s*\/foreach\s*'.$right.'/is',
			function($m){
				$database = $m[2];
				$where = $m[3];
				$strs = "<?php\nunset(\$row);\nunset(\$db);\n\$db = db('".$database."');";
				$strs .= "\n \$row = \$db->".$where."->select();\n";
				$strs .= "foreach(\$row as \$".$m[4]."){\n?>";
				$strs .= $m[6];
				$strs .= '<?php }; ?>';
				//die('e');
			//die($strs);
			return $strs;
		},$str);
				$str = preg_replace_callback('/'.$left.'\s*list\s(.+?)\sas\s(.+?)\s*'.$right.'(.+?)'.$left.'\s*\/list\s*'.$right.'/si',function($m){
					$info = $m[2];
					$vo = $m[3];
					$con = $m[5];
					$info_a = explode(",",$info);
					foreach($info_a as $value){
						$tmp = null;
						$tmp = explode('=',$value);
						$arr[$tmp[0]] = $tmp[1];
					}
						$data = $arr['data'];
						$page = $arr['page'] == null ? false : $arr['page'];
						$limit = $arr['limit'] == null ? 10 : $arr['limit'];
						$grop = $arr['grop'] == null ? '0' : $arr['grop'];
						if($grop == '0'){
							$where = '\'grop in(SELECT id FROM `\'.dbstr(\'class\').\'` WHERE grop = \'.$_GET[\'cid\'].\')\'';
						}elseif($grop == 'all'){
							$where = '';
						}else{
							if(strstr($grop,'&')){
								$where = '\'grop in('.implode(',',explode('&',$grop)).')\'';
							}else{
								$where = 'array(\'grop\'=>'.$grop.')';
							}
						}
						$order = $arr['order'] == null ? '\'id DESC\'' : $arr['order'];
						$f = $arr['f'] == null ? '\'*\'' : $arr['f'];
						$b = 'db_'.md5(time());
						if($page){
							//$s = ($_GET[$page]-1)*$limit;
							$pageType = '$pageType='.$page.';';
							$page_url = '$page_url = \'/article/\'.$_GET[\'cid\'].\'.html?m=\'.$_GET[\'m\'].\'&a=\'.$_GET[\'a\'].\'&id=\'.$_GET[\'id\'].\'&\';';
							$nums = '$nums = $'.$b.'->getnums();';
							$pages = '$pageHtml = Page::html($nums, '.$limit.', $page_url, $pageType, 10, $s = 7);';
							$limit_str = 'fpage($_GET[$pageType],'.$limit.')';
						}else{
							$limit_str = 'limit('.$limit.')';
						}
						$exec = '<?php '.$pageType.'$'.$b.' = db('.$data.');$'.$b.'_'.$vo.' = $'.$b.'->f('.$f.')->where('.$where.')->order('.$order.')->'.$limit_str.'->select();';
						$exec .= 'foreach($'.$b.'_'.$vo.' as $'.$vo.'){/*注释隔开{和$防止解析引擎错误识别*/'."\n";
						$exec .= '$get_url = \'index.php?cid=\'.$'.$vo.'[\'grop\'].\'&a=view&id=\'.$'.$vo.'[\'id\'] ;'.$page_url.$nums.$pages.'?>';
						$exec .= $con;
						$exec .= '<?php unset($get_url);}unset($'.$b.');?>';
						unset($arr);
						return $exec;
				},$str);
	//	die($strs);
			$tagArr = array(
				'/'.$left.'\s*\$([a-zA-Z_\x7f-\xff])([^\}]*)\s*'.$right.'/i',
				'/'.$left.'=\s*\s\s*(.+?)\s*'.$right.'/i',
				'/'.$left.'php\s*\s\s*(.+?)\s*'.$right.'/i',
				'/'.$left.'\s*if\s*\s\s*(.+?)\s*'.$right.'/i',
				'/'.$left.'\s*\/if\s*'.$right.'/i',
				'/'.$left.'\s*else\s*'.$right.'/i',
				'/'.$left.'\s*elseif\s(.+?)\s*'.$right.'/i',
				'/'.$left.'\s*loop\s(.+?)\s(.+?)\s=>\s(.+?)\s*'.$right.'/i',
				'/'.$left.'\s*loop\s(.+?)\s(.+?)\s*'.$right.'/i',
				'/'.$left.'\s*\/loop\s*'.$right.'/i',
				'/'.$left.'\s*template\((.+?)\)\s*'.$right.'/i'
			); 
			$phpArr = array(
				'<?php echo \$$2$3;?>',
				'<?php echo $2;?>',
				'<?php $2;?>',
				'<?php if($2){;?>',
				'<?php }; ?>',
				'<?php }else{ ?>',
				'<?php }elseif($2){; ?>',
				'<?php unset($i);unset($n);foreach($2 as $3 => $4){$n = $i%2; ?>',
				'<?php unset($i);unset($n);foreach($2 as $3){ $n = $i%2; ?>',
				'<?php $i++;}; ?>',
				'<?php template($2,$this->vars); ?>'
			);
				$str = preg_replace($tagArr,$phpArr,$str);
				
				/*去除多余空格 出错请注释*/
				//$str = trim($str);// 首先去掉头尾空格 
				//$str = preg_replace('/\s+/',' ', $str);// 接着去掉两个空格以上的 
				//$str = preg_replace('/[\n\r\t]/', ' ', $str);// 最后将非空格替换为一个空格 
				//$arr = explode(" ",$str); 
				//$res = $arr[0]." ".$arr[1]; 
				//$str = strtotime($str); 
			
				return $str;
		}
			
		function systemVars(){
			
			//$this->set('_DDCMS');
		}
	}
?>
