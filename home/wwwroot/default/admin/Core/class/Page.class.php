<?php
class Page{
static function fpages($pagetype, $total, $phpfile, $pagesize = 10, $pagelen = 7) {
    $pagetype = $pagetype == null ? 'page' : $pagetype;
    $getpage = $pagetype == null ? $_GET['page'] : $_GET[$pagetype];
    $page = $getpage == null ? '1' : $getpage;
    $pagecode = ''; //定义变量，存放分页生成的HTML
    $page = intval($page); //避免非数字页码
    $total = intval($total); //保证总记录数值类型正确
    if (!$total) return array(); //总记录数为零返回空数组
    $pages = ceil($total / $pagesize); //计算总分页
    //处理页码合法性
    if ($page < 1) {
        $page = 1;
    }
    if ($page > $pages) {
        $page = $pages;
    }
  
    //生成html
	if(pageType == 'mobile'){
		$pagecode = '<div class="fpage">';
		$pagecode.= "<div class=\"selPage\"><span>$page/$pages</span>"; //第几页,共几页
		if ($page != 1) {
			$pagecode.= "<a href=\"{$phpfile}{$pagetype}=1\">首页</a>"; //第一页
			$pagecode.= "<a href=\"{$phpfile}{$pagetype}=" . ($page - 1) . "\">上一页</a>"; //上一页
			
		}
		if ($page != $pages) {
			$pagecode.= "<a href=\"{$phpfile}{$pagetype}=" . ($page + 1) . "\">下一页</a>"; //下一页
			$pagecode.= "<a href=\"{$phpfile}{$pagetype}={$pages}\">尾页</a>"; //最后一页
			
		}
		$pagecode.= "</div><div class=\"goPage\">第<input type=\"text\" size=\"3\" onkeydown=\"if(event.keyCode==13) {window.location.href='{$phpfile}{$pagetype}='+this.value; return false;}\" value=\"{$page}\"/>页</div></div>";
	}else{
		//计算查询偏移量
		$offset = $pagesize * ($page - 1);
		//页码范围计算
		$init = 1; //起始页码数
		$max = $pages; //结束页码数
		$pagelen = ($pagelen % 2) ? $pagelen : $pagelen + 1; //页码个数
		$pageoffset = ($pagelen - 1) / 2; //页码个数左右偏移量
		//生成html
		$pagecode = '<div class="fpage">';
		$pagecode.= "<span>$page/$pages</span>"; //第几页,共几页
		//如果是第一页，则不显示第一页和上一页的连接
		if ($page != 1) {
			$pagecode.= "<a href=\"{$phpfile}{$pagetype}=1\"><<</a>"; //第一页
			$pagecode.= "<a href=\"{$phpfile}{$pagetype}=" . ($page - 1) . "\"><</a>"; //上一页
			
		}
		//分页数大于页码个数时可以偏移
		if ($pages > $pagelen) {
			//如果当前页小于等于左偏移
			if ($page <= $pageoffset) {
				$init = 1;
				$max = $pagelen;
			} else { //如果当前页大于左偏移
				//如果当前页码右偏移超出最大分页数
				if ($page + $pageoffset >= $pages + 1) {
					$init = $pages - $pagelen + 1;
				} else {
					//左右偏移都存在时的计算
					$init = $page - $pageoffset;
					$max = $page + $pageoffset;
				}
			}
		}
		for ($i = $init; $i <= $max; $i++) {
			if ($i == $page) {
				$pagecode.= '<span>' . $i . '</span>';
			} else {
				$pagecode.= "<a href=\"{$phpfile}{$pagetype}={$i}\">$i</a>";
			}
		}
		if ($page != $pages) {
			$pagecode.= "<a href=\"{$phpfile}{$pagetype}=" . ($page + 1) . "\">></a>"; //下一页
			$pagecode.= "<a href=\"{$phpfile}{$pagetype}={$pages}\">>></a>"; //最后一页
			
		}
		$pagecode.= " 第<input type=\"text\" size=\"3\" onkeydown=\"if(event.keyCode==13) {window.location.href='{$phpfile}{$pagetype}='+this.value; return false;}\" value=\"{$page}\"/>页</div>";
	}
		
	
    
    return array(
        'pagecode' => $pagecode,
        'sqllimit' => ' limit ' . $offset . ',' . $pagesize
    );
}
static function html($nums, $limit, $url, $pagetype = 'page', $list, $s = 9,$urlType = 'dt') {
	if(pageType == 'mobile'){
		$getpageinfo = Page::fpages($pagetype, $nums, $url, $limit,4,$urlType); 
		return $getpageinfo['pagecode'];
	}else{
		$getpageinfo = Page::fpages($pagetype, $nums, $url, $limit, $s); //调用函数，生成分页HTML 和 SQL LIMIT 子句
		return '<style type="text/css">.fpage{padding:4px;font-weight:bolder;font-size:12px;text-align:center;margin-top:8px;margin-bottom:8px;} 
	.fpage a{border:1px solid #ccc;padding:2px 5px 2px 5px;margin:4px;text-decoration:none;color:#333;} 
	.fpage span{padding:2px 5px 2px 5px;margin:2px;background:#09f;color:#fff;border:1px solid #09c;} 
	</style>' . $getpageinfo['pagecode'];
	}
	}
}
?>
