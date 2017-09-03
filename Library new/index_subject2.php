
<?php

require ('../connections/connecting.php');
//-query  the database table  
	 $sql="SELECT * FROM subject order by subject_name" or die(mysql_error());  
	  //-run  the query against the mysql query function  ?>
	  <select name="subject" onchange="showSubject(this.value)">
		<option value="null">select..</option>
<?php
	  $result=mysql_query($sql)or die(mysql_error()); 
		//echo'<select name="subject">';
			//echo '<option value="" > Select Subject...</option>';
	  //-create  while loop and loop through result set  
	  while($row=mysql_fetch_array($result)){ ?>
              <option value="<?php echo $row['subject_id'];?>" > <?php echo $row['subject_name']; }?></option>
              </select>


