<?php
ob_start();
include('Head.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btnsave"]))
{
	$place=$_POST["txtplace"];
	$district=$_POST["sel_district"];
	$insQry="insert into tbl_place(district_id,place_name) values(".$district.",'".$place."')";
	$con->query($insQry);
}

?>
<form id="form1" name="form1" method="post" action="">
  <table width="311" height="253" border="1">
    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district">
        <option value="">Select District</option>
        <?php
		$selQry="select *from tbl_district";
		$result=$con->query($selQry);
		if($result->num_rows>0)
		{
			while($data=$result->fetch_assoc())
			{
		?>
        <option value="<?php echo $data["district_id"]?>"><?php echo $data["district_name"]?></option>
        <?php
			}
		}
		
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="txtplace"></label>
      <input type="text" name="txtplace" id="txtplace" /></td>
    </tr>
    <tr>
     
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>

