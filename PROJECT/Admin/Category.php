<?php
ob_start();
include('Head.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");
$Category="";
$check="";
if(isset($_POST["btn_save"]))
{
	$Category=$_POST["txt_categoryname"];
	$check=$_POST["txt_check"];
	if($check=="")
	{
	$category=$_POST["txt_categoryname"];
	$insQry="insert into tbl_category(category_name) values('".$category."')";
	$con->query($insQry);
	}
	else
	{
		$upQry="update tbl_category set category_name='".$Category."' where category_id=".$check;
		if($con->query($upQry))
		{
			header("location:Category.php");
		}
		
	}

}
if(isset($_GET['did']))
{
	$delQry="delete from tbl_category where category_id=".$_GET['did'];
	if($con->query($delQry))
	{
		header("location:Category.php");
	}
}
if(isset($_GET["eid"]))
{
		$selQry="select *  from tbl_category where category_id=".$_GET["eid"];
		$result=$con->query($selQry);
		$row=$result->fetch_assoc();
		$Category=$row['category_name'];
		$check=$row['category_id'];
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="311" height="156" border="1">
    <tr>
      <td width="101">Category Name</td>
      <td width="194"><label for="txt_categoryname"></label>
      <input type="text" name="txt_categoryname" id="txt_categoryname" value="<?php echo $Category ?>"/></td>
       <input type="hidden" name="txt_check" id="txt_check" value="<?php echo $check ?>"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="Save" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  </form>
  <?php
  $i=0;
  $selqry="select * from tbl_category";
  $result=$con->query($selqry);
  if($result->num_rows>0)
  {
  ?>
  <table  border="1">
    <tr>
      <td>S1 No</td>
      <td>Category Name</td>
      <td>Action</td>
    </tr>
    <?php
	while($data=$result->fetch_assoc())
	{
		$i++;
	?>
    
    <tr>
      <td> <?php echo $i?></td>
      <td> <?php echo $data['category_name']?></td>
      <td><a href="Category.php?did=<?php echo $data['category_id']?>">Delete</a>&nbsp&nbsp&nbsp;<a href="Category.php?eid=<?php echo $data['category_id'] ?>">Edit</a></td>
      </tr>
      <?php
	}
	  ?>
    
  </table>
  <?php
  }
  ?>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>