<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_proceed']))
{
	$quantity=$_POST['txt_qty'];
	$pid=$_GET['pid'];
  $tqty=$_GET['aid'];
  if($tqty>=$quantity)
  {
	$insQry="insert into tbl_booking(product_id,retailer_id,booking_date,booking_qty)values('".$pid."','".$_SESSION['rid']."',curdate(),'".$quantity."')";
	if($con->query($insQry))
	{
		?>
			<script>
			alert("Item  Added");
      window.location.href = "MyOrder.php";
			</script>
    	  <?php
	}
  }
  else{
    echo "<script> alert('Please Enter Below Available Quantity'); </script>";
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking</title>
</head>

<body>
   <!-- Start Breadcrumbs -->
   <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Booking</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePgae.php">Home</a></li>
                        <li><a href="Search.php">Ad</a></li>
                        <li>Booking</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
<section class="dashboard section">   
    <div class="container">
      <div class="row"> 
        <div class="col-lg-9 col-md-8 col-12">
          <div class="main-content">
            <div class="dashboard-block mt-0">
              <h3 class="block-title">Enter Quantity</h3>
                <div class="inner-block">
                  <div class="post-ad-tab">
                                
                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-item-info" role="tabpanel"
                                            aria-labelledby="nav-item-info-tab">
                                            <div class="step-one-content">
                                                <form class="default-form-style" method="post" enctype="multipart/form-data" >
                                                <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Quantity</label>
                                                                <input name="txt_qty" type="text"
                                                                    placeholder="Enter Quantity">
                                                            </div>
                                                        </div>
                                                 </div>
                                                    
                                                 <div class="form-group button mb-0">
                                                                <button type="reset"
                                                                    class="btn " onClick="back()">Back</button>
                                                                <button type="submit" class="btn " name="btn_proceed">Proceed</button>
                                                            </div> 
                                                  </form>
</div>
                    </div>
                </div>
                  </div>
              </div>
            </div>
          <div>
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