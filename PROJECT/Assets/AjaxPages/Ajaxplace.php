<?php
include("../connection/connection.php");
?>
  <option>Select Place</option>
      <?php
	  $sel1="select * from tbl_place where district_id='".$_GET['pid']."'";
	  $result2=$con->query($sel1);
	  while($row1=$result2->fetch_assoc())
	  {
		  ?>
          <option value="<?php echo $row1["place_id"]?>"><?php echo $row1["place_name"];?></option>
          <?php
	  }
	  ?>