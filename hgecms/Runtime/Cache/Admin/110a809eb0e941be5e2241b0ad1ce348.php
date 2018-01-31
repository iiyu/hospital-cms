<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
	ul.rightTools {float:right; display:block;}
	ul.rightTools li{float:left; display:block; margin-left:5px}
</style>

<div class="pageContent" style="padding:5px">

	<div class="divider"></div>
	<div class="tabs">
		<div class="tabsHeader">
			<div class="tabsHeaderContent">
				<ul>
					<li><a href="javascript:;"><span>部门</span></a></li>
				</ul>
			</div>
		</div>
		<div class="tabsContent">
			<div>
	
				<div layoutH="146" style="float:left; display:block; overflow:auto; width:240px; border:solid 1px #CCC; line-height:21px; background:#fff">
					<ul class="tree treeFolder treeCheck expand" oncheck="kkk">
						<li><a >框架面板</a>
							<ul>
								<li><a tname="name" tvalue="value1" checked="true">我的主页</a></li>
								<li><a tname="name" tvalue="value2">页面一</a></li>
								<li><a tname="name" tvalue="value3">替换页面一</a></li>
								<li><a tname="name" tvalue="value4">页面二</a></li>
								<li><a tname="name" tvalue="value5">页面三</a></li>
							</ul>
						</li>

						<li><a tname="name" tvalue="test1">Test 1</a>
							<ul>
								<li><a href="/hgecms/index.php/Admin/Info/lists" target="ajax" rel="jbsxBox">尿检</a>
									<ul>
										<li><a tname="name" tvalue="test1.1.1" checked="true">Test 1.1.1</a></li>
										<li><a tname="name" tvalue="test1.1.2" checked="false">Test 1.1.2</a></li>
									</ul>
								</li>
								<li><a tname="name" tvalue="test1.2" checked="true">Test 1.2</a></li>
							</ul>
						</li>
						<li><a tname="name" tvalue="test2" checked="true">Test 2</a></li>
					</ul>
				    <!--<ul class="tree treeFolder">
						<li><a href="javascript">实验室检测</a>

							<ul>
								<li><a href="/hgecms/index.php/Admin/Info/lists" target="ajax" rel="jbsxBox">尿检</a></li>
								<li><a href="demo/pagination/list1.html" target="ajax" rel="jbsxBox">HIV检测</a></li>
								<li><a href="demo/pagination/list1.html" target="ajax" rel="jbsxBox">HCV检测</a></li>
								<li><a href="demo/pagination/list1.html" target="ajax" rel="jbsxBox">TB检测</a></li>
							</ul>
						</li>

				     </ul>-->
				</div>
				
				<div id="jbsxBox" class="unitBox" style="margin-left:246px;">
					<!--#include virtual="list1.html" -->
				</div>
	
			</div>
		</div>
		<div class="tabsFooter">
			<div class="tabsFooterContent"></div>
		</div>
	</div>
	
</div>