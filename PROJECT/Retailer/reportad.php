<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");

session_start();
$fid=$_GET["fid"];
$pid=$_GET["pid"];

if(isset($_POST["btn_report"]))
{
	$reason=$_POST["report_option"];
	$describe=$_POST["txt_describe"];
	$insQry="INSERT INTO tbl_reportads(reportads_reason,reportads_describe,reportads_date,farmer_id,retailer_id,reportads_product)VALUES('".$reason."','".$describe."',curdate(),'".$fid."','".$_SESSION["rid"]."','".$pid."')";
	if($con->query($insQry)){
    ?> <script> window.location.href="mailsent.php"</script> <?php 
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       <!-- Start Breadcrumbs -->
  <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Report Ad</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePage.php">Home</a></li>
                        <li><a href="Product.php">Item</a></li>
                        <li>Report Ad</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<!-- Start Dashboard Section -->
<?php
$sql="select * from tbl_product where product_id='".$pid."'";
$result=$con->query($sql);
$data=$result->fetch_assoc();
?>
<section class="dashboard section">
    <div class="container">
                <div class="row">
                    <!-- Start Dashboard Sidebar -->
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="main-content">
                            <!-- Start Post Ad Block Area -->
                            <div class="dashboard-block mt-0">
                                <h3 class="block-title">Report Ad</h3>
                                <div class="inner-block">
                                    <div class="post-ad-tab">
                                            <!-- Start Post Ad Step One Content -->
                                            <div class="step-one-content">
                                                <form class="default-form-style" method="post" enctype="multipart/form-data" >
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Report Reason</label>
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="report_option" value="Offensive Content">
                                                            Offensive content
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="report_option" value="Fraud">
                                                            Fraud
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="report_option" value="Duplicate Ad">
                                                            Duplicate ad
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="report_option" value="Product Sold">
                                                            Product already sold
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="report_option" value="Other">
                                                            Other
                                                        </label>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>Ad Name</label>
                                                            <div class="container" style="  width: 600px; height: 40px;;border: 1px solid gray; padding: 10px"><?php echo  $data["product_name"];?></div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>Describe</label>
                                                            <textarea name="txt_describe"  placeholder="Enter Description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group button mb-0">
                                                                <button type="submit" class="btn " name="btn_report">Report</button>
                                                </div>



                                                </form>
                                            </div>
                                    </div>
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

