<?php
ob_start();
$currentPage ='contactus';
include('Head.php');
include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_submit']) ) 
{
    $name=$_POST['txt_name'];
    $subject= $_POST['txt_subject'];
    $message= $_POST['txt_message'];
    $email=$_POST['txt_email'];
    $phone=$_POST['txt_phone'];
    $insQry="insert into tbl_contactus(contactus_name,contactus_subject,contactus_email,contactus_phone,contactus_message,contactus_farmerid)values('".$name."','".$subject."','".$email."','".$phone."','".$message."','".$_SESSION["fid"]."')";
    if($con->query($insQry))
    {
        header("location: mailsent.php");
    }

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Conatct Us</title>
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
                        <h1 class="page-title">Contact Us</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePage.php">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <!-- Start Contact Area -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head wow fadeInUp" data-wow-delay=".4s">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <div class="single-head">
                            <div class="contant-inner-title">
                                <h2>Our Contacts & Location</h2>
                                <p>Business consulting excepteur sint occaecat cupidatat consulting non proident.</p>
                            </div>
                            <div class="single-info">
                                <h3>Opening hours</h3>
                                <ul>
                                    <li>Daily: 9.30 AM–6.00 PM</li>
                                    <li>Sunday & Holidays: Closed</li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <h3>Contact info</h3>
                                <ul>
                                    <li>77408 Satterfield Motorway Suite</li>
                                    <li>469 New Antonetta, BC K3L6P6</li>
                                    <li><a href="mailto:info@yourwebsite.com">example@info.com</a></li>
                                    <li><a href="tel:(617) 495-9400-326">(617) 495-9400-326</a></li>
                                </ul>
                            </div>
                            <div class="single-info contact-social">
                                <h3>Social contact</h3>
                                <ul>
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="form-main">
                            <div class="form-title">
                                <h2>Get in Touch</h2>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form.</p>
                            </div>
                            <form class="form" method="post" onsubmit="return validateForm()" name="contactform">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <input name="txt_name" type="text" placeholder="Your Name" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <input name="txt_subject" type="text" placeholder="Your Subject"
                                                required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <input name="txt_email" type="email" placeholder="Your Email"
                                                required="required">
                                                <span id="emailWarning" class="warning"></span>   
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <input name="txt_phone" type="text" placeholder="Your Phone"
                                                required="required">
                                                <span id="contactWarning" class="warning"></span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group message">
                                            <textarea name="txt_message" placeholder="Your Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" name="btn_submit" class="btn ">Submit Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->

    <!-- Start Google-map Area -->
    <div class="map-section">
        <div class="map-container">
            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=New%20York&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                        href="https://123movies-to.com/">123movies old site</a>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 500px;
                            width: 100%;
                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 500px;
                            width: 100%;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
    <!-- End Google-map Area -->

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
                            <form action="" method="get" target="_blank" class="newsletter-form">
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
    <!-- End Newsletter Area -->


    </body>
    <script>
        function validateForm() {
   
    var email = document.forms["contactform"]["txt_email"].value;
    var contact = document.forms["contactform"]["txt_phone"].value;
 


    document.getElementById("emailWarning").innerHTML = "";
    document.getElementById("contactWarning").innerHTML = "";

    // Clear warnings for other fields

    var isValid = true;


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



    return isValid; // Form is ready to be submitted
}
</script>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>