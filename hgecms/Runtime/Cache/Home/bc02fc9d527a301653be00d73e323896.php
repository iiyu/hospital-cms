<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>渐飞二甲（综合）医院评审资料管理系统</title>
<link href="/hgecms/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="warp">
	<div class="top">
	<h5>南阳二甲（综合）医院评审资料管理系统<span>——等级办</span></h5>
	</div>
	<div class="nav">
	<form method="post" action="search.aspx" target="_blank">
		<em><span style="background:url(/images/search_bj.jpg)"><input name='keyword' class="Input_t" value="请在此输入您要找的关键字" size="24" maxlength=128 onclick="javascript:this.value=''">
		</span><span><input type="image" src="/hgecms/Public/Home/images/search.jpg" name="image" value='开始检索' />
</span></em>
	</form>
<!--JFCmsEnterprise4.1 Published Date:7/18/2013 3:57:29 PM   Power by 60.161.79.144-->

		<ul>
			<li><a href="djb/1/1">第一章：医院功能任务</a></li>
			<li><a href="djb/2/1">第二章：医院服务</a></li>
			<li><a href="djb/3/1">第三章：患者安全</a></li>
			<li><a href="djb/4/1">第四章：医疗质量安全管理与持续改进</a></li>
			<li><a href="djb/5/1">第五章：护理管理与质量持续改进</a></li>
			<li><a href="djb/6/1">第六章：医院管理</a></li>
		</ul>

	</div>
	<div class="news1">当前位置:<a href='' target=_blank>首页</a> >> <a href='djb/' target=_blank>等级办</a> >> <a href='djb/6/' target=_blank>第六章</a> >> <a href='djb/6/1/' target=_blank>一、依法执业</a> >> <a href='djb/6/1/6111/' target=_blank>6.1.1.1</a> >> <a href='djb/6/1/6111/c/' target=_blank>C</a> >> <a href='djb/6/1/6111/c/c3/' target=_blank>C-3</a> >> 正文</div>
<div class="news">
		<h1><?php echo ($row["title"]); ?><span>责任编辑:</span><?php echo ($row["author"]); ?></h1>
		<ul>
			<li><!--Content Start--><?php echo ($row["content"]); ?><!--Content End--></li>
		</ul>
	</div>
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
</script>
</body>
</html>
<!--JFCmsEnterprise4.1 Published Date:12/26/2013 9:05:35 AM   Power by 60.161.79.144-->