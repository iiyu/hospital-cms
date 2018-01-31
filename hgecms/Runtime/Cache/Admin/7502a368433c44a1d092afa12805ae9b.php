<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
	<form method="post" action="/nyes/index.php/Admin/User/doEdit" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent" layoutH="56">
			<p>
				<label>用 户 号：</label>
				<input name="sn" type="text" size="30" value="<?php echo ($nuser["userid"]); ?>" readonly="readonly"/>
			</p>
			<p>
				<label>用户名称：</label>
				<input name="sname" type="text" size="30" value="<?php echo ($nuser["username"]); ?>" readonly="readonly"/>
			</p>
			<p>
				<label>邮件地址：</label>
				<input name="semail" type="text" size="30" value="<?php echo ($nuser["uemail"]); ?>" readonly="readonly"/>
			</p>
			<p>
				<label>是否认证:</label>

				<input type="radio" name="renzheng" <?php if($nuser['is_approve']==0)echo 'checked="checked"'; ?> value="0">未认证
				<input type="radio" name="renzheng" <?php if($nuser['is_approve']==1)echo 'checked="checked"'; ?>  value="1">以认证
			</php>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>