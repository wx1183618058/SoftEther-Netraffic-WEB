<?php
	/*
		module.conf.php 模块注册信息
		所有模块必须再此处注册否则无法访问
		模块标示严格区分大小写
	*/
	$module['content'] = array(
		'文章模型'=>'Article','单页(适用于 关于我们)'=>'Page','单页(适用于 列表首页)'=>'ListPage','自定义单页'=>'NullPage'
	);
	
	$module['realize'] = array(
		'用户管理系统'=>'User','首页系统'=>'index','内信系统'=>'Mess'
	);
	
	$_SERVER['ddcms']['module'] = $module;