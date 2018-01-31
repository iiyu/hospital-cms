<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" method="post" action="#rel#">
	<input type="hidden" name="pageNum" value="1" />
	<input type="hidden" name="numPerPage" value="${model.numPerPage}" />
	<input type="hidden" name="orderField" value="${param.orderField}" />
	<input type="hidden" name="orderDirection" value="${param.orderDirection}" />
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<a class="add" title="上传资料" href="/hgecms/index.php/Admin/Data/add" target="navTab" width="700" height="450"><span>上传资料</span></a>
		</ul>
	</div>
	<table class="table" width="1200" layoutH="138">
		<thead>
			<tr>
				<th width="120" orderField="accountNo" class="asc">资料ID</th>
				<th orderField="accountName">资料标题</th>
				<th width="80" orderField="accountType">爷爷编码</th>
				<th width="80" orderField="accountType">父编码</th>
				<th width="80" orderField="accountType">上传人</th>
				<th width="80" orderField="accountType">上传日期</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): foreach($list as $k=>$vo): ?><tr target="sid_user" rel="1">
				<td><?php echo ($vo["id"]); ?></td>
				<td><?php echo ($vo["title"]); ?></td>
				<td><?php echo ($vo["upsort"]); ?></td>
				<td><?php echo ($vo["nextsort"]); ?></td>
				<td><?php echo ($vo["author"]); ?></td>
				<td><?php echo ($vo["createtime"]); ?></td>
				<td>
					<a title="删除" target="ajaxTodo" href="/hgecms/index.php/Admin/Data/del/id/<?php echo ($vo["id"]); ?>" class="btnDel">删除</a>
					<!--<a title="修改" target="dialog" href="/hgecms/index.php/Admin/Info/edit/id/<?php echo ($vo["id"]); ?>" class="btnEdit" width="400" height="350">修改</a>-->
				</td>
			</tr><?php endforeach; endif; ?>
		</tbody>
	</table>
</div>