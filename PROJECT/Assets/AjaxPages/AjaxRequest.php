<?php
include("../Connection/Connection.php");
?>
<div class="row">
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
      <div class="col-lg-4 col-md-4 col-12">
                        <!-- Set a fixed size for each card -->
                        <div class="single-item-grid" style="width: 100%; height: 500px; border: 1px solid #ccc; border-radius: 5px;">
                            <div class="image" >
                                <a href="viewrequest.php?pid=<?php echo $data1['request_id'] ?>">
                                    <img src="../Assets/Files/Retailer/Requests/<?php echo $data1["request_photo"] ?>" alt="#" style="height: 300px;width:300px object-fit: cover;">
                                    <i class=" cross-badge lni lni-bolt"></i>
                                                        <span class="flat-badge sale">Sale</span>
                                </a>
                            </div>
                            <div class="content" style="height: 40%; padding: 10px;">
                                <a href="javascript:void(0)" class="tag"><?php echo $data1["category_name"] ?></a>
                                <h3 class="title">
                                    <a href="viewrequest.php?pid=<?php echo $data1['request_id'] ?>">
                                        <?php echo $data1["request_product"] ?>
                                    </a>
                                </h3>
                                <p class="location">
                                    <a href="javascript:void(0">
                                        <i class="lni lni-map-marker"></i>
                                        <?php echo $data1["district_name"] ?>
                                    </a>
                                </p>
                                <ul class="info">
                                    <li class="price">₹<?php echo $data1["request_pricerange"] ?></li>
                                    <li class="like">
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-heart"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
      
   
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
   </div>