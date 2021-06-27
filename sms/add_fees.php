<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./style/form.css">
    <title>Dashboard</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Dashboard</span>
        <a href="logout.php" style="color: white"><span>Logout</span></a>
    </div>
<div class="fun">
    <a href="dashboard.php" style="color:white"><span>Dashboard</span></a>
</div>
   

    <div class="main">
        <form action="" method="post">
            <fieldset>
            <legend>Enter Fees</legend>

                <?php
                    include("connection.php");
                     session_start();

                    $select_class_query="SELECT `name` from `class`";
                    $class_result=mysqli_query($conn,$select_class_query);
                    //select class
                    echo '<select name="class_name">';
                    echo '<option selected disabled>Select Class</option>';
                    
                        while($row = mysqli_fetch_array($class_result)) {
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                    echo'</select>';                      
                ?>

                <input type="text" name="rno" placeholder="Roll No">
                <input type="text" name="amount" id="" placeholder="Total Amount">
                <input type="text" name="p_amount" id="" placeholder="Paid Amount">
                <input type="submit" value="Get Recipt">
            </fieldset>
        </form>
    </div>

</body>
</html>

<?php
    if(isset($_POST['rno'],$_POST['amount'],$_POST['p_amount']))
    {
        $rno=$_POST['rno'];
        if(!isset($_POST['class_name']))
            $class_name=null;
        else
            $class_name=$_POST['class_name'];
        $p1=(int)$_POST['amount'];
        $p2=(int)$_POST['p_amount'];
       

        $total=$p1-$p2;

        // validation
        if (empty($class_name) or empty($rno)) {
            if(empty($class_name))
                echo '<p class="error">Please select class</p>';
            if(empty($rno))
                echo '<p class="error">Please enter roll number</p>';
            if(preg_match("/[a-z]/i",$rno))
                echo '<p class="error">Please enter valid roll number</p>';
            if(preg_match("/[a-z]/i",$total))
                echo '<p class="error">Please enter valid marks</p>';
           
            exit();
        }

        $name=mysqli_query($conn,"SELECT `name` FROM `student` WHERE `rno`='$rno' and `class`='$class_name'");
        while($row = mysqli_fetch_array($name)) {
            $display=$row['name'];
            
         }

        $sql="INSERT INTO fees (name, `rno`, `class`,amount,p_amount, total) VALUES ('$display', '$rno', '$class_name', '$p1', '$p2', '$total')";
        $sql=mysqli_query($conn,$sql);

        if (!$sql) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        }
    }
    
?>