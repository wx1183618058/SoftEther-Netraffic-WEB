<?php
	$line_grop = db('line_grop')->where(array('show'=>'1'))->order('id ASC')->select();
	?>
<link rel="stylesheet" type="text/css" href="./css/style.css?r" />
<script type="text/javascript" src="./js/zepto.min.js"></script>
<script type="text/javascript" src="./js/touchslider.js"></script>
<ul id="pagenavi" class="page">
		<?php
		$i = 1;
		foreach($line_grop as $vo){
			$p = $i == 1 ? 'active' :'';
			$i++;
			?>
		<li><a href="#" class="<?php echo $p?>"><?php echo $vo['name']?></a></li>
		<?php }?>
     
 </ul>
    <div id="slider" class="swipe">
      <ul class="box01_list">
       <?php foreach($line_grop as $vo){?>
				<li class="li_list">
				<!---->
					<div class="main">
					<ul class="list-group">
					<?php 
						$line = db('line')->where(array('show'=>'1','group'=>$vo['id']))->order('id DESC')->select();
						if($line){
							foreach($line as $vos){?>
							<li class="list-group-item"><b><?php echo $vos['name']?></b>&nbsp;<span class="badge"><?php echo $vos['type']?></span><br><p><?php echo $vos['label']?></p><button type="button" class="btn btn-primary btn-sm" onclick="addLine('<?php echo $vos['id']?>')">安装</button></li>
						<?php }
						}else{
						?>
						<div class="alert alert-info">很遗憾匹配不到相关线路哦！再等一等吧~~~</div>
						<?php
						}
						?>
					</ul>
					<div style="clear:both"></div>
					</div>
					</li>
				<?php }?>
				
			
		<!---->
      </ul>
</div>

<script type="text/javascript">
	var page='pagenavi';
	var mslide='slider';
	var mtitle='emtitle';
	arrdiv = 'arrdiv';

	var as=document.getElementById(page).getElementsByTagName('a');

	var tt=new TouchSlider({id:mslide,'auto':'-1',fx:'ease-out',direction:'left',speed:600,timeout:5000,'before':function(index){
		var as=document.getElementById(this.page).getElementsByTagName('a');
		as[this.p].className='';
		as[index].className='active';
		this.p=index;
		var txt=as[index].innerText;
		$("#"+this.page).parent().find('.emtitle').text(txt);
		var txturl=as[index].getAttribute('href');		
		var turl=txturl.split('#');
		$("#"+this.page).parent().find('.go_btn').attr('href',turl[1]);
	}});

	tt.page = page;
	tt.p = 0;
	//console.dir(tt); console.dir(tt.__proto__);
	for(var i=0;i<as.length;i++){
		(function(){
			var j=i;
			as[j].tt = tt;
			as[j].onclick=function(){
				this.tt.slide(j);
				return false;
			}
		})();
	}
</script>

<script>
	var name_tmp = "";
	function addLine(id){
		$.post(
			'getLine.php',
			{
				'id':id,
				'key':'<?php echo $_GET["app_key"] ?>',
				'username':'<?php echo $_GET["username"] ?>',
				'password':'<?php echo $_GET["password"] ?>'
			},function(data){
				if(data.status == 'success'){
					//window.myObj.writeFile('test.ovpn','<?php echo base64_encode(file_get_contents('1.ovpn'))?>','download');
					name_tmp = data.name;
					window.myObj.writeFile(data.name+'.ovpn',data.content,'download'); 
				}else{
					alert(data.msg);
				}
			},"JSON");
		  
	}
	function cli_sendData(status,type,msg){
		if(type == 'file_w'){
			if(status == 'success'){
				window.myObj.installPro('download/'+name_tmp+'.ovpn');
			}else{
				$('.tip').html("写入文件失败");
			}
		}
	}
	</script>	