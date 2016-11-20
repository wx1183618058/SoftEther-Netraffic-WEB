<?php
$tk = explode("_",$_GET['app_key']);
if($tk[1] == ""){
	$qq_list = file_get_contents("data/default.txt");
}else{
	$qq_list = file_get_contents("data/daili_".$tk[1].".txt");
}
$qq = explode("\n",$qq_list);
?>
<link rel="stylesheet" href="/Core/KE/plugins/code/prettify.css"/>
<div class="main">
	<div class="panel panel-default">
   <div class="panel-body">
       <?php 
	   if($tk[1] == ""){
		echo html_decode(file_get_contents("data/content.txt"));
	}else{
		echo html_decode(file_get_contents("data/daili_".$tk[1]."_content.txt"));
	}
	   
	   ?>
	   <br>
	   
	   <br>
	 
	 <?php
		foreach($qq as $number){
			$explode = explode("|",$number);
			if(trim($explode[0]) == ""){
				
			}else{
				echo '<a href="mqqwpa://im/chat?chat_type=wpa&uin='.$explode[0].'&version=1&src_type=web&web_src=oicqzone.com" style="margin-top:10px;"><img src="images/qq.png" style="width:20px;float:left;">'.$explode[1].'</a><br><br>';
			}
		}
	 ?>
	 
   </div>
</div>
</div>
