<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
/**
 * 代理管理
**/
$mod='blank';
include("../api.inc.php");
$title='代理页面管理';
include './head.php';
$rs=$DB->get_row("SELECT * FROM auth_config");
$regok=$rs['regok'];
$activeok=$rs['activeok'];
$dl0=$rs['dl0'];
$dl1=$rs['dl1'];
$dl2=$rs['dl2'];
$dl3=$rs['dl3'];
$dl4=$rs['dl4'];
$dl5=$rs['dl5'];
$dls0=$rs['dls0'];
$dls1=$rs['dls1'];
$dls2=$rs['dls2'];
$dls3=$rs['dls3'];
$dls4=$rs['dls4'];
$dls5=$rs['dls5'];
$gongg=$rs['gg'];
$gonggs=$rs['ggs'];
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php

$my=$_POST['my'];
if($my=='config'){
echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">代理页面设置</h3></div>
<div class="panel-body box">';
$ak=$_POST['ak'];
$rk=$_POST['rk'];
$dl00=$_POST['dl0'];
$dl01=$_POST['dl1'];
$dl02=$_POST['dl2'];
$dl03=$_POST['dl3'];
$dl04=$_POST['dl4'];
$dl05=$_POST['dl5'];
$dls00=$_POST['dls0'];
$dls01=$_POST['dls1'];
$dls02=$_POST['dls2'];
$dls03=$_POST['dls3'];
$dls04=$_POST['dls4'];
$dls05=$_POST['dls5'];
$gg=daddslashes($_POST['gongg']);
$ggs=daddslashes($_POST['gonggs']);
$sql=$DB->query("update `auth_config` set  `gg`='$gg',`ggs`='$ggs',`activeok`='$ak',`regok`='$rk',`dl1`='$dl01',`dl2`='$dl02',`dl3`='$dl03',`dl4`='$dl04',`dl5`='$dl05',`dl0`='$dl00',`dls1`='$dls01',`dls2`='$dls02',`dls3`='$dls03',`dls4`='$dls04',`dls5`='$dls05',`dls0`='$dls00' where 1");
	
if($sql){echo '保存成功！';}
else{echo '保存失败！';}
echo '<hr/><a href="./dlconfig.php">>>返回代理页面设置</a></div></div>';
exit;
}

 ?>
      <div class="panel panel-primary">
            <div class="form-group">
            	<input type="hidden" name="my" value="config"/>
              <label class="col-sm-2 control-label">用户公告</label><br>
			<div class="col-sm-10"><textarea class="form-control" name="gonggs" rows="30" cols="50" required><?php echo $gonggs;?></textarea></div>
            </div> 
        <table class="table table-striped">
</table>
        </div>
      </div>
    </div>
  </div>
