<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");
if(isset($_GET["eid"]))
{
		$selQry="select *  from tbl_request where request_id=".$_GET["eid"];
		$result2=$con->query($selQry);
		$row=$result2->fetch_assoc();
		$requestname=$row['request_product'];
		$requestrate=$row['request_pricerange'];
		$requestdescription=$row['request_description'];
		$requestquantity=$row['request_quantity'];
		$check=$row['request_id'];
}
if(isset($_POST["btn_save"]))
{
        $requestname=$_POST["txt_name"];
		$requestrate=$_POST["txt_pricerange"];
		$requestdescription=$_POST["txt_description"];
		$requestquantity=$_POST["txt_quantity"];
		$upQry="update tbl_request set request_product='".$requestname."',request_pricerange='".$requestrate."',request_quantity='".$requestquantity."',request_description='".$requestdescription."' where request_id=".$check;
		if($con->query($upQry))
        {
            echo '<script> window.location.href="myads.php"; </script>';
        }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Ad</title>
</head>
<body>
    <!-- Start Breadcrumbs -->
  <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Edit Ad</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePgae.php">Home</a></li>
                        <li>Post Your Ad</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <section class="dashboard section">
        <div class="container">
            <div class="row">
                <!-- Start Dashboard Sidebar -->
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <!-- Start Post Ad Block Area -->
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">Edit Ad</h3>
                            <div class="inner-block">
                                <!-- Start Post Ad Tab -->
                                <div class="post-ad-tab">
                                
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-item-info" role="tabpanel"
                                            aria-labelledby="nav-item-info-tab">
                                            <!-- Start Post Ad Step One Content -->
                                            <div class="step-one-content">
                                                <form class="default-form-style" method="post" enctype="multipart/form-data" >
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Add Title*</label>
                                                                <input name="txt_name" type="text" value="<?php echo $requestname?>" autocomplete="off"
                                                                    placeholder="Enter Title">
                                                                    <input type="hidden" name="txt_check" id="txt_check" value="<?php echo $check?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Category*</label>
                                                                <div class="selector-head">
                                                                    <span class="arrow"><i
                                                                            class="lni lni-chevron-down"></i></span>
                                                                            <label for="sel_category"></label>
                                                                        <select name="sel_category" id="sel_category">
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                              
                                            <!-- Start Post Ad Step One Content -->
                                        
                                        
                                            <!-- Start Post Ad Step Two Content -->
                                            
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Price Range*</label>
                                                                <input name="txt_pricerange" type="text" value="<?php echo $requestrate?>" required="required" autocomplete="off"
                                                                    placeholder="Enter Price Range">
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
                                                                <input name="txt_quantity" type="text" value="<?php echo $requestquantity?>" required="required" autocomplete="off"
                                                                    placeholder="Enter Required Quantity">
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
                                                        </div>

                                                            
                                                         
                                                            
                                                        <div class="col-12">
                                                            <div class="form-group mt-30">
                                                                <label>Ad Description*</label> 
                                                                <textarea name="txt_description" 
                                                                    placeholder="Input ad description"><?php echo $requestdescription?></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="tag-label">Tags* <span>Comma(,)
                                                                        separated</span></label>
                                                                <input name="tag" type="text"
                                                                    placeholder="Type Product tag">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                    id="flexCheckDefault">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    I agree to all Terms of Use & Posting Rules
                                                                </label>
                                                            </div>
                                                            <div class="form-group button mb-0">
                                                                <button type="reset"
                                                                    class="btn alt-btn" onClick="back()">Back</button>
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
    <script>
        function back()
        {
            window.history.back();

        }
        </script>
</body>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>