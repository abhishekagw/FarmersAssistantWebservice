<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");

 
$selQry="select * from tbl_farmer where farmer_id='".$_SESSION["fid"]."'";
$result=$con->query($selQry);
$data=$result->fetch_assoc();

if(isset($_POST["btn_update"]))
{
    if ($_FILES['upload']["error"] === UPLOAD_ERR_OK)
    {
    $photo = $_FILES['upload']['name'];
    $path = $_FILES['upload']['tmp_name'];
    move_uploaded_file($path,"../Assets/Files/Farmer/Photo/".$photo);
    }
    else{
        
        $photo =$_POST["txt_file"];
    }

   
    
    
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$address=$_POST["txt_address"];
	$contact=$_POST["txt_contact"];
	$upQry="update tbl_farmer set farmer_name='".$name."',farmer_email='".$email."',farmer_address='".$address."',farmer_contact='".$contact."',farmer_photo='".$photo."'where farmer_id='".$_SESSION["fid"]."'";
	$con->query($upQry);
	?>
    <script>
	//alert("updated successfully");
	//window.location="EditProfile.php";
	</script>
    <?php
}
if(isset($_POST["btn_change"]))
{
	$currentpass=$_POST["txt_currentpassword"];
	$newpass=$_POST["txt_newpassword"];
	$confirmpass=$_POST["txt_confirmpassword"];
	$upPass="select * from tbl_farmer where farmer_password='".$currentpass."' and farmer_id='".$_SESSION["fid"]."'";
	$result5=$con->query($upPass);
	if($data=$result5->fetch_assoc())
	{
		if($newpass==$confirmpass)
		{
		$upQry="update tbl_farmer set farmer_password='".$newpass."' where farmer_id='".$_SESSION["fid"]."'";
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
                        <h1 class="page-title">Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePage.php">Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php
    $headQry="select * from tbl_farmer where farmer_id=".$_SESSION["fid"];
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
                            <img src="../Assets/Files/Farmer/Photo/<?php echo $dataH["farmer_photo"]?>" alt="#">
                            <h3><?php echo $dataH["farmer_name"];?></h3>
                                <span><a href="javascript:void(0)">@username</a></span>
                            </h3>
                        </div>
                        <div class="dashboard-menu">
                                <ul>
                                <li><a  href="MyAccount.php"><i class="lni lni-dashboard"></i>
                                            Dashboard</a></li>
                                <li><a class="active" href="EditProfile.php"><i class="lni lni-pencil-alt"></i> Edit Profile</a> </li>
                                <li><a  href="MyAds.php"><i class="lni lni-dashboard"></i>
                                            My Ads</a></li>
                                <li><a  href="bookinglist.php"><i class="lni lni-dashboard"></i>
                                            All Orders</a></li>
                                    <li><a  href="acceptedbooking.php"><i class="lni lni-dashboard"></i>
                                            Accecpted Orders</a></li>
                                            
                                </ul>
                                            <div class="button">
                                                <a class="btn"  href="../Logout.php">Logout</a>
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
                                    <img src="../Assets/Files/Farmer/Photo/<?php echo $dataH["farmer_photo"]?>" alt="#">
                                </div>
                                <form class="profile-setting-form" method="post" action="" enctype="multipart/form-data" onsubmit="return validateForm()" name="editform">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Name*</label>
                                                <input name="txt_name" type="text" value="<?php echo $dataH["farmer_name"] ?>" >
                                                <span id="nameWarning" class="warning"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Contact</label>
                                                <input name="txt_contact" type="text" value="<?php echo $dataH["farmer_contact"] ?>">
                                                <span id="contactWarning" class="warning"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-group">
                                                <label>Email Address*</label>
                                                <input name="txt_email" type="email" value="<?php echo $dataH["farmer_email"] ?>">
                                                <span id="emailWarning" class="warning"></span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group upload-image">
                                                <label>Profile Image*</label>
                                                <input name="upload" type="file" placeholder="Upload Image" value="<?php echo $dataH["farmer_photo"] ?>">
                                                <input name="txt_file" type="hidden"  value="<?php echo $dataH["farmer_photo"] ?>">

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group message">
                                                <label>Address*</label>
                                                <textarea name="txt_address" value="<?php echo $dataH["farmer_address"] ?>"><?php echo $dataH["farmer_address"] ?></textarea>
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
                                <form class="default-form-style" method="post" action="" onsubmit="return validatePass()" name="passform">
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
                                                    <span id="confirmPasswordWarning" class="warning"></span>
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
<script>
    function validateForm() {
    var name = document.forms["editform"]["txt_name"].value;
    var email = document.forms["editform"]["txt_email"].value;
    var contact = document.forms["editform"]["txt_contact"].value;

    // Clear previous warnings
    document.getElementById("nameWarning").innerHTML = "";
    document.getElementById("emailWarning").innerHTML = "";
    document.getElementById("contactWarning").innerHTML = "";
    

    // Clear warnings for other fields

    var isValid = true;

    if (name === "") {
        document.getElementById("nameWarning").innerHTML = "Name must be filled out";
        isValid = false;
    }

    // Validate email format
    var emailFormat = /^\S+@\S+\.\S+$/;
    if (email === "" || !email.match(emailFormat)) {
        document.getElementById("emailWarning").innerHTML = "Please enter a valid email address";
        isValid = false;
    }

    // Validate contact number format
    var contactFormat = /^\d{10}$/;
    if (contact === "" || !contact.match(contactFormat)) {
        document.getElementById("contactWarning").innerHTML = "Please enter a valid 10-digit contact number";
        isValid = false;
    }

    // Validate other fields and formats similarly...
   

    return isValid; // Form is ready to be submitted
}

function validatePass() {
    var password = document.forms["passform"]["txt_newpassword"].value;
    var confirmPass = document.forms["passform"]["txt_confirmpassword"].value;

    // Clear previous warnings
    document.getElementById("confirmPasswordWarning").innerHTML = "";
    

    // Clear warnings for other fields

    var isValid = true;



 
    if (password !== confirmPass) {
        document.getElementById("confirmPasswordWarning").innerHTML = "Passwords do not match";
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

</html>