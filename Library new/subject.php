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
  <!-- Main wrapper div starts here-->
  <div class="main_wrapper">
  
  <!-- Content wrapper div starts here-->
    <div class="content_wrapper">
   
<?php
	require ('connections/connect.php');
 	$id  = $_GET['id'];
	$name  = $_GET['name'];
	echo "<h1>$name</h1>";
	$sn=1;
	$getcat = mysql_query("SELECT * FROM book_details, author, saved_author, saved_subject, subject 
	WHERE subject.subject_id = '$id' 
	 AND book_details.book_id = saved_subject.book_id
	 AND book_details.book_id = saved_author.book_id LIMIT 30") or die(mysql_error());
	 $count=mysql_num_rows($getcat);

if($count>=1){
	echo "<table border=1 cellspacing=0 cellpadding=3 style='width:680px;'>";
	echo "<tr><td width=40>S/NO</td><td>TITLE</td><td>AUTHOR</td><td width=70>ISBN</td></tr>";

	while($rows = mysql_fetch_array ($getcat)){
		$title = $rows['title'];
		$isbn = $rows['isbn'];
		$author_name = $rows['author_name'];
		echo "<tr><td>$sn</td>
				<td>$title</td>
				<td>$author_name</td>
				<td>$isbn</td>
			  </tr>";
		$sn++;
	}
	echo "</table>";
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
