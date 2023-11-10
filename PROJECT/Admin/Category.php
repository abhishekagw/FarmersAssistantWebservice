<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

$Category = "";
$check = "";

if(isset($_POST["btn_save"])) {
    $Category = $_POST["txt_categoryname"];
    $check = $_POST["txt_check"];
    if($check == "") {
        $category = $_POST["txt_categoryname"];
        $insQry = "insert into tbl_category(category_name) values('" . $category . "')";
        $con->query($insQry);
    } else {
        $upQry = "update tbl_category set category_name='" . $Category . "' where category_id=" . $check;
        if($con->query($upQry)) {
            header("location: Category.php");
        }
    }
}

if(isset($_GET['did'])) {
    $delQry = "delete from tbl_category where category_id=" . $_GET['did'];
    if($con->query($delQry)) {
        header("location: Category.php");
    }
}

if(isset($_GET["eid"])) {
    $selQry = "select * from tbl_category where category_id=" . $_GET["eid"];
    $result = $con->query($selQry);
    $row = $result->fetch_assoc();
    $Category = $row['category_name'];
    $check = $row['category_id'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Category</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add custom CSS for additional styling -->
    <link rel="stylesheet" type="text/css" href="your-custom-styles.css">
</head>

<body>
<div class="container">
    <h1 class="text-center">Category</h1>
    <div class="row">
        <div class="col-md-6">
            <form id="form1" name="form1" method="post" action="">
                <div class="form-group">
                    <label for="txt_categoryname">Category Name</label>
                    <input type="text" class="form-control" id="txt_categoryname" name="txt_categoryname" value="<?php echo $Category ?>">
                    <input type="hidden" name="txt_check" id="txt_check" value="<?php echo $check ?>">
                </div>
                <button type="submit" name="btn_save" class="btn btn-primary">Save</button>
                <button type="reset" name="btn_cancel" class="btn btn-secondary">Cancel</button>
            </form>
        </div>
    </div>

    <div class="mt-4">
        <?php
        $i = 0;
        $selqry = "select * from tbl_category";
        $result = $con->query($selqry);
        if($result->num_rows > 0) {
        ?>
        <table class="table table-bordered">
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
                    <td><?php echo $data['category_name'] ?></td>
                    <td>
                        <a href="Category.php?did=<?php echo $data['category_id'] ?>" class="btn btn-danger">Delete</a>
                        <a href="Category.php?eid=<?php echo $data['category_id'] ?>" class="btn btn-warning">Edit</a>
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
