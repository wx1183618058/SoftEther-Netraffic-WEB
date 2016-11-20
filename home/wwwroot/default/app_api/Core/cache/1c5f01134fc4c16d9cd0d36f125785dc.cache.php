<?php if(!defined('INCLUDE_PATH')){die('error!this is a cache file!');};?><?php template('public_html/page_head',$this->vars); ?>
<!--栏目内容-->
<div class="a-main">
<div class="a-list-left">
	
		 <style>
			.nlist_box{
				clear:both;
				margin-bottom:10px;
				
			}
			.nlist_title{
				height:45px;
				line-height:45px;
				color:#222;
				border:1px solid #d9d9d9;
				border-top:2px solid #328cc9;
				
			}
			.nlist_title li	a{
				color:#222;
				font-size:18px;
				}
			.nlist_title li{
				float:left;
				color:#fff;
				font-size:14px;
				padding:0px 18px;
				height:45px;
				line-height:45px;
				margin-top:0px;
				margin:0x;
				
			}
			
		
			.nlist_title li.on{
				background:#fff;
				color:#328cc9;
				position:relative;
				border-bottom:2px solid #328cc9;
				
				height:44px;
				line-height:44px;
			}
			
			.nlist_title li.on a{background:#fff;
				color:#328cc9;
			}
			.nlist_item{
				width:650px;
				margin:5px 0px 10px 0px;
			}
			.nlist_item ul{
				float:left;
				width:320px;
				line-height:27px;
				overflow:hidden;
			}
			
			.nlist_item ul li{
				overflow:hidden;
				height:27px;
				white-space:nowrap;overflow:hidden;text-overflow:ellipsis;
			}
			.nlist_item ul li a{
				font-size:14px;
			}
			.list-line:hover{background:#f8f8f8}
		 </style>
		<div class="nlist_box">
				<ul class="nlist_title">
				<li class="on"><a href="/article/<?php echo $_GET['cid'];?>.html" target="_blank">最新</a></li><?php
unset($row);
unset($db);
$db = db('class');
 $row = $db->where(array('grop'=>$_DDCMS['classinfo']['id']))->limit(7)->select();
foreach($row as $vo){
?>
			<li><a href="/article/<?php echo $vo['id'];?>.html"><?php echo $vo['title'];?></a></li>
	<?php }; ?></ul>
				
				<div class="list-news">
				<?php $pageType='page';$db_a678e684b32803692aed5f288d040409 = db('article');$db_a678e684b32803692aed5f288d040409_vo = $db_a678e684b32803692aed5f288d040409->f('*')->where('grop in(SELECT id FROM `'.dbstr('class').'` WHERE grop = '.$_GET['cid'].')')->order('id DESC')->fpage($_GET[$pageType],'30')->select();foreach($db_a678e684b32803692aed5f288d040409_vo as $vo){/*注释隔开{和$防止解析引擎错误识别*/
$get_url = 'index.php?cid='.$vo['grop'].'&a=view&id='.$vo['id'] ;$page_url = '/article/'.$_GET['cid'].'.html?m='.$_GET['m'].'&a='.$_GET['a'].'&id='.$_GET['id'].'&';$nums = $db_a678e684b32803692aed5f288d040409->getnums();$pageHtml = Page::html($nums, '30', $page_url, $pageType, 10, $s = 7);?>
				
				<div class="list-line">
				<div class="tit"><a href="/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank"><?php echo mb_substr($vo['title'],0,30,'utf8');?></a></div>
				<?php if($vo['pic'] != null){;?><div class="thumb"><a href="/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank"><img src="/file/upload/article/thumb/<?php echo $vo['pic'];?>"></a></div><?php }; ?>
				<div class="list-right">
				<a href="/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank"><div class="con"><?php echo mb_substr($vo['sub'],0,60,'utf8');?>...</div></a>
				</div>
				<div class="list-bottom">
					<div class="list-bottom-left">
						<?php echo timeStr($vo['time']);?>&nbsp;|&nbsp;阅读:<?php echo $vo['visits'];?>次
					</div>
				</div>
				</div>
				<?php unset($get_url);}unset($db_a678e684b32803692aed5f288d040409);?>
				</div>
					<?php echo $pageHtml;?>
			</div>
			</div>
			
		<div class="a-list-right">
		<script src="http://js.yzces.com/page/s.php?s=357&w=300&h=250"></script>
		<!--相关推荐-->
		<div class="a-content">
		<div class="right_title">
			<span>推荐阅读</span>
		</div>
			<ul class="tuijian">
			<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where(array('top'=>'1'))->order('top_time DESC')->limit(10)->select();
foreach($row as $vo){
?>
				<li><a href="/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html">·&nbsp;<?php echo $vo['title'];?></a></li>
			<?php }; ?>
			</ul>
		</div>
		<!--推荐结束-->
		
		<!--相关推荐-->
		<div class="a-content">
		<div class="right_title">
			<span>文章滚动</span>
		</div>
			<ul class="tuijian">
			<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where()->order('id DESC')->limit(10)->select();
foreach($row as $vo){
?>
				<li><a href="/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html">·&nbsp;<?php echo $vo['title'];?></a></li>
			<?php }; ?>
			</ul>
		</div>
		<!--推荐结束-->
		</div>
</div>
<!--栏目结束-->
<?php template('public_html/footer',$this->vars); ?>