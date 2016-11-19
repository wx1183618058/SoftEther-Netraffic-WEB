<?php @eval("//Encode by  phpjiami.com,Free user."); ?><!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" /> 
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	<script src="./jq/jquery.min.js"></script>
	<script src=".js/bootstrap.min.js"></script>
<style>
.form-control,.btn-default{
	width: 90%;
}
@media screen and (min-width:720px) {
   	.form-control,.btn-default{
		width: 20%;
	}
}
center{
margin-top:5%;
}
</style>
</head>
<body>
<center>
		<form role="form" action="login.php" method="post">
			<div class="form-group">
				<input type="text" class="form-control" name="u" placeholder="账号">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="p" placeholder="密码">
			</div>
			<button class="btn btn-default" type="submit">登陆</button>
		</form>
	</center>
<?php
session_start();
$username="";
$userpass="";
@$username=$_POST["u"];
@$userpass=$_POST["p"];
if(strcmp($userpass,"") || strcmp($username,"")){
	if( $username==="admin" && $userpass==="68593892li59"){
	//widuu
	$host="localhost";
	$user="root";
	$password="68593892li59";
	$db="ov";
	//echo "账号:" .$iuser. "密码:" .$pd. "流量:" .$ll. "状态:" .$i;
	//echo "<br />";
	$con = mysql_connect($host,$user,$password);
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db($db,$con);
	$res=mysql_query('SELECT starttime,tian,iuser FROM `openvpn` WHERE `tian` <> ""',$con);
	while($arr = mysql_fetch_array($res)){
		$user = $arr['iuser'];
		$starttime = $arr['starttime'];
		$tian = $arr['tian'];
		//echo $user.$starttime.$tian;
		if( time() - $starttime >= $tian*86400 ){
			mysql_query("UPDATE openvpn SET i = '0' WHERE iuser='$user'");
		}
	}
	//end widuu
	echo "登陆成功！";
	$_SESSION["s"]="yes";
	header("location:post.php");
}else{
	echo "登陆失败！";
}
}else{
//echo "用户名或密码不能为空!";
}
?>
</body>
</html>