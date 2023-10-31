<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
session_start();
$productrate="";
$productname="";
$productstock="";
$productdescription="";
$check="";
if(isset($_POST["btn_save"]))
{
	$photo= $_FILES['file_photo']['name'];
	$path = $_FILES['file_photo']['tmp_name'];
	move_uploaded_file($path,"../Assets/Files/Farmer/Products/".$photo);
	
	$name=$_POST["txt_name"];
	$rate=$_POST["txt_rate"];
	$description=$_POST["txt_description"];
	$subcategory=$_POST["sel_subcategory"];
	$stock=$_POST["txt_stock"];
	$check=$_POST["txt_check"];
	if($check=="")
	{
	$insQry="insert into tbl_product(product_name,product_rate,subcategory_id,product_photo,product_stock,farmer_id,product_description)values('".$name."','".$rate."','".			$subcategory."','".$photo."','".$stock."','".$_SESSION["fid"]."','".$description."')";
	if($con->query($insQry))
	{
		?>
			<script>
			alert("Product Added");
			</script>
    	  <?php
	}
	}
	else
	{
		$productname=$_POST["txt_name"];
		$productrate=$_POST["txt_rate"];
		$productdescription=$_POST["txt_description"];
		$productstock=$_POST["txt_stock"];
		$upQry="update tbl_product set product_name='".$productname."',product_rate='".$productrate."',product_stock='".$productstock."',product_description='".$productdescription."' where product_id=".$check;
		if($con->query($upQry))
    header("location:Product.php");
		
	{
		?>
			<script>
			alert("Product Updated");
			</script>
    	  <?php
	}
	}
	
	
}
if(isset($_GET["did"]))
{
		$delQry="delete from tbl_product where product_id=".$_GET["did"];
		if($con->query($delQry))
		{
			header("location:Product.php");
		}

}
if(isset($_GET["eid"]))
{
		$selQry="select *  from tbl_product where product_id=".$_GET["eid"];
		$result2=$con->query($selQry);
		$row=$result2->fetch_assoc();
		$productname=$row['product_name'];
		$productrate=$row['product_rate'];
		$productdescription=$row['product_description'];
		$productstock=$row['product_stock'];
		$check=$row['product_id'];
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table  border="1">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $productname?>" required="required" autocomplete="off"/></td>
      <input type="hidden" name="txt_check" id="txt_check" value="<?php echo $check?>" /></td>
    </tr>
    <tr>
      <td>Rate</td>
      <td><label for="txt_rate"></label>
      <input type="text" name="txt_rate" id="txt_rate" value="<?php echo $productrate?>" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Description</td>
      <td><label for="txt_description"></label>
      <textarea name="txt_description" id="txt_description" value="" cols="45" rows="5" required="required"><?php echo $productdescription?></textarea></td>
    </tr>
    <tr>
      <td>Category</td>
      <td><label for="sel_category"></label>
        <select name="sel_category" id="sel_category" onChange="getPlace(this.value)">
        <option value="">Select Category</option>
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
    <tr>
      <td>Subcategory</td>
      <td><label for="sel_subcategory"></label>
        <select name="sel_subcategory" id="sel_subcategory">
        <option value="">Select SubCategory</option>
      </select></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" required="required"/></td>
    </tr>
    <tr>
      <td>Stock</td>
      <td><label for="txt_stock"></label>
      <input type="text" name="txt_stock" id="txt_stock" value="<?php echo $productstock?>" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
          <input type="submit" name="btn_save" id="txt_save" value="Save" />
          <input type="reset" name="btn_cancel" id="txt_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td>S1 No.</td>
      <td>Name</td>
      <td>Rate</td>
      <td>Category</td>
      <td>Subcategory</td>
      <td>Photo</td>
      <td>Stock</td>
      <td>Description</td>
      <td>Action</td>
    </tr>
    <tr>
    <?php
	$i=0;
	$disQry="select * from tbl_product p inner join tbl_subcategory s on s.subcategory_id=p.subcategory_id inner join tbl_category c on s.category_id=c.category_id ";
	$result1=$con->query($disQry);
	if($result1->num_rows>0)
	{
		while($data1=$result1->fetch_assoc())
		{
			$i++;
	?>
      <td><?php echo $i ?></td>
      <td><?php echo $data1["product_name"]?></td>
      <td><?php echo $data1["product_rate"]?></td>
      <td><?php echo $data1["category_name"]?></td>
      <td><?php echo $data1["subcategory_name"]?></td>
      <td><img src="../Assets/Files/Farmer/Products/<?php echo $data1["product_photo"]?>" height="100" width="100"</td>
      <td><?php echo $data1["product_stock"]?></td>
      <td><?php echo $data1["product_description"]?></td>
      <td><a href="Product.php?did=<?php echo $data1['product_id']?>">Delete</a>&nbsp&nbsp&nbsp;<a href="Product.php?eid=<?php echo $data1['product_id']?>">Edit</a></td>
    </tr>
    <?php
    	}
	}
	?>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function getPlace(did)
{
	$.ajax({
		url:"../Assets/AjaxPages/Ajaxsubcategory.php?pid="+did,
		success: function(html){
			$("#sel_subcategory").html(html);
		}
	});
}
</script>
<?php

include('Foot.php');
ob_end_flush();
?>
</html>