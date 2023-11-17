<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");

 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$fid=$_GET["fid"];;
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
                        <h1 class="page-title">Profile Details</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePage.php">Home</a></li>
                        <li>Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <!-- Start Dashboard Section -->
   <?php
    $headQry="select * from tbl_farmer where farmer_id='".$fid."'";
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
                            <img src="../Assets/Files/Farmer/Photo/<?php echo $dataH["farmer_photo"]?>" alt="#">
                            <h3><?php echo $dataH["farmer_name"];?></h3>
                                <span><a href="javascript:void(0)">@username</a></span>
                            </h3>
                        </div>
                        <div class="dashboard-menu">
                            
                                <div class="button">
                                                <a class="btn" href="reportuser.php?fid=<?php echo $dataH["farmer_id"]; ?>">Report User</a>
                                            </div>
                                
            
                                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                    <div class="col-12">
                        
                    
                            <div class="row">
                    <?php
$disQry="select * from tbl_product a inner join tbl_subcategory s on s.subcategory_id=a.subcategory_id inner join tbl_category c on s.category_id=c.category_id inner join tbl_farmer f on a.farmer_id=f.farmer_id inner join tbl_place p on p.place_id=f.place_id  inner join tbl_district d on p.district_id=d.district_id where f.farmer_id='".$fid."'ORDER BY product_id DESC";
$reqAd=$con->query($disQry);
while($data1=$reqAd->fetch_assoc())
{
    ?>      
                        <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid" style="width: 100%; height: 500px; border: 1px solid #ccc; border-radius: 5px;">
                            <div class="image" >
                                <a href="viewproduct.php?pid=<?php echo $data1['product_id'] ?>">
                                    <img src="../Assets/Files/Farmer/Products/<?php echo $data1["product_photo"] ?>" alt="#" style="height: 300px;width:300px object-fit: cover;">
                                    <i class=" cross-badge lni lni-bolt"></i>
                                                        <span class="flat-badge sale">Sale</span>
                                </a>
                            </div>
                            <div class="content" style="height: 40%; padding: 10px;">
                                <a href="javascript:void(0)" class="tag"><?php echo $data1["subcategory_name"] ?></a>
                                <h3 class="title">
                                    <a href="viewproduct.php?pid=<?php echo $data1['product_id'] ?>">
                                        <?php echo $data1["product_name"] ?>
                                    </a>
                                </h3>
                                <p class="location">
                                    <a href="javascript:void(0">
                                        <i class="lni lni-map-marker"></i>
                                        <?php echo $data1["district_name"] ?>
                                    </a>
                                </p>
                                <ul class="info">
                                    <li class="price">₹<?php echo $data1["product_rate"] ?></li>
                                    <li class="like">
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                                    <!-- End Single Item -->
                         </div>
                         <?php
}
  ?>
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