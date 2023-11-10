<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
if (isset($_POST['btn_submit'])) {

  $district = $_POST['txt_district'];
  $insQry = "insert into tbl_district(district_name)values('" . $district . "')";
  if ($conn->query($insQry)) {
    ?>
    <script>
      alert('Inserted');
      window.location = "District.php";
    </script>
    <?php
  }
}

if (isset($_GET['did'])) {
  $delQry = "delete from tbl_district where district_id =" . $_GET['did'];
  if ($conn->query($delQry)) {
    ?>
    <script>
      window.location = "District.php";
    </script>
    <?php
  }
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
    <h2 class="mt-3">District</h2>
    
    <form id="form1" name="form1" method="post" action="">
        <div class="form-group">
            <label for="txt_district">District</label>
            <input type="text" class="form-control" name="txt_district" id="txt_district" required="required" autocomplete="off" />
        </div>
        <div class="form-group text-center mt-3">
            <!-- Added text-center and mt-3 for center alignment and top margin -->
            <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary">Save</button>
          </div>  
    </form>

    <?php
    $i = 0;
    $selQry = "select * from tbl_district";
    $result = $conn->query($selQry);
    
    if ($result->num_rows > 0) {
    ?>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Sl No</th>
                <th>District</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['district_name'] ?></td>
                <td><a href="District.php?did=<?php echo $row['district_id'] ?>" class="btn btn-danger">Delete</a></td>
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

</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>