<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>二手交易平台</title>

	<link href="/nyes/Public/Admin/themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/nyes/Public/Admin/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="/nyes/Public/Admin/themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
	<link href="/nyes/Public/Admin/uploadify/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
	<!--[if IE]>
	<link href="/nyes/Public/Admin/themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
	<![endif]-->

	<!--[if lt IE 9]><script src="/nyes/Public/Admin/js/speedup.js" type="text/javascript"></script><script src="/nyes/Public/Admin/js/jquery-1.11.3.min.js" type="text/javascript"></script><![endif]-->
	<!--[if gte IE 9]><!--><script src="/nyes/Public/Admin/js/jquery-2.1.4.min.js" type="text/javascript"></script><!--<![endif]-->

	<script src="/nyes/Public/Admin/js/jquery.cookie.js" type="text/javascript"></script>
	<script src="/nyes/Public/Admin/js/jquery.validate.js" type="text/javascript"></script>
	<script src="/nyes/Public/Admin/js/jquery.bgiframe.js" type="text/javascript"></script>
	<script src="/nyes/Public/Admin/xheditor/xheditor-1.2.2.min.js" type="text/javascript"></script>
	<script src="/nyes/Public/Admin/xheditor/xheditor_lang/zh-cn.js" type="text/javascript"></script>
	<script src="/nyes/Public/Admin/uploadify/scripts/jquery.uploadify.js" type="text/javascript"></script>

	<!-- 可以用dwz.min.js替换前面全部dwz.*.js (注意：替换时下面dwz.regional.zh.js还需要引入)-->
    <script src="/nyes/Public/Admin/js/dwz.min.js" type="text/javascript"></script>
	<script src="/nyes/Public/Admin/js/dwz.regional.zh.js" type="text/javascript"></script>

	<script type="text/javascript">
		$(function(){
			DWZ.init("/nyes/Public/Admin/dwz.frag.xml", {
				loginUrl:"login_dialog.html", loginTitle:"登录",	// 弹出登录对话框
//		loginUrl:"login.html",	// 跳到登录页面
				statusCode:{ok:200, error:300, timeout:301}, //【可选】
				pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
				keys: {statusCode:"statusCode", message:"message"}, //【可选】
				ui:{hideMode:'offsets'}, //【可选】hideMode:navTab组件切换的隐藏方式，支持的值有’display’，’offsets’负数偏移位置的值，默认值为’display’
				debug:false,	// 调试模式 【true|false】
				callback:function(){
					initEnv();
					$("#themeList").theme({themeBase:"/nyes/Public/Admin/themes"}); // themeBase 相对于index页面的主题base路径
				}
			});
		});

	</script>
</head>

