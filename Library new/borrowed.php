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
	
	if(mysql_num_rows($borrowed) < 1){
		echo "You have not borrowed any book";
	}
	else{

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