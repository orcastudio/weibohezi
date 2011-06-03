<?php
	
	/**
	 * The index page 
	 * @author sharmocker
	 * @package weibohezi
	 * @LastModify 2011-05-13 14:39
	 */
	define('ABSPATH', dirname(__FILE__) . '/');
	define( 'WBINC', 'wb-includes' );
	require ( ABSPATH . WBINC . '/smarty-libs/Smarty.class.php' );
	require ( ABSPATH . WBINC . '/config/wb-url-config.php' );
	require ( ABSPATH . WBINC . '/config/wb-db-config.php');
	
	#Open the gzip
	#ob_start('ob_gzhandler');
	
	$smarty = new Smarty ();
	$smarty->template_dir 	= ABSPATH . WBINC . '/templates/';
	$smarty->compile_dir 	= ABSPATH . WBINC . '/templates_c/';
	$smarty->cache_dir 		= ABSPATH . WBINC . '/cache/';
	
	#Open the cache
	#$smarty->caching = true;
	#smarty->cache_lifetime = 60;
	
	$smarty->assign('home', INDEXPATH);
	$smarty->assign('headimg_path', HEADIMGPATH);
	$smarty->assign('img_path', IMGPATH);
	
	#Get the hot posts
	$SQL = "SELECT * FROM wb_posts ORDER BY post_vote_count DESC";
	$posts = $db->getList ( $SQL );
	$smarty->assign ( "posts", $posts );
	
	#Get the new posts
	$SQL = "SELECT * FROM wb_posts ORDER BY ID DESC";
	$newposts = $db->getList ( $SQL );
	$smarty->assign ( "newposts", $newposts );
	
	$smarty->display('index-template.tpl');
	
#FILE-END