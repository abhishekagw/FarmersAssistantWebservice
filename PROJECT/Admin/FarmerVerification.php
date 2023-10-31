<?php
ob_start();
include('Head.php');
?>
<?php
include("../Assets/Connection/Connection.php");
if(isset($_GET["aid"]))
{
	$upQry="update tbl_farmer set farmer_vstatus=1 where farmer_id=".$_GET["aid"];
	$con->query($upQry);
}
if(isset($_GET["rid"]))
{
	$upQry="update tbl_farmer set farmer_vstatus=2 where farmer_id=".$_GET["rid"];
	$con->query($upQry);
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
<?php
$i=0;
$selQry="select * from tbl_farmer f inner join tbl_place p on p.place_id=f.place_id  inner join tbl_district d on p.district_id=d.district_id where farmer_vstatus=0";

$result=$con->query($selQry);
if($result->num_rows>0)
{
?>
  <table  border="1">
    <tr>
      <td>Sl No.</td>
      <td> Name</td>
      <td>Email</td>
      <td>Contact</td>
      <td>Address</td>
      <td>DOB</td>
      <td>Gender</td>
      <td>District</td>
      <td>Place</td>
      <td>Photo</td>
      <td>Proof</td>
      <td>Action</td>
    </tr>
    <?php
	while($data=$result->fetch_assoc())
	{
	$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data["farmer_name"] ?></td>
      <td><?php echo $data["farmer_email"] ?></td>
      <td><?php echo $data["farmer_contact"] ?></td>
      <td><?php echo $data["farmer_address"] ?></td>
      <td><?php echo $data["farmer_dob"] ?></td>
      <td><?php echo $data["farmer_gender"] ?></td>
      <td><?php echo $data["district_name"] ?></td>
      <td><?php echo $data["place_name"] ?></td>
      <td><a href="../Assets/Files/Farmer/Photo/<?php echo $data["farmer_photo"] ?>">Photo</a></td>
      <td><a href="../Assets/Files/Farmer/Proofs/<?php echo $data["farmer_proof"]?>">Proofs</a></td>
      <td><a href="FarmerVerification.php?aid=<?php echo $data['farmer_id']?>">Approve</a>&nbsp&nbsp&nbsp;<a href="FarmerVerification.php?rid=<?php echo $data['farmer_id']?>">Reject</a></td>
    </tr>
    <?php
	}
	?>
  </table>
<?php
}
?>
</form>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>