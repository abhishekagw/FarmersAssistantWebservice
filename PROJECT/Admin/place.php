<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$place = "";
$check = "";

if(isset($_POST["btnsave"])) {
    $place = $_POST["txtplace"];
    $district = $_POST["sel_district"];
    $check = $_POST["txt_check"];
    if($check == "") {
    $insQry = "insert into tbl_place(place_name, district_id) values('" . $place . "',' " . $district . "')";
    if($con->query($insQry))
    { ?>
    <script>
      window.location = "place.php";
    </script> <?php }
  } else {
    $upQry = "update tbl_place set place_name='" . $place . "' where place_id=" . $check;
    if($con->query($upQry)) {
        header("location: place.php");
    }
}
}
if(isset($_GET['did'])) {
  $delQry = "delete from tbl_place where place_id=" . $_GET['did'];
  if($con->query($delQry)) {
      header("location: place.php");
  }
}

if(isset($_GET["eid"])) {
  $selQry = "select * from tbl_place where place_id=" . $_GET["eid"];
  $result = $con->query($selQry);
  $row = $result->fetch_assoc();
  $place = $row['place_name'];
  $check = $row['place_id'];
}


// Retrieve categories and subcategories
$selQry = "SELECT * FROM tbl_district c
            INNER JOIN tbl_place s ON c.district_id = s.district_id";
$result = $con->query($selQry);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Place</title>
</head>

<body>

<div class="container">
    <h1 class="text-center">Place</h1>
    <div class="row">
        <div class="col-md-12">
            <form id="form1" name="form1" method="post" action="">
                <div class="form-group">
                    <label for="sel_district">District</label>
                    <select class="form-control" id="sel_district" name="sel_district">
                        <option value="">Select District</option>
                        <?php
                        $seldistrictQry = "select * from tbl_district";
                        $districtResult = $con->query($seldistrictQry);
                        if($districtResult->num_rows > 0) {
                            while($districtData = $districtResult->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $districtData['district_id']?>"><?php echo $districtData['district_name']?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="txtplace">Place</label>
              
               
                    <input type="text" class="form-control" id="txtplace" name="txtplace" value="<?php echo $place ?>">
                    <input type="hidden" name="txt_check" id="txt_check" value="<?php echo $check ?>">
                    </div>
                <div class="form-group text-center mt-3">
                <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
                <button type="reset" name="btncancel" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    
    <h2 class="text-center">District and Place</h2>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>District Name</th>
                <th>Place Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while($data = $result->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['district_name'] ?></td>
                <td><?php echo $data['place_name'] ?></td>
                <td>
                <a href="place.php?did=<?php echo $data['place_id'] ?>" class="btn btn-danger">Delete</a>
                        <a href="place.php?eid=<?php echo $data['place_id'] ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
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

