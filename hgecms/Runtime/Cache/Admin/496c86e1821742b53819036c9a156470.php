<?php if (!defined('THINK_PATH')) exit();?><div class="pageHeader" style="border:1px #B8D0D6 solid">
	<form id="pagerForm" onsubmit="return divSearch(this, 'jbsxBox2');" action="demo/pagination/list2.html" method="post">
	<input type="hidden" name="pageNum" value="1" />
	<input type="hidden" name="numPerPage" value="${model.numPerPage}" />
	<input type="hidden" name="orderField" value="${param.orderField}" />
	<input type="hidden" name="orderDirection" value="${param.orderDirection}" />
	<div class="searchBar">
		<table class="searchContent">
			<tr>
				<td>
					标准：<input type="text" name="name" />
				</td>
				<td><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></td>
			</tr>
		</table>
	</div>
	</form>
</div>

<div class="pageContent" style="border-left:1px #B8D0D6 solid;border-right:1px #B8D0D6 solid">
<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="/hgecms/index.php/Admin/Info/edit" target="dialog" mask="true"><span>添加</span></a></li>
			<li><a class="delete" href="demo/pagination/ajaxDone3.html?uid={sid_obj}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="/hgecms/index.php/Admin/Info/edit?uid={sid_obj}" target="dialog" mask="true"><span>修改</span></a></li>
			<li class="line">line</li>
<!--			<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
		</ul>
	</div>
	<table class="table" width="99%" layoutH="138" rel="jbsxBox2">
		<thead>
			<tr>
				<th width="80">序号</th>
				<th orderField="name" class="asc">姓名</th>
				<th orderField="sex">性别</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<tr target="sid_obj" rel="1">
				<td>1</td>
				<td>张三</td>
				<td>男</td>
				<td><a href="demo/pagination/list3.html" target="ajax" rel="jbsxBox3">载入右边grid</a></td>
			</tr>
			<tr target="sid_obj" rel="2">
				<td>2</td>
				<td>李四</td>
				<td>女</td>
				<td><a href="demo/pagination/list3.html" target="ajax" rel="jbsxBox3">载入右边grid</a></td>
			</tr>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value}, 'jbsxBox2')">
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
				<option value="200">200</option>
			</select>
			<span>条，共2条</span>
		</div>
		
		<div class="pagination" rel="jbsxBox2" totalCount="200" numPerPage="20" pageNumShown="5" currentPage="1"></div>

	</div>
</div>