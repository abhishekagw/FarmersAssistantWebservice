<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

session_start();
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';
	

if(isset($_POST["btn_register"]))
{
	$photo= $_FILES['upload']['name'];
	$path = $_FILES['upload']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/Farmer/Photo/".$photo);
	
	$proof=$_FILES['file_upload']['name'];
	$path2=$_FILES['file_upload']['tmp_name'];
	move_uploaded_file($path2,"../Assets/Files/Farmer/Proofs/".$proof);
	
	
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$contact=$_POST["txt_contact"];
	$address=$_POST["txt_address"];
	$place=$_POST["sel_place"];
	$dob=$_POST["txt_dob"];
  $gender=$_POST["gender"];
	$password=$_POST["txt_password"];
	$confirmpass=$_POST["txt_confirmpassword"];
  
  $selQry="select * from tbl_farmer where farmer_email='".$email."' ";
  $eQry=$con->query($selQry);
  if($eQry->num_rows<1)
  {
      if($password==$confirmpass)
      {
      $insQry="insert into tbl_farmer(farmer_name,farmer_email,farmer_contact,farmer_address,farmer_dob,farmer_gender,farmer_password,place_id,farmer_photo,farmer_proof,farmer_date) values('".$name."','".$email."',".$contact.",'".$address."','".$dob."','".$gender."','".$password."','".$place."','".$photo."','".$proof."',curdate())";
      $con->query($insQry);
      $otp=rand(1000,9999);
          
            
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'farmersandretailerassistance@gmail.com'; // Your gmail
            $mail->Password = 'rcfxxrmpwexdlezh'; // Your gmail app password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            
            $mail->setFrom('farmersandretailerassistance@gmail.com'); // Your gmail
            
            $mail->addAddress($email);
            
            $mail->isHTML(true);
            
            $mail->Subject = "Verify Your Email";
            $mail->Body = "Dear ".$name.",<br><br>";
            $mail->Body .= "Thank you for creating an account with us! We are thrilled to have you onboard.<br><br>";
            $mail->Body .= "Your account has been successfully created and is now ready to use. You can log in to your account using your registered email address and password.<br><br>";
            $mail->Body .= "<br>YOUR OTP IS ".$otp."<br>,<br>";
            $mail->Body .= "We are committed to providing you with the best possible experience. If you have any questions or concerns, please feel free to reach out to us .<br><br>";
            
            $mail->Body .= "Thank you,<br>";
            $mail->Body .= "Farmer And Retailer Assistance Service";

            if($mail->send())
            {
            $_SESSION["fotp"]=$otp;
            ?>
            <script>
            window.location="otp.php?mail=<?php echo $email ?>";
            </script>
            <?php
            }
            else
            {
            echo "failed";
            }
      
      
      
      }
      else
      {
        echo "<script> alert('Please Enter Same Password') </script>";
      }
   }
  else
  {
    echo  "<script>  alert('There is already an account with this email address')</script>";
  }
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
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
                    <h1 class="page-title">Registration</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="../Index/php">Home</a></li>
                    <li>Registration</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- start Registration section -->
<section class="login registration section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                <div class="form-head">
                    <h4 class="title">Registration</h4>
                    <form class="default-form-style" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="regform">
                        <div class="socila-login">
                            <ul>
                                <li><a href="javascript:void(0)" class="facebook"><i
                                            class="lni lni-facebook-original"></i>Import
                                        From Facebook</a></li>
                                <li><a href="javascript:void(0)" class="google"><i class="lni lni-google"></i>Import
                                        From Google
                                        Plus</a>
                                </li>
                            </ul>
                        </div>
                        <div class="alt-option">
                            <span>Or</span>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input name="txt_name" type="text">
                            <span id="nameWarning" class="warning"></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="txt_email" type="email">
                            <span id="emailWarning" class="warning"></span>
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input name="txt_contact" type="text">
                            <span id="contactWarning" class="warning"></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="txt_address" placeholder="Enter Address"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>District</label>
                                <div class="selector-head">
                                    <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                    <label for="sel_category"></label>
                                    <select name="sel_category" id="sel_category" onChange="getPlace(this.value)">
                                        <option value="">Select District</option>
                                        <?php
                                        $selQry = "select * from tbl_district";
                                        $result = $con->query($selQry);
                                        if ($result->num_rows > 0) {
                                            while ($data = $result->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $data["district_id"] ?>">
                                                    <?php echo $data["district_name"] ?>
                                                </option>
                                                <?php
                                            }
                                        }

                                        ?>
                                    </select>
                                    <span id="districtWarning" class="warning"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Place</label>
                                <div class="selector-head">
                                    <span class="arrow"><i class="lni lni-chevron-down"></i></span>
                                    <label for="sel_place"></label>
                                    <select name="sel_place" id="sel_place">
                                        <option value="">Select Place</option>
                                    </select>
                                    <span id="placeWarning" class="warning"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date-Of-Birth</label>
                            <label for="txt_dob"></label>
                            <input type="date" name="txt_dob" id="txt_dob" />
                            <span id="dobWarning" class="warning"></span>
                        </div>
                        <label>Gender</label><br>
                        <div class="form">
                            <input type="radio" name="gender" id="btngender" value="Male" />Male
                            <input type="radio" name="gender" id="btngender" value="Female" /> Female
                            <span id="genderWarning" class="warning"></span>
                        </div><br>
                        <div class="form-group">
                        <label>Photo</label><br>
                        <label for="upload" class="custom-file-upload"
                            style="border: 2px solid #ccc; border-radius: 5px; padding: 10px; display: inline-block; cursor: pointer;">
                            <input type="file" id="upload" name="upload" style="display: none;">
                            <i class="lni lni-cloud-upload" style="margin-right: 5px;"></i> Upload File
                        </label></div><br><br>
                        <label>Proofs</label><br>
                        <label for="file_upload" class="custom-file-upload"
                            style="border: 2px solid #ccc; border-radius: 5px; padding: 10px; display: inline-block; cursor: pointer;">
                            <input type="file" id="file_upload" name="file_upload" style="display: none;">
                            <i class="lni lni-cloud-upload" style="margin-right: 5px;"></i> Upload File
                        </label><br>

                        <div class="form-group">
                            <label>Password</label>
                            <input name="txt_password" type="password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input name="txt_confirmpassword" type="password">
                            <span id="confirmPasswordWarning" class="warning"></span>
                        </div>
                        <div class="check-and-pass">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1" required="required">
                                        <label class="form-check-label">Agree to our <a href="javascript:void(0)">Terms
                                                and
                                                Conditions</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button">
                            <button type="btn_register" class="btn" name="btn_register">Registration</button>
                        </div>
                        <p class="outer-link">Already have an account? <a href="Login.php"> Login Now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Registration section -->

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
</body>
<!-- End Newsletter Area -->
<script src="../Assets/JQ/jQuery.js"></script>
<script>
    function getPlace(did) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxPlace.php?pid=" + did,
            success: function (html) {
                $("#sel_place").html(html);
            }
        });
    }

    
