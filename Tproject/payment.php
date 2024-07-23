
<?php 
if(!isset($_SESSION)){
    session_start();
}


include("db_connection.php");


if(isset($_REQUEST['submit'])){

$fullName=$_REQUEST['fullname'];
$email=$_REQUEST['email'];
$address=$_REQUEST['address'];
$city=$_REQUEST['city'];
// $state=$_REQUEST['state'];
$zipCode=$_REQUEST['zipCode'];
// $expYear=$_REQUEST['expYear'];
$cvv=$_REQUEST['cvv'];
$nameOnCard=$_REQUEST['nameOnCard'];
$creditCardNumber=$_REQUEST['creditCardNumber'];
$expMonth=$_REQUEST['expMonth'];
$Date=$_REQUEST['Date'];
$date=$_REQUEST['date'];
// $leavingDate=$_REQUEST['leavingDate'];


$sql = "INSERT INTO bookings (Full_name, Email, nameOnCard, address, creditCardNumber,expMonth, city, zipCode, Cvv,arrivalDate,removingDate)
VALUES ('$fullName', '$email', '$nameOnCard', '$address', '$creditCardNumber','$expMonth', '$city', '$zipCode','$cvv','$Date','$date')";

if ($conn->query($sql) === TRUE) {

    $msg= " <div class='alert alert-warning col-sm-6'>Booking Succesfull </div>";
    echo '<script type="text/javascript">
    alert("Booking Succesfull");
    window.location.href = "tour.php";
  </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="payment.css">

</head>
<body>

<div class="container">

    <form action="">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input name="fullname" type="text"  placeholder="john deo">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" value='<?php  
                    if(isset($_SESSION['Email'])){
                        echo $_SESSION['Email'];
                    }
                    ?>' name="email" placeholder="example@example.com" 
                   >
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" name="address" placeholder="room - street - locality">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" name="city"
                    <?php 
                     if (isset($_POST['string_value'])) {
                        $string_value = $_POST['string_value'];
                        // echo '<input type="text" value="' . $string_value . '">';
                    // }
                    ?>
                    value="<?php echo $string_value?>";
                    <?php }?>
                    placeholder="" readonly>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>arrivalDate</span>
                        <input type="date" name="Date"  <?php  
                    if(isset($_POST['Date'])){
                        $Date=$_POST['Date'];  ?>
                        value="<?php echo $Date?>";
                        <?php
                    }
                    ?> >
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" name="zipCode" placeholder="123 456">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" name="nameOnCard" placeholder="mr. john deo">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" name="creditCardNumber" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span>exp Year :</span>
                    <input type="date" name="expMonth" placeholder="LeavingDate">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Leaving Date</span>
                        <input type="date" name="date"    <?php  
                    if(isset($_POST['date'])){
                        $date=$_POST['date'];  ?>
                        value="<?php echo $date?>";
                        <?php
                    }
                    ?> >
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" name="cvv" placeholder="1234">
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" value="proceed to checkout" name="submit" class="submit-btn">
<?php 
if(isset($msg)){
    echo $msg;
    
}
?>
    </form>

</div>    
    
</body>
</html>