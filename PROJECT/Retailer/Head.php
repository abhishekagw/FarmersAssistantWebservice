<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from demo.graygrids.com/themes/classigrids/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Oct 2023 16:22:36 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>ClassiGrids - Classified Ads and Listing Website Template.</title>
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
                                    <a class="<?php echo ($currentPage === 'home') ? 'active' : 'dd-menu collapsed'; ?>"
                                      href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-1"
                                      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Home</a>
                                        <ul class="sub-menu collapse" id="submenu-1-1">
                                            <li class="nav-item active"><a href="HomePage.php">Home Default</a></li>
                                            <li class="nav-item"><a href="index2.html">Home Version 2</a></li>
                                            <li class="nav-item"><a href="index3.html">Home Version 3</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="<?php echo ($currentPage === 'search') ? 'active' : 'dd-menu collapsed'; ?>"href="Search.php" aria-label="Toggle navigation">Search</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="<?php echo ($currentPage === 'list') ? 'active' : 'dd-menu collapsed'; ?>"
                                    href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-1"
                                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Lisitngs</a>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            <li class="nav-item"><a href="item-listing-grid.html">Ad Grid</a></li>
                                            <li class="nav-item"><a href="item-listing-list.html">Ad Listing</a></li>
                                            <li class="nav-item"><a href="item-details.html">Ad Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                    <a class="<?php echo ($currentPage === 'page') ? 'active' : 'dd-menu collapsed'; ?>"
                                    href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-1"
                                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Pages</a>
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
                                    <li class="nav-item" >
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
                                    <li class="nav-item dropdown" style="margin-left: 400px;">
                                        <a class="btn btn-account" href="#" id="myAccountDropdown" data-bs-toggle="dropdown">
                                            <i class="lni lni-user"></i> My Account
                                        </a>
                                        <ul class="sub-menu collapse" id="submenu-1-5">
                                            <li class="nav-item"><a href="MyAccount.php">My Account</a>
                                            </li>
                                            <li class="nav-item"><a href="MyOrder.php">My Orders</a></li>
                                            <li class="nav-item"><a href="myads.php">My Ads</a></li>
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
    