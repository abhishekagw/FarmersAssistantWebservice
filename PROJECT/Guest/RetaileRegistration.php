<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<body>
<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_register"]))
{
	$photo=$_FILES['file_photo']['name'];
	$path=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/Retailer/Photo/".$photo);
	
	$proof=$_FILES['file_proof']['name'];
	$path2=$_FILES['file_proof']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/Retailer/Proofs/".$proof);
	
	$name=$_POST["txt_name"];
	$email=$_POST["txt_email"];
	$contact=$_POST["txt_contact"];
	$address=$_POST["txt_address"];
	$password=$_POST["txt_password"];
	$confirmpass=$_POST["txt_confirmpass"];
	$place=$_POST["sel_place"];

  $selQry="select * from tbl_farmer where farmer_email='".$email."' ";
  $eQry=$con->query($selQry);
  if($eQry->num_rows<1)
  {
	
      if($password==$confirmpass)
      {
      $insQry="insert into tbl_retailer(retailer_name,retailer_email,retailer_contact,retailer_address,retailer_password,retailer_proof,retailer_photo,place_id) values('".$name."','".$email."',".$contact.",'".$address."','".$password."','".$proof."','".$photo."','".$place."')";
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
            
            $mail->Subject = "Your Account Creation is Completed";
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
            </script
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Contacts</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"required="required"></textarea></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="txt_confirmpass"></label>
      <input type="password" name="txt_confirmpass" id="txt_confirmpass" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="file_proof"></label>
      <input type="file" name="file_proof" id="file_proof" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onchange="getPlace(this.value)">
        <option value="">Select District</option>
        <?php
		$selQry="select * from tbl_district";
		$result=$con->query($selQry);
		if($result->num_rows>0)
		{
			while($data=$result->fetch_assoc())
			{
				?>
                <option value="<?php echo $data["district_id"] ?>"><?php echo $data["district_name"]?></option>
                <?php
			}
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place">
        <option value="">Select Place</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_register" id="btn_register" value="Register" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
  <div align="center"></div>
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/AjaxPlace.php?pid="+did,
		success: function(html){
			$("#sel_place").html(html);
		}
	});
}
</script>
</html>