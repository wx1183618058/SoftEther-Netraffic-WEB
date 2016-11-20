<?php
/*
*
	使用说明
	* 本配置文件可以用Liunx系统下任意编辑器编辑(Android也是liunx系统)但是请勿使用window记事本直接编写本文件。否则可能会导致APP客户端无法正常识别。
	* 请支持正版软件 正版软件可享有免费更新的权利。
	* 本系统没有内置任何后门 如果BUG欢迎及时反馈
	* 开发者 qq 2207134109 
	* 询问任何问题前 提供您的APP授权码和授权域名(IP)否则一律视为盗版用户
*
*/
	//系统配置文件
	$cfg['host'] = null;
	$cfg['host']['hostname'] = 'localhost';
	$cfg['host']['username'] = 'root';
	$cfg['host']['password'] = '1234';
	$cfg['host']['database'] = 'ov';
	$cfg['host']['charset'] = 'utf8';
	$cfg['host']['ddcms'] = '';
	$cfg['host']['port'] = '';
	
	//请配置用户信息表 通常情况默认即可
	$cfg['host']['user_data'] = 'openvpn';

	//请配置后台登陆用户名
	$cfg['admin']['username'] = 'admin';
	
	//请配置后台登陆密码
	$cfg['admin']['password'] = 'admin';
	
	$cfg['admin']['password'] = 'admin';
	
	//请配置用户注册地址
	$cfg['cfg']['reg'] = 'http://123.206.63.112:2233/user/reg.php';
	
	
	
	
	//请配置个人中心地址 通常 您只需要将IP和端口替换为自己的 而不需要改动其他参数
	//自动在地址中附加了用户名和密码
	$cfg['cfg']['userCenter'] = 'http://123.206.63.112:2233/user/index2.php?user='.$_GET['username'].'&pass='.$_GET['password'];
	
	
	//请配置点击流量详情时进入的页面
	$cfg['cfg']['info'] = 'http://123.206.63.112:2233/user/index2.php?user='.$_GET['username'].'&pass='.$_GET['password'];
	
	
	
	//详细配置参数

	$_SERVER['app_key']['cfg'] = "8ad9783288873c44a54c4cf7d41852d2";
