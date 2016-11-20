<?php @eval("//Encode by  phpjiami.com,Free user."); ?><?php
/**
 * 搜索授权
**/
$mod='blank';
include("../api.inc.php");
$title='搜索卡密';
include './head.php';
$dlid=$_SESSION['dlid'];
if($dlid<>""){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
include './nav.php';
?>
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">搜索卡密</h3></div>
        <div class="panel-body">
          <form action="./kmlist.php" method="get" class="form-inline" role="form">
            <div class="form-group">
              <label>类别</label>
              <select name="type" class="form-control">
                <option value="1">卡密</option>
                <option value="2">账号</option>
              </select>
            </div>
            <div class="form-group">
              <label>内容</label>
              <input type="text" name="kw" value="" class="form-control" required/>
            </div>
            <input type="submit" value="查询" class="btn btn-primary form-control"/>
          </form>
        </div>
      </div>
    </div>
  </div>