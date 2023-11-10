<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verified Farmers</title>
    <!-- Add Bootstrap CSS link -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add custom CSS for additional styling -->
    <link rel="stylesheet" type="text/css" href="your-custom-styles.css">
</head>

<body>
<div class="container">
    <h1 class="text-center">Verified Farmers</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>District</th>
                    <th>Place</th>
                    <th>Photo</th>
                    <th>Proof</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selQry="select * from tbl_farmer f inner join tbl_place p on p.place_id=f.place_id  inner join tbl_district d on p.district_id=d.district_id where farmer_vstatus=1";
                $result=$con->query($selQry);

                if($result->num_rows>0)
                {
                    while($data=$result->fetch_assoc())
                    {
                      $dob = new DateTime($data["farmer_dob"]);
                      $currentDate = new DateTime();
                      $age = $currentDate->diff($dob)->y;
                ?>
                <tr>
                    <td><img src="../Assets/Files/Farmer/Photo/<?php echo $data["farmer_photo"] ?>" style="width: 50px; height: 50px;" alt="Farmer Photo"></td>
                    <td><?php echo $data["farmer_name"] ?></td>
                    <td><?php echo $data["farmer_email"] ?></td>
                    <td><?php echo $data["farmer_contact"] ?></td>
                    <td><?php echo $data["farmer_address"] ?></td>
                    <td><?php echo $age; ?></td>
                    <td><?php echo $data["farmer_gender"] ?></td>
                    <td><?php echo $data["district_name"] ?></td>
                    <td><?php echo $data["place_name"] ?></td>
                    <td><a href="../Assets/Files/Farmer/Photo/<?php echo $data["farmer_photo"] ?>">Photo</a></td>
                    <td><a href="../Assets/Files/Farmer/Proofs/<?php echo $data["farmer_proof"] ?>">Proofs</a></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
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
