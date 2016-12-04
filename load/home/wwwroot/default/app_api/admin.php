<?php
$title = "叮咚云控系统";
include('head.php');
?>
<script src="js/amcharts.js" type="text/javascript"></script>
<script src="js/serial.js" type="text/javascript"></script>
<script src="js/pie.js" type="text/javascript"></script>
<style>
.main
{
	
	height: 400px;
	
	margin:10px;
	margin-top: 20px;
	overflow: hidden;
}

#line
{
	width: 100%;
	height: 400px;
	
}
#pie
{
	width: 100%;
	height: 400px;
	
}
</style>
<?php
include('nav.php');
//检测验证码缓存目录
$conetnt = "test";
$file = R."/user_tmp/rand/test.txt";
file_put_contents($file,$conetnt);
$get = @file_get_contents($file);
$rand = false;
if($get == "test"){
	@unlink($file);
	$rand = true;
}

$file = R."/user_tmp/gg_read/test.txt";
file_put_contents($file,$conetnt);
$get = @file_get_contents($file);
$gg = false;
if($get == "test"){
	@unlink($file);
	$gg = true;
}

$file = R."/data/test.txt";
file_put_contents($file,$conetnt);
$get = @file_get_contents($file);
$kf = false;
if($get == "test"){
	@unlink($file);
	$kf = true;
}
//**版本信息检测
$v = explode("|",file_get_contents(R."/version.txt"));
foreach($v as $t){
	$tmp = explode(":",$t);
	$ver[trim($tmp[0])] = $tmp[1];
}
	?>
	<button type="button" class="btn btn-success">服务器近一个月流量使用统计（含负载）</button>&nbsp;
	
			<div id="line">
			</div>
	<hr>
        欢迎使用叮咚流量卫士APP云端管理系统<br>
		<hr>
		您的当前系统时间:<?php echo date("Y年m月d日 H点i分s秒")?> 请检测是否与实际相符<br>
		
		<hr>
		验证码目录权限:<?php echo $rand ? "<span class=\"label label-success\">[正常]</span>" : "<span class=\"label label-danger\">[异常 请给予 ".R."/user_tmp/rand 0777权限]</span>"?><br>
		<hr>
		
		客服修改缓存目录:<?php echo $kf ? "<span class=\"label label-success\">[正常]</span>" : "<span class=\"label label-danger\">[异常 请给予 ".R."/data/ 0777权限]</span>"?><br>
		<hr>
		云端系统版本：<?php echo $ver["version"]."-".$ver["name"]?><br>
		<?php
		$str = file_get_contents('http://www.dingd.cn/app/varsiontxt',false,stream_context_create(array('http' => array('method' => "GET", 'timeout' => 5))));
		
		$v2 = explode("|",$str);
		foreach($v2 as $t){
			$tmp = explode(":",$t);
			$ver2[$tmp[0]] = $tmp[1];
		}
		$new_version = trim($str) == "" ? "查询失败" :  $ver2["version"]."-".$ver2["name"];
		?>
		官方最新版本：<?php echo "无需更新"; //echo $ver["n"] < $ver2["n"] ? "[<a href=\"{$ver2['url']}\" target=\"_blank\">请更新</a>]" : "[无需更新]" ?>
		<hr>
		<?php
		//echo file_get_contents("admin.txt");
		?>
   <script type="text/javascript">
    
    var json = [
	<?php  
		$temp_date = date("Y-m-d 0:0:0",time());
		$now = strtotime($temp_date); 
		for($i=0;$i<=30;$i++){
			$t = $now-((30-$i)*24*60*60);
			$p = date("Y-m-d",$t);
			
			$rs=db("top")->where(array("time"=>$p))->limit(30)->select();
			
			if($rs){
				$value = 0;
				foreach($rs as $res){
					
					$value += $res['data'] / 1024 / 1024 / 1024;
				}
				
				$data[] = '{ "name": "'.date("d",$t).'日", "value": "'.round($value,3).'" }';
			}else{
				$data[] = '{ "name": "'.date("d",$t).'日", "value": "0" }';
			}
			
		}
		echo implode(",",$data);
	?>
  
  
  ];
  var data = [
		{"name":"上传流量(MB)","value":"<?php echo(round($row['isent']/1024/1024,3));?>"},
		{"name":"下载流量(MB)","value":"<?php echo(round($row['irecv']/1024/1024,3));?>"},
		{"name":"剩余流量(MB)","value":"<?php echo(round(($row['maxll']-$row['isent']-$row['irecv'])/1024/1024,3));?>"}
  ];
  $(document).ready(function (e) {
        //GetSerialChart();
        MakeChart(data);
    });
	AmCharts.ready(function () {
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = json;
        chart.categoryField = "name";
        chart.angle = 30;
        chart.depth3D = 20;
        //标题
        chart.addTitle("30天流量趋势(单位GB)", 15);  
        var graph = new AmCharts.AmGraph();
        chart.addGraph(graph);
        graph.valueField = "value";
        //背景颜色透明度
        graph.fillAlphas = 0.3;
        //类型
        graph.type = "line";
        //圆角
        graph.bullet = "round";
        //线颜色
        graph.lineColor = "#8e3e1f";
        //提示信息
        graph.balloonText = "[[name]]: [[value]]";
        var categoryAxis = chart.categoryAxis;
        categoryAxis.autoGridCount = false;
        categoryAxis.gridCount = json.length;
        categoryAxis.gridPosition = "start";
        chart.write("line");
    });
    //饼图
    //根据json数据生成饼状图，并将饼状图显示到div中
    function MakeChart(value) {
        chartData = eval(value);
        //饼状图
        chart = new AmCharts.AmPieChart();
        chart.dataProvider = chartData;
        //标题数据
        chart.titleField = "name";
        //值数据
        chart.valueField = "value";
        //边框线颜色
        chart.outlineColor = "#fff";
        //边框线的透明度
        chart.outlineAlpha = .8;
        //边框线的狂宽度
        chart.outlineThickness = 1;
        chart.depth3D = 20;
        chart.angle = 30;
        chart.write("pie");
    }
</script>
	<?php
	
include('footer.php');
?>