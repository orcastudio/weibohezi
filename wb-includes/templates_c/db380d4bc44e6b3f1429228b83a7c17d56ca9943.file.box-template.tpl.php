<?php /* Smarty version Smarty-3.0.7, created on 2011-05-14 08:41:21
         compiled from "F:\PHP_root\weibohezi/wb-includes/templates/box-template.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30454dcdcfb141d029-08760633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db380d4bc44e6b3f1429228b83a7c17d56ca9943' => 
    array (
      0 => 'F:\\PHP_root\\weibohezi/wb-includes/templates/box-template.tpl',
      1 => 1305181072,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30454dcdcfb141d029-08760633',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('posts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
?>
<div class="box">
	<div class="votecell">
		<a class="vote_up_off" title="up vote">up vote</a>
		<span class="vote_count_post"><?php echo $_smarty_tpl->tpl_vars['post']->value['post_vote_count'];?>
</span>
		<a class="vote_down_off" title="down vote">down vote</a>
		<div class="user"><a href=""><img src="<?php echo $_smarty_tpl->getVariable('headimg_path')->value;?>
u<?php echo $_smarty_tpl->tpl_vars['post']->value['post_author'];?>
.jpg"/></a></div>
	</div>
	<div class="box_content">
	<?php echo $_smarty_tpl->tpl_vars['post']->value['post_content'];?>

	<div class="splink">
	<a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['post_slink'];?>
" class="outlink" target="_blank">微博原文</a><a href="">评论( <?php echo $_smarty_tpl->tpl_vars['post']->value['post_comment_count'];?>
 )</a><a href="">转发到微博</a>
	</div>
	</div>
</div>
<?php }} ?>