function validateForm() {
    var name = document.forms["regform"]["txt_name"].value;
    var email = document.forms["regform"]["txt_email"].value;
    var contact = document.forms["regform"]["txt_contact"].value;
    var district = document.forms["regform"]["sel_category"].value; // Updated field name
    var place = document.forms["regform"]["sel_place"].value;
    var dob = document.forms["regform"]["txt_dob"].value;
    var gender = document.querySelector('input[name="gender"]:checked');
    var password = document.forms["regform"]["txt_password"].value;
    var confirmPass = document.forms["regform"]["txt_confirmpassword"].value;

    // Clear previous warnings
    document.getElementById("nameWarning").innerHTML = "";
    document.getElementById("emailWarning").innerHTML = "";
    document.getElementById("contactWarning").innerHTML = "";
    document.getElementById("districtWarning").innerHTML = "";
    document.getElementById("placeWarning").innerHTML = "";
    document.getElementById("dobWarning").innerHTML = "";
    document.getElementById("genderWarning").innerHTML = "";
    document.getElementById("confirmPasswordWarning").innerHTML = "";

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
    if (!district) {
        document.getElementById("districtWarning").innerHTML = "Please select a District";
        isValid = false;
    }
    if (!place) {
        document.getElementById("placeWarning").innerHTML = "Please select a Place";
        isValid = false;
    }

    if (!dob) {
        document.getElementById("dobWarning").innerHTML = "Please select a date of birth";
        isValid = false;
    }

    if (!gender) {
        document.getElementById("genderWarning").innerHTML = "Please select a gender";
        isValid = false;
    }

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