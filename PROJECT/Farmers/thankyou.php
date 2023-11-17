<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Using Our Site</title>
    <style>
        body.tbody {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .tcontainer {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .thead {
            color: #333;
        }

        p {
            color: #555;
            font-size: 18px;
            margin: 20px 0;
        }

        .rbutton {
            background-color: #0074cc;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body class="tbody">
<div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Succesfull !</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePage.php">Home</a></li>
                        
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
    <div class="tcontainer">
        <h1 class="thead">Thank You for Using Our Site</h1>
    
        <p>We appreciate your business and trust in our platform.</p>
        <p>Your successful deal has contributed to our community of farmers and retailers.</p>
        <p>Please take a moment to rate your experience with the other party:</p>
        <a href="Rating.php?rid=<?php echo $_GET['rid'] ?>" class="rbutton">Rate Retailer</a>
        <p>If you have any feedback or suggestions, we'd love to hear from you. Contact us <a href="contactus.php">here</a>.</p>
        <p>Continue using our platform to connect with other farmers and retailers for your agricultural needs.</p>
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
