
<?php 
include("db_connection.php");

if(isset($_REQUEST['submit'])){

    // $email = $_REQUEST['email'];
    // $PreviousPass = $_REQUEST['PreviousPass'];
    // $newPassword = $_REQUEST['new_password'];
    // $confirmPassword = $_REQUEST['confirm_password'];

    // if ($newPassword == $confirmPassword) {
    //     // You should perform proper password hashing here for security
    //     $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    //     // Update the user's password in the database
    //     $query = "UPDATE register SET Password = '$hashedPassword' WHERE Email = '$email'";
        
    //     if (mysqli_query($connection, $query)) {
    //         // echo "Password updated successfully!";
    //     } else {
    //         echo "Error updating password: " . mysqli_error($connection);
    //     }
    // } else {
    //     echo "Passwords do not match. Please try again.";
    // }


    $email = $_REQUEST['email'];
    $currentPassword = $_REQUEST['current_password'];
    $newPassword = $_REQUEST['new_password'];
    $confirmPassword = $_REQUEST['confirm_password'];

    // Query the database to get the current password associated with the provided email
    $query = "SELECT Password FROM register WHERE Email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $currentDBPassword = $row['Password'];
echo $currentDBPassword;
echo $currentPassword;
            if ($currentPassword == $currentDBPassword) {
                if ($newPassword === $confirmPassword) {
                    // You should perform proper password hashing here for security
                    // $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    // Update the user's password in the database
                    $updateQuery = "UPDATE register SET Password = '$newPassword' WHERE Email = '$email'";
                    if (mysqli_query($conn, $updateQuery)) {
                        // echo "Password updated successfully!";
                    } else {
                        // echo "Error updating password: " . mysqli_error($conn);
                    }
                } else {
                    // echo "New password and confirmation password do not match. Please try again.";
                }
            } 
            else {
                // echo "Current password is incorrect.";
            }
        } else {
            // echo "Email not found in the database.";
        }
    } else {
        // echo "Error querying the database: " . mysqli_error($conn);
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
   
    <div class="container">
        <h1 class="heading">
            <span>F</span>
            <span>O</span>
            <span>R</span>
            <span>G</span>
            <!-- <span class="space"></span> -->
            <span>O</span>
            <span>T</span>
            <span>P</span>
            <span>A</span>
            <span>S</span>
            <span>S</span>
            <span>W</span>
            <span>O</span>
            <span>R</span>
            <span>D</span>
        </h1>
    </div>

    <div class="wrapper">
        <form action="">
            <div class="input-box">
                <div class="input-field">
                    <input type="email" name="email" placeholder="Enter Your Email" required>
                    <i class='bx bx-lock-open-alt' style='color:#1b1919' ></i>
                    <!-- <i class="fa-solid fa-user" style='color:#1b1919'></i> -->
                </div>
                <div class="input-field">
                    <input type="password" name="current_password" placeholder="Enter current_password" required>
                    <i class='bx bx-lock-open-alt' style='color:#1b1919' ></i>
                    <!-- <i class="fa-solid fa-user" style='color:#1b1919'></i> -->
                </div>
                <div class="input-field">
                    <input type="password" name="new_password" placeholder="Password" required>
                    <i class='bx bx-lock-open-alt' style='color:#1b1919' ></i>
                </div>
                <div class="input-field">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <i class='bx bx-lock-open-alt' style='color:#0c0c0c' ></i>
                </div>
            </div>
            <!-- <label><input type="checkbox">I hereby declare that the above information is true and correct</label> -->

            <button type="submit" name="submit" class="btn">Generate Password</button>

        </form>
    </div>

    <script src="script1.js"></script>
</body>
</html>