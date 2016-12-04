<?php @eval("//Encode by  phpjiami.com,Free user."); ?>  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">导航按钮</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">代理中心</a>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="<?php echo checkIfActive('index,')?>">
            <a href="./"><span class="glyphicon glyphicon-user"></span> 代理首页</a>
          </li>
          <li class="<?php echo checkIfActive('qqlist')?>">
            <a href="./qqlist.php"><span class="glyphicon glyphicon-user"></span> 用户查看</a>
          </li>
		  <li class="<?php echo checkIfActive('kmlist,search')?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cloud"></span> 卡密管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="./kmlist.php">卡密列表</a></li>
			  <li><a href="./search.php">搜索卡密</a></li>
            </ul>
          </li>
          <!--li class="<?php echo checkIfActive('pay,mypay')?>">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> 在线商城<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="./pay.php">在线购买</a></li>
			  <li><a href="./mypay.php">我的订单</a><li>
            </ul>
          </li-->
		  <li><a href="./login.php?logout"><span class="glyphicon glyphicon-log-out"></span> 退出登陆</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
  <div class="container" style="padding-top:70px;">
