<?php
include("../Connection/Connection.php");
?>
 <table width="200" border="1">
    <tr>
   <?php
	$i=0;
	$disQry="select * from tbl_request a inner join  tbl_category c on a.category_id=c.category_id inner join tbl_retailer r on a.retailer_id=r.retailer_id inner join tbl_place p on p.place_id=r.place_id  inner join tbl_district d on p.district_id=d.district_id where a.category_id= ".$_GET['cid'];
	$result1=$con->query($disQry);
if($result1->num_rows>0)
{
	
		while($data1=$result1->fetch_assoc())
		{
			$i++;
		
	?>
  
 
      <td>
      <p><img src="../Assets/Files/Retailer/Requests/<?php echo $data1["request_photo"]?>" height="100" width="100" /></p>
      <p>Name:<?php echo $data1["request_product"]?></p>
      <p>Rate:<?php echo $data1["request_pricerange"]?></p>
      <p>Category:<?php echo $data1["category_name"]?></p>
      <p>District:<?php echo $data1["district_name"]?></p>
      <p>Place:<?php echo $data1["place_name"]?></p>
      <p>Farmer Name:<?php echo $data1["retailer_name"]?></p>
      <p><a href="viewrequest.php?pid=<?php echo $data1['request_id']?>">View More</a></p></td>
      
   
  <?php
	if($i==4)
	{
		echo "</tr>";
		$i=0;
		echo "<tr>";
		
	}
		}
}
  ?>
   </tr>
  </table>