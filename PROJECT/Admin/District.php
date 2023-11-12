<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

$district="";
$check="";
if(isset($_POST["btn_save"]))
{
	$district=$_POST["txtdistrictname"];
	$check=$_POST["txt_check"];
	if($check=="")
	{
		$district=$_POST["txtdistrictname"];
		$insQry="insert into tbl_district(district_name)values('".$district."')";
		if($con->query($insQry))
		{
			header("location:District.php");
		}
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


<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>District</title>
</head>

<body>
<div class="container">
    <h1 class="text-center">District</h1>
    <div class="row">
        <div class="col-md-12">
            <form id="form1" name="form1" method="post" action="">
                <div class="form-group">
                    <label for="txtdistrictname">District Name</label>
                    <input type="text" class="form-control" id="txtdistrictname" name="txtdistrictname" value="<?php echo $district ?>">
                </div>
                <div  class="form-group text-center mt-3">
                    <input type="hidden" name="txt_check" id="txt_check" value="<?php echo $check ?>">
                <button type="submit" name="btn_save" class="btn btn-primary">Save</button>
                <button type="reset" name="btn_cancel" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4">
	<?php
    $i = 0;
    $selQry = "select * from tbl_district";
    $result = $con->query($selQry);
    
    if ($result->num_rows > 0) {
    ?>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($data = $result->fetch_assoc()) {
                    $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['district_name'] ?></td>
                    <td>
                        <a href="District.php?did=<?php echo $data['district_id'] ?>" class="btn btn-danger">Delete</a>
                        <a href="District.php?eid=<?php echo $data['district_id'] ?>" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php
        }
        ?>
    </div>
</div>

<!-- Add Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
ob_end_flush();
include('Foot.php');
?>
</body>
</html>
