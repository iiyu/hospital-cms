<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/hgecms/index.php/Admin/Data/doAdd" enctype="multipart/form-data" class="pageForm required-validate" onsubmit="return iframeCallback(this);">
	<!--<form method="post" action="/hgecms/index.php/Admin/Data/uploads" class="pageForm required-validate" enctype="multipart/form-data" onsubmit="return validateCallback(this, navTabAjaxDone);">-->
		<div class="pageFormContent" layoutH="70">
			<p>
				<label>资料标题：</label>
				<input name="title" type="text" size="30" value="100001"/>
			</p>
			<!--<label>上传附件：</label>-->
			<!--<input type="file" name="fil"/>-->
			<dl class="nowrap">
				<dt>上级目录：</dt>
				<dd>
					<input name="district.psort" value="" type="hidden"/>
					<input class="required" name="district.psort" type="text" readonly/>
				</dd>
			</dl>
			<dl class="nowrap">
				<dt>下级目录：</dt>
				<dd>
					<input name="district.sort" value="" type="hidden"/>
					<input class="required" name="district.sort" type="text" readonly/>
					<a class="btnLook" href="/hgecms/Public/Admin/themes/treeLookup.html" lookupGroup="district">查找带回</a>
				</dd>
			</dl>
			<p>
				<label>资料内容：</label>
				 <textarea name="fld_content" rows="23" cols="83"
						   class="editor"
				           skin="default"
						   upLinkUrl="/hgecms/index.php/Admin/Data/uploads"
						   upLinkExt="zip,rar,txt,doc,docx,pdf"
						   upImgUrl="/FileUpload/doXheditorUpload?flag=img"
						   upImgExt="jpg,jpeg,gif,png"
						   upMultiple=6
						   upFlashUrl=""
						   upFlashExt="swf">
            </textarea>
				<!--<textarea name="content" class="editor" rows="20" cols="100"  ></textarea>-->
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