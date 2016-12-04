<?php
class FeedData{
	
	public $data = null;
	public $db = array();
	public $nums = 0;
	//function __construct(){
		
	//}
	
	function getList($info){
		//查询数据
		
		$db = db('feed');
		if(!isset($_POST['page'])){
			$_POST['page'] = '1';
		}
		if(isset($_POST['startId']) && $_POST['startId'] > 0){
			$res = $db->where('(userid in(SELECT fid FROM `'.dbstr('friend').'` WHERE userid='.$info['id'].') or userid = '.$info['id'].') AND id<'.$_POST['startId'])->limit('10')->order('id DESC')->select();
		}elseif(isset($_POST['endId']) && $_POST['endId'] > 0){
			$res = $db->where('(userid in(SELECT fid FROM `'.dbstr('friend').'` WHERE userid='.$info['id'].') or userid = '.$info['id'].') AND id>'.$_POST['endId'])->order('id DESC')->select();
		}else{
			$res = $db->where('userid in(SELECT fid FROM `'.dbstr('friend').'` WHERE userid='.$info['id'].') or userid = '.$info['id'])->fpage($_POST['page'],'10')->order('id DESC')->select();
		}
		
		$this->data = $res;
		$data = $this->data;
		if(!$data){return false;}
		foreach($data as $vo){
			$r = $this->line($vo);
			if($r){
				$list[] = $r;
			
			}
		}	
		$this->nums = $db->getnums();
		return $list;
	}
	
	function getWho($info){
		//查询数据
		$userid = $info['id'];
		$db = db('feed');
		if(!isset($_POST['page'])){
			$_POST['page'] = '1';
		}
		if(isset($_POST['startId']) && $_POST['startId'] > 0){
			$res = $db->where(array('userid'=>$userid,'id'=>$_POST['startId']),array('id'=>'<'))->limit('10')->order('id DESC')->select();
		}elseif(isset($_POST['endId']) && $_POST['endId'] > 0){
			$res = $db->where(array('userid'=>$userid,'id'=>$_POST['endId']),array('id'=>'>'))->order('id DESC')->select();
		}else{
			$res = $db->where(array('userid'=>$userid))->fpage($_POST['page'],'10')->order('id DESC')->select();
		}
		$this->data = $res;
		$data = $this->data;
		if(!$data){return false;}
		foreach($data as $vo){
			$r = $this->line($vo);
			if($r){
				$list[] = $r;
			
			}
		}	
		
		return $list;
	}
	
	function get($where){
		//查询数据
		$userid = $info['id'];
		$db = db('feed');
		if(!isset($_POST['page'])){
			$_POST['page'] = '1';
		}
		if(isset($_POST['startId']) && $_POST['startId'] > 0){
			$where = 'id < '.$_POST['startId'].' AND ('.$where.')';
			$res = $db->where($where)->limit('10')->order('id DESC')->select();
		}else{
			$res = $db->where($where)->fpage($_POST['page'],'10')->order('id DESC')->select();
		}
		$this->data = $res;
		$data = $this->data;
		if(!$data){return false;}
		foreach($data as $vo){
			$r = $this->line($vo);
			if($r){
				$list[] = $r;
			
			}
		}	
		$this->nums = $db->getnums();
		return $list;
	}
	
	function getOne($id){
		//查询数据
		
		$db = db('feed');
		$res = $db->where(array('id'=>$id))->find();
		$this->data = $res;
		$data = $this->data;
		if(!$data){
			return false;
		}
			$r = $this->line($data);
			if($r){
				$list[] = $r;
			
			}
		$this->nums = $db->getnums();
		return $list;
	}
	function line($line){
		$table = array(
			'weibo',
			'blog',
			'share'
			);
		$type = $line['type']; //动态类型
		$binid = $line['binid']; //外键
		$action = $line['action']; //动作
		$line_user = U::getinfo($line['userid']);
		if(in_array($type,$table)){//判断是否是查询数据的类型
			if(!isset($this->db[$type])){
				$this->db[$type] = db($type);
			}
			$line_data = $this->db[$type]->where(array('id'=>$binid))->find();
			if(!$line_data ||  !$line_user){
				$this->db[$type]->where(array('id'=>$binid))->delete();
				return false;
			}
			
			$line['data'] = $line_data;
			
		}
		$line['user'] = $line_user;
		$line['content'] = $this->getContent($line);
		return $line;
	}
	
	function getContent($vo){
		
		
		switch($vo['type']){
			case 'weibo':
			if(isset($_GET['id'])){
				$lineStr = ubb($vo['data']['content']);
			}else{
				$lineStr .= ubb(mb_substr($vo['data']['content'],0,500,'utf-8'));
				if(mb_strlen($vo['data']['content'],'utf-8') > 500){
					$lineStr .= '<a href="/index.php?m=User&c=Main&a=view&u='.$vo['userid'].'&id='.$vo['id'].'" target="_blank">[详情]</a>';
				}
			}
			break;
			case 'share':
				$lineStr = $vo['data']['content'];
			break;
			case 'blog':
				$lineStr = '<a href="index.php?m=Blog&c=Index&a=view&id='.$vo['data']['id'].'">'.$vo['data']['title'].'</a><br>';
				$lineStr .= strip_tags(html_decode(mb_substr($vo['data']['content'],0,300,'utf8'))).'...<a href="index.php?m=Blog&c=Index&a=view&id='.$vo['data']['id'].'" target="_blank">查看全文</a>'; 
			break;
			default:
				$lineStr = $vo['content'];
		}
		$getData  = $vo['data'];
		if(isset($getData['pic']) && !empty($getData['pic']) && trim($getData['pic'])!= ''){
				$picArr = explode('|',$getData['pic']);
				$n = count($picArr);
				;
				if($vo['action'] == 'zhuan'){	
				$html .= '<a href="javascript:void(0)" onclick="" id="pic-box-'.$vo['data']['id'].'" title="点击查看"><ul class="feed-pic-z">';
					foreach($picArr as $vp){
						$html .= '<li><img src="'.$vp.'" alt="加载中..."></li>';
					}
					$html .= '</ul></a><div class="clear"></div>';
				}else{
					$html .= '<a href="javascript:void(0)" onclick="javascript:setImages = '.$vo['data']['id'].'" id="pic-box-'.$vo['data']['id'].'" title="点击查看"><ul class="feed-pic">';
					if($n < 1 or $n >3){
						$n = '';
					}
					foreach($picArr as $vp){
						$html .= '<li class="col'.$n.'"><img src="'.$vp.'" alt="加载中..."></li>';
					}
					$html .= '</ul></a><div class="clear"></div>';
				}
			}
		if($vo['action'] == 'zhuan'){
			$u = unserialize($vo['data']['author']);
			$uinfo = U::getinfo($u['data']['id']);
			$line = '<div class="zhuan">';
			$line .= '<a href="index.php?m=User&c=Main&a=index&u='.$uinfo['id'].'">'.$uinfo['nickname'].'</a>';
			$line .= $this->typeStr($vo['type']).$lineStr.$html;
			$line .= '</div>';
		}else{
			$line = $lineStr.$html;
		}
		return $line;
	}
	
	function typeStr($t){
		$typeStr['weibo'] = '&nbsp;的微博&nbsp;:&nbsp;';
		$typeStr['blog'] = '&nbsp;的博客&nbsp;:&nbsp;';
		
		if(!array_key_exists($t,$typeStr)){
			return '&nbsp;的动态&nbsp;:&nbsp;';
		}
		return $typeStr[$t];
	}
}