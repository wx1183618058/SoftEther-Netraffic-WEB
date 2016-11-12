  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">导航按钮</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">管理中心</a>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="<?php echo checkIfActive('index,')?>">
            <a href="./"><span class="glyphicon glyphicon-home"></span> 平台首页</a>
          </li>
          <!--li class="<?php echo checkIfActive('log')?>">
            <a href="./log.php"><span class="glyphicon glyphicon-book"></span> 操作记录</a>
          </li-->
		  <!--li class="<?php echo checkIfActive('fwqlist,online,addfwq')?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-globe"></span> 服务器管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="./addfwq.php">添加服务器</a></li>
              <li><a href="./fwqlist.php">服务器列表</a></li>
            </ul>
          </li-->
		  <li class="<?php echo checkIfActive('down,addqq,qqlist,black')?>">
            <a href="./qqlist.php"><span class="glyphicon glyphicon-globe"></span> 账号管理</b></a>
            <ul class="dropdown-menu">
              <!--li><a href="./down.php">列表下载</a></li-->
              <!--li><a href="./addqq.php">添加账号</a></li-->
              <!--li><a href="./qqlist.php">账号列表</a></li-->
			  <!--li><a href="./black.php">加黑账号</a></li-->
            </ul>
          </li>
		  <!--li class="<?php echo checkIfActive('kmlist,search')?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cloud"></span> 卡密管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="./kmlist.php">卡密列表</a></li>
			  <li><a href="./search.php">搜索卡密</a></li>
            </ul>
          </li-->
		  <li class="<?php echo checkIfActive('daili,dlconfig,dlkm')?>">
            <a href="./dlconfig.php"><span class="glyphicon glyphicon-book"></span> 用户公告</a>
          </li>
          <!--li class="<?php echo checkIfActive('payset,shop,kucun,tlist')?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> 即时到账<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="./payset.php">信息配置</a></li>
			  <li><a href="./shop.php">商品管理</a></li>
			  <li><a href="./kucun.php">库存管理</a></li>
              <li><a href="./tlist.php">交易列表</a></li>
            </ul>
          </li-->
		  <li><a href="./login.php?logout"><span class="glyphicon glyphicon-log-out"></span> 退出登陆</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
  <div class="container" style="padding-top:70px;">