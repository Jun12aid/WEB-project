
<?php 
include("db_Connection.php");




if(isset($_REQUEST['submit'])){
    if(($_REQUEST['FullName']=="") || ($_REQUEST['Username']=="") || ($_REQUEST['Email']=="") || ($_REQUEST["PhoneNo"]=="") ||($_REQUEST['Password']=="")|| ($_REQUEST['ConfirmPassword']=="")
    ){

$msg=" <div class='alert alert-warning col-sm-6'>Fill All tThe Information </div> ";
        
    }
else{
    if(($_REQUEST['ConfirmPassword']==$_REQUEST['Password'])){

// $name=$_POST["name"];

        $full_name = $_REQUEST['FullName'];
        $username = $_REQUEST['Username'];
        $email = $_REQUEST['Email'];
        $phone_number = $_REQUEST['PhoneNo'];
        $password = $_REQUEST['Password']; // Hash the password for security
        $newImageName=addslashes(file_get_contents($_FILES['image']['tmp_name']));

    //     $course_image= $_FILES['course_img']['name'];
    //     $course_image_temp= $_FILES['course_img']['tmp_name'];
        
    //    //  echo $course_image_temp;
    //    $img_folder="images/courseimg/".$course_image; 
    //    move_uploaded_file($course_image_temp,$img_folder);
    
    // Prepare and execute the SQL query
    $sql = "INSERT INTO register (FullName, Username, Email, PhoneNo, Password,Photo)
                VALUES ('$full_name', '$username', '$email', '$phone_number', '$password','$newImageName')";
    
    if ($conn->query($sql) === TRUE) {
        // echo "Registration successful!";
        "<script>
         alert('Account Created'); 
        document.location.href='tour.php';
        </script>";
        
    } else {
        echo"INnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn";
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

      
    }
    else{
        $msg=" <div class='alert alert-warning col-sm-6'>Diffrent Password </div> ";

    }

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
   
    <div class="container">
        <h1 class="heading">
            <span>R</span>
            <span>E</span>
            <span>G</span>
            <span>I</span>
            <!-- <span class="space"></span> -->
            <span>S</span>
            <span>T</span>
            <span>R</span>
            <span>A</span>
            <span>T</span>
            <span>I</span>
            <span>O</span>
            <span>N</span>
        </h1>
    </div>

    <div class="wrapper">
        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="FullName" placeholder="Full Name" required>
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-field">
                    <input type="text" name="Username" placeholder="Username" required>
                    <i class='bx bx-user'></i>
                </div>

                <div class="input-field">
                    <input type="email" name="Email" placeholder="Email" required>
                    <i class='bx bxl-gmail'></i>
                </div>
                <div class="input-field">
                    <input type="number" name="PhoneNo" placeholder="Phone Number" required>
                    <i class='bx bx-phone' style='color:#121010' ></i>
                </div>

                <div class="input-field">
                    <input type="password" name="Password" placeholder="Password" required>
                    <i class='bx bx-lock-open-alt' style='color:#1b1919' ></i>
                </div>
                <div class="input-field">
                    <input type="password" name="ConfirmPassword"  placeholder="Confirm Password" required>
                    <i class='bx bx-lock-open-alt' style='color:#0c0c0c' ></i>
                </div>
                <div class="input-field">
            <!-- <label for="course_img">Course Images</label> -->
            <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png" class="form-control-file" id="course_img">
            <!-- name="course_img"         -->
        </div>
            </div>
            <label><input type="checkbox">I hereby declare that the above information is true and correct</label>
<div class="error">
    <?php if(isset($msg)){
        echo $msg;
    } ?>
</div>
            <button type="submit" name="submit" class="btn">Register</button>

        </form>
    </div>

    <script src="script1.js"></script>
</body>
</html>