<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
if (isset($_POST['btn_submit'])) {

  $complaint = $_POST['txt_type'];
  $insQry = "insert into tbl_complainttype(type_name)values('" . $complaint . "')";
  if ($conn->query($insQry)) {
    ?>
    <script>
      alert('Inserted');
      window.location = "ComplaintType.php";
    </script>
    <?php
  }
}



if (isset($_GET['did'])) {
  $delQry = "delete from tbl_complainttype where type_id =" . $_GET['did'];
  if ($conn->query($delQry)) {
    ?>
    <script>
      window.location = "ComplaintType.php";
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
  <title>Untitled Document</title>
</head>

<body>
<div class="container">
    <h2 class="mt-3">Complaint Type</h2>
    
    <form id="form1" name="form1" method="post" action="">
        <div class="form-group">
            <label for="txt_type">Complaint Type</label>
            <input type="text" class="form-control" name="txt_type" id="txt_type" required="required" autocomplete="off" />
        </div>
        <div class="form-group text-center mt-3">
            <!-- Added text-center and mt-3 for center alignment and top margin -->
            <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary">Save</button>
          </div>
    </form>

    <?php
    $i = 0;
    $selQry = "select * from tbl_complainttype";
    $result = $conn->query($selQry);
    
    if ($result->num_rows > 0) {
    ?>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Sl No</th>
                <th>Complaint Type</th>
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
                <td><?php echo $row['type_name'] ?></td>
                <td><a href="ComplaintType.php?did=<?php echo $row['type_id'] ?>" class="btn btn-danger">Delete</a></td>
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