<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");

 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"class="no-js" lang="zxx">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>  
<title>Ads</title>
</head>

<body>
  <!-- Start Breadcrumbs -->
  <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Ad Details</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePage.php">Home</a></li>
                        <li>Ad Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <?php
	$vrid=$_GET["vrid"];;
	
	$disQry="select * from tbl_request a inner join  tbl_category c on a.category_id=c.category_id inner join tbl_retailer r on a.retailer_id=r.retailer_id inner join tbl_place p on p.place_id=r.place_id  inner join tbl_district d on p.district_id=d.district_id where request_id='".$vrid."'";
    $result1=$con->query($disQry);
        if($result1->num_rows>0)
        {
		while($data1=$result1->fetch_assoc())
		{
			
		
?>
<section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                               
                                    <img src="../Assets/Files/Retailer/Requests/<?php echo $data1["request_photo"]?>" id="current" alt="#">
                                </div>
                                <div class="images">
                                    <img src="../Assets/Files/Retailer/Requests<?php echo $data1["request_photo"]?>" class="img" alt="#">
                                    <img src="../Assets/Files/Retailer/Photo/<?php echo $data1["retailer_photo"]?>" class="img" alt="#">
                                    <img src="../Assets/Files/Retailer/Proofs/<?php echo $data1["retailer_proof"]?>" class="img" alt="#">
                                    <img src="../Assets/Files/Retailer/Requests/<?php echo $data1["request_photo"]?>" class="img" alt="#">
                                    <img src="../Assets/Files/Retailer/Requests/<?php echo $data1["request_photo"]?>" class="img" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title"><?php echo $data1["request_product"]?></h2>
                            <p class="location"><i class="lni lni-map-marker"></i><a href="javascript:void(0)"><?php echo $data1["place_name"]?>,<?php echo $data1["district_name"]?></a></p>
                            <h3 class="price"><?php echo $data1["request_pricerange"]?>Rs</h3>
                            <div class="list-info">
                                <h4>Informations</h4>
                                <ul>
                                    <li><span>Category:</span><?php echo $data1["category_name"]?></li>
                                    <li></li>
                                      
                                    <h4><span>Quantity:</span><?php echo $data1["request_quantity"]; ?>Kg</h4>
                                </ul>
                            </div>
                            <div class="contact-info">
                                <ul>
                                <li>
                                <?php if (!empty($_SESSION))
                                            {
                                                // At least one session variable is set
                                             ?> 
                                <a href="https://wa.me/+91<?php echo $data1["retailer_contact"]?>" class="call">
                                            <i class="lni lni-phone-set"></i>
                                            Conatact
                                            <span>Call & Get more info</span>
                                        </a>
                                        <?php } else {  ?>
                                            <a href="" class="call">
                                            <i class="lni lni-phone-set"></i>
                                            Conatact
                                            <span>Call & Get more info</span>
                                        </a>
                                        <?php
                                            }
                                          ?> 
                                    </li>
                                   
                                </ul>
                            </div>
                            <div class="social-share">
                                <h4>Share Ad</h4>
                                <ul>
                                    <li><a href="javascript:void(0)" class="facebook"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)" class="twitter"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)" class="google"><i class="lni lni-google"></i></a></li>
                                    <li><a href="javascript:void(0)" class="linkedin"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)" class="pinterest"><i class="lni lni-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-details-blocks">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-12">
                        <!-- Start Single Block -->
                        <div class="single-block description">
                            <h3>Description</h3>
                            <p>
                            <?php echo $data1["request_description"]?>
                            </p>
                        </div>
                        <!-- End Single Block -->
                        <!-- Start Single Block -->
                        <div class="single-block tags">
                            <h3>Tags</h3>
                            <ul>
                                <li><a href="javascript:void(0)">Bike</a></li>
                                <li><a href="javascript:void(0)">Services</a></li>
                                <li><a href="javascript:void(0)">Brand</a></li>
                                <li><a href="javascript:void(0)">Popular</a></li>
                            </ul>
                        </div>
                        <!-- End Single Block -->
                        <!-- Start Single Block -->
                        
                        <!-- End Single Block -->
                    </div>
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="item-details-sidebar">
                            <!-- Start Single Block -->
                            <div class="single-block author">
                                <h3>Retailer</h3>
                                <div class="content">
                                <a href="UserProfile.php?rid=<?php echo $data1["retailer_id"];?>" >
                                    <img src="../Assets/Files/Retailer/Photo/<?php echo $data1["retailer_photo"]?>" alt="#">
                                    <h4><?php echo $data1["retailer_name"]?></h4>
                                    <?php
                                    if($data1["retailer_vstatus"]==1)
                                    {
                                    ?>
                                    Verified Retailer<i class='fa fa-check-circle green-color'></i>
                                    <?php
                                    }
                                    else{
                                        ?>
                                        Not Verified <i class='fa fa-times-circle red-color'></i>
                                        <?php
                                    }
                                    
                                        $originalDate = $data1["retailer_date"];
                                        $dateObject = new DateTime($originalDate);
                                        $formattedDate =  $dateObject->format('F Y');
                                        ?>
                                    <span>Member Since <?php echo $formattedDate;?></span></a><br>
                                    <a href="Userprofile.php?rid=<?php echo $data1["retailer_id"];?>" class="see-all">See All Ads</a>
                                </div>
                            </div>
                            <!-- End Single Block -->
                            <!-- Start Single Block -->
                            <div class="single-block contant-seller comment-form ">
                               
                                        <div class="col-12">
                                            <div class="button">
                                                <a href="ReportAd.php?rid=<?php echo $data1["retailer_id"]; ?>&rqid=<?php echo $data1["request_id"]; ?>" class="btn">Report This Ad</a>
                                            </div>
                                        </div>
                                   
                            </div>
                            <!-- End Single Block -->
                            <!-- Start Single Block -->
                            <div class="single-block ">
                                <h3>Location</h3>
                                <div class="mapouter">
                                    <div class="gmap_canvas"><iframe width="100%" height="300" id="gmap_canvas"
                                            src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                            href="https://putlocker-is.org/"></a><br>
                                        <style>
                                            .mapouter {
                                                position: relative;
                                                text-align: right;
                                                height: 300px;
                                                width: 100%;
                                            }
                                        </style><a href="https://www.embedgooglemap.net/">google map code for website</a>
                                        <style>
                                            .gmap_canvas {
                                                overflow: hidden;
                                                background: none !important;
                                                height: 300px;
                                                width: 100%;
                                            }
                                        </style>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Block -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
        }
    }
?>     
<script type="text/javascript">
        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach(img => {
            img.addEventListener("click", (e) => {
                //reset opacity
                imgs.forEach(img => {
                    img.style.opacity = 1;
                });
                current.src = e.target.src;
                //adding class 
                //current.classList.add("fade-in");
                //opacity
                e.target.style.opacity = opacity;
            });
        });
    </script>
</body>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>
