<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");
$search="";

 
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
<?php
if(isset($_POST['btn_search']))
            {
                $search=$_POST["txt_search"];
            }
?>
    <!-- Start Category -->
    <section class="category-page section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="category-sidebar">
                            <!-- Start Single Widget -->
                            <div class="single-widget search">
                                <h3>Search Ads</h3>
                                <form method='post'>
                                    <input type="text" name="txt_search" value="<?php echo "$search" ?>"placeholder="Search Here...">
                                    <button type="submit" name="btn_search"><i class="lni lni-search-alt"></i></button>
                                </form>
                            </div>
                            <!-- End Single Widget -->
                            <!-- Start Single Widget -->
                            <div class="single-widget">
                            <h3>All Categories</h3>
                            <div class="form-group">
                                <label for="sel_category">Select Category</label>
                                <select class="form-control" name="sel_category" id="sel_category" onchange="getSubcategory(this.value), Search(this.value, 0,'<?php echo $search ?>')">
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

                            <div class="single-widget">
                                <h3>Subcategories</h3>
                                <div class="form-group">
                                    <label for="sel_subcategory">Select Subcategory</label>
                                    <select class="form-control" name="sel_subcategory" id="sel_subcategory" onchange="Search(document.getElementById('sel_category').value, this.value,'<?php echo $search ?>')">
                                        <option>Select</option>
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
            $disQry = "select * from tbl_product a inner join tbl_subcategory s on s.subcategory_id=a.subcategory_id inner join tbl_category c on s.category_id=c.category_id inner join tbl_farmer f on a.farmer_id=f.farmer_id inner join tbl_place p on p.place_id=f.place_id  inner join tbl_district d on p.district_id=d.district_id WHERE product_name LIKE '%$search%'";
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
function getSubcategory(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/Ajaxsubcategory.php?pid="+did,
		success: function(html){
			$("#sel_subcategory").html(html);
		}
	});
}
function Search(cid,sid,search)
{
	  var categoryId = document.getElementById('sel_category').value;
      var subcategoryId = document.getElementById('sel_subcategory').value;
   

    if (categoryId.toLowerCase() === 'select category') 
	{
		window.location.href='Search.php';
		return;
        
	}
    if (subcategoryId.toLowerCase() === 'select category') 
	{
		sid==0;
		return;
        
	}
	
	$.ajax({
		url:"../Assets/AjaxPages/AjaxSearch.php?cid="+cid+"&sid="+sid+"&search="+search,
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

