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
$district="";
$check="";
if(isset($_POST["btnsave"]))
{
	$district=$_POST["txtdistrictname"];
	$check=$_POST["txt_check"];
	if($check=="")
	{
		$district=$_POST["txtdistrictname"];
		$insQry="insert into tbl_district(district_name)values('".$district."')";
		$con->query($insQry);
	}
	else
	{
		$upQry="update tbl_district set district_name='".$district."' where district_id=".$check;
		if($con->query($upQry))
		{
			header("location:District.php");
		}
	}
}

	
if(isset($_GET["did"]))
{
		$delQry="delete from tbl_district where district_id=".$_GET["did"];
		if($con->query($delQry))
		{
			header("location:District.php");
		}

}
if(isset($_GET["eid"]))
{
		$selQry="select *  from tbl_district where district_id=".$_GET["eid"];
		$result=$con->query($selQry);
		$row=$result->fetch_assoc();
		$district=$row['district_name'];
		$check=$row['district_id'];
}

?>


<form id="form1" name="form1" method="post" action="">
  <table  border="1">
    <tr>
      <td>District Name</td>
      <td><label for="txtdistrictname"></label>
      <input type="text" name="txtdistrictname" id="txtdistrictname" value="<?php echo $district?>"/></td>
      <input type="hidden" name="txt_check" id="txt_check" value="<?php echo $check?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
 </form>
 <?php
 $i=0;
 $selQry= "select * from tbl_district";
 $result = $con->query($selQry);
 if($result->num_rows>0)
 {
 ?>
  <table  border="1">
    <tr>
      <td>Sl No </td>
      <td>District</td>
      <td>Action</td>
    </tr>
    <?php
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['district_name'] ?></td>
           <td><a href="District.php?did=<?php echo $data['district_id']?>">Delete</a>&nbsp&nbsp&nbsp;<a href="District.php?eid=<?php echo $data['district_id']?>">Edit</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  <?php
 }
  ?>

</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>
