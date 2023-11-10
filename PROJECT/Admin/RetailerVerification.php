<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
if(isset($_GET["aid"]))
{
    $upQry="update tbl_retailer set retailer_vstatus=1 where retailer_id=".$_GET["aid"];
    $con->query($upQry);
}
if(isset($_GET["rid"]))
{
    $upQry="update tbl_retailer set retailer_vstatus=2 where retailer_id=".$_GET["rid"];
    $con->query($upQry);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Retailer Verification</title>

    <!-- Add Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <h1>Farmer Verification</h1>
    <form id="form1" name="form1" method="post" action="">
        <?php
        $selQry="select * from tbl_retailer r inner join tbl_place p on p.place_id=r.place_id  inner join tbl_district d on p.district_id=d.district_id where retailer_vstatus=0";

        $result=$con->query($selQry);
        if($result->num_rows>0)
        {
           
        ?>
        <div class="row">
            <?php
             while($data=$result->fetch_assoc())
             {
                $dob = new DateTime($data["retailer_dob"]);
                $currentDate = new DateTime();
                $age = $currentDate->diff($dob)->y;
            ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../Assets/Files/Retailer/Photo/<?php echo $data["retailer_photo"] ?>" class="card-img-top" style="width: 400px; height: 300px;" alt="Farmer Photo">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data["retailer_name"] ?></h5>
                        <p class="card-text">Email: <?php echo $data["retailer_email"] ?></p>
                        <p class="card-text">Contact: <?php echo $data["retailer_contact"] ?></p>
                        <p class="card-text">Address: <?php echo $data["retailer_address"] ?></p>
                        <p class="card-text">Age: <?php echo $age; ?></p>
                        
                        <p class="card-text">District: <?php echo $data["district_name"] ?></p>
                        <p class="card-text">Place: <?php echo $data["place_name"] ?></p>
                        <a href="../Assets/Files/Retailer/Proofs/<?php echo $data["retailer_proof"]?>" class="btn btn-primary">Proof</a>
                        <a href="RetailerVerification.php?aid=<?php echo $data['retailer_id']?>" class="btn btn-success">Approve</a>
                        <a href="RetailerVerification.php?rid=<?php echo $data['retailer_id']?>" class="btn btn-danger">Reject</a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <?php
        }
        ?>
    </form>
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
