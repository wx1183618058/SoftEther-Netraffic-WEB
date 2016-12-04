<?php
/*
	测试账号申请
*/
require('head.php');
require('nav.php');
?>

   <body>
      <?php
	  $db = db('openvpn');
	  
	  $list = $db->select();
	  $i = 0;
	  $j = 0;
	  foreach($list as $vo){
		  $count += $vo[_maxll_]; // 总计流量
		  $send += $vo[_isent_]; //发送流量
		  $recv += $vo[_irecv_]; //接收流量
		  
			if($vo['i'] != '1'){
				$j++;
			}
		  
		  $i++;
	  }
	  
	  $fenpei = printmb($count);  //总计分配
	  $fasong = printmb($send);  //总计发送
	  $jieshou = printmb($recv);  //总计接收
	
	  $shiyong = printmb($send+$recv);  //总计使用
	  $weiyong = printmb($count-$send-$recv);  //总计未使用
	  //echo '服务器总共分配流量:'.round($MB['n'],2).$MB['p'];
	  ?>
	  <div class="panel panel-default">
   <div class="panel-heading">
      <h3 class="panel-title">
         数据流量统计
      </h3>
   </div>
   <div class="panel-body">
      <table class="table">
   <caption>流量详细统计</caption>
   <thead>
      <tr>
         <th>项目</th>
         <th>数值</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>总计已分配</td>
         <td><?php echo round($fenpei['n'],2).$fenpei['p'];?></td>
      </tr>
	  <tr>
         <td>总计已发送</td>
         <td><?php echo round($fasong['n'],2).$fasong['p'];?></td>
      </tr> <tr>
         <td>总计已接收</td>
         <td><?php echo round($jieshou['n'],2).$jieshou['p'];?></td>
      </tr> <tr>
         <td>总计已使用</td>
         <td><?php echo round($shiyong['n'],2).$shiyong['p'];?></td>
      </tr> <tr>
         <td>总计剩余</td>
         <td><?php echo round($weiyong['n'],2).$weiyong['p'];?></td>
      </tr> <tr>
         <td>总计统计人数</td>
         <td><?php echo $i; ?></td>
      </tr><tr>
         <td>总计禁用人数</td>
         <td><?php echo $j; ?></td>
      </tr>
      
   </tbody>
</table>
   </div>
</div>
   </body>
</html>