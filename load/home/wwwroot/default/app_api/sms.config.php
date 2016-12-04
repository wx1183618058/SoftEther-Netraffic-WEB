<?php
/*
*---------------------------------------
	此文件禁用记事本编辑！！！！！！
*----------------------------------------
*
*	短信借口信息配置 这里集成的是云之讯
*	我们推荐大家在这里注册
*	其官网地址为：http://www.ucpaas.com
*----------------------------------------
*/

//请在这里写 云之讯的  Account Sid 

define("Account_Sid","3b7004e5f782a6e4f1f195bc52990bd4");

//请在这里写您在 云之讯 申请的 Auth Token
define("Auth_Token","cee182005162750e23855d63ed92188d");

//请在这里写 云之讯 申请的应用ID

define("APP_ID","fff126cf55e545439dfd1c16aa63d95a");

//请在这里写您申请的短信模板ID

/*
模板推荐格式，注意必须有 如果您对接口规则不明确 请直接复制下面的模板去申请：

	您注册的{1}的验证码为{2}，请于{3}分钟内正确输入验证码

*/

define("Template_ID","29317");

//服务名称 例如 叮咚云
define("APP_NAME","叮咚云");

define("SMS_T",30);//短信注册赠送天数


define("SMS_L",100);//短信注册赠送流量（M）

define("SMS_I",1);//注册后状态 1 为启用 0 为禁用 

define("SMS_time",60);//失效时长 单位：分钟

/****** 以下为逻辑代码 非专业人士请勿修改 *******/
function get_millisecond(){  
		 list($usec, $sec) = explode(" ", microSYSTEM_T);   
		$msec=round($usec*1000);  
		 return $msec;
}
	function senddx($t,$c){
		$tid = Auth_Token;
		$sid = Account_Sid;
		//$time = date('YmdHis',SYSTEM_T);
		$time = date('YmdHis', SYSTEM_T).get_millisecond();
		$to = $t;
		$sign = md5($sid.$time.$tid);
		$appid = APP_ID;
		$u  = 'http://www.ucpaas.com/maap/sms/code?sid='.$sid.'&appId='.$appid.'&time='.$time.'&sign='.$sign.'&to='.$to.'&templateId='.Template_ID.'&param='.APP_NAME.','.$c.','.SMS_time.'';
		$cs = file_get_contents($u);
		return $cs;
	}
	/*
	//以下代码处于调试阶段 请勿使用
	function tongzhi($t){
		$tid = Auth_Token;
		$sid = Account_Sid;
		//$time = date('YmdHis',SYSTEM_T);
		$time = date('YmdHis', SYSTEM_T).get_millisecond();
		$to = $t;
		$sign = md5($sid.$time.$tid);
		$appid = APP_ID;
		$u  = 'http://www.ucpaas.com/maap/sms/code?sid='.$sid.'&appId='.$appid.'&time='.$time.'&sign='.$sign.'&to='.$to.'&templateId='.Template_ID;
		$cs = file_get_contents($u);
		return $cs;
	}
	
	function weihu($t,$c){
		$tid = Auth_Token;
		$sid = Account_Sid;
		//$time = date('YmdHis',SYSTEM_T);
		$time = date('YmdHis', SYSTEM_T).get_millisecond();
		$to = $t;
		$sign = md5($sid.$time.$tid);
		$appid = APP_ID;
		$u  = 'http://www.ucpaas.com/maap/sms/code?sid='.$sid.'&appId='.$appid.'&time='.$time.'&sign='.$sign.'&to='.$to.'&templateId='.Template_ID.'&param='.$t.','.$c;
		$cs = file_get_contents($u);
		return $cs;
	}*/