<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"class="no-js" lang="zxx">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	$i=0;
	
	$disQry="select * from tbl_product a inner join tbl_subcategory s on s.subcategory_id=a.subcategory_id inner join tbl_category c on s.category_id=c.category_id inner join tbl_farmer f on a.farmer_id=f.farmer_id inner join tbl_place p on p.place_id=f.place_id  inner join tbl_district d on p.district_id=d.district_id where product_id=".$_GET["pid"];
    $result1=$con->query($disQry);
        if($result1->num_rows>0)
        {
		while($data1=$result1->fetch_assoc())
		{
			$i++;
		
?>
<section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                               
                                    <img src="../Assets/Files/Farmer/Products/<?php echo $data1["product_photo"]?>" id="current" alt="#">
                                </div>
                                <div class="images">
                                    <img src="../Assets/Files/Farmer/Products/<?php echo $data1["product_photo"]?>" class="img" alt="#">
                                    <img src="../Assets/Files/Farmer/Photo/<?php echo $data1["farmer_photo"]?>" class="img" alt="#">
                                    <img src="../Assets/Files/Farmer/Proofs/<?php echo $data1["farmer_proof"]?>" class="img" alt="#">
                                    <img src="../Assets/Files/Farmer/Products/<?php echo $data1["product_photo"]?>" class="img" alt="#">
                                    <img src="../Assets/Files/Farmer/Products/<?php echo $data1["product_photo"]?>" class="img" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title"><?php echo $data1["product_name"]?></h2>
                            <p class="location"><i class="lni lni-map-marker"></i><a href="javascript:void(0)"><?php echo $data1["place_name"]?>,<?php echo $data1["district_name"]?></a></p>
                            <h3 class="price"><?php echo $data1["product_rate"]?>Rs</h3>
                            <div class="list-info">
                                <h4>Informations</h4>
                                <ul>
                                    <li><span>Category:</span><?php echo $data1["category_name"]?></li>
                                    <li><span>Subcategory</span><?php echo $data1["subcategory_name"]?></li>
                                    <?php
                                        $selQrys="select sum(booking_qty) as totbookqty from tbl_booking b inner join tbl_product p on p.product_id=b.product_id where booking_status=2 and p.product_id=".$_GET["pid"];
                                        $result4=$con->query($selQrys);
                                        $data2=$result4->fetch_assoc();
                                        $totqty=$data1["product_stock"];
                                        $buyqty=$data2["totbookqty"];
                                        $availqty=$totqty-$buyqty;
                                    ?>
                                    <h4><span>Quantity:</span><?php echo $availqty ?>Kg</h4>
                                </ul>
                            </div>
                            <div class="contact-info">
                                <ul>
                                <li>
                                    <a href="booking.php?pid=<?php echo $data1['product_id']; ?>&aid=<?php echo $availqty; ?>" class="call">
                                                <i class="lni lni-phone-set"></i>
                                                <h4 style="color:#fff;">BOOK NOW</h4>
                                                <span>     </span>
                                                </a>
                                    </li>
                                    <li>
                                         <?php if (!empty($_SESSION))
                                            {
                                                // At least one session variable is set
                                             ?> <a href="https://wa.me/+91<?php echo $data1["farmer_contact"]?>" class="btn btn-primary mt-2">
                                                <img src="../Assets/Template/Main/assets/images/booking/whatsapp.svg" alt="WhatsApp Icon" width="20" height="auto">
                                                <span>WhatsApp</span>
                                                </a>
                                           <?php } else {  
                                                // No session variables are set ?>
                                                <a href="<script> alert('Please Login')</script>" class="btn btn-primary mt-2">
                                                <img src="../Assets/Template/Main/assets/images/booking/whatsapp.svg" alt="WhatsApp Icon" width="20" height="auto">
                                                <span>WhatsApp</span>
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
                            <?php echo $data1["product_description"]?>
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
                        <div class="single-block comments">
                            <h3>Comments</h3>
                            <!-- Start Single Comment -->
                            <div class="single-comment">
                                <img src="../Assets/Files/Farmer/Photo/<?php echo $data1["farmer_photo"]?>" alt="#">
                                <div class="content">
                                    <h4>Luis Havens</h4>
                                    <span>25 Feb, 2023</span>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form, by injected humour, or randomised words
                                        which don't look even slightly believable.
                                    </p>
                                    <a href="javascript:void(0)" class="reply"><i class="lni lni-reply"></i> Reply</a>
                                </div>
                            </div>
                            <!-- End Single Comment -->
                        </div>
                        <!-- End Single Block -->
                        <!-- Start Single Block -->
                        <div class="single-block comment-form">
                            <h3>Post a comment</h3>
                            <form action="#" method="POST">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-box form-group">
                                            <input type="text" name="name" class="form-control form-control-custom"
                                                placeholder="Your Name" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-box form-group">
                                            <input type="email" name="email" class="form-control form-control-custom"
                                                placeholder="Your Email" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-box form-group">
                                            <textarea name="#" class="form-control form-control-custom"
                                                placeholder="Your Comments"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="button">
                                            <button type="submit" class="btn">Post Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Single Block -->
                    </div>
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="item-details-sidebar">
                            <!-- Start Single Block -->
                            <div class="single-block author">
                                <h3>Farmer</h3>
                                <div class="content">
                                    <img src="../Assets/Files/Farmer/Photo/<?php echo $data1["farmer_photo"]?>" alt="#">
                                    <h4><?php echo $data1["farmer_name"]?></h4>
                                    <span>Member Since May 15,2023</span>
                                    <a href="javascript:void(0)" class="see-all">See All Ads</a>
                                </div>
                            </div>
                            <!-- End Single Block -->
                            <!-- Start Single Block -->
                            <div class="single-block contant-seller comment-form ">
                                <h3>Contact Us</h3>
                                <form action="#" method="POST">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <input type="text" name="name" class="form-control form-control-custom"
                                                    placeholder="Your Name" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <input type="email" name="email"
                                                    class="form-control form-control-custom" placeholder="Your Email" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <textarea name="#" class="form-control form-control-custom"
                                                    placeholder="Your Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="button">
                                                <button type="submit" class="btn">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
