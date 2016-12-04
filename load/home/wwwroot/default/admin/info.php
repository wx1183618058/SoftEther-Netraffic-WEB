<link href="public/css/jquery.circliful.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="public/js/jquery.circliful.min.js"></script>
<div class="" >
<center>
<div id="myStat2" data-dimension="250" data-text="<?php echo round($_sy,1)?>%" data-info="流量剩余<?php echo round($sy['n'],2).$sy['p']?>" data-width="30" data-fontsize="38" data-percent="<?php echo round($_sy,1)?>" data-fgcolor="#61a9dc" data-bgcolor="#ccc"></div>
</center>
</div>
<div class="line"></div>
到期时间:<?php echo date('Y/m/d',$uinfo['endtime']) ?>
<div class="line"></div>
<script>
$(function(){
	$('#myStat2').circliful();
});
</script>