<?php
include("../Assets/Connection/Connection.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Purchase Bill</title>
  <style>
    /* Add your CSS styles for the bill here */
    body {
      font-family: Arial, sans-serif;
    }
    table {
      width: 50%;
      margin: 20px auto;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }
    /* styles.css */

/* Reset button styles */
button {
    border: none;
    padding: 0;
    background: none;
    cursor: pointer;
}

/* Payment button styles */
.payment-button {
    background-color: #3498db;
    color: #fff;
    font-size: 18px;
    padding: 10px 20px;
    border-radius: 5px;
    border: 2px solid #3498db;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: background-color 0.3s ease;
}

.payment-button:hover {
    background-color: #2980b9;
}

  </style>
</head>
<body>
<h2 align="center">Purchase Bill</h2>
  <?php
  $bid=$_GET["bid"];
  $selQry= "SELECT * FROM tbl_product p
  INNER JOIN tbl_farmer f ON p.farmer_id = f.farmer_id
  INNER JOIN tbl_booking b ON b.product_id = p.product_id
  INNER JOIN tbl_retailer r ON b.retailer_id = r.retailer_id
  WHERE r.retailer_id='" . $_SESSION["rid"] . "' AND b.booking_id=$bid";
  $result=$con->query($selQry);
  if($result->num_rows>0)
  {
  $data=$result->fetch_assoc();
 
  ?>
 
  <h3>From Address:</h3>
  <h4><?php echo $data["farmer_name"]; ?></h4>
  <p><?php echo $data["farmer_address"]; ?></p>
  <p>Ph:<?php echo $data["farmer_contact"]; ?></p>

  <h3>Bill  Address:</h3>
  <h4><?php echo $data["retailer_name"];?></h4>
  <p><?php echo $data["retailer_address"];?></p>
  <p>Ph:<?php echo $data["retailer_contact"];?></p>
  <br>

  <p><b>Order Date: </b><?php echo $data["booking_date"]; ?></p>
  <p><b>Invoice Date: </b><?php echo date("Y-m-d"); ?></p>


  <p style="color: red; font-weight: bold;">* This is a sample invoice and not a real one.</p>

 
  <table>
    <tr>
      <th>Product</th>
      <th>Quantity</th>
      <th>Price per unit</th>
      <th>Total</th>
    </tr>
    <?php
   
    $price_per_fish = 2;
    $quantity = 50;
    $total_amount = $price_per_fish * $quantity;
    ?>
    <tr>
      <td><?php echo $data["product_name"];?></td>
      <td><?php echo $data["booking_qty"];?></td>
      <td><?php echo $data["product_rate"];?>/Kg</td>
<?php
$qty=$data["booking_qty"];
$price=$data["product_rate"];
$total=$qty*$price;
$advance = ($qty * $price) * 0.10;
?>
      
      <td><?php echo $total; ?></td>
    </tr>
  </table>

  <!-- Grand Total -->
  <h3>Grand Total: $<?php echo $total; ?></h3>
  <h3>Advance To Pay: $<?php echo $advance; ?></h3>
  <?php
    }
  ?>

  <!-- How to Pay -->
  <h3>How to Pay:</h3>
  <p>Please make the payment through your preferred payment method. Bank transfer details and other payment options will be provided upon request.</p>
<button class="payment-button"  onClick="pay(<?php echo "$bid" ?>,<?php echo "$advance" ?>,)">PAY</button>
<script>
  function pay(bid,aid)
  {
  window.location.href="Payment.php?bid="+bid+"&aid="+aid;
  }
  </script>
</body>
</html>
