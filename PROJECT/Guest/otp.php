<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST["btn_send"]))
{
	$userotp=$_POST["txt_otp"];
	if($userotp==$_SESSION["fotp"])
	{
		
       echo "<script>alert('Account Verified')</script>";
	   header("location:../Guest/Login.php");
	}
	else
	{
		echo "<script>alert('Wrong OTP')</script>";
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<br />
<br />
<h2 align="center">Verify OTP</h2>
<br />
<p align="center">We Have Sent an OTP to Your Email <?php echo $_GET["mail"]?></p>
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
    var timerDurationSeconds = 30; // Set the countdown duration in seconds

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