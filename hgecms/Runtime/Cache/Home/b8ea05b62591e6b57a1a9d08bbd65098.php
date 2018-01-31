<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>渐飞二甲（综合）医院评审资料管理系统</title>
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/jquery.qtip.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.qtip.min.js"></script>
<!--<script type="text/javascript" src="/Public/Home/js/HospitalAudit.js"></script>-->
<script type="text/javascript" src="/Public/Home/images/tab.js"></script>
</head>

<body>
<div id="warp">
	<div class="top">
	<h5>南阳二甲（综合）医院评审资料管理系统<span>——等级办</span></h5>
	</div>
	<div class="nav">
	<form method="post" action="search.aspx" target="_blank">
		<em><span style="background:url(/Public/Home/images/search_bj.jpg)"><input name='keyword' class="Input_t" value="请在此输入您要找的关键字" size="24" maxlength=128 onclick="javascript:this.value=''">
		</span><span><input type="image" src="/Public/Home/images/search.jpg" name="image" value='开始检索' />
</span></em>
	</form>
<!--JFCmsEnterprise4.1 Published Date:7/18/2013 3:57:29 PM   Power by 60.161.79.144-->

		<ul>
			<?php if(is_array($zhang)): foreach($zhang as $k=>$z): ?><li <?php if($z["id"] == $id): ?>class="f1"<?php endif; ?> ><a href="/index.php/Home/Index/index/id/<?php echo ($z["id"]); ?>" class="zhang"><?php echo ($z["details"]); ?></a></li><?php endforeach; endif; ?>
		</ul>
		<dl>
            <dt>第<?php echo (numToStr($id)); ?>章</dt>
			<?php if(is_array($jie)): foreach($jie as $key=>$j): ?><dd class="jie" title="<?php echo ($j["details"]); ?>" pid="<?php echo ($j["id"]); ?>"><a href="#" title="<?php echo ($j["details"]); ?>"><?php echo ($j["sort"]); ?></a></dd><?php endforeach; endif; ?>
		</dl>
	</div>
	<h2 id="h2"></h2>
	<div id="biao"></div>
</div>


<div class="bottom">
	<ul>
		<li><span>Copyright &copy; 2012 All Rights Reserved</span>&nbsp;渐飞二甲（综合）医院评审资料管理系统&nbsp;&nbsp;&nbsp;<span>power by</span> &nbsp;&nbsp;<a href="http://www.jfcms.net" target="_blank">云南渐飞网络技术有限公司</a></li>
	</ul>
</div>
<!--JFCmsEnterprise4.1 Published Date:7/18/2013 3:57:42 PM   Power by 60.161.79.144-->

<script type="text/javascript">
(function() {
    var $backToTopTxt = "返回顶部", $backToTopEle = $('<div class="backToTop"></div>').appendTo($("body"))
        .text($backToTopTxt).attr("title", $backToTopTxt).click(function() {
            $("html, body").animate({ scrollTop: 0 }, 120);
    }), $backToTopFun = function() {
        var st = $(document).scrollTop(), winh = $(window).height();
        (st > 0)? $backToTopEle.show(): $backToTopEle.hide();
        //IE6下的定位
        if (!window.XMLHttpRequest) {
            $backToTopEle.css("top", st + winh - 166);
        }
    };
    $(window).bind("scroll", $backToTopFun);
    $(function() { $backToTopFun(); });
})();
//设置默认选中
$('dd:first').addClass("f1");
$('#h2').text($('dd').first().attr("title"));

$(".jie").click(function(){
	$("#biao").empty();
	$('dd').removeClass("f1");
	$(this).addClass("f1");
	$('#h2').text($(this).attr("title"));
	var id = $(this).attr("pid");
	$.get("<?php echo U('Home/Index/getAjax');?>",{ pid:id}, function(data){
		$('#biao').append(data);
		//console.log("Data Loaded: " + data);
	});
});
$(document).ready(function(){
	var id = $('dd:first').attr('pid');
		$.get("<?php echo U('Home/Index/getAjax');?>",{ pid:id}, function(data) {
			$('#biao').append(data);
		});
	});
</script>
</body>
</html>
<!--JFCmsEnterprise4.1 Published Date:12/25/2013 2:50:21 PM   Power by 60.161.79.144-->