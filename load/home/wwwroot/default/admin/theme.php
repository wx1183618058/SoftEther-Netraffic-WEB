<style>
.theme{
height:80px;
line-height:80px;
text-align:center;
font-size:25px;
font-weight:bolder;
}
</style>
<div class="alert alert-warning" style="display:none">
    <a href="#" class="close" data-dismiss="alert">
        &times;
    </a>
    <div class="tip"></div>
</div>
<div class="main">
	<div class="theme" data="ZGVmYXVsdF90aGVtZQ==">
		个性活力
	</div>
	<div class="theme" data="dGhlbWVfMg==">
		经典蓝色
	</div>
	<div class="theme" data="dGhlbWVfMw==">
		暗夜梦雅
	</div>
</div>
<script>
	$(".theme").click(function(){
		var theme_selected = $(this).attr("data");
		window.myObj.writeFile('theme.txt',theme_selected,''); 
		
	});
	
				
		
	function cli_sendData(status,type,msg){
		if(type == 'file_w'){
			if(status == 'success'){
				$('.tip').html("应用主题成功！重启APP生效！");
				$(".alert").show();
			}else{
				$('.tip').html("写入文件失败");
				$(".alert").show();
			}
		}
	}
	</script>	 