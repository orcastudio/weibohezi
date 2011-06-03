<?php

	define('ABSPATH', dirname(__FILE__) . '/');
	define( 'WBINC', 'wb-includes' );
	require ( ABSPATH . WBINC . '/config/wb-url-config.php' );
	require ( ABSPATH . WBINC . '/config/wb-db-config.php');
	
	if(isset($_POST["publish_editor"]) && isset($_POST["weibolink"])) {
	
		$post_content =  $_POST["publish_editor"].$_POST["imgname"];
		echo $_POST["imgname"];
		exit;
		$post_slink =  $_POST["weibolink"];
		
		$record = array(
			'post_content'		=>$post_content,
			'post_slink'		=>$post_slink,
			'post_date'		=>date ( "Ymd" )
			#TODO insert all the data
		);
		
		$id = $db->insert('wb_posts',$record);
		header('Location: index.php');
	}




#FILE-END