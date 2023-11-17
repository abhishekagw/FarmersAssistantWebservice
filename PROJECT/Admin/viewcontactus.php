<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$vquery="select * from tbl_contactus";
$result=$con->query($vquery);
?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Contact US</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Contact Us</h2>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Complaint ID</th>
                    <th>Username</th>
                    <th>Subject </th>
                    <th>Message</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Reply</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                $j=0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $j++;
                    echo "<tr>";
                    echo "<td>{$row['contactus_id']}</td>";
                    echo "<td>{$row['contactus_name']}</td>";
                   
                    echo "<td>{$row['contactus_subject']}</td>";
                    echo "<td>{$row['contactus_message']}</td>";
                    echo "<td>{$row['contactus_phone']}</td>";
                    echo "<td>{$row['contactus_email']}</td>";
                    echo "<td>";
                    echo '<div  class="form-group mt-3">';
                    ?>
                 <a href="mailto:<?php echo $row['contactus_email']?>?subject=Inquiry&body=Hello%20there," class="btn btn-primary" >Reply</a>
                 <?php
                    echo '</div>';
                   /* echo '<div  class="form-group ">';
                    echo '<button class="btn btn-danger">Delete</button>';
                    echo '</div>';*/
                    echo "</td>";
                    echo "</tr>";
                    ?>
                    </div>
                    <?php
                }
                ?>
            </tbody>
        </table>
                    


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</body>
</html>