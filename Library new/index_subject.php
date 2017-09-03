<p class="heading">Categories</p>
<ul>
<?php
require ('connections/connect.php');
//-query  the database table  
$getid = mysql_query("SELECT DISTINCT subject_id FROM saved_subject") or die(mysql_error());
while ($rowid = mysql_fetch_array($getid)){
	$subject_id = $rowid['subject_id'];
	 $result=mysql_query("SELECT * FROM subject WHERE subject_id = '$subject_id' order by subject_name ASC") or die(mysql_error());  
	  //-run  the query against the mysql query function  ?>
	  
<?php
	  //-create  while loop and loop through result set  
	  while($row=mysql_fetch_array($result)){
	$subject_name = $row['subject_name'];
	$subject_id = $row['subject_id'] 	  
	  ?>
      <li> <?php echo "<a href='subject.php?id=$subject_id&name=$subject_name'>".$subject_name."</a>"; }?></li>
<?php }?>
</ul>