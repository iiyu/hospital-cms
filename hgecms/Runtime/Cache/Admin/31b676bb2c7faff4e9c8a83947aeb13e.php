<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
	<form method="post" action="/hgecms/index.php/Admin/Info/doadd" class="pageForm required-validate" onsubmit="return validateCallback(this, navTabAjaxDone);">
		<div class="pageFormContent" layoutH="56">
			<p>
				<label>条款编码：</label>
				<input name="sort" type="text" size="30" value="<?php echo ($one["sort"]); ?>"/>
			</p>

				<label>条款名称：</label>
				<textarea name="details" rows="5" cols="30" value="<?php echo ($one["details"]); ?>"></textarea>

			<p>
				<label>条款类型：</label>
				<select name="typename" class="required combox">
					<option value="">请选择</option>
					<option value="章"  selected>章</option>
					<option value="节">节</option>
					<option value="条">条</option>
					<option value="款">款</option>
					<option value="项">项</option>
				</select>
			</p>
		</div>
		<div class="formBar">
			<ul>
				<!--<li><a class="buttonActive" href="javascript:;"><span>保存</span></a></li>-->
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>