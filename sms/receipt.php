<style type="text/css">
    .heading{
    font-size: 60px;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./style/receipt.css">
    <title>Receipt</title>
</head>
<body>
    <center>
     <span class="heading">Receipt</span></center>
    <?php
        include("connection.php");
        $name_sql=mysqli_query($conn,"SELECT `name`,rno,class FROM `student`");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        $rno = $row['rno'];
        $class = $row['class'];
        }
        $result_sql=mysqli_query($conn,"SELECT amount, p_amount, total FROM fees");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $amount = $row['amount'];
            $p_amount = $row['p_amount'];
           
            $total = $row['total'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "no result";
            exit();
        }
    ?>
    <div class="container">
        <div class="details">
            <span>Name:</span> <?php echo $name ?> <br>
            <span>Class:</span> <?php echo $class; ?> <br>
            <span>Roll No:</span> <?php echo $rno; ?> <br>
        </div>
        <div class="main">
            <div class="s1">
                <p>Receipt</p>
                <p>Total</p>
                <p>Paid Amount</p> 
               </div>
            <div class="s2">
                <p>Amount</p>
                <?php echo '<p>'.$amount.'</p>';?>
                <?php echo '<p>'.$p_amount.'</p>';?>
            </div>
        </div>
        <div class="result">
            <?php echo '<p>Balance Amount:&nbsp'.$total.'</p>';?>
        </div>
        
        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div>

    </div>
</body>
</html>