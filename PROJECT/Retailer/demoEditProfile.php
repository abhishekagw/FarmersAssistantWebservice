<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");

session_start();
$selQry="select * from tbl_retailer where retailer_id='".$_SESSION["rid"]."'";
$result=$con->query($selQry);
$data=$result->fetch_assoc();

if(isset($_POST["btn_update"]))
{
    if ($_FILES['upload']["error"] === UPLOAD_ERR_OK)
    {
    $photo = $_FILES['upload']['name'];
    $path = $_FILES['upload']['tmp_name'];
    move_uploaded_file($path,"../Assets/Files/Retailer/Photo/".$photo);
    }
    else{
        
        $photo =$_POST["txt_file"];
    }

   
    
    
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$address=$_POST["txt_address"];
	$contact=$_POST["txt_contact"];
	$upQry="update tbl_retailer set retailer_name='".$name."',retailer_email='".$email."',retailer_address='".$address."',retailer_contact='".$contact."',retailer_photo='".$photo."'where retailer_id='".$_SESSION["rid"]."'";
	$con->query($upQry);
	?>
    <script>
	//alert("updated successfully");
	//window.location="demoEditProfile.php";
	</script>
    <?php
}
if(isset($_POST["btn_change"]))
{
	$currentpass=$_POST["txt_currentpassword"];
	$newpass=$_POST["txt_newpassword"];
	$confirmpass=$_POST["txt_confirmpassword"];
	$upPass="select * from tbl_retailer where retailer_password='".$currentpass."' and retailer_id='".$_SESSION["rid"]."'";
	$result5=$con->query($upPass);
	if($data=$result5->fetch_assoc())
	{
		if($newpass==$confirmpass)
		{
		$upQry="update tbl_retailer set retailer_password='".$newpass."' where retailer_id='".$_SESSION["rid"]."'";
		$con->query($upQry);
		}
		else
		{ ?>
			<script>
			alert("Password doesnt Match");
			</script>
    	  <?php
		}
	}
	else
	{
		?>
			<script>
			alert("Wrong Password");
			</script>
    	  <?php
		
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Account</title>
</head>
<body>
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php
    $headQry="select * from tbl_retailer where retailer_id=".$_SESSION["rid"];
    $headResult=$con->query($headQry);
    $dataH=$headResult->fetch_assoc();
    ?>
    <section class="dashboard section">
        <div class="container">
            <div class="row">
            <div class="col-lg-3 col-md-12 col-12">
                    <!-- Start Dashboard Sidebar -->
                    <div class="dashboard-sidebar">
                        <div class="user-image">
                            <img src="../Assets/Files/Retailer/Photo/<?php echo $dataH["retailer_photo"]?>" alt="#">
                            <h3><?php echo $dataH["retailer_name"];?></h3>
                                <span><a href="javascript:void(0)">@username</a></span>
                            </h3>
                        </div>
                            <div class="dashboard-menu">
                                <ul>
                                    <li><a class="active" href="demoMyAccount.php"><i class="lni lni-dashboard"></i>
                                            Dashboard</a></li>
                                            <li><a href="EditProfile.php"><i class="lni lni-pencil-alt"></i> Edit Profile</a> </li>
                                </ul>
                                            <div class="button">
                                                <a class="btn" href="javascript:void(0)">Logout</a>
                                            </div>
                            </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <!-- Start Profile Settings Area -->
                        <div class="dashboard-block mt-0 profile-settings-block">
                            <h3 class="block-title">Profile Settings</h3>
                            <div class="inner-block">
                                <div class="image">
                                    <img src="../Assets/Files/Retailer/Photo/<?php echo $dataH["retailer_photo"]?>" alt="#">
                                </div>
                                <form class="profile-setting-form" method="post" action="" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>First Name*</label>
                                                <input name="txt_name" type="text" value="<?php echo $dataH["retailer_name"] ?>" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Contact</label>
                                                <input name="txt_contact" type="text" value="<?php echo $dataH["retailer_contact"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Email Address*</label>
                                                <input name="txt_email" type="email" value="<?php echo $dataH["retailer_email"] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group upload-image">
                                                <label>Profile Image*</label>
                                                <input name="upload" type="file" placeholder="Upload Image" value="<?php echo $dataH["retailer_photo"] ?>">
                                                <input name="txt_file" type="hidden"  value="<?php echo $dataH["retailer_photo"] ?>">

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group message">
                                                <label>Address*</label>
                                                <textarea name="txt_address" value="<?php echo $dataH["retailer_address"] ?>"><?php echo $dataH["retailer_address"] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button mb-0">
                                                <button type="submit" class="btn" name="btn_update">Update Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Profile Settings Area -->
                        <!-- Start Password Change Area -->
                        <div class="dashboard-block password-change-block">
                            <h3 class="block-title">Change Password</h3>
                            <div class="inner-block">
                                <form class="default-form-style" method="post" action="">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Current Password*</label>
                                                <input name="txt_currentpassword" type="password"
                                                    placeholder="Enter old password" required="required" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>New Password*</label>
                                                <input name="txt_newpassword" type="password"
                                                    placeholder="Enter new password" required="required" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Retype Password*</label>
                                                <input name="txt_confirmpassword" type="password"
                                                    placeholder="Retype password" required="required" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group button mb-0">
                                                <button type="submit" class="btn " name="btn_change">Update Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Password Change Area -->
                    </div>
                </div>
</div>
</div>
</section>

</body>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>

</html>