<?php
    include("connection.php");
    session_start();
    
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `class`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `student`"));
    $no_of_subjects=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `subject`"));
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="./style/home.css">
	    <style>
        .main{
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 7% 20% 0 20%;
        }
    </style>
</head>
<body>
    
   
<div class="title">
        <a href="dashboard.php"></a>
        <span class="heading">Dashboard  </span> 
        <span class="date">Name:<?php echo $_SESSION{"login_user"};?></span>
     <a href="logout.php" style="color: white">Logout</a>
    </div>
    <marquee style="color:red">Once the data is delete no one recover</marquee>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
           <li class="dropdown" onclick="toggleDisplay('4')">
                <a href="#" class="dropbtn">Subjects &nbsp
                </a>
                <div class="dropdown-content" id="4">
                    <a href="add_subject.php">Add Subject</a>
                    <a href="manage_subject.php">Manage Subject</a>
                </div>
            </li>
             <li class="dropdown" onclick="toggleDisplay('5')">
                <a href="#" class="dropbtn">Fees &nbsp
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_fees.php">Add Fees</a>
                    <a href="manage_fees.php">Manage Fees</a>
                </div>
            </li>

            <li class="dropdown" onclick="toggleDisplay('4')">
                <a href="#" class="dropbtn">Results &nbsp
                </a>
                <div class="dropdown-content" id="4">
                    <a href="student.php">Add Result</a>
                    <a href="">Manage Result</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <?php
            echo '<p>Number of classes:'.$no_of_classes[0].'</p>';
            echo '<p>Number of students:'.$no_of_students[0].'</p>';
            echo '<p>Number of subjects:'.$no_of_subjects[0].'</p>';
        ?>
    </div>

</body>
</html>