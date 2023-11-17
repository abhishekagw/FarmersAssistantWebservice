<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_reply"])){
    $reply=$_POST["txt_reply"];
    $cmpid=$_POST["cmp_id"];
   $upQry="update tbl_complaintfarmer set complaintfarmer_reply='".$reply."' where complaintfarmer_id=".$cmpid;
    $con->query($upQry);

}

if(isset($_POST["btn_reply2"])){
    $reply2=$_POST["txt_reply2"];
    $cmpid2=$_POST["cmp_id2"];
     $upQry2="update tbl_complaintretailer set complaintretailer_reply='".$reply2."' where complaintretailer_id=".$cmpid2;
    $con->query($upQry2);

}

$query = "SELECT * FROM tbl_complaintfarmer c inner join tbl_farmer f on f.farmer_id=c.farmer_id inner join tbl_retailer r on r.retailer_id=c.retailer_id";
$result = mysqli_query($con, $query);
$query2 = "SELECT * FROM tbl_complaintretailer c inner join tbl_farmer f on f.farmer_id=c.farmer_id inner join tbl_retailer r on r.retailer_id=c.retailer_id";
$result2 = mysqli_query($con, $query2);

?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Farmer-Retailer Complaints</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Retailer Complaints</h2>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Complaint ID</th>
                    <th>Complainant Retailer</th>
                    <th>Accused Farmer </th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Admin Reply</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $j=0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $j++;
                    echo "<tr>";
                    echo "<td>{$row['complaintfarmer_id']}</td>";
                    echo "<td>{$row['farmer_name']}</td>";
                    echo "<td>{$row['retailer_name']}</td>";
                    echo "<td>{$row['complaintfarmer_title']}</td>";
                    echo "<td>{$row['complaintfarmer_content']}</td>";
                    echo "<td>{$row['complaintfarmer_date']}</td>";
                    echo "<td>{$row['complaintfarmer_reply']}</td>";
                    echo "<td>";
                    echo '<div  class="form-group mt-3">';
                    ?>
                 <button class="btn btn-primary" data-toggle="modal" data-target="#replyModal<?php echo $j ?>">Reply</button>
                 <?php
                    echo '</div>';
                   /* echo '<div  class="form-group ">';
                    echo '<button class="btn btn-danger">Delete</button>';
                    echo '</div>';*/
                    echo "</td>";
                    echo "</tr>";
                    ?>
                     <div class="modal fade" id="replyModal<?php echo $j ?>" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="replyModalLabel">Reply to Complaint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action=""> <!-- Replace 'reply_handler.php' with your backend file for handling replies -->
                            <div class="form-group">
                                <textarea class="form-control" name="txt_reply" rows="4" placeholder="Enter your reply here"></textarea>
                            </div>
                            <input type="hidden" name="cmp_id" value="<?php echo $row['complaintfarmer_id']?>"> <!-- Add complaint ID here -->
                            <button type="submit" class="btn btn-primary"name="btn_reply">Send Reply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <!-- Modal for Reply -->
       
    </div>

    <div class="container mt-4">
        <h2>Farmer Complaints</h2>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Complaint ID</th>
                    <th>Complainant Farmer</th>
                    <th>Accused Retailer </th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Admin Reply</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=100;
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    $i++;
                    echo "<tr>";
                    echo "<td>{$row2['complaintretailer_id']}</td>";
                    echo "<td>{$row2['farmer_name']}</td>";
                    echo "<td>{$row2['retailer_name']}</td>";
                    echo "<td>{$row2['complaintretailer_title']}</td>";
                    echo "<td>{$row2['complaintretailer_content']}</td>";
                    echo "<td>{$row2['complaintretailer_date']}</td>";
                    echo "<td>{$row2['complaintretailer_reply']}</td>";
                    echo "<td>";
                    echo '<div  class="form-group mt-3">';
                    ?>
                 <button class="btn btn-primary" data-toggle="modal" data-target="#replyModal<?php echo $i ?>">Reply</button>
                 <?php
                    echo '</div>';
                  /*  echo '<div  class="form-group ">';
                    echo '<button class="btn btn-danger">Delete</button>';
                    echo '</div>'; */
                    echo "</td>";
                    echo "</tr>";
                    ?>
                     <div class="modal fade" id="replyModal<?php echo $i ?>" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="replyModalLabel">Reply to Complaint</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action=""> <!-- Replace 'reply_handler.php' with your backend file for handling replies -->
                            <div class="form-group">
                                <textarea class="form-control" name="txt_reply2" rows="4" placeholder="Enter your reply here"></textarea>
                            </div>
                            <input type="hidden" name="cmp_id2" value="<?php echo $row2['complaintretailer_id']?>"> <!-- Add complaint ID here -->
                            <button type="submit" class="btn btn-primary"name="btn_reply2">Send Reply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <!-- Modal for Reply -->
       
    </div>

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


