<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");

 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Account</title>
</head>
<body>
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePage.php">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
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
                                <li><a class="active"  href="MyAccount.php"><i class="lni lni-dashboard"></i>
                                            Dashboard</a></li>
                                <li><a href="EditProfile.php"><i class="lni lni-pencil-alt"></i> Edit Profile</a> </li>
                                <li><a  href="MyAds.php"><i class="lni lni-dashboard"></i>
                                            My Ads</a></li>
                                <li><a  href="bookinglist.php"><i class="lni lni-dashboard"></i>
                                            All Orders</a></li>
                                    <li><a  href="acceptedbooking.php"><i class="lni lni-dashboard"></i>
                                            Accecpted Orders</a></li>
                                            
                                </ul>
                                            <div class="button">
                                                <a class="btn"  href="../Logout.php">Logout</a>
                                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $totalQry="SELECT COUNT(*) AS total_ads FROM tbl_product WHERE farmer_id =".$_SESSION["fid"];
                $result0=$con->query($totalQry);
                $data=$result0->fetch_assoc();
                $totalads=$data["total_ads"];

                
                ?>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <!-- Start Details Lists -->
                        <div class="details-lists">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <!-- Start Single List -->
                                    <div class="single-list">
                                        <div class="list-icon">
                                            <i class="lni lni-checkmark-circle"></i>
                                        </div>
                                        <h3>
                                        <?php echo $totalads; ?>
                                            <span>Total Ad Posted</span>
                                        </h3>
                                    </div>
                                    <!-- End Single List -->
                                </div>
                                <!-- <div class="col-lg-4 col-md-4 col-12">
                                     
                                    <div class="single-list two">
                                        <div class="list-icon">
                                            <i class="lni lni-bolt"></i>
                                        </div>
                                        <h3>
                                            23
                                            <span>Featured Ads </span>
                                        </h3>
                                    </div>
                                      
                                </div> -->
                                <div class="col-lg-4 col-md-4 col-12">
                                    <!-- Start Single List -->
                                    <div class="single-list three">
                                        <div class="list-icon">
                                            <i class="lni lni-emoji-sad"></i>
                                        </div>
<?php
$totalQry2="SELECT COUNT(*) AS total_ads2 FROM tbl_product p inner join tbl_booking b on p.product_id=b.product_id WHERE farmer_id =".$_SESSION["fid"]." AND b.booking_status=2";
$result2=$con->query($totalQry2);
$data2=$result2->fetch_assoc();
$tads=$data2["total_ads2"];

?>
                                        <h3>
                                        <?php echo $tads; ?>
                                            <span>Completed Ads </span>
                                        </h3>
                                    </div>
                                    <!-- End Single List -->
                                </div>
                            </div>
                        </div>
                        <!-- End Details Lists -->
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12">
                                <!-- Start Activity Log -->
                                <div class="recent-items dashboard-block">
                                    <h3 class="block-title">Top Ads</h3>
                                    <ul>
                                    <?php
 $recQry="SELECT * FROM tbl_product WHERE farmer_id =".$_SESSION['fid'].  " ORDER BY product_stock DESC";
 $result0=$con->query($recQry);
 if($result0->num_rows>0)
 {
 while($data3=$result0->fetch_assoc())
 {

                
                ?>
                                        <li>
                                            <div class="image">
                                                <a href="javascript:void(0)"><img src="../Assets/Files/Farmer/Products/<?php echo $data3["product_photo"]?>" alt="#"></a>
                                            </div>
                                            <a href="javascript:void(0)" class="title"><?php echo $data3["product_name"]; ?></a>
                                            <span class="time"><?php echo $data3['product_date']; ?></span>
                                        </li>
                                        <?php
 }
}
                            ?>
                                    </ul>
                                    
                                </div>
                                <!-- End Activity Log -->
                            </div>
                           
                            <div class="col-lg-6 col-md-12 col-12">
                                <!-- Start Recent Items -->
                                <div class="recent-items dashboard-block">
                                    <h3 class="block-title">Recent Ads</h3>
                                    <ul>
                                    <?php
 $recQry="SELECT * FROM tbl_product WHERE farmer_id =".$_SESSION['fid'].  " ORDER BY product_date DESC";
 $result0=$con->query($recQry);
 if($result0->num_rows>0)
 {
 while($data3=$result0->fetch_assoc())
 {

                
                ?>
                                        <li>
                                            <div class="image">
                                                <a href="javascript:void(0)"><img src="../Assets/Files/Farmer/Products/<?php echo $data3["product_photo"]?>" alt="#"></a>
                                            </div>
                                            <a href="javascript:void(0)" class="title"><?php echo $data3["product_name"]; ?></a>
                                            <span class="time"><?php echo $data3['product_date']; ?></span>
                                        </li>
                                        <?php
 }
}
                            ?>
                                    </ul>
                                </div>
                                <!-- End Recent Items -->
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

</html>