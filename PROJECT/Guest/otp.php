<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>OTP Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <!-- Start Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Verify</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index-2.html">Home</a></li>
                    <li>Verify</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
    <?php
    include("../Assets/Connection/Connection.php");
    session_start();

    if (isset($_POST["btn_send"])) {
        $userotp = $_POST["txt_otp"];
        if ($userotp == $_SESSION["fotp"]) {
            echo "<script>alert('Account Verified')</script>";
            header("location:../Guest/Login.php");
        } else {
            echo "<script>alert('Wrong OTP')</script>";
        }
    }
    ?>

    <div class="container mt-5">
        <h2 class="text-center">Verify OTP</h2>
        <p class="text-center">We have sent an OTP to your email: <?php echo $_GET["mail"]?></p>
        <form class="text-center" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="txt_otp" id="txt_otp" placeholder="Enter OTP">
            </div>
            <button type="submit" class="btn btn-primary" name="btn_send">Verify</button>
            <button type="submit" class="btn btn-secondary" name="btn_resend" id="btn_resend" disabled>Resend OTP</button>
            <span id="countdown"></span>
            <p><b>!</b> Fill OTP sent to your email.</p>
            <p><b>!</b> Please check the junk/spam folder if you don't find the email.</p>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        // Function for countdown timer
        startTimer();

        function startTimer() {
            var timerDurationSeconds = 30; // Countdown duration in seconds
            var timerDisplay = document.getElementById('countdown');
            var resendButton = document.getElementById('btn_resend');

            var interval = setInterval(function () {
                timerDisplay.innerHTML = 'Resend OTP in ' + timerDurationSeconds + ' seconds';
                timerDurationSeconds--;

                if (timerDurationSeconds < 0) {
                    clearInterval(interval);
                    timerDisplay.innerHTML = '';
                    resendButton.disabled = false;
                }
            }, 1000);
        }
    </script>
</body>
<?php

include('Foot.php');
ob_end_flush();
?>

</html>
