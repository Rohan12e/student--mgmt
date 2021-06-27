<!DOCTYPE html>
<html lang="en">
<head>
   
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./style/form.css">
   
    <title>Add Class</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">ADD CLASS</span>
        <a href="logout.php" style="color: white"><span>Logout</span></a>
    </div>
     <div class="fun">
    <a href="dashboard.php" style="color:white"><span>Dashboard</span></a>
</div>
    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend>Add Class</legend>
                <label>Class Name</label>
                <input type="text" name="class_name" placeholder="Class Name">
                <label>Amount</label>
                <input type="text" name="class_id" placeholder="Amount">
                <input type="submit" value="Submit">
            </fieldset>        
        </form>
    </div>

   
</body>
</html>

<?php 
    include('connection.php');
     session_start();

    if (isset($_POST['class_name'],$_POST['class_id'])) {
        $name=$_POST["class_name"];
        $id=$_POST["class_id"];

        // validation
        if (empty($name) or empty($id) or preg_match("/[a-z]/i",$id)) {
            if(empty($name))
                echo '<p class="error">Please enter class</p>';
            if(empty($id))
                echo '<p class="error">Please enter class id</p>';
            if(preg_match("/[a-z]/i",$id))
                echo '<p class="error">Please enter valid class id</p>';
            exit();
        }

        $sql = "INSERT INTO `class` (`name`, `amount`) VALUES ('$name', '$id')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid class name or class id")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Successful)';
            echo '</script>';
        }
    }

?>