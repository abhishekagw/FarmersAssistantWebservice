<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$subcategory = "";
$check = "";

if(isset($_POST["btnsave"])) {
    $subcategory = $_POST["txtcategory"];
    $category = $_POST["sel_category"];
    $check = $_POST["txt_check"];
    if($check == "") {
    $insQry = "insert into tbl_subcategory(subcategory_name, category_id) values('" . $subcategory . "', " . $category . ")";
    $con->query($insQry);
  } else {
    $upQry = "update tbl_subcategory set subcategory_name='" . $subcategory . "' where subcategory_id=" . $check;
    if($con->query($upQry)) {
        header("location: subcategory.php");
    }
}
}
if(isset($_GET['did'])) {
  $delQry = "delete from tbl_subcategory where subcategory_id=" . $_GET['did'];
  if($con->query($delQry)) {
      header("location: subcategory.php");
  }
}

if(isset($_GET["eid"])) {
  $selQry = "select * from tbl_subcategory where subcategory_id=" . $_GET["eid"];
  $result = $con->query($selQry);
  $row = $result->fetch_assoc();
  $subcategory = $row['subcategory_name'];
  $check = $row['subcategory_id'];
}


// Retrieve categories and subcategories
$selQry = "SELECT * FROM tbl_category c
            INNER JOIN tbl_subcategory s ON c.category_id = s.category_id";
$result = $con->query($selQry);
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
    <h1 class="text-center">Subcategory</h1>
    <div class="row">
        <div class="col-md-12">
            <form id="form1" name="form1" method="post" action="">
                <div class="form-group">
                    <label for="sel_category">Category</label>
                    <select class="form-control" id="sel_category" name="sel_category">
                        <option value="">Select Category</option>
                        <?php
                        $selCategoryQry = "select * from tbl_category";
                        $categoryResult = $con->query($selCategoryQry);
                        if($categoryResult->num_rows > 0) {
                            while($categoryData = $categoryResult->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $categoryData['category_id']?>"><?php echo $categoryData['category_name']?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="txtcategory">Subcategory</label>
              
               
                    <input type="text" class="form-control" id="txtcategory" name="txtcategory" value="<?php echo $subcategory ?>">
                    <input type="hidden" name="txt_check" id="txt_check" value="<?php echo $check ?>">
                    </div>
                <div class="form-group text-center mt-3">
                <button type="submit" name="btnsave" class="btn btn-primary">Save</button>
                <button type="reset" name="btncancel" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    
    <h2 class="text-center">Categories and Subcategories</h2>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Category Name</th>
                <th>Subcategory Name</th>
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
                <td><?php echo $data['category_name'] ?></td>
                <td><?php echo $data['subcategory_name'] ?></td>
                <td>
                <a href="subcategory.php?did=<?php echo $data['subcategory_id'] ?>" class="btn btn-danger">Delete</a>
                        <a href="subcategory.php?eid=<?php echo $data['subcategory_id'] ?>" class="btn btn-warning">Edit</a>
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
