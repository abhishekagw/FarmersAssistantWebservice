<?php
ob_start();
include('Head.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");

if(isset($_POST["btnsave"]))
{
	$subcategory=$_POST["txtcategory"];
	$category=$_POST["sel_category"];
	$insQry="insert into tbl_subcategory(subcategory_name,category_id) values('".$subcategory."',".$category.")";
	$con->query($insQry);
}
?>
<form id="form1" name="form1" method="post" action="">
  <table width="318" height="283" border="1">
    <tr>
      <td>Category</td>
      <td><label for="sel_category"></label>
        <select name="sel_category" id="sel_category">
        <option value="">Select Category</option>
        <?php
		$selQry="select *from tbl_category";
		$result= $con->query($selQry);
		if($result->num_rows>0)
		{
			while($data=$result->fetch_assoc())
			{
			?>
            <option value="<?php echo $data['category_id']?>"><?php echo $data['category_name']?></option>
            <?php
			}
			}
		?>
        
      </select></td>
    </tr>
    <tr>
      <td>Subcategory</td>
      <td><label for="txtcategory"></label>
      <input type="text" name="txtcategory" id="txtcategory" /></td>
    </tr>
    <tr>
      
      <td colspan="2" align="center"><input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>