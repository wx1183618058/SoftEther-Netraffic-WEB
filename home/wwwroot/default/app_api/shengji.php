<?php
	$data["status"] = "success";
	$data["versionCode"] = "70";//请在此输入新的版本号 当版本号大于用户正在使用的版本时 将会提示升级
	$data["url"] = "http://www.ml.dingd.cn/file/liuliangweishi.apk"; //请在此填写下载地址
	$data["content"] = "软件更新了快升级吧！";//再此处填写更新说明
	if($require != true){
		die(json_encode($data));
	}
