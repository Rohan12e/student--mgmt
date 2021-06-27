<!DOCTYPE html>
<html lang="en">
<head>
  
  <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" type='text/css' href="./style/manage.css">
    <title>Dashboard</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">MANAGE STUDENT</span>
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

   <div class="fun">
    <a href="dashboard.php" style="color:white"><span>Dashboard</span></a>
</div>

    <div class="main">
        <?php
            include('connection.php');
             session_start();
            $db = mysqli_select_db($conn,"rd");

            $sql = "SELECT name, id,contact,class,rno,gender FROM student";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              ?>
              <table>
              <caption>Manage Classes</caption>
                <tr>
  
                <th>RNO</th>
                <th>NAME</th>
                <th>CONTACT</th>
                <th>GENDER</th>
                <th>CLASS</th>
                <th>UPDATE</th>
                <th>DELETE</th>
                </tr>
                <?php

                while($row = mysqli_fetch_array($result))

                  {
?>
                  <tr>
                  <td> <?php echo $row['rno'];?> </td>
                  <td>  <?php echo $row['name'];?></td>
                  <td>  <?php echo $row['contact'];?></td>
                  <td>  <?php echo $row['gender'];?></td>
                  <td>  <?php echo $row['class'];?></td>
                  <td><a href="edit.php?id=$row[id] b=$row[name] c=$row[rno]" style="color:white">Update</a></td>
                  
                  <td><a href="dashboard.php" style="color:white">Delete</a></td>
                </tr>
                  <?php
                  }
                  ?>
                </table>
                <?php  
            } else {
                echo "0 results";
            }
           
        ?>
        
    </div>

   
</body>
</html>