<body>
<div id="layout">
	<div id="header">
		<div class="headerNav">
			<a class="logo" href="http://j-ui.com">标志</a>
			<ul class="nav">
				<li>欢迎：<a href="changepwd.html" target="dialog" width="600">admin</a> 回来</li>
				<li><a href="changepwd.html" target="dialog" width="600">修改密码</a></li>
				<li><a href="/nyes/index.php/Admin/Login/logout">退出</a></li>
			</ul>
			<ul class="themeList" id="themeList">
				<li theme="default"><div class="selected">蓝色</div></li>
				<li theme="green"><div>绿色</div></li>
				<!--<li theme="red"><div>红色</div></li>-->
				<li theme="purple"><div>紫色</div></li>
				<li theme="silver"><div>银色</div></li>
				<li theme="azure"><div>天蓝</div></li>
			</ul>
		</div>

		<!-- navMenu -->

	</div>

	<div id="leftside">
		<div id="sidebar_s">
			<div class="collapse">
				<div class="toggleCollapse"><div></div></div>
			</div>
		</div>
		<div id="sidebar">
			<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>

			<div class="accordion" fillSpace="sidebar">
				<div class="accordionHeader">
					<h2><span>Folder</span>发布信息管理</h2>
				</div>
				<div class="accordionContent">
					<ul class="tree treeFolder">
						<li><a href="/nyes/index.php/Admin/Info/index" target="navTab">信息列表</a></li>
						<li><a href="/nyes/index.php/Admin/Info/discusslist" target="navTab">信息评论</a></li>
						<li><a href="/nyes/index.php/Admin/Info/infoType" target="navTab">信息类型</a></li>
						<li><a href="tabsPage.html" target="navTab">信息分类</a></li>
					</ul>
				</div>

				<div class="accordionHeader">
					<h2><span>Folder</span>用户管理</h2>
				</div>
				<div class="accordionContent">
					<ul class="tree treeFolder">
						<li><a href="/nyes/index.php/Admin/User/index" rel="info" target="navTab">用户列表</a></li>
					</ul>
				</div>

				<div class="accordionHeader">
					<h2><span>Folder</span>文章管理</h2>
				</div>
				<div class="accordionContent">
					<ul class="tree treeFolder">
						<li><a href="tabsPage.html" target="navTab">新闻管理</a>
							<ul>
								<li><a href="main.html" target="navTab" rel="main">新闻列表</a></li>
							</ul>
						</li>
						<li><a href="tabsPage.html" target="navTab">公告管理</a>
							<ul>
								<li><a href="main.html" target="navTab" rel="main">公告列表</a></li>
							</ul>
						</li>
					</ul>
				</div>

				<div class="accordionHeader">
					<h2><span>Folder</span>系统管理</h2>
				</div>
				<div class="accordionContent">
					<ul class="tree treeFolder">
						<li><a href="tabsPage.html" target="navTab">网站设置</a></li>
						<li><a href="tabsPage.html" target="navTab">友情链接</a></li>
						<li><a href="tabsPage.html" target="navTab">邮件服务器设置</a></li>
						<li><a href="tabsPage.html" target="navTab">数据库管理</a></li>
						<li><a href="tabsPage.html" target="navTab">首页主广告管理</a></li>
						<li><a href="dwz.frag.xml" target="navTab" external="true">dwz.frag.xml修改</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!----右侧内容页---->
	<div id="container">
		<div id="navTab" class="tabsPage">
			<div class="tabsPageHeader">
				<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
					<ul class="navTab-tab">
						<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
					</ul>
				</div>
				<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
				<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
				<div class="tabsMore">more</div>
			</div>
			<ul class="tabsMoreList">
				<li><a href="javascript:;">我的主页</a></li>
			</ul>
			<div class="navTab-panel tabsPageContent layoutBox">
				<div class="page unitBox">
					<div class="accountInfo">

					</div>
					<div class="pageFormContent" layoutH="80" style="margin-right:230px">
						<h2>常见问题及解决:</h2>
<pre style="margin:5px;line-height:1.4em">
Error loading XML document: dwz.frag.xml
直接用IE打开index.html弹出一个对话框：Error loading XML document: dwz.frag.xml
原因：没有加载成功dwz.frag.xml。IE ajax laod本地文件有限制, 是ie安全级别的问题, 不是框架的问题。
解决方法：部署到apache 等 Web容器下。

如何精简JS：
	1) dwz.min.js替换全部dwz.*.js (注意：替换时下面dwz.regional.zh.js还需要引入
	2) demo index页面head中引入的几个第三方JS库也可以根据项目情况删除：
		js/jquery.cookie.js			用于cookie中纪录jUI主题theme，下次打开浏览器时纪录用户选择的主题风格
		js/jquery.validate.js		用于form表单验证
		js/jquery.bgiframe.js		用于解决IE6 dialog盖不住navTab页面中的select问题
		xheditor/xheditor-1.2.2.min.js	在线编辑器
		xheditor/xheditor_lang/zh-cn.js	在线编辑器国际化
		uploadify/scripts/jquery.uploadify.min.js	多文件上传
</pre>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>

<div id="footer">Copyright &copy; 2010 <a href="demo_page2.html" target="dialog">DWZ团队</a> 京ICP备15053290号-2</div>

</body>
</html>