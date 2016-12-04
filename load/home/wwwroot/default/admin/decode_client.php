<?php
function getInfo(){
	$res = file_get_contents('../res/openvpn-status.txt');

	$p = '/Common\sName\,Real\sAddress\,Bytes\sReceived\,Bytes\sSent\,Connected\sSince\n(.+?)\nROUTING\sTABLE/is';

	preg_match($p,$res,$m);

	$list = $m[1];

	$lista = explode("\n",$list);

	foreach($lista as $vo){
		$v = explode(',',$vo);
		//print_r($v);
	}
}

function getInfo_i($u){
	
	$res = file_get_contents('../res/openvpn-status.txt');

	//$p = '/([0-9\.]*)\,'.$u.'\,([0-9\.\:]*)\,(.+?)'.date('y',time()).'/is';
	$p='/'.$u.'\,([0-9\.\:]*)\,([0-9]*)\,([0-9]*)\,(.+?)'.date('y',time()).'/is';

	preg_match($p,$res,$m);

	$info = $m[0];

	$info_a = explode(",",$info);
	//print_r($info);
	return $info_a;
}
//getInfo_i('admin');