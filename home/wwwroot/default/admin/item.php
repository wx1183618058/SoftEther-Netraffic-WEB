<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
$mod='blank';
include("../api.inc.php");
$title='搜索账号';
include './head.php';
if($islogin2==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php if(isset($_GET['user'])){
$user=$_GET['user'];
$row=$DB->get_row("SELECT * FROM `openvpn` WHERE iuser='$user' limit 1");
if(!$row){
	showmsg('没有此账号！');exit;
}
?>
	<div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">账号信息</h3></div>
        <div class="panel-body">
          <ul class="list-group">
		  <li class="list-group-item">账号：<?=$row['iuser']?></li>
		  <li class="list-group-item">密码：<?=$row['pass']?></li>
		  <li class="list-group-item">状态：<?=($row['i']?'开通':'禁用')?></li>
		  <li class="list-group-item">发送：<?=round($row['isent']/1024/1024)?>M</li>
		  <li class="list-group-item">接收：<?=round($row['irecv']/1024/1024)?>M</li>
		  <li class="list-group-item">总量：<?=round($row['maxll']/1024/1024)?>M</li>
		  <li class="list-group-item">开通日期：<?=date("Y-m-d",$row['starttime'])?></li>
		  <li class="list-group-item">到期日期：<?=date("Y-m-d",$row['endtime'])?></li>
		</ul>
        </div>
      </div>
<?php }else{?>
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">搜索账号</h3></div>
        <div class="panel-body">
          <form action="./qqlist.php" method="get" class="form-inline" role="form">
            <div class="form-group">
              <label>账号</label>
              <input type="text" name="user" value="" class="form-control" required/>
            </div>
            <input type="submit" value="查询" class="btn btn-primary form-control"/>
          </form>
        </div>
      </div>
<?php }?>
    </div>
  </div>