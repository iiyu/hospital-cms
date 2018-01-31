<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" method="post" action="#rel#">
	<input type="hidden" name="pageNum" value="1" />
	<input type="hidden" name="numPerPage" value="${model.numPerPage}" />
	<input type="hidden" name="orderField" value="${param.orderField}" />
	<input type="hidden" name="orderDirection" value="${param.orderDirection}" />
</form>

<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" action="w_removeSelected.html" method="post">
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>信息名:</label>
				<input type="text" name="keywords" value=""/>
			</li>
			<li>
				<label>是否审核:</label>
				<input type="radio" name="shenghe" value="0"/>未审核
				<input type="radio" name="shenghe" value="0"/>以审核
			</li>
			<li>
				<label>发布时间:</label>
				<input type="text" name="date1" class="date" readonly="true"/>
				<a class="inputDateButton" href="javascript:;">选择</a>-----
			</li>
			<li>
				<input type="text" name="date1" class="date" readonly="true"/>
				<a class="inputDateButton" href="javascript:;">选择</a>
			</li>
		</ul>
		<!--
		<table class="searchContent">
			<tr>
				<td>
					我的客户：<input type="text"/>
				</td>
				<td>
					<select class="combox" name="province">
						<option value="">所有省市</option>
						<option value="北京">北京</option>
						<option value="上海">上海</option>
						<option value="天津">天津</option>
						<option value="重庆">重庆</option>
						<option value="广东">广东</option>
					</select>
				</td>
			</tr>
		</table>
		-->
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
			</ul>
		</div>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a title="确实要删除这些记录吗?" target="selectedTodo" rel="ids" postType="string" href="demo/common/ajaxDone.html" class="delete"><span>批量删除</span></a></li>
			<li><a class="edit" title="确定同意以下信息发布?" href="demo/common/ajaxDone.html" target="selectedTodo" warn="请选择一个信息"  postType="string"><span>批量审核</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
		</ul>
	</div>
	<table class="table" width="1200" layoutH="138">
		<thead>
			<tr>
				<th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
				<th width="120" orderField="accountNo" class="asc">信息号</th>
				<th orderField="accountName">信息名称</th>
				<th width="80" orderField="accountType">地区</th>
				<th width="60" align="center" orderField="accountLevel">发布者</th>
				<th width="70">是否审核</th>
				<th width="70">有效日期</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
			<tr target="sid_user" rel="1">
				<td><input name="ids" value="xxx" type="checkbox"></td>
				<td>A120113196309052434</td>
				<td>天津市华建装饰工程有限公司</td>
				<td>联社营业部</td>
				<td>联社营业部</td>
				<td>政府机构</td>
				<td>2009-05-21</td>
				<td>
					<a title="删除" target="ajaxTodo" href="demo/common/ajaxDone.html?id=xxx" class="btnDel">删除</a>
					<a title="审核" target="dialog" href="/nyes/index.php/Admin/Info/edit" class="btnEdit">编辑</a>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
				<option value="200">200</option>
			</select>
			<span>条，共${totalCount}条</span>
		</div>
		
		<div class="pagination" targetType="navTab" totalCount="200" numPerPage="20" pageNumShown="10" currentPage="1"></div>

	</div>
</div>