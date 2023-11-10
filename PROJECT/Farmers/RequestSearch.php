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
<title>Search</title>
</head>

<body>
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Category</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePage.php">Home</a></li>
                        <li>category</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    
<h1 align="center">Search</h1>
    <!-- Start Category -->
    <section class="category-page section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="category-sidebar">
                            <!-- Start Single Widget -->
                            <div class="single-widget search">
                                <h3>Search Ads</h3>
                                <form action="#">
                                    <input type="text" placeholder="Search Here...">
                                    <button type="submit"><i class="lni lni-search-alt"></i></button>
                                </form>
                            </div>
                            <!-- End Single Widget -->
                            <!-- Start Single Widget -->
                            <div class="single-widget">
                            <h3>All Categories</h3>
                            <div class="form-group">
                                <label for="sel_category">Select Category</label>
                                <select class="form-control" name="sel_category" id="sel_category" onchange="Search(this.value)">
                                    <option>Select Category</option>
                                    <?php
                                    $selQry = "select * from tbl_category";
                                    $result = $con->query($selQry);
                                    if ($result->num_rows > 0) {
                                        while ($data = $result->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $data["category_id"] ?>"><?php echo $data["category_name"] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </select>
                        </div>
                    </div>


                            <!-- End Single Widget -->
                            <!-- Start Single Widget -->
                            <div class="single-widget range">
                                <h3>Price Range</h3>
                                <input type="range" class="form-range" name="range" step="1" min="100" max="10000"
                                    value="10" onchange="rangePrimary.value=value">
                                <div class="range-inner">
                                    <label>$</label>
                                    <input type="text" id="rangePrimary" placeholder="100" />
                                </div>
                            </div>
                            <!-- End Single Widget -->
                            <!-- Start Single Widget -->
                            <div class="single-widget banner">
                                <h3>Advertisement</h3>
                                <a href="javascript:void(0)">
                                    <img src="assets/images/banner/banner.jpg" alt="#">
                                </a>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="category-grid-list">
                            <div class="row">
                                <div class="col-12">
                                    <div class="category-grid-topbar">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <h3 class="title">Showing 1-12 of 21 ads found</h3>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <button class="nav-link active" id="nav-grid-tab"
                                                            data-bs-toggle="tab" data-bs-target="#nav-grid" type="button"
                                                            role="tab" aria-controls="nav-grid" aria-selected="true"><i
                                                                class="lni lni-grid-alt"></i></button>
                                                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                                            data-bs-target="#nav-list" type="button" role="tab"
                                                            aria-controls="nav-list" aria-selected="false"><i
                                                                class="lni lni-list"></i></button>
                                                    </div>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                                                                            <div class="tab-content" id="nav-tabContent">
                                                                                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
    <!-- Add mydiv container here -->
    <div id="mydiv">
        <div class="row">
            <?php
            $disQry = "select * from tbl_request a inner join  tbl_category c on a.category_id=c.category_id inner join tbl_retailer r on a.retailer_id=r.retailer_id inner join tbl_place p on p.place_id=r.place_id  inner join tbl_district d on p.district_id=d.district_id";
            $result1 = $con->query($disQry);
            if ($result1->num_rows > 0) {
                $i = 0;
                while ($data1 = $result1->fetch_assoc()) {
                    $i++;
            ?>
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Set a fixed size for each card -->
                        <div class="single-item-grid" style="width: 100%; height: 500px; border: 1px solid #ccc; border-radius: 5px;">
                            <div class="image" >
                                <a href="viewrequest.php?vrid=<?php echo $data1['request_id'] ?>">
                                    <img src="../Assets/Files/Retailer/Requests/<?php echo $data1["request_photo"] ?>" alt="#" style="height: 300px;width:300px object-fit: cover;">
                                    <i class=" cross-badge lni lni-bolt"></i>
                                                        <span class="flat-badge sale">Wanted</span>
                                </a>
                            </div>
                            <div class="content" style="height: 40%; padding: 10px;">
                                <a href="javascript:void(0)" class="tag"><?php echo $data1["category_name"] ?></a>
                                <h3 class="title">
                                    <a href="viewrequest.php?pid=<?php echo $data1['request_id'] ?>">
                                        <?php echo $data1["request_product"] ?>
                                    </a>
                                </h3>
                                <p class="location">
                                    <a href="javascript:void(0">
                                        <i class="lni lni-map-marker"></i>
                                        <?php echo $data1["district_name"] ?>
                                    </a>
                                </p>
                                <ul class="info">
                                    <li class="price">₹<?php echo $data1["request_pricerange"] ?></li>
                                    <li class="like">
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            <?php
                
                }
            }
            ?>
        </div>
    </div>
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
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function Search(cid)
{
	  var categoryId = document.getElementById('sel_category').value;
   

    if (categoryId.toLowerCase() === 'select category') 
	{
        window.location.href='demopage.php';
		return;
        
	}
	
	$.ajax({
		url:"../Assets/AjaxPages/AjaxRequest.php?cid="+cid,
		success: function(html){
			$("#mydiv").html(html);
		}
	});
}
</script>
    <?php

include('Foot.php');
ob_end_flush();
?>
</html>

