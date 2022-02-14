	<?	
		session_start();
				unset($_SESSION["admin_level"]);
				unset($_SESSION["admin_id"]);
				unset($_SESSION["admin_name"]);
				unset($_SESSION["admin_idx"]);


		session_destroy();
		include "../inc/dbconn.php";
		include "../inc/function.php";
		
		
		
	?>
	<meta http-equiv="refresh" content="0;url=index.php" />