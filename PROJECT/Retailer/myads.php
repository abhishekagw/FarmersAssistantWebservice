<?php
ob_start();

include('Head.php');
include("../Assets/Connection/Connection.php");

 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET["did"]))
{
		$delQry="delete from tbl_request where request_id=".$_GET["did"];
		if($con->query($delQry))
		{
			header("location:myads.php");
		}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
    <!-- Start Breadcrumbs -->
  <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Post Your Ad</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePage.php">Home</a></li>
                        <li>Post Your Ad</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <!-- Start Dashboard Section -->
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
                        <div class="dashboard-menu">
                                <ul>
                                <li><a   href="MyAccount.php"><i class="lni lni-dashboard"></i>
                                            Dashboard</a></li>
                                <li><a href="EditProfile.php"><i class="lni lni-pencil-alt"></i> Edit Profile</a> </li>
                                <li><a class="active" href="MyAds.php"><i class="lni lni-dashboard"></i>
                                            My Ads</a></li>
                                <li><a  href="MyOrder.php"><i class="lni lni-dashboard"></i>
                                            My Orders</a></li>
                                    
                                            
                                </ul>
                                            <div class="button">
                                                <a class="btn"  href="../Logout.php">Logout</a>
                                            </div>
                        </div>
                    </div>
                    <!-- Start Dashboard Sidebar -->
                </div>
                <?php
                $tads="SELECT COUNT(*) AS total_ads FROM tbl_request where retailer_id=".$_SESSION["rid"];
                $tresult=$con->query($tads);
                $tdata=$tresult->fetch_assoc();
                ?>
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">My Ads</h3>
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
                                            <p>Category</p>
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
	$disQry="select * from tbl_request r inner join tbl_category s on s.category_id=r.category_id where retailer_id=".$_SESSION["rid"];
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
                                                <img src="../Assets/Files/Retailer/Requests/<?php echo $data1["request_photo"]?>" alt="#">
                                                <div class="content">
                                                    <h3 class="title"><a href="javascript:void(0)"><?php echo $data1["request_product"]?></a></h3>
                                                    <span class="price">₹<?php echo $data1["request_pricerange"]?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p><?php echo $data1["category_name"]?></p>
                                        </div>
                                        
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p><?php echo $data1["request_quantity"]?></p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12 align-right">
                                            <ul class="action-btn">
                                                <li><a href="Editproduct.php?eid=<?php echo $data1['request_id']?>"><i class="lni lni-pencil"></i></a></li>
                                                <li><a href="javascript:void(0)"><i class="lni lni-eye"></i></a></li>
                                                <li><a href="myads.php?did=<?php echo $data1['request_id']?>"><i class="lni lni-trash"></i></a></li>
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