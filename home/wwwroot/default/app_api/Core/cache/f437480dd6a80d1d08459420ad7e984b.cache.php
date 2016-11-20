<?php if(!defined('INCLUDE_PATH')){die('error!this is a cache file!');};?><?php template('public_html/head',$this->vars); ?>
<style type="text/css">
img{border:0;}
.action-bar{height:40px;background:#efefef;margin:10px 0px}
.action-bar a{float:left;height:26px;line-height:26px;padding:0px 5px;font-size:15px; margin-top:7px;margin-left:10px;}
.action-bar a:hover{background:#328cc9;color:#fff;}
.icon{
    display: inline-block;
    position: relative;
    overflow: hidden;
    background: url(/style/images/icon.png) no-repeat;
}
.action-bar .icon{
	position: relative;
    width: 20px;
    height: 20px;
	left:0px;
	top:3px;
	margin-right:3px;
	float:left;
}
.i-2{
	background-position: -20px 0;
}
.i-3{
	background-position: -40px 0;
    top: 2px;
}
.i-4{
	background-position: -60px 0;
}
</style>

<!--正文开始前快捷操作栏-->
<div class="main-bgc">
<div class="index-content">
	<div class="action-bar">
	<a href="#"><li class="icon i-1"></li>投稿</a>
	<a href="<?php echo INDEX_DOMAIN;?>/index.php?m=Rolling"><li class="icon i-2"></li>滚动</a>
	<a href="<?php echo INDEX_DOMAIN;?>/index.php?m=Rolling&a=original"><li class="icon i-3"></li>原创</a>
	<a href="#"><li class="icon i-4"></li>建议</a>
	</div>
</div>
<!--快捷操作结束第一区域开始-->
<div class="index-content">
      <div class="content_right">
		<div class="new_box">
			<div class="new_box_l new_box_in">
				
				<ul class="new_box_title">
					<li class="on"><a href="javascript:void(0)" target="_blank">推荐</a></li>
				</ul>
				<ul class="new_box_list">
					 <?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where(array('top'=>1))->order('top_time DESC')->limit(6)->select();
foreach($row as $vo){
?>
						<li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
					<?php }; ?>
				</ul>
				<ul class="new_box_title">
					<li class="on"><a href="<?php echo INDEX_DOMAIN;?>/article/22.html" target="_blank">人物</a></li>
				</ul>
				<ul class="new_box_list">
					 <?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where(array('grop'=>22))->order('id DESC')->limit(6)->select();
foreach($row as $vo){
?>
						<li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
					<?php }; ?>
				</ul>
			</div>
			<div class="new_box_r new_box_in">
				<ul class="new_box_title">
					<li class="on"><a href="<?php echo INDEX_DOMAIN;?>/index.php?m=Rolling" target="_blank">滚动</a></li>
					<!--<li><a href="<?php echo INDEX_DOMAIN;?>/index.php?m=Rolling&a=original" target="_blank">原创</a></li>-->
				</ul>
				<ul class="new_box_list">
					<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where('')->order('id DESC')->limit(14)->select();
foreach($row as $vo){
?>
						<li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
					<?php }; ?>
				</ul>
			</div>
		</div>
		</div>
		<div class="content_left">
			<script src="http://js.yzces.com/page/s.php?s=357&w=240&h=200"></script>
			<div class="jktt" style="margin-top:5px">
               <div class="right-tit"><a href="<?php echo INDEX_DOMAIN;?>/index.php?m=Rolling&a=original">IT社区原创</a></div>
               <div class="list">
                  <ul>
				<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where(array('original'=>1))->order('id DESC')->limit(6)->select();
foreach($row as $vo){
?>
                      <li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" title="<?php echo $vo['title'];?>" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
				<?php }; ?>
                  </ul>
				  <div class="clear"></div>
               </div><!--list end-->
            </div><!--jktt end-->
		</div>
</div>
<!--第一区域结束 第二区域开始-->
<div class="index-content">
	<div class="content_right">
		<div class="new_box">
			<div class="new_box_l new_box_in">
				<ul class="new_box_title">
					<li class="on"><a href="<?php echo INDEX_DOMAIN;?>/article/17.html" target="_blank">资讯</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/19.html" target="_blank">业界</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/20.html" target="_blank">网络</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/21.html" target="_blank">评论</a></li>
				</ul>
				<ul class="new_box_list">
					<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where('grop in(19,20,21,22,23,24,25,26,27,28,29)')->order('id DESC')->limit(12)->select();
foreach($row as $vo){
?>
						<li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
					<?php }; ?>
				</ul>
			</div>
			<div class="new_box_r new_box_in">
				<ul class="new_box_title">
					<li class="on"><a href="<?php echo INDEX_DOMAIN;?>/article/68.html" target="_blank">电商</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/76.html" target="_blank">要闻</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/77.html" target="_blank">分析</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/78.html" target="_blank">淘客</a></li><li class="last"><a href="<?php echo INDEX_DOMAIN;?>/article/79.html" target="_blank">微商</a></li>
				</ul>
				<ul class="new_box_list">
						<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where('grop in(76,77,78,79)')->order('id DESC')->limit(12)->select();
foreach($row as $vo){
?>
						<li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
					<?php }; ?>
				</ul>
			</div>
		</div>
		<a href="<?php echo INDEX_DOMAIN;?>/article/13.html">
			<img src="/file/images/android_banner.jpg" alt="安卓开发"/>
		</a>
		<div class="new_box">
			<div class="new_box_l new_box_in">
				<ul class="new_box_title">
					<li class="on"><a href="<?php echo INDEX_DOMAIN;?>/article/65.html" target="_blank">建站</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/83.html" target="_blank">经验</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/84.html" target="_blank">SEO</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/85.html" target="_blank">策划</a></li>
				</ul>
				<ul class="new_box_list">
					<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where('grop in(83,84,85)')->order('id DESC')->limit(12)->select();
foreach($row as $vo){
?>
						<li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
					<?php }; ?>
				</ul>
			</div>
			<div class="new_box_r new_box_in">
				<ul class="new_box_title">
					<li class="on"><a href="<?php echo INDEX_DOMAIN;?>/article/67.html" target="_blank">创业</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/70.html" target="_blank">点评</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/71.html" target="_blank">经验</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/72.html" target="_blank">App</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/73.html" target="_blank">模式</a></li>
				</ul>
				<ul class="new_box_list">
					<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where('grop in(70,71,72,73,74,75)')->order('id DESC')->limit(12)->select();
foreach($row as $vo){
?>
						<li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
					<?php }; ?>
				</ul>
			</div>
		</div>
		<div class="new_box">
			<div class="new_box_l new_box_in">
				<ul class="new_box_title">
					<li class="on"><a href="<?php echo INDEX_DOMAIN;?>/article/1.html">编程</a></li>
					<li><a href="<?php echo INDEX_DOMAIN;?>/article/9.html">PHP</a></li>
					<li><a href="<?php echo INDEX_DOMAIN;?>/article/82.html">前端</a></li>
					<li><a href="<?php echo INDEX_DOMAIN;?>/article/13.html">安卓</a></li>
				</ul>
				<ul class="new_box_list">
					<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where('grop in(9,10,11,12,13,94,95,96,97,98,99,100)')->order('id DESC')->limit(12)->select();
foreach($row as $vo){
?>
						<li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
					<?php }; ?>
				</ul>
			</div>
			<div class="new_box_r new_box_in">
				<ul class="new_box_title">
					<li class="on"><a href="<?php echo INDEX_DOMAIN;?>/article/30.html">软件</a></li>
					<li><a href="<?php echo INDEX_DOMAIN;?>/article/31.html">网页</a></li>
					<li><a href="<?php echo INDEX_DOMAIN;?>/article/32.html">设计</a></li>
					<li><a href="<?php echo INDEX_DOMAIN;?>/article/34.html">视频特效</a></li>
				</ul>
				<ul class="new_box_list">
					<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where('grop in(31,32,33,34,35,36,37,38,39,40)')->order('id DESC')->limit(12)->select();
foreach($row as $vo){
?>
						<li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
					<?php }; ?>
				</ul>
			</div>
		</div>
		<div class="new_box">
			<div class="new_box_l new_box_in">
				<ul class="new_box_title">
					<li class="on"><a href="<?php echo INDEX_DOMAIN;?>/article/66.html" target="_blank">运营</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/80.html" target="_blank">产品</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/81.html" target="_blank">交互</a></li><li class="last"><a href="<?php echo INDEX_DOMAIN;?>/article/82.html" target="_blank">推广</a></li></ul>
				</ul>
				<ul class="new_box_list">
					<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where('grop in(80,81,82)')->order('id DESC')->limit(12)->select();
foreach($row as $vo){
?>
						<li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
					<?php }; ?>
				</ul>
			</div>
			<div class="new_box_r new_box_in">
				<ul class="new_box_title">
					<li class="on"><a href="<?php echo INDEX_DOMAIN;?>/article/86.html" target="_blank">移动</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/87.html" target="_blank">通信</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/88.html" target="_blank">数码</a></li><li><a href="<?php echo INDEX_DOMAIN;?>/article/89.html" target="_blank">应用</a></li><li class="last"><a href="<?php echo INDEX_DOMAIN;?>/article/90.html" target="_blank">评测</a></li>
				</ul>
				<ul class="new_box_list">
					<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where('grop in(87,88,89,90)')->order('id DESC')->limit(12)->select();
foreach($row as $vo){
?>
						<li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
					<?php }; ?>
				</ul>
			</div>
		</div>
		
		 
		 </div><!--content_right end-->
   
   
   <div class="content_left">
			<div class="jktt">
               <div class="right-tit"><a href="<?php echo INDEX_DOMAIN;?>/article/44.html">推荐阅读</a></div>
               <div class="list">
                  <ul>
				<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where(array('top'=>1))->order('id DESC')->limit(12)->select();
foreach($row as $vo){
?>
                      <li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" title="<?php echo $vo['title'];?>" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
				<?php }; ?>
                  </ul>
				  <div class="clear"></div>
               </div><!--list end-->
            </div><!--jktt end-->
			<div class="jktt">
               <div class="right-tit"><a href="#">猜你喜欢</a></div>
               <div class="list">
                  <ul>
				<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where()->order('visits DESC')->limit(12)->select();
foreach($row as $vo){
?>
                      <li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" title="<?php echo $vo['title'];?>" target="_blank" title="<?php echo $vo['title'];?>"><?php echo $vo['title'];?></a></li>
				<?php }; ?>
                  </ul>
				  <div class="clear"></div>
               </div><!--list end-->
            </div><!--jktt end-->
			<div class="jktt">
               <div class="right-tit"><a href="<?php echo INDEX_DOMAIN;?>/article/44.html">操作系统</a></div>
               <div class="list">
                  <ul>
				<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where('grop in(101,102,103,104,105,106,107,108,109,110)')->order('id DESC')->limit(10)->select();
foreach($row as $vo){
?>
                      <li><a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $vo['grop'];?>/<?php echo $vo['id'];?>.html" title="<?php echo $vo['title'];?>" target="_blank">·&nbsp;<?php echo $vo['title'];?></a></li>
				<?php }; ?>
                  </ul>
				  <div class="clear"></div>
               </div><!--list end-->
            </div><!--jktt end-->
			<div class="jktt">
               <div class="right-tit">博文日志</div>
               <div class="list">
                  <ul>
				<?php
unset($row);
unset($db);
$db = db('blog');
 $row = $db->where()->order('id DESC')->limit(20)->select();
foreach($row as $vo){
?>
                      <li><a href="/index.php?m=Blog&c=Index&a=view&id=<?php echo $vo['id'];?>" title="<?php echo $vo['title'];?>" target="_blank">·&nbsp;<?php echo $vo['title'];?></a></li>
				<?php }; ?>
                  </ul>
				  <div class="clear"></div>
               </div><!--list end-->
            </div><!--jktt end-->
			<div class="jktt">
               <div class="right-tit">优质推荐</div>
               <div class="list">
                  <ul>
                      <li><a href="http://tz.yzces.com/iclk/?s=ODIzNjA5fGh0dHA6Ly9kaW5nZC5jbi9pbmRleC5odG1sfGh0dHA6Ly9kaW5nZC5jbi9hcnRpY2xlLzIzLzk5MDQuaHRtbHx8fHx8fHx8MjMxMXwxNDU3MDcxNDM4fDExMS4yMjUuMTI0LjE5OHw1NXxjcGN8N3wxNzg2fDk0fDM1N3w1Mjc=;7d6a644e81bba0b42c812ae92e87b802;http%3A%2F%2Fitem.taobao.com%2Fitem.htm%3Fspm%3D686.1000925.0.0.SbCht4%26id%3D525964448158;ck;1;95;75;41;81;40;1021&a=20.0.0;1366x768;http%3A//dingd.cn/index.html;" title="<?php echo $vo['title'];?>" target="_blank">杨幂同款加绒外套被瞬间抢完</a></li>
					  <li><a href="http://mao.dingd.cn" target="_blank">最新最全BT种子电影下载 就在BT猫</a></li>
                  </ul>
				  <div class="clear"></div>
               </div><!--list end-->
            </div><!--jktt end-->
         
         
      
      <div class="clear"></div><!--清除浮动-->
     
   </div><!--content_left end-->

   <div class="clear"></div><!--清除浮动-->
   <style>
   .footer-link{
	border:1px solid #ccc;
	background:#efefef;
	height:30px;
	line-height:30px;
	padding-left:10px;
   }
    .footer-link li{
		float:left;margin-right:10px;
	}
   </style>
   <div class="footer-link">
		<ul>
			<li><a href="http://91tubao.com/" target="_blank">怡宝商城</a></li>
			<li><a href="http://team.dingd.cn" target="_blank">筑梦网络科技</a></li>
			<li><a href="http://mao.dingd.cn" target="_blank">BT猫</a></li>
			<li><a href="http://zone.dingd.cn" target="_blank">IT社区</a></li>
   </div><!--link end-->
</div><!--content end-->
<!--调查-->
<div class="diaocha">
	<div class="diaocha-title">
	</div>
</div>
<!--main bg end--->
</div>
<!---->
<?php template('public_html/footer',$this->vars); ?>