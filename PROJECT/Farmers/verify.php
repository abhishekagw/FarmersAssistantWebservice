<?php
include("../Assets/Connection/Connection.php");
session_start();
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Verify</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
<br />
<br />
<h2 align="center">Verify Retailer</h2>
<br />
<p align="center">We Have Sent an OTP to The Retailer's Email</p>
  <table  border="1" align="center">
    <tr>
      <td><label for="txt_otp"></label>
      <input type="text" name="txt_otp" id="txt_otp" /></td><td> <input type="submit" name="btn_send" id="btn_send" value="Send" /></td>
    </tr>
  </table>
  <p align="center">
    <input type="submit" name="btn_resend" id="btn_resend" value="Resend" />
    <span id="countdown"></span>
  </p>
  <p align="center"><b>!</b> Fill OTP Sent to Email</p>
  <p align="center"><b>!</b> Please Check the junk/spam Folder in case you do not get email</p>
</form>
<script>
  // Call the function to initialize the countdown
  startTimer();

  function startTimer() {
    var timerDurationSeconds = 5; // Set the countdown duration in seconds

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

    // Initial call to start the countdown
    updateCountdown();
  }
</script>
</body>
</html>