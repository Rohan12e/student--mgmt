<!DOCTYPE html>
<html>
<head>
    <title></title>
     <link rel="stylesheet" href="./style/home.css">
     <link rel="stylesheet" type='text/css' href="./style/manage.css">
</head>
<body>
 <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">MANAGE CLASSES</span>
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

            $sql = "SELECT * FROM fees";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              ?>
              <table>
              <caption>Manage Classes</caption>
                <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>AMOUNT</th>
                <th>EDIT</th>
                <th>UPDATE</th>
                <th>DELETE</th>
                </tr>
                <?php

                while($row = mysqli_fetch_array($result))

                  {
?>
                  <tr>
                  <td> <?php echo $row['id'];?></td>
                  <td> <?php echo $row['name'];?> </td>
                  <td>  <?php echo $row['amount'];?></td>
                  <td><a href="dashboard.php" style="color:white">Edit</a></td>
                  <td><a href="dashboard.php" style="color:white">Update</a></td>
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