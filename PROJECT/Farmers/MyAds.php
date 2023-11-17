<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET["did"]))
{
		$delQry="delete from tbl_product where product_id=".$_GET["did"];
		if($con->query($delQry))
		{
			header("location:MyAds.php");
		}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Ads</title>
</head>
<body>
    <!-- Start Breadcrumbs -->
  <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">My Ads</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePage.php">Home</a></li>
                        <li>My Ads</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <!-- Start Dashboard Section -->
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
                                <li><a  href="MyAccount.php"><i class="lni lni-dashboard"></i>
                                            Dashboard</a></li>
                                <li><a href="EditProfile.php"><i class="lni lni-pencil-alt"></i> Edit Profile</a> </li>
                                <li><a class="active" href="MyAds.php"><i class="lni lni-dashboard"></i>
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
                    <!-- Start Dashboard Sidebar -->
                </div>
                <?php
                $tads="SELECT COUNT(*) AS total_ads FROM tbl_product where farmer_id=".$_SESSION["fid"];
                $tresult=$con->query($tads);
                $tdata=$tresult->fetch_assoc();
                ?>
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title"> Ads</h3>
                            <nav class="list-nav">
                                <ul>
                                    <li class="active"><a href="javascript:void(0)">All Ads <span><?php echo $tdata["total_ads"] ?></span></a></li>
                                    
                                </ul>
                            </nav>
                            <!-- Start Items Area -->
                            <div class="my-items">
                                <!-- Start Item List Title -->
                                <div class="item-list-title">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-5 col-12">
                                            <p>Ads Title</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12" >
                                            <p>SubCategory</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>Quantity</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <p>Action</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End List Title -->
                                <?php
	$i=0;
	$disQry="select * from tbl_product r inner join tbl_subcategory s on s.subcategory_id=r.subcategory_id where farmer_id=".$_SESSION["fid"];
	$result1=$con->query($disQry);
	if($result1->num_rows>0)
	{
		while($data1=$result1->fetch_assoc())
		{
			$i++;
	?>
                                <!-- Start Single List -->
                                <div class="single-item-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5 col-md-5 col-12">
                                            <div class="item-image">
                                                <img src="../Assets/Files/Farmer/Products/<?php echo $data1["product_photo"]?>" alt="#">
                                                <div class="content">
                                                    <h3 class="title"><a href="javascript:void(0)"><?php echo $data1["product_name"]?></a></h3>
                                                    <span class="price">₹<?php echo $data1["product_rate"]?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p><?php echo $data1["subcategory_name"]?></p>
                                        </div>

                                        <?php
                                        $selQrys="select sum(booking_qty) as totbookqty from tbl_booking b inner join tbl_product p on p.product_id=b.product_id where booking_status=2 and p.product_id='".$data1["product_id"]."'";
                                        $result4=$con->query($selQrys);
                                        $data2=$result4->fetch_assoc();
                                        $totqty=$data1["product_stock"];
                                        $buyqty=$data2["totbookqty"];
                                        $availqty=$totqty-$buyqty;
                                    ?>
                                        
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p><?php echo $availqty; ?> Kg</p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12 align-right">
                                            <ul class="action-btn">
                                                <li><a href="EditAds.php?eid=<?php echo $data1['product_id']?>"><i class="lni lni-pencil"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="lni lni-eye"></i></a></li>
                                                <li><a href="MyAds.php?did=<?php echo $data1['product_id']?>"><i class="lni lni-trash"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single List -->
                                <?php
    	}
	}

	?>
                                
                            </div>
                            <!-- End Items Area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dashboard Section -->
    </body>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>