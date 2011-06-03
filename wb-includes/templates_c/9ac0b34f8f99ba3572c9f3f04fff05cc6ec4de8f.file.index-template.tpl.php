<?php /* Smarty version Smarty-3.0.7, created on 2011-05-14 08:41:20
         compiled from "F:\PHP_root\weibohezi/wb-includes/templates/index-template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157904dcdcfb0d67044-76363095%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ac0b34f8f99ba3572c9f3f04fff05cc6ec4de8f' => 
    array (
      0 => 'F:\\PHP_root\\weibohezi/wb-includes/templates/index-template.tpl',
      1 => 1305279485,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157904dcdcfb0d67044-76363095',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Weibohezi from kuamroar studio</title>
    <link rel="stylesheet" type="text/css" href="wb-includes/css/global.css" media="all">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"></script>
	<link href="wb-includes/js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css"/>
	<script src="wb-includes/js/facebox/facebox.js" type="text/javascript"></script>
	<script type="text/javascript" src="wb-includes/js/ajax_image_upload/ajaxupload.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('a[rel*=facebox]').facebox();
			$("#imgname").val($("#filename"));
		});
		function wblinkFocus() {
			$("#wblink").val("");
		}
		function wblinkBlur() {
			$("#wblink").val($("#wblink").attr('title'));
		}
	</script>
	
</head>
<body>
	<?php $_template = new Smarty_Internal_Template("header-template.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
	<div id="wapper">
		<?php $_template = new Smarty_Internal_Template("../static/nav.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		<div class="left_box">
			<div class="tab_box"><a href="" class="selected">当天最火</a><a href="">本周最火</a><a href="">本月最火</a></div>
			<?php $_template = new Smarty_Internal_Template("box-template.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		</div>
		<div class="right_box">
			<div class="tab_box"><a href="" class="selected">最新添加</a></div>
			<?php $_template = new Smarty_Internal_Template("new-box-template.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
		</div>
		<div class="clearfix"></div>
	</div>
	<div id="openbox" style="display:">
		<form id="form1" name="form1" method="post" action="<?php echo $_smarty_tpl->getVariable('home')->value;?>
/wb-putbox.php">
		<p><textarea name="publish_editor" title="微博原文内容" ></textarea></P>
		<br/>
		
		<div id="upload_area">
			Images Will Be uploaded here for the demo.<br /><br />
			You can direct them to do any thing you want!
		</div>
		
		<br/><br/>
		<p>
		<input id="wblink" name="weibolink" type="text" onclick="wblinkFocus();" onblur="wblinkBlur();" title="微博原文地址" value="微博原文地址" autocomplete="off" />
		</P>
		<input type="hidden" name="imgname" value="imgname" />
		<p><input type="submit" name="putbox" value="发布盒子" class="putbox" /></p>
		</form>
		<form action="wb-includes/js/ajax_image_upload/wb-ajaxupload.php" method="post" name="sleeker" id="sleeker" enctype="multipart/form-data">
			<input type="hidden" name="maxSize" value="9999999999" />
			<input type="hidden" name="maxW" value="500" />
			<input type="hidden" name="fullPath" value="http://localhost/weibohezi/wb-content/img/2011/5/13/" />
			<input type="hidden" name="relPath" value="../../../wb-content/img/2011/5/13/" />
			<input type="hidden" name="colorR" value="255" />
			<input type="hidden" name="colorG" value="255" />
			<input type="hidden" name="colorB" value="255" />
			<input type="hidden" name="maxH" value="500" />
			<input type="hidden" name="filename" value="filename" />
			<p><input type="file" name="filename" onchange="ajaxUpload(this.form,'wb-includes/js/ajax_image_upload/wb-ajaxupload.php?filename=name&amp;maxSize=9999999999&amp;maxW=500&amp;fullPath=http://localhost/weibohezi/wb-content/img/2011/5/13/&amp;relPath=../../../wb-content/img/2011/5/13/&amp;colorR=255&amp;colorG=255&amp;colorB=255&amp;maxH=500','upload_area','File Uploading Please Wait...&lt;br /&gt;&lt;img src=\'images/loader_light_blue.gif\' width=\'128\' height=\'15\' border=\'0\' /&gt;','&lt;img src=\'images/error.gif\' width=\'16\' height=\'16\' border=\'0\' /&gt; Error in Upload, check settings and path info in source code.'); return false;" /></p>
		</form>
	</div>
</body>
</html>