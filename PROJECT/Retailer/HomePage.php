<?php
include("../Assets/Connection/Connection.php");

session_start();
$selQry="select * from tbl_retailer where retailer_id=".$_SESSION["rid"];
$result=$con->query($selQry);
$data=$result->fetch_assoc();

?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from demo.graygrids.com/themes/AgriConnect/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Oct 2023 16:22:36 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>AgriConnect - Classified Ads and Listing Website Template.</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="../Assets/Template/Main/assets/images/favicon.svg" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&amp;display=swap" rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="../Assets/Template/Main/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Assets/Template/Main/assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="../Assets/Template/Main/assets/css/animate.css" />
    <link rel="stylesheet" href="../Assets/Template/Main/assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="../Assets/Template/Main/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="../Assets/Template/Main/assets/css/main.css" />

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index-2.html">
                                <img src="../Assets/Template/Main/assets/images/logo/logo.svg" alt="Logo">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="active dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-1"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Home</a>
                                        <ul class="sub-menu collapse" id="submenu-1-1">
                                            <li class="nav-item active"><a href="index-2.html">Home Default</a></li>
                                            <li class="nav-item"><a href="index2.html">Home Version 2</a></li>
                                            <li class="nav-item"><a href="index3.html">Home Version 3</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="Search.php" aria-label="Toggle navigation">Categories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Listings</a>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            <li class="nav-item"><a href="item-listing-grid.html">Ad Grid</a></li>
                                            <li class="nav-item"><a href="item-listing-list.html">Ad Listing</a></li>
                                            <li class="nav-item"><a href="item-details.html">Ad Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-4"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Pages</a>
                                        <ul class="sub-menu mega-menu collapse" id="submenu-1-4">
                                            <li class="single-block">
                                                <ul>
                                                    <li class="mega-menu-title">Essential Pages</li>
                                                    <li class="nav-item"><a href="about-us.html">About Us</a></li>
                                                    <li class="nav-item"><a href="item-details.html">Ads Details</a></li>
                                                    <li class="nav-item"><a href="post-item.html">Ads Post</a></li>
                                                    <li class="nav-item"><a href="pricing.html">Pricing Table</a></li>
                                                    <li class="nav-item"><a href="registration.html">Sign Up</a></li>
                                                    <li class="nav-item"><a href="login.html">Sign In</a></li>
                                                    <li class="nav-item"><a href="contact.html">Contact Us</a></li>
                                                    <li class="nav-item"><a href="faq.html">FAQ</a></li>
                                                    <li class="nav-item"><a href="404.html">Error Page</a></li>
                                                    <li class="nav-item"><a href="mail-success.html">Mail Success</a>
                                                    </li>
                                                    <li class="nav-item"><a href="coming-soon.html">Comming Soon</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="single-block">
                                                <ul>
                                                    <li class="mega-menu-title">Dashboard</li>
                                                    <li class="nav-item"><a href="dashboard.html">Account Overview</a>
                                                    </li>
                                                    <li class="nav-item"><a href="profile-settings.html">My Profile</a>
                                                    </li>
                                                    <li class="nav-item"><a href="my-items.html">My Ads</a></li>
                                                    <li class="nav-item"><a href="favourite-items.html">Favorite Ads</a>
                                                    </li>
                                                    <li class="nav-item"><a href="post-item.html">Ad post</a></li>
                                                    <li class="nav-item"><a href="bookmarked-items.html">Bookmarked Ad</a>
                                                    </li>
                                                    <li class="nav-item"><a href="messages.html">Messages</a></li>
                                                    <li class="nav-item"><a href="delete-account.html">Close account</a>
                                                    </li>
                                                    <li class="nav-item"><a href="invoice.html">Invoice</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-5"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Blog</a>
                                        <ul class="sub-menu collapse" id="submenu-1-5">
                                            <li class="nav-item"><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a>
                                            </li>
                                            <li class="nav-item"><a href="blog-single.html">Blog Single</a></li>
                                            <li class="nav-item"><a href="blog-single-sidebar.html">Blog Single
                                                    Sibebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <!--<li class="nav-item">
                                        <a href="logout.php" class="btn btn-logout">
                                            <i class="lni lni-enter"></i> Logout
                                        </a>
                                    </li>-->
                                    <li class="nav-item dropdown"  style="margin-left: 400px;">
                                        <a class="btn btn-account" href="#" id="myAccountDropdown" data-bs-toggle="dropdown" >
                                            <i class="lni lni-user"></i> <?php echo "    ".$data["retailer_name"]?>
                                        </a>
                                        <ul class="sub-menu collapse" id="submenu-1-5">
                                            <li class="nav-item"><a href="blog-grid-sidebar.html">My Account</a>
                                            </li>
                                            <li class="nav-item"><a href="blog-single.html">My Orders</a></li>
                                            <li class="nav-item"><a href="blog-single-sidebar.html">My Ads</a></li>
                                            <li class="nav-item"><a href="blog-single-sidebar.html"><i class="lni lni-enter"></i>Logut</a></li>
                                        </ul>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="button header-button">
                                <a href="Request.php" class="btn">Post an Ad</a>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->

    <!-- Start Hero Area -->
    <section class="hero-area overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="hero-text text-center">
                        <!-- Start Hero Text -->
                        <div class="section-heading">
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">Welcome to AgriConnect</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">Connect, Buy, and Sell Agriculture<br>
                            Crops, Livestock, and More!</p>
                        </div>
                        <!-- End Search Form -->
                        <!-- Start Search Form -->
                        <div class="search-form wow fadeInUp" data-wow-delay=".7s">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12 p-0">
                                    <div class="search-input">
                                        <label for="keyword"><i class="lni lni-search-alt theme-color"></i></label>
                                        <input type="text" name="keyword" id="keyword" placeholder="Product keyword">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 p-0">
                                    <div class="search-input">
                                        <label for="category"><i class="lni lni-grid-alt theme-color"></i></label>
                                        <select name="category" id="category">
                                            <option value="none" selected disabled>Categories</option>
                                            <option value="none">Vehicle</option>
                                            <option value="none">Electronics</option>
                                            <option value="none">Mobiles</option>
                                            <option value="none">Furniture</option>
                                            <option value="none">Fashion</option>
                                            <option value="none">Jobs</option>
                                            <option value="none">Real Estate</option>
                                            <option value="none">Animals</option>
                                            <option value="none">Education</option>
                                            <option value="none">Matrimony</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 p-0">
                                    <div class="search-input">
                                        <label for="location"><i class="lni lni-map-marker theme-color"></i></label>
                                        <select name="location" id="location">
                                            <option value="none" selected disabled>Locations</option>
                                            <option value="none">New York</option>
                                            <option value="none">California</option>
                                            <option value="none">Washington</option>
                                            <option value="none">Birmingham</option>
                                            <option value="none">Chicago</option>
                                            <option value="none">Phoenix</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12 p-0">
                                    <div class="search-btn button">
                                        <button class="btn"><i class="lni lni-search-alt"></i> Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Search Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Categories Area -->
    <section class="categories">
        <div class="container">
            <div class="cat-inner">
                <div class="row">

                    <div class="col-12 p-0">
                        <div class="category-slider">
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/car.svg" alt="#">
                                </div>
                                <h3>Crops</h3>
                                <h5 class="total">35</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/laptop.svg" alt="#">
                                </div>
                                <h3>Livestocks</h3>
                                <h5 class="total">22</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/matrimony.svg" alt="#">
                                </div>
                                <h3>Matrimony</h3>
                                <h5 class="total">55</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/furniture.svg" alt="#">
                                </div>
                                <h3>Furnitures</h3>
                                <h5 class="total">21</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/jobs.svg" alt="#">
                                </div>
                                <h3>Jobs</h3>
                                <h5 class="total">44</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/real-estate.svg" alt="#">
                                </div>
                                <h3>Real Estate</h3>
                                <h5 class="total">65</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/laptop.svg" alt="#">
                                </div>
                                <h3>Education</h3>
                                <h5 class="total">35</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/hospital.svg" alt="#">
                                </div>
                                <h3>Health & Beauty</h3>
                                <h5 class="total">22</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/tshirt.svg" alt="#">
                                </div>
                                <h3>Fashion</h3>
                                <h5 class="total">25</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/education.svg" alt="#">
                                </div>
                                <h3>Education</h3>
                                <h5 class="total">42</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/controller.svg" alt="#">
                                </div>
                                <h3>Gadgets</h3>
                                <h5 class="total">32</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/travel.svg" alt="#">
                                </div>
                                <h3>Backpacks</h3>
                                <h5 class="total">15</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="Search.php" class="single-cat">
                                <div class="icon">
                                    <img src="../Assets/Template/Main/assets/images/categories/watch.svg" alt="#">
                                </div>
                                <h3>Watches</h3>
                                <h5 class="total">65</h5>
                            </a>
                            <!-- End Single Category -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- /End Categories Area -->

    <!-- Start Items Grid Area -->
    <section class="items-grid section custom-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Explore the Latest Items</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Explore the newest agricultural products, livestock, equipment, and more in the Market.</p>
                    </div>
                </div>
            </div>
            <div class="single-head">
                <div class="row">

