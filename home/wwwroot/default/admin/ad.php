<?php
$u = $_GET["username"];
$p = $_GET["password"];
$res=db(_openvpn_)->where(array(_iuser_=>$u,_ipass_=>$p))->find();
if(!$res){
	die("登录信息错误");
}
if(isset($_POST['km'])){
	$km = $_POST['km'];
	$myrow=db("auth_kms")->where(array("kind"=>"1","km"=>$km))->find();
	if(!$myrow){
		die('此激活码不存在');
	}elseif($myrow['isuse']==1){
		die('此激活码已被使用');
	}else{
		$duetime = time() + $myrow['value']*24*60*60;
		$addll = $myrow['values']*1024*1024*1024;
		//已到期 清空全部流量
		$update[_maxll_] = $addll;
		$update[_endtime_] = $duetime;
		$update[_isent_] = "0";
		$update[_irecv_] = "0";
		$update["dlid"] = $myrow['daili'];
		$update[_i_] = "1";
		if(db(_openvpn_)->where(array(_iuser_=>$u))->update($update)){
			db("auth_kms")->where(array("id"=>$myrow['id']))->update(array("isuse"=>"1","user"=>$u,"usetime"=>date("Y-m-d H:i:s",time())));
			die('开通成功！');
		}else{
			die('开通失败！');
		}
	}
}
$key = explode("_",$_GET["app_key"]);
?><div class="alert alert-success" style="display:none;margin:0px;" >
		请在此输入您购买的流量卡密。
	</div>
	<div style="margin:10px">
				<div class="form-group">
					<input type="text" class="form-control" name="km" placeholder="请输入激活码卡密">
				</div>
				<button type="submit" class="btn btn-success btn-block cz" onclick="kmcz()">
					充值到我的账户
				</button>
				</a>
		
			<br />
			<br />
			【使用说明】
			<br />
			* 充值会<span style="color:red">清空剩余流量</span>，并重设为购买的流量。时间将会设置为充值之日起到充值卡指定的日期结束，超出流量无需补交。
			<br>
			
			</div>
		
 <script>
 var old_html = "";
 function kmcz(){
	 if($("[name=km]").val() == ""){
		 $(".alert").html("卡密不能为空").show();
	 }else{
		 old_html = $(".cz").html();
		 $(".cz").html("处理中...");
		 $.post("?act=Shop&username=<?php echo $_GET['username']?>&password=<?php echo $_GET['password']?>&app_key=<?php echo $_GET['app_key']?>",{
			 "km":$("[name=km]").val()
		 },function(data){
			 $(".cz").html(old_html);
			  $(".alert").show();
			  $(".alert").html(data);
		 })
	 }
 }
 </script>