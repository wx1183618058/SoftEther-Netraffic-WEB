<script>
  function delLine(id){
		var url = './user_list.php?my=del&user='+id;
		$.post(url,{
		  
		},function(){
			
		});
		$('.line-id-'+id).slideUp();
  }
  
  function outline(id){
		var url = './option.php?my=outline&user='+id;
		$.post(url,{
			"user":id
		  },function(){
			
		});
		$('.line-id-'+id).slideUp();
  }
  
  function addLl(id,n){
		var url = './option.php?my=addll&user='+id;
		$.post(url,{
			"n":n,
			"user":id
		  },function(){
			
		});
		var m = $('.line-id-'+id+" .maxll");
		var o = parseInt(m.html());
		var ne = o+n*1024;
		m.html(ne);
  }
  </script>
</body>
</html>