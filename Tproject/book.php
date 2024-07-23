<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="book.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
   
    <div class="container">
        <h1 class="heading">
            <span>B</span>
            <span>O</span>
            <span>O</span>
            <span>K</span>
            <!-- <span class="space"></span> -->
            <span>I</span>
            <span>N</span>
            <span>G</span>
            <span>O</span>
            <span>P</span>
            <span>E</span>
            <!-- <span>O</span> -->
            <span>N</span>
        </h1>
    </div>

    <div class="wrapper">
        <form action="payment.php" method="post">
            <div class="input-box">
                <div class="input-field">
                <input type="text" name="string_value"  <?php 
                    if(isset($_POST["place"])){
                    $Place=$_POST["place"];
?>
                    value="<?php echo $Place;?>"
                    <?php
                    }
                    ?>  hidden>
                    <input type="text" name="string_value" <?php 
                    // echo  $_POST["place"];;
                    if(isset($_POST["place"])){
                    $Place=$_POST["place"];
?>
                    value="<?php echo $Place;?>"
                    <?php
                    }
                    ?> placeholder="Place Name" required>
                    <i class='bx bx-location-plus'></i>
                </div>
                <div class="input-field">
                    <input type="number"
                    <?php 
                    // echo  $_POST["place"];;
                    if(isset($_POST["numberOfGuest"])){
                    $numberOfGuest=$_POST["numberOfGuest"];
?>
                    value="<?php echo $numberOfGuest;?>"
                    <?php
                    }
                    ?> 
                    placeholder="Guest Numbers" required>
                    <i class='bx bxs-edit'></i>
                </div>

                <div class="input-field">
                    <input type="text"  name="Date"
                    <?php 
                    // echo  $_POST["place"];;
                    if(isset($_POST["Date"])){
                    $Date=$_POST["Date"];
?>
                    value="<?php echo $Date;?>"
                    <?php
                    }
                    ?> 
                    placeholder="Arrival Date" required>
                    <i class='bx bxs-calendar' style='color:#0e0d0d' ></i>
                </div>
                <div class="input-field">
                    <input type="text" name="date"
                    <?php 
                    // echo  $_POST["place"];;
                    if(isset($_POST["date"])){
                    $date=$_POST["date"];
?>
                    value="<?php echo $date;?>"
                    <?php
                    }
                    ?> 
                    placeholder="Leaving date" required>
                    <i class='bx bxs-calendar' style='color:#111010' ></i>
                </div>

                <div class="input-field">
                    <input type="number" 
                    <?php 
                    // echo  $_POST["place"];;
                    if(isset($_POST["Amount"])){
                    $Amount=$_POST["Amount"];
?>
                    value="<?php echo $Amount;?>"
                    <?php
                    }
                    ?> 
                    placeholder="Payment" required>
                    <i class='bx bx-money-withdraw'></i>
                </div>
                <div class="input-field">
                    <input type="number" 
                    <?php 
                    // echo  $_POST["place"];;
                    if(isset($_POST["Amount"])){
                    $Amount=$_POST["Amount"];
?>
                    value="<?php echo $Amount;?>"
                    <?php
                    }
                    ?> 
                    placeholder="Confirm Payment" required>
                    <i class='bx bx-money-withdraw'></i>
                </div>
            </div>
            <!-- <label><input type="checkbox">I hereby declare that the above information is true and correct</label> -->

            <!-- <a href="payment.html" class="btn">Book Now</a> -->
            <!-- <button class="btn">Book now</button> -->
            
            <a href=""><button>Book now</button></a>
        </form>
    </div>

    <script src="script1.js"></script>
</body>
</html>