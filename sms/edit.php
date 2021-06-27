<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="./style/home.css">
	 <link rel="stylesheet" href="./style/form.css">
</head>
<body>
<?php

	 include('connection.php');
             session_start();
          $rn=$_GET["name"];
$rn=$_GET["rno"];
$rn=$_GET["contact"];
   $rn=$_GET["gender"];          	 
 $rn=$_GET["class"];
 ?>            	 	
 <form method="post">
	<fieldset>
	name
	<input type="text" name="name" value="<?php echo $row["name"];?>">
	rno
	<input type="text" name="rno" value="<?php echo $row["rno"];?>">
	contact
	<input type="text" name="contact"value="<?php echo $row["contact"];?>">
	gender
	<input type="text" name="gender" value="<?php echo $row["gender"];?>">
	Class
	<input type="text" name="class" value="<?php echo $row["class"];?>">
	<input type="submit" name="delete" value="Delete">
</fieldset>
	</form>
</body>
</html>