<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");

 
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>My Orders</title>
    <!-- Include Bootstrap CSS 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <style>
        .containers {
            margin-top: 20px;
        }
        .card {
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
     <!-- Start Breadcrumbs -->
     <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Category</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index-2.html">Home</a></li>
                        <li>category</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <?php
    $headQry="select * from tbl_retailer where retailer_id=".$_SESSION["rid"];
    $headResult=$con->query($headQry);
    $dataH=$headResult->fetch_assoc();
    ?>
    <section class="dashboard section">
        <div class="container">
            <div class="row">
            <div class="col-lg-3 col-md-12 col-12">
                    <!-- Start Dashboard Sidebar -->
                    <div class="dashboard-sidebar">
                        <div class="user-image">
                            <img src="../Assets/Files/Retailer/Photo/<?php echo $dataH["retailer_photo"]?>" alt="#">
                            <h3><?php echo $dataH["retailer_name"];?></h3>
                                <span><a href="javascript:void(0)">@username</a></span>
                            </h3>
                        </div>
    </div>
    </div>
            <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                    <div class="invoice-items default-list-style">
                        
                            <!-- Start Invoice Items Area -->
                            
                            <h2 class="mb-4">     My Orders</h2>
                            <?php
                            $selQry = "select * from tbl_booking b inner join tbl_product p on b.product_id=p.product_id inner join tbl_farmer f on f.farmer_id=p.farmer_id inner join tbl_place s on f.place_id=s.place_id where  retailer_id='".$_SESSION['rid']."'";
                            $result = $con->query($selQry);

                            if($result->num_rows > 0) {
                                while($data = $result->fetch_assoc()) {
                                    $totalqty = $data["booking_qty"];
                                    $totalprice = $data["product_rate"];
                                    $bid = $data["booking_id"];
                                    if ($data["booking_status"] == 0)
                                     {
                                    $status = "Pending";
                                    $statusColor = "orange";
                                     }
                                    else if ($data["booking_status"] == 1) {
                                        $status = "Accepted";
                                        $statusColor = "green";
                                    } elseif ($data["booking_status"] == 2) {
                                        $status = "Completed";
                                        $statusColor = "black";
                                    }
                                    else 
                                    {
                                        $status = "Rejected";
                                    }
                                    ?>
                                <div class="card">
                                <div class="single-list">
                                    <div class="row align-items-center">
                                <div class="card-header bg-light">
                                <h4 class="card-title" style="color:<?php echo $statusColor ?>;">Order <?php echo $status; ?></h4>
                                </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="../Assets/Files/Farmer/Products/<?php echo $data["product_photo"] ?>" alt="Product Image" class="img-fluid" style="height: 150px;width:auto object-fit: cover;">
                                            </div>
                                            <div class="col-md-6">
                                                <h5 class="card-title"><?php echo $data["product_name"] ?></h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Farmer: <?php echo $data["farmer_name"] ?></h6>
                                                <h6 class="card-subtitle mb-2 text-muted">Farmer Place: <?php echo $data["place_name"] ?></h6>
                                                <p class="card-text">Quantity: <?php echo $data["booking_qty"] ?> Kg</p>
                                                <p class="card-text">Price: <?php echo ($totalqty * $totalprice); ?>₹</p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="d-flex flex-column align-items-center">
                                                    <div class="badge badge-pill badge-<?php echo $statusColor; ?> mb-2"><?php echo $status; ?></div>
                                                    <button type="button" class="btn btn-primary" <?php echo $data["booking_status"] == 1 ? 'onClick="pay('.$bid.')"' : 'disabled' ?>>Pay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                                    <?php
                                }
                            }
                            ?>
                                                    <div class="col-12">
                                                        
                                                        <div class="button mb-4">
                                                            <button type="submit" class="btn btn-secondary " name="btn_save" onClick='window.location.href="HomePage.php"'>Back To Home</button>
                                                        </div>
                                                    </div>
                            </div>
                        </div>
                        </div>       
                        
                        
        
    </div>
    </div>
    
    <section>
    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function pay(bid) {
            if (confirm("Are you sure you want to pay for this order?")) {
                window.location.href = "Bill.php?bid=" + bid;
            }
        }
    </script>
</body>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>

