<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?php
$i=0;
$selQry="select * from tbl_booking b inner join tbl_retailer r on b.retailer_id=r.retailer_id inner join tbl_product p on b.product_id=p.product_id inner join tbl_place s on r.place_id=s.place_id inner join tbl_farmer f on f.farmer_id=p.farmer_id where  booking_status=1 and p.farmer_id='".$_SESSION["fid"]."'";

$result=$con->query($selQry);
if($result->num_rows>0)
{
?>
  <table  border="1">
    <tr>
      <td>Sl No.</td>
      <td>Item Name</td>
      <td>Retailer Name</td>
      <td>Retailer Place</td>
      <td>Quantity</td>
      <td>Price</td>
      <td>Photo</td>
      <td>Action</td>
      <td>Verfication</td>
    
    </tr>
    <?php
	while($data=$result->fetch_assoc())
	{
	$i++;
	$totalqty=$data["booking_qty"];
	$totalprice=$data["product_rate"]; 
  $pid=$data["product_id"];

	
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["product_name"] ?></td>
      <td><?php echo $data["retailer_name"] ?></td>
      <td><?php echo $data["place_name"] ?></td>
      <td><?php echo $data["booking_qty"] ?></td>
      <td><?php echo($totalqty*$totalprice); ?></td>
      <td><a href="../Assets/Files/Farmer/Products/<?php echo $data["product_photo"] ?>">Photo</a></td>
      <td><a href="Rating.php?rid=<?php echo $data['retailer_id'] ?>">Rating</a></td>
      <td><button type="reset" id="pay2Button"   onClick="pay(<?php echo $data["retailer_id"]?>,<?php echo $pid?>)"<?php
       if($data["payment_status"] == 1) echo "";
         else echo 'disabled'; 
         ?>>Verify</button></td>
     
    </tr>
    <?php
	}
	?>
  </table>
<?php
}
?>
</form>
<script>
  function pay(rid,pid)
  {
    window.location.href="verify.php?rid="+rid+"&pid="+pid;
  }
  </script>
</body>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>