<?php
$selAd="select * from tbl_product a inner join tbl_subcategory s on s.subcategory_id=a.subcategory_id inner join tbl_category c on s.category_id=c.category_id inner join tbl_farmer f on a.farmer_id=f.farmer_id inner join tbl_place p on p.place_id=f.place_id  inner join tbl_district d on p.district_id=d.district_id";
$resAd=$con->query($selAd);
while($dataAd=$resAd->fetch_assoc())
{
    ?>

                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Start Single Grid -->
                        <div class="single-grid wow fadeInUp" data-wow-delay=".2s" style="width: 100%; height: 550px; border: 1px solid #ccc; border-radius: 5px;">
                            <div class="image">
                                <a href="item-details.html" class="thumbnail"><img src="../Assets/Files/Farmer/Products/<?php echo $dataAd["product_photo"] ?>" alt="#" style="height: 300px;width:300px object-fit: cover;"></a>
                                <div class="author">
                                    
                                    <p class="sale">For Sale</p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="top-content">
                                    <a href="javascript:void(0)" class="tag"><?php echo $dataAd["category_name"] ?></a>
                                    <h3 class="title">
                                        <a href="viewproduct.php?pid=<?php echo $dataAd['product_id'] ?>"><?php echo $dataAd["product_name"] ?></a>
                                    </h3>
                                    <ul class="info-list">
                                        <li><a href="javascript:void(0)"><i class="lni lni-map-marker"></i> <?php echo $dataAd["district_name"] ?></a></li>
                                        <li><a href="javascript:void(0)"><i class="lni lni-timer"></i> Feb 18, 2023</a></li>
                                    </ul>
                                </div>
                                <div class="bottom-content">
                                    <p class="price">Price: <span>₹<?php echo $dataAd["product_rate"] ?></span></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Grid -->
                    </div>
<?php
}
?>

                    
                </div>
            </div>
        </div>
    </section>
    <!-- /End Items Grid Area -->

  

    <!-- Start Browse Cities Area -->
    <section class="browse-cities section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Browse By Cities</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Find specific agricultural ads and retailer requirements based on location - browse by cities for localized opportunities.</p>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Start Single City -->
                    <div class="single-city wow fadeInUp" data-wow-delay=".2s">
                        <a href="Search.php" class="info-box">
                            <div class="image">
                                <img src="../Assets/Template/Main/assets/images/cities/img1.jpg" alt="#">
                            </div>
                            <div class="content">
                                <h4 class="name">
                                    New York City
                                    <span>155 Ads</span>
                                </h4>
                            </div>
                            <div class="more-btn">
                                <i class="lni lni-circle-plus"></i>
                            </div>
                        </a>
                    </div>
                    <!-- Start Single City -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Start Single City -->
                    <div class="single-city wow fadeInUp" data-wow-delay=".4s">
                        <a href="Search.php" class="info-box">
                            <div class="image">
                                <img src="../Assets/Template/Main/assets/images/cities/img2.jpg" alt="#">
                            </div>
                            <div class="content">
                                <h4 class="name">
                                    Philadelphia
                                    <span>288 Ads</span>
                                </h4>
                            </div>
                            <div class="more-btn">
                                <i class="lni lni-circle-plus"></i>
                            </div>
                        </a>
                    </div>
                    <!-- Start Single City -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Start Single City -->
                    <div class="single-city wow fadeInUp" data-wow-delay=".6s">
                        <a href="Search.php" class="info-box">
                            <div class="image">
                                <img src="../Assets/Template/Main/assets/images/cities/img3.jpg" alt="#">
                            </div>
                            <div class="content">
                                <h4 class="name">
                                    Los Angeles
                                    <span>95 Ads</span>
                                </h4>
                            </div>
                            <div class="more-btn">
                                <i class="lni lni-circle-plus"></i>
                            </div>
                        </a>
                    </div>
                    <!-- Start Single City -->
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- Start Single City -->
                    <div class="single-city wow fadeInUp" data-wow-delay=".2s">
                        <a href="Search.php" class="info-box">
                            <div class="image">
                                <img src="../Assets/Template/Main/assets/images/cities/img4.jpg" alt="#">
                            </div>
                            <div class="content">
                                <h4 class="name">
                                    San Francisco
                                    <span>355 Ads</span>
                                </h4>
                            </div>
                            <div class="more-btn">
                                <i class="lni lni-circle-plus"></i>
                            </div>
                        </a>
                    </div>
                    <!-- Start Single City -->
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- Start Single City -->
                    <div class="single-city wow fadeInUp" data-wow-delay=".4s">
                        <a href="Search.php" class="info-box">
                            <div class="image">
                                <img src="../Assets/Template/Main/assets/images/cities/img5.jpg" alt="#">
                            </div>
                            <div class="content">
                                <h4 class="name">
                                    Newe Orleans
                                    <span>76 Ads</span>
                                </h4>
                            </div>
                            <div class="more-btn">
                                <i class="lni lni-circle-plus"></i>
                            </div>
                        </a>
                    </div>
                    <!-- Start Single City -->
                </div>
            </div>
        </div>
    </section>
    <!-- /End Browse Cities Area -->

    <!-- Start Call Action Area -->
    <section class="call-action overlay section">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <div class="inner">
                        <div class="content">
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">Do you have something to sell?</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">Post your ad for free on AgriConnect</p>
                            <div class="button wow fadeInUp" data-wow-delay=".8s">
                                <a href="javascript:void(0)" class="btn">Post an ad now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call Action Area -->

    <!-- Start Items Tab Area -->
    <section class="items-tab section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Trending Requirement Ads</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Explore the most sought-after Requirements ads, from popular crops and livestock to in-demand equipment and services.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-latest-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-latest" type="button" role="tab" aria-controls="nav-latest"
                                aria-selected="true">Latest Ads</button>
                            <button class="nav-link" id="nav-popular-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-popular" type="button" role="tab" aria-controls="nav-popular"
                                aria-selected="false">Popular Ads</button>
                            <button class="nav-link" id="nav-random-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-random" type="button" role="tab" aria-controls="nav-random"
                                aria-selected="false">Random Ads</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-latest" role="tabpanel"
                            aria-labelledby="nav-latest-tab">
                            <div class="row">
                            <?php
