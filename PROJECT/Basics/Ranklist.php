<?php
$grade=" ";
$name="";
$total="";
$percentage="";
$gender="";
$dept="";
if(isset($_POST["btnsubmit"]))
	{
		$fisrtname=$_POST["txtfname"];
		$lastname=$_POST["txtlname"];
		$gender=$_POST["gender"];
		$dept=$_POST["sel_dept"];
		$mark1=$_POST["txtmark1"];
		$mark2=$_POST["txtmark2"];
		$mark3=$_POST["txtmark3"];

		$total=$mark1+$mark2+$mark3;
		$percentage=($total/300)*100;
		
		if($gender=="Male")
		{
			$name="Mr. ".$fisrtname." ".$lastname;
		}
		
		if($gender=="Female")
		{
			$name="Ms. ".$fisrtname." ".$lastname;
		}
		
		if($percentage>80)
		   	$grade="A";
			else if($percentage>60)
					$grade="B";
			 		else if($percentage>40)
			 			$grade="C";
						else if($percentage<40)
								$grade="D";
			
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="456" height="656" border="1">
    <tr>
      <td>First Name</td>
      <td><label for="txtfname"></label>
      <input type="text" name="txtfname" id="txtfname" /></td>
    </tr>
    <tr>
      <td>Last Name</td>
      <td><label for="txtlname"></label>
      <input type="text" name="txtlname" id="txtlname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="gender" id="btngender" value="Male" />
        <label for="btngender"></label>
        <label for="Male"></label>
      Male 
      <input type="radio" name="gender" id="btngender" value="Female" />
      <label for="btngender2"></label>
      <label for="Female"></label>
      Female</td>
    </tr>
    <tr>
      <td>Department</td>
      <td><label for="sel_dept"></label>
      
        <select name="sel_dept" id="sel_dept">
        <option value="BBA">BBA</option>
        <option value="BCA">BCA</option>
        <option value="MCA">MCA</option>
      </select>
     </td>
    </tr>
    <tr>
      <td>Mark 1</td>
      <td><label for="txtmark1"></label>
      <input type="text" name="txtmark1" id="txtmark1" /></td>
    </tr>
    <tr>
      <td>Mark 2</td>
      <td><label for="txtmark2"></label>
      <input type="text" name="txtmark2" id="txtmark2" /></td>
    </tr>
    <tr>
      <td>Mark 3</td>
      <td><label for="txtmark3"></label>
      <input type="text" name="txtmark3" id="txtmark3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $name ?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $gender ?></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><?php echo $dept ?></td>
    </tr>
    <tr>
      <td>Total</td>
      <td><?php echo $total ?></td>
    </tr>
    <tr>
      <td>Percentage</td>
      <td><?php echo $percentage ?></td>
    </tr>
    <tr>
      <td>Grade</td>
      <td><?php echo $grade ?></td>
    </tr>
  </table>
</form>
</body>
</html>