<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
session_start();
$selQry="select * from tbl_farmer where farmer_id='".$_SESSION["fid"]."'";
$result=$con->query($selQry);
$data=$result->fetch_assoc();

if(isset($_POST["btn_update"]))
{
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$address=$_POST["txt_address"];
	$contact=$_POST["txt_contact"];
	$upQry="update tbl_farmer set farmer_name='".$name."',farmer_email='".$email."',farmer_address='".$address."',farmer_contact='".$contact."'where farmer_id='".$_SESSION["fid"]."'";
	$con->query($upQry);
	?>
    <script>
	alert("updated successfully");
	window.location="EditProfile.php";
	</script>
    <?php
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name"  value="<?php echo $data["farmer_name"] ?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $data["farmer_email"] ?>" /></td>
    </tr>
    <tr>
      <td>Address </td>
      <td><label for="txt_address"></label>
      <input type="text" name="txt_address" id="txt_address" value="<?php echo $data["farmer_address"] ?>"  /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" value="<?php echo $data["farmer_contact"] ?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_update" id="btn_update" value="Update" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>