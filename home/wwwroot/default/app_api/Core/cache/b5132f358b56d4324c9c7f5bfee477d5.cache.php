<?php if(!defined('INCLUDE_PATH')){die('error!this is a cache file!');};?><?php template('public_html/page_head',$this->vars); ?>
<link rel="stylesheet" href="/include/KE/plugins/code/prettify.css"/>
<div class="a-main">
	<div class="a-con">
	<div class="a-navBar">
			<?php $nav = navBar($_GET['cid']);;?>
			<a href="{=INDEX_DOMAIN}" title="it之家首页">IT社区首页</a>&nbsp;>&nbsp;<?php unset($i);unset($n);foreach($nav as $vo){ $n = $i%2; ?><a href="/article/<?php echo $vo['id'];?>"><?php echo $vo['title'];?></a>&nbsp;>&nbsp;<?php $i++;}; ?>当前位置
			</div>
	<div class="a-con-tit"><span><?php echo $res['title'];?></span></div>
			<div class="a-con-time"><div class="share" style="float:left">
	<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
			
			</div><div class="a-con-time-right"><?php echo date('Y年m月d日 H:i',$res['time']);?>&nbsp;&nbsp;阅:<?php echo $res['visits'];?>次</div></div>
			
		<div class="a-con-left">
			<div class="a-view">
			<div class="a-con-sub">【导读】<?php echo $res['sub'];?></div>
			<div class="pre">
			<?php echo html_decode($res['content']);?></div>
			<style>
			.good{
				width:100px;height:30px;text-align:center;background:#f8f8f8;border-radius:3px;margin:10px auto;border:1px solid #ccc;
			}
			.good:hover{
				width:100px;height:30px;text-align:center;background:#328cc9;border-radius:3px;margin:10px auto;border:1px solid #ccc;
			}
			.good button{border:none;height:30px;line-height:30px;width:100px;background:none;padding:0px;color:#333;font-size:14px;}
			.good button:hover{color:#fff}
			.original{padding:10px;border:1px solid #efefef;color:red;font-size:12px;background:#f8f8f8;margin-bottom:10px;}
			</style>
			<div class="good goodBtn"><button>喜欢<span class="zanNums"><?php echo $res['good'];?></span></button></div>
			<?php if($res['original'] == '1'){;?>
			<div class="original">
				版权声明：本文为叮咚IT社区原创文章，转载请注明来源并连接至本页！本页地址：<a href="<?php echo INDEX_DOMAIN;?>/article/<?php echo $res['gro'];?>/<?php echo $res['id'];?>.html"><?php echo INDEX_DOMAIN;?>/article/<?php echo $res['gro'];?>/<?php echo $res['id'];?>.html</a>
			</div>
			<?php }; ?>
			<div class="line" style="margin-bottom:5px;"></div>
			如果您喜欢IT之家，IT社区的文章，就赶紧分享给你的小伙伴吧！独乐乐不如众乐乐！
			<div class="line" style="margin-top:5px"></div>
			
			<div class="clear"></div>

			</div>
			<?php $codeurl = base64_encode('index.php?cid='.$_GET['cid'].'&a=view&id='.$_GET['id'].'&page='.$_GET['p']);?>
			<div class="replay">
				<div class="re-tit">
					<i>我有话说...</i>
				</div>
				<div class="textarea">
				<form action="/index.php?cid=<?php echo $_GET['cid'];?>&a=re&id=<?php echo $_GET['id'];?>&backurl=<?php echo $codeurl;?>" method="POST">
				<textarea name="content" placeholder="请输入评论的内容" class="re-content"></textarea>
				<div class="textarea-bottom">
				<?php if($_DDCMS['userinfo']){;?>
				<input value="发表评论" type="submit" class="re-button re-post" >
				<input value="查看评论" type="button" class="re-button re-post" onclick="javascript:window.location.href='index.php?cid=<?php echo $_GET['cid'];?>&a=relist&id=<?php echo $_GET['id'];?>';">
				<?php }else{ ?>
				<input value="登录后发布评论" type="button" class="re-button re-post" >
				<?php }; ?></div>
				</form>
				<div class="clear" style="clear:both"></div>
				</div>
				<div class="line"></div>
				<?php if($relist){;?>
				<?php unset($i);unset($n);foreach($relist as $v){ $n = $i%2; ?>
					<?php $uinfo = U::getinfo($v['userid']);?>
						<table class="re-line" border="0" cellspacing="0" cellpadding="0">
							<tr>
							<td width="70" valign="top">
								<div class="re-head">
									<img src="/file/head/100/<?php echo $uinfo['head'];?>">
								</div>
							</td>
							<td valign="top">
							<div class="re-name">
								<?php echo $uinfo['nickname'];?>
							</div>
							<div class="re-con">
								<?php if(str_length($v['content']) <= 150){;?>
								<div class="pre"><?php echo $v['content'];?></div>
								<?php }else{ ?>
								<div class="pre"><?php echo mb_substr($v['content'],0,150,'utf8');?>...<a href="/index.php?cid=<?php echo $_GET['cid'];?>&a=relist&id=<?php echo $_GET['id'];?>">[more]</a></div>
								<?php }; ?>
							</div>
						</td>
					</tr>
				</table>
				<?php $i++;}; ?>
				<?php }else{ ?>
					<div class="tip">
						暂时还没有人发布评论
					</div>
				<?php }; ?>
				
				
			</div>
		</div>
		
		<div class="a-con-right">
		<!--相关推荐-->
		<div class="a-content" >
<script src="http://js.yzces.com/page/s.php?s=357&w=300&h=250"></script>
		</div>
		<div class="a-content" >
		<div class="right_title">
			<span>相关推荐</span>
		</div>
			<ul class="tuijian ">
			<?php
unset($row);
unset($db);
$db = db('article');
 $row = $db->where("grop='".$_GET['cid']."' AND id in(SELECT id FROM (SELECT id FROM dd_article WHERE grop=".$_GET['cid']." ORDER BY id DESC limit 20) as t) ORDER BY rand()")->limit(10)->select();
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
		<div class="a-content" >
			<a href="/article/56.html" target="_blank"><img src="/file/images/banner.png"></a>
		</div>
			</div>
			<div class="clear"></div>
	</div>
</div>
<script>
$(function(){

	$('.goodBtn').click(
		function(){
			$.post(
				'/index.php?cid=<?php echo $_GET['cid'];?>&a=zan&id=<?php echo $_GET['id'];?>',
				{
					'zan':'zan'
				},
				function(data){
					if(data == '0000'){
						alert('赞失败，请刷新重试');
					}else if(data == '0001'){
						alert('不得重复点赞哦');
					}else{
					//	alert(data);
						$('.zanNums').html(data);
					}
				}
			);
		}
	);
});
</script>
<script>
(function(){
    var bp = document.createElement('script');
    bp.src = '//push.zhanzhang.baidu.com/push.js';
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
<?php template('public_html/footer',$this->vars); ?>