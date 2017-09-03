<?php
$subject_id=$_GET['id'];
require ('connections/connect.php');
//-query  the database table  
	 $sql="SELECT * FROM subject where subject_id=$subject_id " or die(mysql_error());
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
// If result matched, table row must be greater than 1 row
//$sn=1;
if($count>=1){
while($row= mysql_fetch_array($result)){
$subject_id= $row['subject_id'];		
$subject_name= $row['subject_name'];


	echo "<h1>Result for ".$row['subject_name']."</h1>";
echo "<table cellpadding=10 cellspacing=0  align=center border ='1px'>";
echo "<tr><td><b>BOOK TITLE</b></td><td ><b> AUTHOR(S) </b></td><td ><b> PUBLISHER </b></td></tr>";}




$sql2="SELECT * FROM saved_subject  where subject_id = $subject_id order by book_id" or die(mysql_error());

$result2= mysql_query($sql2)or die(mysql_error());
$count2=mysql_num_rows($result2);
if($count2>=1){

while($row2=mysql_fetch_array($result2)){
$book_id = $row2['book_id'];



//$sql2="SELECT * FROM publisher  where publisher_id=$publisher_id" or die(mysql_error());

//$result2= mysql_query($sql2)or die(mysql_error());
//$count2=mysql_num_rows($result2);
//if($count2>=1){
//while($row2=mysql_fetch_array($result2)){
//$book_id= $row2['book_id'];


$sql3="SELECT * FROM book_details  where book_id = $book_id order by book_id" or die(mysql_error());
$result3= mysql_query($sql3)or die(mysql_error());
$count3=mysql_num_rows($result3);
if($count3>=1){
while($row3=mysql_fetch_array($result3)){
$title= $row3['title'];
//$book_id= $row3['book_id'];
$isbn= $row3['isbn'];
$edition= $row3['edition'];
$publisher_id= $row3['publisher_id'];


$sql6="SELECT * FROM publisher  where publisher_id = $publisher_id" or die(mysql_error());
$result6= mysql_query($sql6)or die(mysql_error());
$count6=mysql_num_rows($result6);
if($count6>=1){
while($row6=mysql_fetch_array($result6)){
$publisher_name= $row6['publisher_name'];

 echo "<tr valign='top'><td>$title</td><td>";
$sql4="SELECT * FROM saved_author  where book_id = $book_id" or die(mysql_error());
$result4= mysql_query($sql4)or die(mysql_error());
while($row4=mysql_fetch_array($result4)){
$author_id= $row4['author_id'];
$sql5="SELECT * FROM author  where author_id=$author_id" or die(mysql_error());
$result5= mysql_query($sql5)or die(mysql_error());
while($row5=mysql_fetch_array($result5)){
$author_name= $row5['author_name'];

 echo "<img src='list.png'> $author_name<br> ";
 
}
}
echo "</td><td>$publisher_name</td></tr>";

}
}
//$sn++;
}
}



}
}
echo "</table>";

}

?>


