<?php 
	session_start();
	$link = $_GET['url'];
	$option = $_GET['option'];
	$criteria = $_GET['criteria'];
	$book_id = $_GET['bkid'];
	require ('connections/connect.php');
	$user_log = $_SESSION['user_log'];
	$user_id=$user_log;
	$sql= mysql_query("UPDATE borrow_details SET `status`  = '0' 
	WHERE book_id = '$book_id' ")or die(mysql_error());
	$sql= mysql_query("UPDATE book_details SET `availability`  = '1' 
	WHERE book_id = '$book_id' ")or die(mysql_error());
	header("Location:$link?criteria=$criteria&option=$option");
?>