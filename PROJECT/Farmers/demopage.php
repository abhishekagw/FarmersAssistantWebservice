<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_GET["bid"]))
{
	$upQry="update tbl_booking set booking_status=1 where booking_id=".$_GET["bid"];
	$con->query($upQry);
}
?>

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Accepted Bookings</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Accepted Bookings</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
    $headQry="select * from tbl_farmer where farmer_id=".$_SESSION["fid"];
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
                            <img src="../Assets/Files/farmer/Photo/<?php echo $dataH["farmer_photo"]?>" alt="#">
                            <h3><?php echo $dataH["farmer_name"];?></h3>
                                <span><a href="javascript:void(0)">@username</a></span>
                            </h3>
                        </div>
                            <div class="dashboard-menu">
                                <ul>
                                <li><a class="active" href="bookinglist.php"><i class="lni lni-dashboard"></i>
                                            All Orders</a></li>
                                    <li><a  href="MyAds.php"><i class="lni lni-dashboard"></i>
                                            Accecpted Orders</a></li>
                                            <li><a href="EditProfile.php"><i class="lni lni-pencil-alt"></i> Edit Profile</a> </li>
                                </ul>
                                            <div class="button">
                                                <a class="btn" href="javascript:void(0)">Logout</a>
                                            </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">Ads</h3>
                            <!-- Start Invoice Items Area -->
                            <div class="invoice-items default-list-style">

                                <div class="default-list-title">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-4 col-12">
                                            <p>Item</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Quantity</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Retailer Name</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Retailer Place</p>
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-12">
                                            <p>Action</p>
                                        </div>
                                        
                                    </div>
                                </div>
<?php
$i=0;
$selQry="select * from tbl_booking b inner join tbl_retailer r on b.retailer_id=r.retailer_id inner join tbl_product p on b.product_id=p.product_id inner join tbl_place s on r.place_id=s.place_id inner join tbl_farmer f on f.farmer_id=p.farmer_id where  booking_status=0 and p.farmer_id='".$_SESSION["fid"]."'";

$result=$con->query($selQry);
if($result->num_rows>0)
{
    while($data=$result->fetch_assoc())
	{
        $totalqty=$data["booking_qty"];
	    $totalprice=$data["product_rate"]; 
        $pid=$data["product_id"];
?>
                                <div class="single-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-4 col-12">
                                        <div class="image">
                                                <a href="javascript:void(0)"><img src="../Assets/Files/Farmer/Products/<?php echo $data["product_photo"]?>" alt="#" style="width: 50px; height: 50px;"></a>
                                            </div>
                                            <p><?php echo $data["product_name"] ?>
                                                <span><?php echo($totalqty*$totalprice); ?>Rs</span>
                                            </p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p><?php echo $totalqty; ?>item</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p><?php echo $data["retailer_name"] ?></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p><?php echo $data["place_name"] ?></p>
                                        </div>
                                        <div class="col-lg-1 col-md-2 col-12">
                                        <a href="bookinglist.php?bid=<?php echo $data['booking_id']?>" class="btn btn-primary" >Approve</a>
                                        </div>
                                        
                                    </div>
                                </div>
                                <?php
	}
}
?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

</body>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>