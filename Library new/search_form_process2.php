<?php 
ob_start();
session_start();
$user_log = $_SESSION['user_log'];
require ('connections/connect.php');
$option = $_GET['option'];
$criteria= $_GET['criteria'];

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = ""){
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if($_GET['option']=='title'){
	echo "<h1>$criteria</h1>";
	$sql = "SELECT * FROM book_details WHERE (`title` LIKE '%$criteria%' ) order by title"  or die(mysql_error());
	$result= mysql_query($sql)or die(mysql_error());
	$count=mysql_num_rows($result);
	// If result matched, table row must be greater than 1 row
	//$sn=1;
	if($count==0){
		echo "<li> No such title exist. Please try again. </li>";}
	else{
		echo "<table border=1 cellspacing=0 cellpadding=3 style='width:680px;'>";
		echo "<tr><td>TITLE</td><td>PUBLISHER</td><td>AUTHOR</td></tr>";
		while($row=mysql_fetch_array($result)){
			$book_id= $row['book_id'];		
			$isbn= $row['isbn'];
			$publisher_id= $row['publisher_id'];
			$title= $row['title'];
			echo "<tr valign='top'><td>$title&nbsp;";

			// test if a user is logged in or not
			if ($_SESSION['user_log']){
				echo "<a href ='books/$book_id.pdf' target='_blank'>Read More...</a>";
			}
			else{
				echo "</td><td>";
			}
			
			$sql4="SELECT * FROM publisher  where publisher_id=$publisher_id" or die(mysql_error());
			$result4= mysql_query($sql4)or die(mysql_error());
			while($row4=mysql_fetch_array($result4)){
				$publisher_name= $row4['publisher_name'];
				echo "<td>$publisher_name</td>";
				echo"<td>";
				$sql6="SELECT * FROM saved_author  where book_id = $book_id" or die(mysql_error());
				$result6= mysql_query($sql6)or die(mysql_error());
				while($row6=mysql_fetch_array($result6)){
					$author_id= $row6['author_id'];
					$sql5="SELECT * FROM author  where author_id=$author_id" or die(mysql_error());
					$result5= mysql_query($sql5)or die(mysql_error());
					while($row5=mysql_fetch_array($result5)){
						$author_name= $row5['author_name'];
						echo "<img src='list.png'> $author_name <br>";					
					}
				}
			}
		}
		echo "</td></tr>";
		echo "</table>";
	}
}
// to display list by author.
elseif ($_GET['option'] == "author"){
	$sql="SELECT * FROM author WHERE (`author_name` LIKE '%$criteria%' ) order by author_name" or die(mysql_error());
	$result= mysql_query($sql)or die(mysql_error());
	$count=mysql_num_rows($result);
	// If result matched, table row must be greater than 1 row
	$sn=1;
	if($count==0){
		echo "<li> No such author exist. Please try again. </li>";}
	else{
		echo "<h1>Books By $criteria</h1>";
		echo "<table border=1 cellspacing=0 cellpadding=3 style='width:680px;'>";
		echo "<tr><td>S/No</td><td>BOOK TITLE</td><td> PUBLISHER </td></tr>";
		
		while($row1=mysql_fetch_array($result)){
			$author_id= $row1['author_id'];		
			$author_name= $row1['author_name'];
	
			//echo "<tr><td>$author_name</td>";
			$sql2="SELECT * FROM saved_author  where author_id=$author_id" or die(mysql_error());
			
			$result2= mysql_query($sql2)or die(mysql_error());
			$count2=mysql_num_rows($result2);
			if($count2>=1){
				while($row2=mysql_fetch_array($result2)){
					$book_id= $row2['book_id'];
					$sql3="SELECT * FROM book_details  where book_id=$book_id" or die(mysql_error());
					$result3= mysql_query($sql3)or die(mysql_error());
					$count3=mysql_num_rows($result3);
					if($count3>=1){
						while($row3=mysql_fetch_array($result3)){
							$title= $row3['title'];
							$publisher_id= $row3['publisher_id'];
							$isbn= $row3['isbn'];
							$edition= $row3['edition'];
							
							$sql4="SELECT * FROM publisher  where publisher_id=$publisher_id" or die(mysql_error());
							$result4= mysql_query($sql4)or die(mysql_error());
							while($row4=mysql_fetch_array($result4)){
								$publisher_name= $row4['publisher_name'];
								echo "<td>$sn</td><td>$title&nbsp;";

						// test if a user is logged in or not
						if ($_SESSION['user_log']){
							echo "<a href ='books/$book_id.pdf' target='_blank'>Read More...</a>";
						}
						else{
                        	echo "</td><td>";
						}
						
							}
							echo "<td>$publisher_name</td></tr>";
						}
						
						//echo "<tr><td></td>";
						$sn++;
					}
				}
			}
		}
	}
	echo "</table>";
}
// to display list by publisher.
elseif ($_GET['option'] == "publisher"){
	$sql="SELECT * FROM publisher WHERE (`publisher_name` LIKE '%$criteria%' ) order by publisher_name " or die(mysql_error());
	$result= mysql_query($sql)or die(mysql_error());
	$count=mysql_num_rows($result);
	// If result matched, table row must be greater than 1 row
	if($count==0){
		echo "<li> No such publisher exist. Please try again. </li>";
	}
	else{
		$sn=1;
		echo "<h1>Books Published at $criteria</h1>";
		echo "<table border=1 cellspacing=0 cellpadding=3 style='width:680px;'>";
		echo "<tr><td>S/No</td><td>BOOK TITLE</td><td> AUTHOR NAME</td></tr>";
		
		while($row1=mysql_fetch_array($result)){
			$publisher_id= $row1['publisher_id'];		
			$publisher_name= $row1['publisher_name'];
			
			$sql3="SELECT * FROM book_details  where publisher_id=$publisher_id" or die(mysql_error());
			$result3= mysql_query($sql3)or die(mysql_error());
			$count3=mysql_num_rows($result3);
			if($count3>=1){
				while($row3=mysql_fetch_array($result3)){
					$title= $row3['title'];
					$book_id= $row3['book_id'];
					$isbn= $row3['isbn'];
					$edition= $row3['edition'];
					
					echo "<tr valign='top'><td>$sn</td><td>$title &nbsp;";

						// test if a user is logged in or not
						if ($_SESSION['user_log']){
							echo "<a href ='books/$book_id.pdf' target='_blank'>Read More...</a></td><td>";
						}
						else{
                        	echo "</td><td>";
						}
						
					$sql4="SELECT * FROM saved_author  where book_id=$book_id" or die(mysql_error());
					$result4= mysql_query($sql4)or die(mysql_error());
					while($row4=mysql_fetch_array($result4)){
						$author_id= $row4['author_id'];
						$sql5="SELECT * FROM author  where author_id=$author_id" or die(mysql_error());
						$result5= mysql_query($sql5)or die(mysql_error());
						while($row5=mysql_fetch_array($result5)){
							$author_name= $row5['author_name'];
							echo "<img src='list.png'> $author_name<br>";
						}
					}
					echo "</td></tr>";
					$sn++;
				}
			}
		}
	}
	echo "</table>";
}

// to display list by category.
elseif ($_GET['option'] == "subject"){
echo "<h1>$criteria</h1>";
$sql="SELECT * FROM subject WHERE (`subject_name` LIKE '%$criteria%' )order by subject_name " or die(mysql_error());
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
// If result matched, table row must be greater than 1 row
$sn=1;
if($count==0){
	echo "<li> No such subject exist. Please try again. </li>";
}
else{
	echo "<table border=1 cellspacing=0 cellpadding=3 style='width:680px;'>";
	echo "<tr><td>S/No</td><td>BOOK TITLE</td><td> AUTHOR NAME</td><td> PUBLISHER </td></tr>";
	
	while($row= mysql_fetch_array($result)){
		$subject_id= $row['subject_id'];		
		$subject_name= $row['subject_name'];
		
		
		$sql2="SELECT * FROM saved_subject  where subject_id = $subject_id" or die(mysql_error());
		
		$result2= mysql_query($sql2)or die(mysql_error());
		$count2=mysql_num_rows($result2);
		if($count2>=1){
		
		while($row2=mysql_fetch_array($result2)){
			$book_id = $row2['book_id'];
			
			$sql3="SELECT * FROM book_details  where book_id = $book_id" or die(mysql_error());
			$result3= mysql_query($sql3)or die(mysql_error());
			$count3=mysql_num_rows($result3);
			if($count3>=1){
			while($row3=mysql_fetch_array($result3)){
				$title= $row3['title'];
				$isbn= $row3['isbn'];
				$edition= $row3['edition'];
				$publisher_id= $row3['publisher_id'];

				$sql6="SELECT * FROM publisher  where publisher_id = $publisher_id" or die(mysql_error());
				$result6= mysql_query($sql6)or die(mysql_error());
				$count6=mysql_num_rows($result6);
				if($count6>=1){
					while($row6=mysql_fetch_array($result6)){
						$link ="search_form_process.php";
						$option = "subject";
						$publisher_name= $row6['publisher_name'];

						echo "<tr valign='top'><td>$sn</td><td>$title ";

						// test if a user is logged in or not
						if ($_SESSION['user_log']){
							echo "<a href ='books/$book_id.pdf' target='_blank'>Read More...</a></td><td>";
						}
						else{
                        	echo "</td><td>";
						}
						$sql4="SELECT * FROM saved_author  where book_id = $book_id" or die(mysql_error());
						$result4= mysql_query($sql4)or die(mysql_error());
						while($row4=mysql_fetch_array($result4)){
							$author_id= $row4['author_id'];
							$sql5="SELECT * FROM author  where author_id=$author_id" or die(mysql_error());
							$result5= mysql_query($sql5)or die(mysql_error());
							while($row5=mysql_fetch_array($result5)){
								$author_name= $row5['author_name'];
								echo "<img src='list.png'> $author_name<br>";
							}
						}
						echo "</td><td>$publisher_name</td></tr>";
					}
				}
				$sn++;
			}
		}
	}
}
}

}
echo "</table>";
}
ob_flush();
?>
