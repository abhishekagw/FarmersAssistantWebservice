<?php
include("../Assets/Connection/Connection.php");
session_start();
$selQry="select * from tbl_retailer where retailer_id='".$_SESSION["rid"]."'
 ";
$result=$con->query($selQry);
$data=$result->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">

  <table width="200" border="1">
    <tr>
      <td>Name</td>
      <td><?php echo $data["retailer_name"] ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["retailer_address"] ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["retailer_email"] ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["retailer_contact"] ?></td>
    </tr>
    <tr></tr>
  </table>
</form>
</body>
</html>