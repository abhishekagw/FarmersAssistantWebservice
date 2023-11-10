<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
 
if(isset($_POST["btn_change"]))
{
	$currentpass=$_POST["txt_currentpassword"];
	$newpass=$_POST["txt_newpassword"];
	$confirmpass=$_POST["txt_confirmpassword"];
	$upPass="select * from tbl_farmer where farmer_password='".$currentpass."' and farmer_id='".$_SESSION["fid"]."'";
	$result=$con->query($upPass);
	if($data=$result->fetch_assoc())
	{
		if($newpass==$confirmpass)
		{
		$upQry="update tbl_farmer set farmer_password='".$newpass."' where farmer_id='".$_SESSION["fid"]."'";
		$con->query($upQry);
		?>
			<script>
			alert("Password Changed");
			window.location.href='../Farmers/HomePage.php';
			</script>
    	  <?php
		}
		else
		{ ?>
			<script>
			alert("Password doesnt Match");
			</script>
    	  <?php
		}
	}
	else
	{
		?>
			<script>
			alert("Wrong Password");
			</script>
    	  <?php
		
	}
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
  <table  border="1" align="center">
    <tr>
      <td>Current Password</td>
      <td><label for="txt_currentpassword"></label>
      <input type="text" name="txt_currentpassword" id="txt_currentpassword" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="password" name="txt_newpassword" id="txt_newpassword" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_confirmpassword"></label>
      <input type="password" name="txt_confirmpassword" id="txt_confirmpassword" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_change" id="btn_change" value="Change" />
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