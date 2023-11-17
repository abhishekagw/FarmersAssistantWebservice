<?php
include("../Connection/Connection.php");
$search="";
$search=$_GET["search"];
if($_GET['sid']==0 || $_GET['sid']=== 'Select Subcategory')
{
?>
 <div class="row">
            <?php
           
            $disQry="select * from tbl_product a inner join tbl_subcategory s on s.subcategory_id=a.subcategory_id inner join tbl_category c on s.category_id=c.category_id inner join tbl_farmer f on a.farmer_id=f.farmer_id inner join tbl_place p on p.place_id=f.place_id  inner join tbl_district d on p.district_id=d.district_id WHERE a.product_name LIKE '%$search%' AND c.category_id= ".$_GET['cid'];
            $result1=$con->query($disQry);
            if ($result1->num_rows > 0) {
                $i = 0;
                while ($data1 = $result1->fetch_assoc()) {
                    $i++;
            ?>
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Set a fixed size for each card -->
                        <div class="single-item-grid" style="width: 100%; height: 500px; border: 1px solid #ccc; border-radius: 5px;">
                            <div class="image" >
                                <a href="viewproduct.php?pid=<?php echo $data1['product_id'] ?>">
                                    <img src="../Assets/Files/Farmer/Products/<?php echo $data1["product_photo"] ?>" alt="#" style="height: 300px;width:300px object-fit: cover;">
                                    <i class=" cross-badge lni lni-bolt"></i>
                                                        <span class="flat-badge sale">Sale</span>
                                </a>
                            </div>
                            <div class="content" style="height: 40%; padding: 10px;">
                                <a href="javascript:void(0)" class="tag"><?php echo $data1["subcategory_name"] ?></a>
                                <h3 class="title">
                                    <a href="viewproduct.php?pid=<?php echo $data1['product_id'] ?>">
                                        <?php echo $data1["product_name"] ?>
                                    </a>
                                </h3>
                                <p class="location">
                                    <a href="javascript:void(0">
                                        <i class="lni lni-map-marker"></i>
                                        <?php echo $data1["district_name"] ?>
                                    </a>
                                </p>
                                <ul class="info">
                                    <li class="price">₹<?php echo $data1["product_rate"] ?></li>
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
                
                }
            }
            ?>
        </div>
  <?php
}
else
{
  ?>
  <div class="row">
            <?php
            $disQry="select * from tbl_product a inner join tbl_subcategory s on s.subcategory_id=a.subcategory_id inner join tbl_category c on s.category_id=c.category_id inner join tbl_farmer f on a.farmer_id=f.farmer_id inner join tbl_place p on p.place_id=f.place_id  inner join tbl_district d on p.district_id=d.district_id where a.product_name LIKE '%$search%' and c.category_id=".$_GET['cid']." and s.subcategory_id=".$_GET['sid'];
            $result1=$con->query($disQry);
            if ($result1->num_rows > 0) {
                $i = 0;
                while ($data1 = $result1->fetch_assoc()) {
                    $i++;
            ?>
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Set a fixed size for each card -->
                        <div class="single-item-grid" style="width: 100%; height: 500px; border: 1px solid #ccc; border-radius: 5px;">
                            <div class="image" >
                                <a href="viewproduct.php?pid=<?php echo $data1['product_id'] ?>">
                                    <img src="../Assets/Files/Farmer/Products/<?php echo $data1["product_photo"] ?>" alt="#" style="height: 300px;width:300px object-fit: cover;">
                                    <i class=" cross-badge lni lni-bolt"></i>
                                                        <span class="flat-badge sale">Sale</span>
                                </a>
                            </div>
                            <div class="content" style="height: 40%; padding: 10px;">
                                <a href="javascript:void(0)" class="tag"><?php echo $data1["subcategory_name"] ?></a>
                                <h3 class="title">
                                    <a href="viewproduct.php?pid=<?php echo $data1['product_id'] ?>">
                                        <?php echo $data1["product_name"] ?>
                                    </a>
                                </h3>
                                <p class="location">
                                    <a href="javascript:void(0">
                                        <i class="lni lni-map-marker"></i>
                                        <?php echo $data1["district_name"] ?>
                                    </a>
                                </p>
                                <ul class="info">
                                    <li class="price">₹<?php echo $data1["product_rate"] ?></li>
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
                
                }
            }
            ?>
        </div>
  <?php
}
  ?>