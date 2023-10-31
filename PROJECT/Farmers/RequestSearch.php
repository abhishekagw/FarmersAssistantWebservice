<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Categories</title>
</head>

<body>
<h1 align="center">Categories</h1>
<form id="form1" name="form1" method="post" action="">
   <table  border="1" align="center">
     <tr>
       <td><label for="sel_category"></label>
         <select name="sel_category" id="sel_category" onchange="Search(this.value)">
         <option>Select Category</option>
          <?php
		$selQry="select * from tbl_category";
		$result=$con->query($selQry);
		if($result->num_rows>0)
		{
			while($data=$result->fetch_assoc())
			{ 
				?>
                <option value="<?php echo $data["category_id"] ?>"><?php echo $data["category_name"]?></option>
                <?php
				
			}
		}
		?>
        </select></td>
     </tr>
   </table>
   <div id="mydiv">
   <table  width="400" border="1">
     <tr>
   <?php
	$i=0;
	$disQry="select * from tbl_request a inner join  tbl_category c on a.category_id=c.category_id inner join tbl_retailer r on a.retailer_id=r.retailer_id inner join tbl_place p on p.place_id=r.place_id  inner join tbl_district d on p.district_id=d.district_id";
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
      <p>Retailer Name:<?php echo $data1["retailer_name"]?></p>
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
	</div>
	</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function Search(cid)
{
	  var categoryId = document.getElementById('sel_category').value;
   

    if (categoryId.toLowerCase() === 'select category') 
	{
        window.location.href='RequestSearch.php';
		return;
        
	}
	
	$.ajax({
		url:"../Assets/AjaxPages/AjaxRequest.php?cid="+cid,
		success: function(html){
			$("#mydiv").html(html);
		}
	});
}
</script>
<?php

include('Foot.php');
ob_end_flush();
?>

</html>