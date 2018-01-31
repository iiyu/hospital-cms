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
				<label>用户名：</label>
				<input type="text" name="keywords" value=""/>
			</li>
			<li>
				<label>是否认证：</label>
				<input type="radio" name="renzheng" value="1"/>认证
				<input type="radio" name="renzheng" value="0"/>未认证
			</li>
			<li>
				<label>注册日期：</label>
				<input type="text" name="date1" class="date" readonly="true"/>
				<a class="inputDateButton" href="javascript:;">选择</a>-----
			</li>
			<li>
				<input type="text" name="date1" class="date" readonly="true"/>
				<a class="inputDateButton" href="javascript:;">选择</a>
			</li>
		</ul>
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
			<li><a class="edit" href="edit.html?uid={sid_user}" target="navTab" warn="请选择一个用户"><span>批量修改</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
		</ul>
	</div>
	<table class="table" width="1350" layoutH="138">
		<thead>
			<tr>
				<th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
				<th width="50" orderField="accountNo" class="asc">用户号</th>
				<th orderField="accountName">用户名称</th>
				<th width="120" orderField="accountType">邮件地址</th>
				<th width="130" orderField="accountCert">是否认证</th>
				<th width="130" align="center" orderField="accountLevel">注册日期</th>
				<th width="130">电话</th>
				<th width="130">最后登录时间</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($user)): foreach($user as $k=>$vo): ?><tr target="sid_user" rel="1">
				<td><input name="ids" value="xxx" type="checkbox"></td>
				<td><?php echo ($vo["userid"]); ?></td>
				<td><?php echo ($vo["username"]); ?></td>
				<td><?php echo ($vo["uemail"]); ?></td>
				<td><?php echo ($vo['is_approve']?'以认证':未认证); ?></td>
				<td><?php echo (date("y-m-d m:i:s",$vo["reg_time"])); ?></td>
				<td><?php echo ($vo["phone"]); ?></td>
				<td><?php echo (date("y-m-d m:i:s",$vo["last_login"])); ?></td>
				<td>
					<a target="ajaxTodo" title="确定要删除吗？" rel="del" href="/nyes/index.php/Admin/User/del/id/<?php echo ($vo["userid"]); ?>" class="btnDel">删除</a>
					<a title="编辑" target="dialog" rel="edit" href="/nyes/index.php/Admin/User/edit/id/<?php echo ($vo["userid"]); ?>" class="btnEdit">编辑</a>
				</td>
			</tr><?php endforeach; endif; ?>
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