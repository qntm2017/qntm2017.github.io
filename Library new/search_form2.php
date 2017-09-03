<?php 
session_start();
if (!isset($_SESSION['username'])) {
//echo 'no permission';
header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<script language="javascript" src="connections/add.js"></script>
<script language="javascript" src="connections/add_subject.js"></script>

<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="wrapper">
<?php include("top.php");?>  
  <!-- Main wrapper div starts here-->
  <div class="main_wrapper">
  
  <!-- Content wrapper div starts here-->
    <div class="content_wrapper">
   <p align="right"> <a href="javascript:history.go(-1)">previous page</a> || <a href="admin/admin.php">admin</a></p>
      <h1>
        <?php include ("search_form.php");?>
      </h1>
      <p><!-- Content wrapper div ends here-->
  
  <!-- Right wrapper div starts here-->
</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div><div id="side_bar">
        <?php include('sidelinks.php'); ?>
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
