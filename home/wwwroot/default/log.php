<?php @eval("//Encode by  phpjiami.com,Free user."); ?><html>
<head>
	<title>当前在线用户</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="./css/bootstrap.min.css" rel="stylesheet">
   	<script src="./jq/jquery.min.js"></script>
   	<script src=".js/bootstrap.min.js"></script>
</head>
<?php
session_start();
if(!isset($_SESSION["s"])){
header("location:login.php");
exit();
}
if($_SESSION["s"] != "yes"){
header("location:login.php");
exit();
}
?>

<body>
<div style="margin:5% auto;">
<center>
<table class="table table-bordered">
   <thead>
      <tr>
	   <th>ID</th>
         <th>用户名</th>
         <th>上传</th>
	<th>下载</th>
      </tr>
   <tbody>
	<?php
	$name;
	$ip;
	$sent=0;
	$recv=0;
	$str=file_get_contents("./res/openvpn-status.txt");
	$num=(substr_count($str,'2016')-1)/2;
	//echo $num;
	$fp=fopen("./res/openvpn-status.txt","r");
	fgets($fp);
	fgets($fp);
	fgets($fp);
	for($i=0;$i!=$num;$i++){
	$j=$i+1;
	echo "<tr>";
		$line=fgets($fp);
		$arr=explode(",",$line);
		$recv=round($arr[2]/1024)/1000;
		$sent=round($arr[3]/1024)/1000;
		echo "<td>".$j."</td>";
echo "<td>".$arr[0]."</td>";
	echo "<td>".$recv."MB</td>";
	echo "<td>".$sent."MB</td>";
	echo "</tr>";
	}
	?>
     </tbody>
   </thead>
</table>
</center>
</div>
</body>
</html>