$disQry="select * from tbl_request a inner join  tbl_category c on a.category_id=c.category_id inner join tbl_retailer r on a.retailer_id=r.retailer_id inner join tbl_place p on p.place_id=r.place_id  inner join tbl_district d on p.district_id=d.district_id ORDER BY request_id DESC";
$reqAd=$con->query($disQry);
while($dataAd2=$reqAd->fetch_assoc())
{
    ?>                               
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="../Assets/Files/Retailer/Requests/<?php echo $dataAd2["request_photo"]?>" alt="#" style="height: 200px;width:150px object-fit: cover;"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Want</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag"><?php echo $dataAd2["category_name"]?></a>
                                            <h3 class="title">
                                                <a href="item-details.html"><?php echo $dataAd2["request_product"]?></a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i class="lni lni-map-marker">
                                                    </i><?php echo $dataAd2["district_name"]?></a></p>
                                            <ul class="info">
                                                <li class="price">₹<?php echo $dataAd2["request_pricerange"]?>  Price Range</li>
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
                        <div class="tab-pane fade" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                            <div class="row">
                            <?php
$disQry="select * from tbl_request a inner join  tbl_category c on a.category_id=c.category_id inner join tbl_retailer r on a.retailer_id=r.retailer_id inner join tbl_place p on p.place_id=r.place_id  inner join tbl_district d on p.district_id=d.district_id ORDER BY r.retailer_id DESC";
$reqAd=$con->query($disQry);
while($dataAd2=$reqAd->fetch_assoc())
{
    ?>                                 
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="../Assets/Files/Retailer/Requests/<?php echo $dataAd2["request_photo"]?>" alt="#" style="height: 200px;width:150px object-fit: cover;"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Want</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag"><?php echo $dataAd2["category_name"]?></a>
                                            <h3 class="title">
                                                <a href="item-details.html"><?php echo $dataAd2["request_product"]?></a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i class="lni lni-map-marker">
                                                    </i><?php echo $dataAd2["district_name"]?></a></p>
                                            <ul class="info">
                                                <li class="price">₹<?php echo $dataAd2["request_pricerange"]?>  Price Range</li>
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
                        <div class="tab-pane fade" id="nav-random" role="tabpanel" aria-labelledby="nav-random-tab">
                            <div class="row">
                            <?php
$disQry="select * from tbl_request a inner join  tbl_category c on a.category_id=c.category_id inner join tbl_retailer r on a.retailer_id=r.retailer_id inner join tbl_place p on p.place_id=r.place_id  inner join tbl_district d on p.district_id=d.district_id";
$reqAd=$con->query($disQry);
while($dataAd2=$reqAd->fetch_assoc())
{
    ?>   
                                <div class="col-lg-3 col-md-4 col-12">
                                    <!-- Start Single Item -->
                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="item-details.html"><img src="../Assets/Files/Retailer/Requests/<?php echo $dataAd2["request_photo"]?>" alt="#" style="height: 200px;width:150px object-fit: cover;"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Want</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag"><?php echo $dataAd2["category_name"]?></a>
                                            <h3 class="title">
                                                <a href="item-details.html"><?php echo $dataAd2["request_product"]?></a>
                                            </h3>
                                            <p class="location"><a href="javascript:void(0)"><i class="lni lni-map-marker">
                                                    </i><?php echo $dataAd2["district_name"]?></a></p>
                                            <ul class="info">
                                                <li class="price">₹<?php echo $dataAd2["request_pricerange"]?>  Price Range</li>
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
        </div>
    </section>
    <!-- End Items Tab Area -->
  <!-- Start Why Choose Area -->
  <section class="why-choose section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Why Choose Us</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="choose-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <i class="lni lni-book"></i>
                                    <h4>Fully Documented</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".4s">
                                    <i class="lni lni-leaf"></i>
                                    <h4>Clean & Modern Design</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".6s">
                                    <i class="lni lni-cog"></i>
                                    <h4>Completely Customizable</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <i class="lni lni-pointer-up"></i>
                                    <h4>User Friendly</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".4s">
                                    <i class="lni lni-layout"></i>
                                    <h4>Awesome Layout</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <!-- Start Single List -->
                                <div class="single-list wow fadeInUp" data-wow-delay=".6s">
                                    <i class="lni lni-laptop-phone"></i>
                                    <h4>Fully Responsive</h4>
                                    <p>Buy and sell everything from used cars to mobile phones and computer or search
                                        for property.</p>
                                </div>
                                <!-- Start Single List -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Why Choose Area -->
    <!-- Start Pricing Table Area -->
    <section class="pricing-table section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Pricing Plan</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".2s">
                        <!-- Table Head -->
                        <div class="table-head">
                            <div class="price">
                                <h2 class="amount">$00<span class="duration">/ Month</span></h2>
                            </div>
                            <h4 class="title">Free</h4>
                        </div>
                        <!-- End Table Head -->
                        <!-- Table List -->
                        <ul class="table-list">
                            <li>One Listing</li>
                            <li>Contact Display</li>
                            <li>Image Gallery</li>
                            <li>30 Days Availablity</li>
                            <li>Non-Featured</li>
                            <li>Business Tagline</li>
                        </ul>
                        <!-- End Table List -->
                        <!-- Table Bottom -->
                        <div class="button">
                            <a class="btn" href="javascript:void(0)">Select Plan</a>
                        </div>
                        <!-- End Table Bottom -->
                    </div>
                    <!-- End Single Table-->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".4s">
                        <!-- Table Head -->
                        <div class="table-head">
                            <div class="price">
                                <h2 class="amount">$59<span class="duration">/ Month</span></h2>
                            </div>
                            <h4 class="title">Standard</h4>
                        </div>
                        <!-- End Table Head -->
                        <!-- Table List -->
                        <ul class="table-list">
                            <li>One Listing</li>
                            <li>Contact Display</li>
                            <li>Image Gallery</li>
                            <li>60 Days Availablity</li>
                            <li>Non-Featured</li>
                            <li>Business Tagline</li>
                        </ul>
                        <!-- End Table List -->
                        <!-- Table Bottom -->
                        <div class="button">
                            <a class="btn" href="javascript:void(0)">Select Plan</a>
                        </div>
                        <!-- End Table Bottom -->
                    </div>
                    <!-- End Single Table-->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single Table -->
                    <div class="single-table wow fadeInUp" data-wow-delay=".6s">
                        <!-- Table Head -->
                        <div class="table-head">
                            <div class="price">
                                <h2 class="amount">$99<span class="duration">/ Month</span></h2>
                            </div>
                            <h4 class="title">Premium</h4>
                        </div>
                        <!-- End Table Head -->
                        <!-- Table List -->
                        <ul class="table-list">
                            <li>One Listing</li>
                            <li>Contact Display</li>
                            <li>Image Gallery</li>
                            <li>90 Days Availablity</li>
                            <li>Non-Featured</li>
                            <li>Business Tagline</li>
                        </ul>
                        <!-- End Table List -->
                        <!-- Table Bottom -->
                        <div class="button">
                            <a class="btn" href="javascript:void(0)">Select Plan</a>
                        </div>
                        <!-- End Table Bottom -->
                    </div>
                    <!-- End Single Table-->
                </div>
            </div>
        </div>
    </section>
    <!--/ End Pricing Table Area -->

    <!-- Start Testimonials Area -->
    <section class="testimonials section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">What People Say</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row testimonial-slider">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Testimonial -->
                    <div class="single-testimonial">
                        <div class="quote-icon">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="author">
                            <img src="../Assets/Template/Main/assets/images/testimonial/testi1.jpg" alt="#">
                            <h4 class="name">
                                Jane Anderson
                                <span class="deg">Founder & CEO</span>
                            </h4>
                        </div>
                        <div class="text">
                            <p>"It’s amazing how much easier it has been to meet new people and create instant
                                connections. I have the exact same personality, the only thing that has changed is my
                                mindset and a few behaviors."</p>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Testimonial -->
                    <div class="single-testimonial">
                        <div class="quote-icon">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="author">
                            <img src="../Assets/Template/Main/assets/images/testimonial/testi2.jpg" alt="#">
                            <h4 class="name">
                                Devid Samuyel
                                <span class="deg">Web Developer</span>
                            </h4>
                        </div>
                        <div class="text">
                            <p>"It’s amazing how much easier it has been to meet new people and create instant
                                connections. I have the exact same personality, the only thing that has changed is my
                                mindset and a few behaviors."</p>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Single Testimonial -->
                    <div class="single-testimonial">
                        <div class="quote-icon">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="author">
                            <img src="../Assets/Template/Main/assets/images/testimonial/testi3.jpg" alt="#">
                            <h4 class="name">
                                Jully Sulli
                                <span class="deg">Ui/Ux Designer</span>
                            </h4>
                        </div>
                        <div class="text">
                            <p>"It’s amazing how much easier it has been to meet new people and create instant
                                connections. I have the exact same personality, the only thing that has changed is my
                                mindset and a few behaviors."</p>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Area -->

    <!-- Start How Works Area -->
    <section class="how-works section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">How it Works</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Start Single Work -->
                    <div class="single-work wow fadeInUp" data-wow-delay=".2s">
                        <span class="serial">01</span>
                        <h3>Create Account</h3>
                        <p>Lorem ipsum dolor sit amet constur adipisicing sed do eiusmod tempor incididunt labore.</p>
                    </div>
                    <!-- End Single Work -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Start Single Work -->
                    <div class="single-work wow fadeInUp" data-wow-delay=".4s">
                        <span class="serial">02</span>
                        <h3>Post Your Ads</h3>
                        <p>Lorem ipsum dolor sit amet constur adipisicing sed do eiusmod tempor incididunt labore.</p>
                    </div>
                    <!-- End Single Work -->
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <!-- Start Single Work -->
                    <div class="single-work wow fadeInUp" data-wow-delay=".6s">
                        <span class="serial">03</span>
                        <h3>Sell Your Item</h3>
                        <p>Lorem ipsum dolor sit amet constur adipisicing sed do eiusmod tempor incididunt labore.</p>
                    </div>
                    <!-- End Single Work -->
                </div>
            </div>
        </div>
    </section>
    <!-- End How Works Area -->

    <!-- Start Latest News Area -->
    <div class="latest-news-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">latest news</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single News -->
                    <div class="single-news wow fadeInUp" data-wow-delay=".3s">
                        <div class="image">
                            <a href="blog-single-sidebar.html"><img class="thumb" src="../Assets/Template/Main/assets/images/blog/blog1.jpg" alt="#"></a>
                        </div>
                        <div class="content-body">
                            <h4 class="title"><a href="blog-single-sidebar.html">10 Things Successful Mompreneurs Do
                                    Different</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis soluta libero molestiae,
                                id reiciendis ipsum. </p>
                            <div class="meta-details">
                                <ul>
                                    <li><a href="javascript:void(0)">Jan 24,2023</a></li>
                                    <li><a href="javascript:void(0)">Technology</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single News -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single News -->
                    <div class="single-news wow fadeInUp" data-wow-delay=".5s">
                        <div class="image">
                            <a href="blog-single-sidebar.html"><img class="thumb" src="../Assets/Template/Main/assets/images/blog/blog2.jpg" alt="#"></a>
                        </div>
                        <div class="content-body">
                            <h4 class="title"><a href="blog-single-sidebar.html">A digital prescription for the industry.</a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis soluta libero molestiae,
                                id reiciendis ipsum. </p>
                            <div class="meta-details">
                                <ul>
                                    <li><a href="javascript:void(0)">Feb 20,2023</a></li>
                                    <li><a href="javascript:void(0)">Magazine</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single News -->
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Single News -->
                    <div class="single-news wow fadeInUp" data-wow-delay=".7s">
                        <div class="image">
                            <a href="blog-single-sidebar.html"><img class="thumb" src="../Assets/Template/Main/assets/images/blog/blog3.jpg" alt="#"></a>
                        </div>
                        <div class="content-body">
                            <h4 class="title"><a href="blog-single-sidebar.html">Strategic & commercial approach with
                                    issues.</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis soluta libero molestiae,
                                id reiciendis ipsum. </p>
                            <div class="meta-details">
                                <ul>
                                    <li><a href="javascript:void(0)">Mar 15,2023</a></li>
                                    <li><a href="javascript:void(0)">Technology</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single News -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Latest News Area -->

    <!-- Start Newsletter Area -->
    <div class="newsletter section">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="title">
                            <i class="lni lni-alarm"></i>
                            <h2>Newsletter</h2>
                            <p>We don't send spam so don't worry.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form">
                            <form action="#" method="get" target="_blank" class="newsletter-form">
                                <input name="EMAIL" placeholder="Your email address" type="email">
                                <div class="button">
                                    <button class="btn">Subscribe<span class="dir-part"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Newsletter Area -->

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer mobile-app">
                            <h3>Mobile Apps</h3>
                            <div class="app-button">
                                <a href="javascript:void(0)" class="btn">
                                    <i class="lni lni-play-store"></i>
                                    <span class="text">
                                        <span class="small-text">Get It On</span>
                                        Google Play
                                    </span>
                                </a>
                                <a href="javascript:void(0)" class="btn">
                                    <i class="lni lni-apple"></i>
                                    <span class="text">
                                        <span class="small-text">Get It On</span>
                                        App Store
                                    </span>
                                </a>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Locations</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        <li><a href="javascript:void(0)">Chicago</a></li>
                                        <li><a href="javascript:void(0)">New York City</a></li>
                                        <li><a href="javascript:void(0)">San Francisco</a></li>
                                        <li><a href="javascript:void(0)">Washington</a></li>
                                        <li><a href="javascript:void(0)">Boston</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <ul>
                                        <li><a href="javascript:void(0)">Los Angeles</a></li>
                                        <li><a href="javascript:void(0)">Seattle</a></li>
                                        <li><a href="javascript:void(0)">Las Vegas</a></li>
                                        <li><a href="javascript:void(0)">San Diego</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-link">
                            <h3>Quick Links</h3>
                            <ul>
                                <li><a href="javascript:void(0)">About Us</a></li>
                                <li><a href="javascript:void(0)">How It's Works</a></li>
                                <li><a href="javascript:void(0)">Login</a></li>
                                <li><a href="javascript:void(0)">Signup</a></li>
                                <li><a href="javascript:void(0)">Help & Support</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer f-contact">
                            <h3>Contact</h3>
                            <ul>
                                <li>23 New Design Str, Lorem Upsum 10<br> Hudson Yards, USA</li>
                                <li>Tel. +(123) 1800-567-8990 <br> Mail. support@AgriConnect.com</li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="content">
                                <ul class="footer-bottom-links">
                                    <li><a href="javascript:void(0)">Terms of use</a></li>
                                    <li><a href="javascript:void(0)"> Privacy Policy</a></li>
                                    <li><a href="javascript:void(0)">Advanced Search</a></li>
                                    <li><a href="javascript:void(0)">Site Map</a></li>
                                    <li><a href="javascript:void(0)">Information</a></li>
                                </ul>
                                <p class="copyright-text">Designed and Developed by <a href="https://graygrids.com/"
                                        rel="nofollow" target="_blank">GrayGrids</a>
                                </p>
                                <ul class="footer-social">
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="../Assets/Template/Main/assets/js/bootstrap.min.js"></script>
    <script src="../Assets/Template/Main/assets/js/wow.min.js"></script>
    <script src="../Assets/Template/Main/assets/js/tiny-slider.js"></script>
    <script src="../Assets/Template/Main/assets/js/glightbox.min.js"></script>
    <script src="../Assets/Template/Main/assets/js/main.js"></script>
    <script type="text/javascript">
        //========= Category Slider 
        tns({
            container: '.category-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 2,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 5,
                },
                1170: {
                    items: 6,
                }
            }
        });
        
        //========= testimonial 
        tns({
            container: '.testimonial-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1170: {
                    items: 2,
                }
            }
        });
    </script>
</body>


<!-- Mirrored from demo.graygrids.com/themes/AgriConnect/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Oct 2023 16:23:07 GMT -->
</html> 