<!doctype html>
<?
	//error_reporting(E_ALL);
	//ini_set("display_errors", 1);
	session_start();
	
	if($login_page==true){
		include "../inc/dbconn.php";
		include "../inc/function.php";
	}else{
		include "../../inc/dbconn.php";
		include "../../inc/function.php";
	}
	
	if(@$_SESSION["admin_id"]=="" && $login_page==false){
		  echo("<script>alert('로그인 후 이용하여 주세요');location.replace('".$server_url."/admin/index.php');</script>");
	}
?>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta charset="UTF-8">

		<title>관리자모드</title>
		<meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?=$server_url?>/admin/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?=$server_url?>/admin/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?=$server_url?>/admin/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?=$server_url?>/admin/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?=$server_url?>/admin/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?=$server_url?>/admin/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?=$server_url?>/admin/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?=$server_url?>/admin/assets/vendor/modernizr/modernizr.js"></script>

	</head>
		<body>
		<section class="body">


	