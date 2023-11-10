<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
if (isset($_POST['btn_submit'])) {

  $place = $_POST['txt_place'];
  $district = $_POST['txt_district'];
  $insQry = "insert into tbl_place(place_name,district_id)values('" . $place . "','" . $district . "')";
  if ($conn->query($insQry)) {
    ?>
    <script>
      alert('Inserted');
      window.location = "Place.php";
    </script>
    <?php
      }
}
if (isset($_GET['did'])) {
  $delQry = "delete from tbl_place where place_id =" . $_GET['did'];
  if ($conn->query($delQry)) {
    ?>
    <script>
      window.location = "Place.php";
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
  <title>Place</title>
</head>

<body>
<div class="container">
    <h2 class="mt-3">Place</h2>

    <form id="form1" name="form1" method="post" action="">
        <div class="form-group">
            <label for="txt_district">District</label>
            <select class="form-control" name="txt_district" id="sel_id">
                <option>------Select-------</option>
                <?php
                $selQry = "select * from tbl_district";
                $result = $conn->query($selQry);
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['district_id'] ?>">
                        <?php echo $row['district_name'] ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="txt_place">Place</label>
            <input type="text" class="form-control" name="txt_place" id="place_id" required="required" autocomplete="off" />
        </div>
        <div class="form-group text-center mt-3">
            <!-- Added text-center and mt-3 for center alignment and top margin -->
            <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary">Save</button>
          </div>  
    </form>

    <?php
    $i = 0;
    $selQry = "select * from tbl_place p inner join  tbl_district d on p.district_id=d.district_id";
    $result = $conn->query($selQry);

    if ($result->num_rows > 0) {
    ?>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Sl No</th>
                <th>District</th>
                <th>Place</th>
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
                <td><?php echo $row['place_name'] ?></td>
                <td><a href="Place.php?did=<?php echo $row['place_id'] ?>" class="btn btn-danger">Delete</a></td>
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