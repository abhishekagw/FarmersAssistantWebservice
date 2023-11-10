<?php
ob_start();
$currentPage = 'search';
include('Head.php');
include("../Assets/Connection/Connection.php");

 
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';


if(isset($_GET['rid'])){
  
$selQry="select * from tbl_retailer where retailer_id=".$_GET["rid"];
$result=$con->query($selQry);
$data=$result->fetch_assoc();
$name=$data["retailer_name"];
$email=$data["retailer_email"];
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
            $mail->Body .= "<br>YOUR OTP IS ".$otp."<br>,<br>";
            $mail->Body .= "We are committed to providing you with the best possible experience. If you have any questions or concerns, please feel free to reach out to us .<br><br>";
            
            $mail->Body .= "Thank you,<br>";
            $mail->Body .= "Farmer And Retailer Assistance Service";

            if($mail->send())
            {
                $_SESSION["rotp"]=$otp;
                ?>
                <script>
                    window.location="Verify.php?nid=<?php echo $_GET['rid'] ?>"+"&pid=<?php echo $_GET['pid']?>";
                    </script>
                <?php
            }
            else
            {
            echo "failed";
            }

}
if(isset($_POST["btn_send"]))
{
	$userotp=$_POST["txt_otp"];
	if($userotp==$_SESSION["rotp"])
	{
        $upQry="update tbl_product p inner join tbl_booking b on p.product_id=b.product_id set p.product_status=1,b.booking_status=2 where p.product_id=".$_GET["pid"];
		if($con->query($upQry))
    {
        ?>
       <script>alert('Verification Successfull');
	   window.location.href=("../Farmers/thankyou.php");
       </script>
       <?php
    }
	}
	else
	{
		echo "<script>alert('Wrong OTP')</script>";
	}
}

if(isset($_POST["btn_resend"]))
{
    ?>
    <script>
       window.location="Verify.php?rid=<?php echo $_GET['nid'] ?>"+"&pid=<?php echo $_GET['pid']?>";
        </script>
    <?php
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Verify Retailer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
        #form1 {
            margin: 50px auto;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        #btn_resend {
            padding: 8px 16px;
            margin-top: 10px;
            background-color: #6c757d;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
                        <h1 class="page-title">Verfiy</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="HomePgae.php">Home</a></li>
                        <li>Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

<div class="container">
            <div class="row">

    <form id="form1" name="form1" method="post" action="" class="text-center">
        <h2>Verify Retailer</h2>
        <p>We Have Sent an OTP to The Retailer's Email</p>
        <div class="form-group row justify-content-center">
            <input type="text" class="form-control col-7" name="txt_otp" id="txt_otp" placeholder="Enter OTP">
            <input type="submit" class="btn btn-primary col-4 ml-2" name="btn_send" id="btn_send" value="Send">
        </div>
        <p>
            <button type="submit" class="btn btn-secondary" name="btn_resend" id="btn_resend" disabled>Resend</button>
            <span id="countdown"></span>
        </p>
        <p><b>!</b> Fill OTP Sent to Email</p>
        <p><b>!</b> Please Check the junk/spam Folder in case you do not get the email</p>
    </form>
</div>
      </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    startTimer();

    function startTimer() {
        var timerDurationSeconds = 5; // Countdown duration in seconds

        var timerDisplay = document.getElementById('countdown');
        var resendButton = document.getElementById('btn_resend');

        var endTime = new Date().getTime() + (timerDurationSeconds * 1000);

        function updateCountdown() {
            var now = new Date().getTime();
            var remainingTime = Math.max(0, Math.ceil((endTime - now) / 1000));

            if (remainingTime === 0) {
                resendButton.disabled = false;
                timerDisplay.innerText = '';
            } else {
                resendButton.disabled = true;
                timerDisplay.innerText = 'Resend OTP in ' + remainingTime + ' seconds';
                setTimeout(updateCountdown, 1000);
            }
        }

        updateCountdown();
    }
</script>
</body>
<?php

include('Foot.php');
ob_end_flush();
?>  
</html>
