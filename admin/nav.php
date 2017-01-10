<header class="main-header">
<nav class="navbar navbar-static-top">
<div class="container">
	<div class="navbar-header">
		<a class="navbar-brand">
		<b>VpnTool</b>后台</a>
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
		<i class="fa fa-bars"></i>
		</button>
	</div>
	<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="dropdown">
			<a href="index.php">首页
			<span class="sr-only">(current)</span></a>
			</li>
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">帐号管理 <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="userlist.php">帐号列表</a></li>
				<li><a href="useradd.php">添加帐号</a></li>
				<li><a href="online.php">在线用户</a></li>
			</ul>
			</li>
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">卡密管理 <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="kalist.php">卡密列表</a></li>
				<li><a href="kalistse.php">搜索卡密</a></li>
			</ul>
			</li>
			<!--<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">代理管理 <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="daili.php">用户管理</a></li>
				<li><a href="dlconfig.php">页面管理</a></li>
				<li><a href="dlkm.php">卡密管理</a></li>
			</ul>
			</li>-->

			<li class="dropdown">
			<a href="serverlist.php">服务器管理
			<span class="sr-only">(current)</span></a>
			</li>
		</ul>
	</div>
	
		<div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">管理员</span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    爱你一万年
                    <small>1996-NNNN</small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="adming.php" class="btn btn-default btn-flat">修改密码</a>
                  </div>
                  <div class="pull-right">
                    <a href="login.php?action=logout" onclick="if(!confirm('你确定要注销本次登录吗？')){return false;}" class="btn btn-default btn-flat">注销</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        
</div>
</nav>
</header>
