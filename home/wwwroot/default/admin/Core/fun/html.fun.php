<?php
	//HTML头文件
	function head($title='暂无标题',$echo = false){
		$str = '<html>
<head>
<title>'.$title.'</title>
</head>
<body>';
		if($echo == false){
			return $str;
		}else{
			echo $str;
		}
	}
	//HTML底部文件
	function footer($echo = false){
		$str = "\n</body>\n</html>";
		if($echo == false){
			return $str;
		}else{
			echo $str;
		}
	}
function ubb($Text){
      $Text=trim($Text);
      //$Text=ereg_replace("\n","<br>",$Text);
      $Text=preg_replace("/\\t/is","  ",$Text);
      $Text=preg_replace("/\[hr\]/is","<hr>",$Text);
      $Text=preg_replace("/\[separator\]/is","<br/>",$Text);
      $Text=preg_replace("/\[h1\](.+?)\[\/h1\]/is","<h1>\\1</h1>",$Text);
      $Text=preg_replace("/\[h2\](.+?)\[\/h2\]/is","<h2>\\1</h2>",$Text);
      $Text=preg_replace("/\[h3\](.+?)\[\/h3\]/is","<h3>\\1</h3>",$Text);
      $Text=preg_replace("/\[h4\](.+?)\[\/h4\]/is","<h4>\\1</h4>",$Text);
      $Text=preg_replace("/\[h5\](.+?)\[\/h5\]/is","<h5>\\1</h5>",$Text);
      $Text=preg_replace("/\[h6\](.+?)\[\/h6\]/is","<h6>\\1</h6>",$Text);
      $Text=preg_replace("/\[center\](.+?)\[\/center\]/is","<center>\\1</center>",$Text);
      //$Text=preg_replace("/\[url=([^\[]*)\](.+?)\[\/url\]/is","<a href=\\1 target='_blank'>\\2</a>",$Text);
      $Text=preg_replace("/\[url\](.+?)\[\/url\]/is","<a href=\"\\1\" target='_blank'>\\1</a>",$Text);
      $Text=preg_replace("/\[url=(http:\/\/.+?)\](.+?)\[\/url\]/is","<a href='\\1' target='_blank'>\\2</a>",$Text);
      $Text=preg_replace("/\[url=(.+?)\](.+?)\[\/url\]/is","<a href=\\1>\\2</a>",$Text);
      $Text=preg_replace("/\[img\](.+?)\[\/img\]/is","<img src=\\1>",$Text);
      $Text=preg_replace("/\[img\s(.+?)\](.+?)\[\/img\]/is","<img \\1 src=\\2>",$Text);
      $Text=preg_replace("/\[color=(.+?)\](.+?)\[\/color\]/is","<font color=\\1>\\2</font>",$Text);
      $Text=preg_replace("/\[style=(.+?)\](.+?)\[\/style\]/is","<div class='\\1'>\\2</div>",$Text);
      $Text=preg_replace("/\[size=(.+?)\](.+?)\[\/size\]/is","<font size=\\1>\\2</font>",$Text);
      $Text=preg_replace("/\[sup\](.+?)\[\/sup\]/is","<sup>\\1</sup>",$Text);
      $Text=preg_replace("/\[sub\](.+?)\[\/sub\]/is","<sub>\\1</sub>",$Text);
      $Text=preg_replace("/\[pre\](.+?)\[\/pre\]/is","<pre>\\1</pre>",$Text);
      $Text=preg_replace("/\[email\](.+?)\[\/email\]/is","<a href='mailto:\\1'>\\1</a>",$Text);
      $Text=preg_replace("/\[i\](.+?)\[\/i\]/is","<i>\\1</i>",$Text);
      $Text=preg_replace("/\[u\](.+?)\[\/u\]/is","<u>\\1</u>",$Text);
      $Text=preg_replace("/\[b\](.+?)\[\/b\]/is","<b>\\1</b>",$Text);
      $Text=preg_replace("/\[quote\](.+?)\[\/quote\]/is","<blockquote>引用:<div style='border:1px solid silver;background:#EFFFDF;color:#393939;padding:5px' >\\1</div></blockquote>", $Text);
      $Text=preg_replace("/\[sig\](.+?)\[\/sig\]/is","<div style='text-align: left; color: darkgreen; margin-left: 5%'><br><br>--------------------------<br>\\1<br>--------------------------</div>", $Text);
      return $Text;
}

function userData($userid,$get=null){
	if(!isset($userid)){
		return false;
	}
	$data_file = R.'/data/user/'.$userid.'.xml';
	if(!is_file($data_file)){
		file_put_contents($data_file,'<config />');
	}
	if(isset($get)){
		$xml = simplexml_load_file($data_file);
		$json  = json_encode($xml);
		$configData = json_decode($json, true);
		$data = array_merge($configData,$get);
		$xml_new = simplexml_load_string('<config />');
		create($data, $xml_new);
		file_put_contents($data_file,$xml_new->saveXML());
		return true;
	}else{
		$xml = simplexml_load_file($data_file);
		$json  = json_encode($xml);
		$configData = json_decode($json, true);
		
		return $configData;
	}
}
 
function create($ar, $xml) {
    foreach($ar as $k=>$v) {
        if(is_array($v)) {
            $x = $xml->addChild($k);
            create($v, $x);
        }else{
			$xml->addChild($k, $v);
		}
    }
}

function iframe_script_create($domain,$callback){
	
}