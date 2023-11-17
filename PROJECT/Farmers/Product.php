<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");

 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$requestrate="";
$requestname="";
$requestquantity="";
$requestdescription="";
$check="";
if(isset($_POST["btn_save"]))
{
   

 
        $photo = $_FILES['upload']['name'];
        $path = $_FILES['upload']['tmp_name'];

       
        
        move_uploaded_file($path,"../Assets/Files/Farmer/Products/".$photo);
         
	
	$name=$_POST["txt_name"];
	$rate=$_POST["txt_rate"];
	$description=$_POST["txt_description"];
	$category=$_POST["sel_category"];
	$stock=$_POST["txt_quantity"];
    $subcategory=$_POST["sel_subcategory"];
	$check=$_POST["txt_check"];
	if($check=="")
	{
	$insQry="insert into tbl_product(product_name,product_rate,subcategory_id,product_photo,product_stock,farmer_id,product_description,product_date)values('".$name."','".$rate."','".$subcategory."','".$photo."','".$stock."','".$_SESSION["fid"]."','".$description."',curdate())";
	if($con->query($insQry))
	{
        header("location:myads.php");
		?>
			<script>
			alert("Request Added");
			</script>
    	  <?php
	}
	}
	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post Ad</title>
<style>
    .warning {
    color: red;
    font-size: 14px;
    margin-top: 5px;
    display: block;
}

    </style>
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
<section class="dashboard section">
        <div class="container">
            <div class="row">
                <!-- Start Dashboard Sidebar -->
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <!-- Start Post Ad Block Area -->
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">Post Ad</h3>
                            <div class="inner-block">
                                <!-- Start Post Ad Tab -->
                                <div class="post-ad-tab">
                                
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-item-info" role="tabpanel"
                                            aria-labelledby="nav-item-info-tab">
                                            <!-- Start Post Ad Step One Content -->
                                            <div class="step-one-content">
                                                <form class="default-form-style" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="postform">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Add Title*</label>
                                                                <input name="txt_name" type="text"
                                                                    placeholder="Enter Title">
                                                                    <span id="nameWarning" class="warning"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Category*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                            <label for="sel_category"></label>
                                                                        <select name="sel_category" id="sel_category" onChange="getPlace(this.value)">
                                                                        <option value="">Select Category</option>
                                                                        <?php
                                                                        $selQry="select * from tbl_category";
                                                                        $result=$con->query($selQry);
                                                                        if($result->num_rows>0)
                                                                        {
                                                                            while($data=$result->fetch_assoc())
                                                                            { 
                                                                                ?>
                                                                                <option value="<?php echo $data["category_id"] ?>"><?php echo $data["category_name"]?></option>
                                                                                <?php
                                                                                
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <span id="categoryWarning" class="warning"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>SubCategory*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                            <label for="sel_category"></label>
                                                                            <select name="sel_subcategory" id="sel_subcategory">
                                                                            <option value="">Select SubCategory</option>
                                                                    </select>
                                                                    <span id="subcategoryWarning" class="warning"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                              
                                            <!-- Start Post Ad Step One Content -->
                                        
                                        
                                            <!-- Start Post Ad Step Two Content -->
                                            
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Price*</label>
                                                                <input name="txt_rate" type="text"
                                                                    placeholder="Enter Price">
                                                                    <span id="rateWarning" class="warning"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Price Type*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                    <select class="user-chosen-select">
                                                                        <option value="none">Select an option</option>
                                                                        <option value="none">Fixed</option>
                                                                        <option value="none">Price On Call</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="tag-label">Quantity<span>in KG
                                                                        </span></label>
                                                                <input name="txt_quantity" type="text"
                                                                    placeholder="Enter Quantity">
                                                                    <span id="qtyWarning" class="warning"></span>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="upload-input">
                                                            <input type="file" id="upload" name="upload">
                                                            <label for="upload" class="text-center content" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                                                <span class="text">
                                                                    <span class="d-block mb-15">Drop files anywhere to Upload</span>
                                                                    <span class="mb-15 plus-icon" style="text-align: center;"><i class="lni lni-plus"></i></span>
                                                                    <span class="main-btn d-block btn-hover" style="text-align: center;">Select File</span>
                                                                    <span class="d-block">Maximum upload file size 10Mb</span>
                                                                </span>
                                                            </label>
                                                            <span id="photoWarning" class="warning"></span>
                                                        </div>

                                                            
                                                         
                                                            
                                                        <div class="col-12">
                                                            <div class="form-group mt-30">
                                                                <label>Ad Description*</label>
                                                                <textarea name="txt_description"
                                                                    placeholder="Input ad description"></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                
                                                 <!--- <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="tag-label">Tags* <span>Comma(,)
                                                                        separated</span></label>
                                                                <input name="tag" type="text"
                                                                    placeholder="Type Product tag">
                                                            </div>
                                                        </div> --->
                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    id="flexCheckDefault" required="required">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    I agree to all Terms of Use & Posting Rules
                                                                </label>
                                                            </div>
                                                            <div class="form-group button mb-0">
                                                                <button type="reset"
                                                                    class="btn alt-btn" onclick="goBack()">Back </button>
                                                                <button type="submit" class="btn " name="btn_save">Submit Ad</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Start Post Ad Step Two Content -->
                                        </div>
                                       
                                    </div>
                                </div>
                                <!-- End Post Ad Tab -->
                            </div>
                        </div>
                        <!-- End Post Ad Block Area -->
                    </div>
                </div>
            </div>
        </div>
    </section>
      

</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/Ajaxsubcategory.php?pid="+did,
		success: function(html){
			$("#sel_subcategory").html(html);
		}
	});
}

function goBack() {
    
    window.history.back();
}

function validateForm() {
    var name = document.forms["postform"]["txt_name"].value;
    var category = document.forms["postform"]["sel_category"].value; // Updated field name
    var subcategory = document.forms["postform"]["sel_subcategory"].value;
    var rate = document.forms["postform"]["txt_rate"].value;
    var photo = document.forms["postform"]["upload"].value;
    var quantity = document.forms["postform"]["txt_quantity"].value;

    // Clear previous warnings
    document.getElementById("nameWarning").innerHTML = "";
    document.getElementById("categoryWarning").innerHTML = "";
    document.getElementById("subcategoryWarning").innerHTML = "";
    document.getElementById("qtyWarning").innerHTML = "";
    document.getElementById("rateWarning").innerHTML = "";
    document.getElementById("photoWarning").innerHTML = "";

    // Clear warnings for other fields

    var isValid = true;

    if (name === "") {
        document.getElementById("nameWarning").innerHTML = "Name must be filled out";
        isValid = false;
    }


    // Validate other fields and formats similarly...
    if (!category) {
        document.getElementById("categoryWarning").innerHTML = "Please select a Category";
        isValid = false;
    }
    if (!subcategory) {
        document.getElementById("subcategoryWarning").innerHTML = "Please select a Subcategory";
        isValid = false;
    }

    if (!rate) {
        document.getElementById("rateWarning").innerHTML = "Please enter the Price";
        isValid = false;
    }

    if (quantity === "") {
        document.getElementById("qtyWarning").innerHTML = "Please enter the Quantity";
        isValid = false;
    }

    if (!photo) {
        document.getElementById("photoWarning").innerHTML = "Please Upload A Photo";
        isValid = false;
    }

    return isValid; // Form is ready to be submitted
}

</script>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>