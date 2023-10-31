<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btn_login"]))
{
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	
	$selFarmer="select * from tbl_farmer where farmer_email='".$email."' and farmer_password='".$password."'";
	$result=$con->query($selFarmer);
	
	$selRetailer="select * from tbl_Retailer where retailer_email='".$email."' and retailer_password='".$password."'";
	$result2=$con->query($selRetailer);
	
	$selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$result3=$con->query($selAdmin);
	
	if($data=$result->fetch_assoc())
	{
		$_SESSION["fid"]=$data["farmer_id"];
		header("location:../Farmers/HomePage.php");
	}
	else if($data=$result2->fetch_assoc())
	{
		$_SESSION["rid"]=$data["retailer_id"];
		header("location:../Retailer/HomePage.php");
		
	}
	else if($data=$result3->fetch_assoc())
	{
		$_SESSION["aid"]=$data["admin_id"];
		header("location:../Admin/HomePage.php");
		
	}
	else
	{
		echo "Invalid Account";
	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_login" id="btn_login" value="Submit" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>