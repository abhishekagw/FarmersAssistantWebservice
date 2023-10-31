<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
session_start();
$rid=$_GET["rid"];

if(isset($_POST["btn_submit"]))
{
	$title=$_POST["txt_subject"];
	$content=$_POST["txt_complaint"];
	$insQry="INSERT INTO tbl_complaintretailer(complaintretailer_title,complaintretailer_content,complaintretailer_date,retailer_id,farmer_id)VALUES('".$title."','".$content."',curdate(),'".$rid."','".$_SESSION["fid"]."')";
	$con->query($insQry);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Retailer</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">

  <table  border="1">
    <tr>
      
      <td>Subject</td>
      <td>Complaint</td>
      <td>Retailer ID</td>
      
    </tr>
    <tr>
      
      <td><label for="txt_subject"></label>
      <input type="text" name="txt_subject" id="txt_subject" required="required" autocomplete="off"/></td>
      
      <td><label for="txt_complaint"></label>
      <textarea name="txt_complaint" id="txt_complaint" cols="45" rows="5"required="required" ></textarea></td>
      <td><?php echo $rid ?></td>
    </tr>
    <tr>
      <td colspan="5"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  
  <table  border="1">
    <tr>
      <td>S1 No</td>
      <td>Subject</td>
      <td>Retailer ID</td>
      <td>Complaint</td>
      <td>Date</td>
      <td>Reply</td>
    </tr>
 <?php
$i=0;
$selQry="select * from tbl_complaintretailer where farmer_id='".$_SESSION['fid']."'";
$result=$con->query($selQry);
if($result->num_rows>0)
{
	while($data=$result->fetch_assoc())
	{
		$i++;
?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["complaintretailer_title"]?></td>
      <td><?php echo $data["retailer_id"]?></td>
      <td><?php echo $data["complaintretailer_content"]?></td>
      <td><?php echo $data["complaintretailer_date"]?></td>
      <td><?php echo $data["complaintretailer_reply"]?></td>
    </tr>
    <?php
	}
}
	?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>