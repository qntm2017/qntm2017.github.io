<?php session_start();?>
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
<p></p>
  <!-- Main wrapper div starts here-->
  <div class="main_wrapper">
  
  <!-- Content wrapper div starts here-->
    <div class="content_wrapper">
      <table width="99%" border="0" align="center">
        <tr>
          <td align="left" valign="top"></td>
          <td align="right" valign="top"><?php include ("search_form.php");?></td>
        </tr>
        <tr>
          <td colspan="2" align="left" valign="top"><div id="txtAuthor">
            <?php include ("search_form_process2.php") ?>
          </div></td>
        </tr>
      </table>
    </div>
    <!-- Content wrapper div ends here-->
    
    <!-- Right wrapper div starts here-->
      <div id="side_bar">
        <?php include('index_subject.php'); ?>
      </div>
    <!-- Right wrapper div ends here-->
        <div><img src="images/edge_bottom.jpg" border="0" />
  </div>
</div>
</body>
</html>
