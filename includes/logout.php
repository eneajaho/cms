<?php include "db.php"; ?>

<?php 
	session_start(); 
	global $cms_url;

	$_SESSION['username'] = null;
	$_SESSION['user_id'] = null;
	$_SESSION['password'] = null;
	$_SESSION['firstname'] = null; 
	$_SESSION['role'] = null;

	session_unset();
	session_destroy();
	session_write_close();
	setcookie(session_name(),'',0,'/');
	session_regenerate_id(true);

	header("location: {$cms_url}/index.php");
?>


