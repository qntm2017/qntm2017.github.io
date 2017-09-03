<?php ob_start();
session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="wrapper">
<?php include("top.php");?>  
  <!-- Main wrapper div starts here-->
  <div class="main_wrapper">
  
  <!-- Content wrapper div starts here-->
    <div class="content_wrapper">
   
<?php 
$link = $_GET['url'];
$option = $_GET['option'];
$criteria = $_GET['criteria'];
$book_id = $_GET['bkid'];
require ('connections/connect.php');
$user_log = $_SESSION['user_log'];
// check if the user is logged in
if (!$_SESSION['user_log']){
	header("location:login.php");
}
else{
	// check if number of borrowed is not maximum
	$borrowed = mysql_query("SELECT * FROM borrow_details WHERE user_id = '$user_log' 
	AND status ='1'") or die(mysql_error());
	
	if (mysql_num_rows($borrowed) ==3){
		echo "<p>You have borrowed 3 as the maximum number of books return the ones with you. Click <a href='javascript:history.go(-1)'>here</a> to go back</p>";
	}
	else if(mysql_num_rows($borrowed) < 3){
		$user_id=$user_log;
		
		$date=date('Y-m-d');
		
		$date2 = strtotime(date("Y-m-d", strtotime($date)) . " +2 week");
		$expire = date('Y-m-d',$date2);
		$status=1;
		// check if this book has been borrowed by the same user and has not returned it
		$checker = mysql_query("SELECT * FROM borrow_details WHERE user_id = '$user_id' AND book_id ='$book_id' AND status = '1'") or die(mysql_error());
		if(mysql_num_rows($checker)==0){
			$insert = mysql_query("insert into borrow_details 
			values ('$user_id','$book_id','$date','$expire','$status' )");
			
			$sql2= mysql_query("UPDATE book_details SET `availability`  = '0' 
			WHERE book_id = '$book_id' ")or die(mysql_error());
			header("Location:$link?criteria=$criteria&option=$option");
		}
		else{
			echo "<p>You have borowed this book already Click <a href='javascript:history.go(-1)'>here</a> to go back</p>";
		}
	}
}
?>
    </div>
    <!-- Content wrapper div ends here-->
    
    <!-- Right wrapper div starts here-->
      <div id="side_bar">
        <?php include('index_subject.php'); ?>
      </div>
    <!-- Right wrapper div ends here-->
                  <div class="clr"></div>
        <div><img src="images/edge_bottom.jpg" border="0" /></div>
  </div>
  <p>

  <!-- Main wrapper div ends here-->
</div>
</body>
</html>
<?php ob_flush();?>
