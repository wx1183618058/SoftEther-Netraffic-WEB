<?php
function checkIfActive($string) {
	$array=explode(',',$string);
	$php_self=substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
	$php_self=str_replace('.php','',$php_self);
	if (in_array($php_self,$array)){
		return 'active';
	}else
		return null;
}
?>
<?php
	if(!is_mobile_request()){
?>
<table style="width:100%;height:100%;padding:0px;margin:0px;" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td style="height:70px;" >
		<div class="header-logo" >
		<img src="images/logo.png" style="margin-left:10px">
			<div style="float:right">
				<a type="button" class="btn btn-success" href="/admin/list_line.php">线路管理</a>&nbsp;
				
			</div>
		</div>
		</td>
	</tr>
	<tr>
		<td>
<table style="width:100%;height:100%;" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td height="10">
	</td>
	</tr>
	<tr>
		<td style="width:200px;">
<aside class="main-sidebar">
<section class="sidebar">
	<ul class="sidebar-menu">
	  <li class="<?php echo checkIfActive('admin,')?>" >
		<a href="admin.php">
		  <i class="fa fa-dashboard"></i> <span>APP控制台</span> <i class="fa fa-angle-left pull-right"></i>
		</a>
		
	  </li>
	  <!--<li class="treeview <?php echo checkIfActive('fwqlist,addfwq')?>">
		<a href="#">
		  <i class="fa fa-files-o"></i>
		  <span>服务器管理</span>
		  
		</a>
		<ul class="treeview-menu ">
		  <li><a href="/admin/addfwq.php"><i class="fa fa-circle-o"></i>添加服务器</a></li>
		  <li><a href="/admin/fwqlist.php"><i class="fa fa-circle-o"></i>服务器列表</a></li>
		 
		</ul>
	  </li>
	  <li class="<?php echo checkIfActive('log')?>">
		<a href="/admin/log.php">
		  <i class="fa fa-th"></i> <span>操作记录</span>
		  <small class="label pull-right label-info">new</small>
		</a>
	  </li>
	  <li class="treeview <?php echo checkIfActive('online,online_udp,qset,down,addqq,user_list,black')?>">
		<a href="#">
		  <i class="fa fa-pie-chart"></i>
		  <span>用户管理</span>
		  <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		  <li><a href="/admin/user_list.php"><i class="fa fa-circle-o"></i> 用户列表</a></li>
		  <li><a href="/admin/addqq.php"><i class="fa fa-circle-o"></i> 新增用户</a></li>
		  <li><a href="/admin/online.php"><i class="fa fa-circle-o"></i> 在线用户</a></li>
		  <li><a href="/admin/online.php?t=udp"><i class="fa fa-circle-o"></i> UDP在线</a></li>
		  
		</ul>
	  </li>
	  <li class="treeview <?php echo checkIfActive('kmlist,search')?>" >
		<a href="#">
		  <i class="fa fa-laptop"></i>
		  <span>卡密管理</span>
		  <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		  <li><a href="/admin/kmlist.php"><i class="fa fa-circle-o"></i> 卡密列表</a></li>
		  <li><a href="/admin/search.php"><i class="fa fa-circle-o"></i> 搜索卡密</a></li>
		  
		</ul>
	  </li><!--//服务器-->
	  <!--<li class="treeview  <?php echo checkIfActive('daili,dlconfig,dlkm')?>">
		<a href="#">
		  <i class="fa fa-edit"></i> <span>代理管理</span>
		  <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		  <li><a href="/admin/daili.php"><i class="fa fa-circle-o"></i> 代理用户管理</a></li>
		  <li><a href="/admin/dlconfig.php"><i class="fa fa-circle-o"></i> 代理卡密管理</a></li>
		  <li><a href="/admin/dlkm.php"><i class="fa fa-circle-o"></i> 代理页面管理</a></li>
		</ul>
	  </li><!--//代理-->
	  
	  <li class="treeview <?php echo checkIfActive('qq_admin,count,user,AdminShengji')?>">
		<a href="#">
		  <i class="fa fa-folder"></i> <span>流量卫士</span>
		  <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
    
   
            <li class="<?php echo checkIfActive("qq_admin");  ?>"><a href="qq_admin.php"><i class="fa fa-circle-o"></i> 高级设置</a></li>

            <li class="<?php echo checkIfActive("user");  ?>"><a href="user.php"><i class="fa fa-circle-o"></i> 管理员设置</a></li>
            <li class="<?php echo checkIfActive("count");  ?>"><a href="count.php"><i class="fa fa-circle-o"></i> 使用统计</a></li>
            <li class="<?php echo checkIfActive("AdminShengji");  ?>"><a href="AdminShengji.php"><i class="fa fa-circle-o"></i> 升级推送</a></li>
		</ul>
	  </li>	
	  <li class="treeview <?php echo checkIfActive('add_gg,list_gg')?>">
		<a href="#">
		  <i class="fa fa-folder"></i> <span>公告管理</span>
		  <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
            <li class="<?php echo checkIfActive("add_gg");  ?>"><a href="add_gg.php"><i class="fa fa-circle-o"></i> 发布公告</a></li>
            <li class="<?php echo checkIfActive("list_gg");  ?>"><a href="list_gg.php"><i class="fa fa-circle-o"></i> 公告列表</a></li>
   
    
		</ul>
	  </li>	 

	  <li class="treeview <?php echo checkIfActive('add_line,list_line')?>">
		<a href="#">
		  <i class="fa fa-folder"></i> <span>线路管理</span>
		  <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		    <li class="<?php echo checkIfActive("list_line");  ?>"><a href="list_line.php"><i class="fa fa-circle-o"></i> 线路列表</a></li>
            <li class="<?php echo checkIfActive("add_line");  ?>"><a href="add_line.php"><i class="fa fa-circle-o"></i> 添加线路</a></li>
		</ul>
	  </li>
	  <!--li class="treeview <?php echo checkIfActive('qq_admin_daili')?>">
		<a href="#">
		  <i class="fa fa-folder"></i> <span>代理APP</span>
		  <i class="fa fa-angle-left pull-right"></i>
		</a>
		<ul class="treeview-menu">
		         <li class="<?php echo checkIfActive("qq_admin_daili");  ?>"><a href="qq_admin_daili.php"><i class="fa fa-circle-o"></i> 代理QQ设置</a></li>
		</ul>
	  </li-->
	  <li>
		<a href="/admin/login2.php?logout" onclick="if(!confirm('你确定要注销本次登录吗？')){return false;}">
		  <i class="fa fa-share"></i> <span>退出登录</span>
		  <i class="fa fa-angle-left pull-right"></i>
		</a>
		
	  </li>
	  
	  <!--li class="header">系统信息</li>
	  <li><a href="http://www.dingd.cn" target="_blank"><i class="fa fa-circle-o text-red"></i> <span>开发团队</span></a></li>
	  <li><a href="http://www.dingd.cn" target="_blank"><i class="fa fa-circle-o text-aqua"></i> <span>官方网站</span></a></li-->
	</ul>
  </section>
 </aside>
<script src="/admin/nav_files/sidebar-menu.js"></script>
<script>
$.sidebarMenu($('.sidebar-menu'))
</script>

</td>
<td valign="top">
<style>

</style>
<div class="container" style="padding:0px;margin:0px;width:100%;height:100%;overflow:auto;">
<div style="margin:0px 30px;" class="content-main">
	<?php }else{ ?>
	<!---手机模板部分-->
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#example-navbar-collapse">
            <span class="sr-only">切换导航</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">流量卫士<span class="badge">v2.0</span></a>
    </div>
    <div class="collapse navbar-collapse" id="example-navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="<?php echo checkIfActive("admin");  ?>"><a href="admin.php">环境检查</a></li>
            <li class="<?php echo checkIfActive("add_gg");  ?>"><a href="add_gg.php">发布公告</a></li>
            <li class="<?php echo checkIfActive("list_gg");  ?>"><a href="list_gg.php">公告列表</a></li>
            <li class="<?php echo checkIfActive("list_line");  ?>"><a href="list_line.php">线路列表</a></li>
            <li class="<?php echo checkIfActive("add_line");  ?>"><a href="add_line.php">添加线路</a></li>
            <li class="<?php echo checkIfActive("qq_admin");  ?>"><a href="qq_admin.php">高级设置</a></li>
            <li class="<?php echo checkIfActive("AdminShengji");  ?>"><a href="AdminShengji.php">升级推送</a></li>
            <li class="<?php echo checkIfActive("qq_admin_daili");  ?>"><a href="qq_admin_daili.php">代理QQ设置</a></li>
            <li class="<?php echo checkIfActive("user");  ?>"><a href="user.php">管理员设置</a></li>
            <li class="<?php echo checkIfActive("count");  ?>"><a href="count.php">使用统计</a></li>
            
        </ul>
    </div>
    </div>
</nav><!--//old nav-->
	<?php } ?>