<?php 
require ('connections/connect.php');

$sql = "SELECT * FROM book_details where title !='' ORDER BY RAND() LIMIT 0,10 "  or die(mysql_error());
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
// If result matched, table row must be greater than 1 row
//$sn=1;
if($count==0){
echo "<li> No Recent Book Added. Please Check Back . </li>";}
else{
echo "<table border=0 cellpadding=2 width ='680'>";
echo "<tr><td><b>TITLE</b></td><td><b>PUBLISHER</b></td><td><b>AUTHOR(S)</b></td></tr>";
while($row=mysql_fetch_array($result)){
$book_id= $row['book_id'];		
$isbn= $row['isbn'];
$publisher_id= $row['publisher_id'];
$title= $row['title'];

 echo "<tr valign='top'><td>$title &nbsp;";

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
 echo "<img src='list.png'> $author_name<br>";
  }
}
echo "</td></tr>";

echo "<tr><td colspan=3 ><hr color='#021282'></td></tr>";
}

}

echo "</table>";
}
?>