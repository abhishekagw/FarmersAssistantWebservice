<?php
include("../connection/connection.php");
?>
  <option>Select Subcategory</option>
      <?php
	  $sel1="select * from tbl_subcategory where category_id='".$_GET['pid']."'";
	  $result2=$con->query($sel1);
	  while($row1=$result2->fetch_assoc())
	  {
		  ?>
          <option value="<?php echo $row1["subcategory_id"]?>"><?php echo $row1["subcategory_name"];?></option>
          <?php
	  }
	  ?>