<?php
include("../Assets/Connection/Connection.php");
include("SessionValidator.php");

$selQry="select * from tbl_admin where admin_id=".$_SESSION["aid"];
$result=$con->query($selQry);
$data=$result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>AgriConnect - Admin Dashboard</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180"  href="../Assets/Template/Admin/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32"  href="../Assets/Template/Admin/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16"  href="../Assets/Template/Admin/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css"  href="../Assets/Template/Admin/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css"  href="../Assets/Template/Admin/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css"  href="../Assets/Template/Admin/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css">
	<link rel="stylesheet" type="text/css"  href="../Assets/Template/Admin/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="../Assets/Template/Admin/https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="../Assets/Template/Admin/vendors/images/agriconnect4.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="Search Here">
						<div class="dropdown">
							<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
								<i class="ion-arrow-down-c"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">From</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">To</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Subject</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control form-control-sm form-control-line" type="text">
									</div>
								</div>
								<div class="text-right">
									<button class="btn btn-primary">Search</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="../Assets/Template/Admin/vendors/images/img.jpg" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="../Assets/Template/Admin/vendors/images/photo1.jpg" alt="">
										<h3>Lea R. Frith</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="../Assets/Template/Admin/vendors/images/photo2.jpg" alt="">
										<h3>Erik L. Richards</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="../Assets/Template/Admin/vendors/images/photo3.jpg" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="../Assets/Template/Admin/vendors/images/photo4.jpg" alt="">
										<h3>Renee I. Hansen</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
								<li>
									<a href="#">
										<img src="../Assets/Template/Admin/vendors/images/img.jpg" alt="">
										<h3>Vicki M. Coleman</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="../Assets/Template/Admin/vendors/images/adminlogo.png" alt="">
						</span>
						<span class="user-name"><?php echo $data["admin_name"] ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="javascript:void(0);"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="javascript:void(0);"><i class="dw dw-settings2"></i> Setting</a>
						<a class="dropdown-item" href="javascript:void(0);"><i class="dw dw-help"></i> Help</a>
						<a class="dropdown-item" href="../Logout.php"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="HomePage.php">
				<img src="../Assets/Template/Admin/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="../Assets/Template/Admin/vendors/images/agriconnect3.png" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
			
					</li>
					<li class="dropdown">
						<a href="FarmerVerification.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-edit2"></span><span class="mtext">Farmer Verification</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="RetailerVerification.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-library"></span><span class="mtext">Retailer Verification</span>
						</a>
						
					</li>
					<li>
						<a href="VerifiedFarmers.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-calendar1"></span><span class="mtext">Verified Farmers</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="VerifiedRetailers.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-apartment"></span><span class="mtext">Verified Retailers </span>
						</a>
						
					</li>
					<li class="dropdown">
						<a href="RejectedFarmers.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-paint-brush"></span><span class="mtext">Rejected Farmers</span>
						</a>
						
					</li>
					<li class="dropdown">
						<a href="RejectedRetailers.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-paint-brush"></span><span class="mtext">Rejected Farmers</span>
						</a>
						
					</li>
					<li class="dropdown">
						<a href="Category.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-right-arrow1"></span><span class="mtext">Category</span>
						</a>
						
					</li>
					<li class="dropdown">
						<a href="subcategory.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-browser2"></span><span class="mtext">Subcategory</span>
						</a>
						
					</li>

					<li class="dropdown">
						<a href="District.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-copy"></span><span class="mtext">District</span>
						</a>
						
					</li>
					<li class="dropdown">
						<a href="place.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-list3"></span><span class="mtext">Place</span>
						</a>
						<ul class="submenu">
							<li><a href="ShopOrderpie.php">All Orders</a></li>
							<li><a href="ShopProductSalesReport.php">All Sales</a></li>
							
						</ul>
						
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-analytics-21"></span><span class="mtext">Chart</span>
						</a>
						<ul class="submenu">
							<li><a href="ShopOrderpie.php">All Orders</a></li>
							<li><a href="ShopProductSalesReport.php">All Sales</a></li>
							
						</ul>
						
					</li>
					
					<li>
						<a href="ViewComplaint.php" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-chat3"></span><span class="mtext">Complaints</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-invoice"></span><span class="mtext">Invoice</span>
						</a>
					</li>
					<li>
						<div class="dropdown-divider"></div>
					</li>
					
					
					
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>

	<?php
	$fads="SELECT COUNT(*) AS total_ads_farmers FROM tbl_product";
	$result=$con->query($fads);
	$ads=$result->fetch_assoc();

	$rads="SELECT COUNT(*) AS total_ads_retailers FROM tbl_request";
	$result1=$con->query($rads);
	$ads2=$result1->fetch_assoc();

	$tsads="SELECT COUNT(*) AS total_ads_booking FROM tbl_booking where booking_status=2";
	$result2=$con->query($tsads);
	$ads3=$result2->fetch_assoc();

	$tusers="SELECT COUNT(*) as total_users FROM (SELECT retailer_id FROM tbl_retailer UNION ALL SELECT farmer_id FROM tbl_farmer) AS combined_users";
	$result3=$con->query($tusers);
	$ads4=$result3->fetch_assoc();
	
	
	
	?>

	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4>Dashboard</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="HomePage.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="dropdown">
							<a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
								January 2018
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#">Export List</a>
								<a class="dropdown-item" href="#">Policies</a>
								<a class="dropdown-item" href="#">View Assets</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row clearfix progress-box">
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="card-box pd-30 height-100-p" style="height: 150px;">
						<div class="progress-box text-center">
							<h5 class="text-blue padding-top-5 h5">Total Farmer Ads</h5>
							<span class="d-block text-blue" style="font-size: 35px"><b><?php echo $ads["total_ads_farmers"];?></b> <i class="fa fa-line-chart text-blue"></i></span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="card-box pd-30 height-100-p"style="height: 150px;">
						<div class="progress-box text-center">
							 
							<h5 class="text-light-green padding-top-5 h5">Total Retailer Ads</h5>
							<span class="d-block text-light-green" style="font-size: 35px"><b><?php echo $ads2["total_ads_retailers"];?> </b><i class="fa text-light-green fa-line-chart"></i></span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30" >
					<div class="card-box pd-30 height-100-p" style="height: 150px;">
						<div class="progress-box text-center">
							 
							<h5 class="text-light-orange padding-top-5 h5">Total Succesfull Deals</h5>
							<span class="d-block text-light-orange" style="font-size: 35px"><b><?php echo $ads3["total_ads_booking"];?> </b> <i class="fa text-light-orange fa-line-chart"></i></span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
					<div class="card-box pd-30 height-100-p" style="height: 150px;">
						<div class="progress-box text-center">
							 
							<h5 class="text-light-purple padding-top-5 h5">Total Users</h5>
							<span class="text-light-purple d-block" style="font-size: 35px"><b><?php echo $ads4["total_users"];?> </b> <i class="fa text-light-purple fa-line-chart"></i></span>
						</div>
					</div>
				</div>
			</div>
			
			
			
		</div>
	</div>
	<!-- js -->
	<script src="../Assets/Template/Admin/vendors/scripts/core.js"></script>
	<script src="../Assets/Template/Admin/vendors/scripts/script.min.js"></script>
	<script src="../Assets/Template/Admin/vendors/scripts/process.js"></script>
	<script src="../Assets/Template/Admin/vendors/scripts/layout-settings.js"></script>
	<script src="../Assets/Template/Admin/src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
	<script src="../Assets/Template/Admin/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
	<script src="../Assets/Template/Admin/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
	<script src="../Assets/Template/Admin/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
	<script src="../Assets/Template/Admin/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="../Assets/Template/Admin/vendors/scripts/dashboard2.js"></script>
</body>
</html>