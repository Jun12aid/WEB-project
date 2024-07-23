
<?php 
if(!isset($_SESSION)){
    session_start();
}
include("db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking-History</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="history.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<header>
        <!-- <div id="menu-bar" class="fas fa-bars"></div> -->
        <a href="#" class="logo"><span>SHAIKH </span>(Tours & Travels)</a>

        <nav class="navbar">
            <!-- <a href="tour.php">home</a> -->
            <!-- <a href="#book">book</a> -->
            <!-- <a href="#packages">packages</a> 
            <a href="#services">services</a>
            <a href="#gallery">gallery</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>-->
        </nav>
        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <?php 
            if(!isset($_SESSION['is_login'])){
                echo'
          <i class="fas fa-user" id="login-btn"></i>';
        }
    
        else{
echo'<a style="font-size: 2.5rem; color:white;" href="logout.php">LogOut</a>';
        }
        
        ?></div>

        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" palceholder="search here...">
            <label for="search-bar" class="fa fa-search"></label>
        </form>
    </header>
    <div class="container shadow-lg">
<div class="col-sm-9" style="margin-top:150px;">


<p class="bg- text-white p-2 " style="height:9vh;background-color:#ffa500; width:88vw;font-size:5vh">Booking History</p>



<table class="table table-hover" style="font-size:2vh; width:88vw; baground-color:red;">
<?php 
    //  echo $_SESSION['Email'];
    if($_SESSION['Email']=="admin@gmail.com"){
      $sql=" select * from bookings";
    }
    else{

  $Email=$_SESSION['Email'];
  echo $Email;
  $sql=" select * from bookings where Email='$Email'";

  } 
   $result=$conn->query($sql);
if($result->num_rows>0){


?>
  <thead >
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Place</th>
      <th scope="col">Date</th>
      <th scope="col">action</th>

    </tr>
  </thead>
  <tbody >

 <?php 
 
  $counter=1;
while($row=$result->fetch_assoc()){
  echo'
    <tr>
      
      <th scope="row">'.$counter.'</th>
      <td>'.$row['Full_name'].'</td>
      <td>'.$row['city'].'</td>
      <td>'.$row['arrivalDate'].'</td>
      <form method="POST" class="d-inline">
    
      <td><input type="hidden" name="id" value='.$row["id"].'>
       <button  type="submit" class="fa-solid fa-trash" style="color: #ffff00; cursor:pointer;" name="delete"  value="Delete"><i></i></button> 
</td>
       </form>

    </tr>';
    $counter++;
}?>
  </tbody>
  <?php

}?>
</table>

    </div>
</div>
  
<?php 
            if(isset($_REQUEST['delete'])){
                $sql = "DELETE FROM bookings WHERE id=".$_REQUEST['id'];
            
            if($conn->query($sql)==TRUE){
                // echo '<meta http-equi="refresh" content="0;URL=?deleted;"';
                header("Location: " . $_SERVER['PHP_SELF']);
exit;
            }
            }

            ?>

<script src="https://kit.fontawesome.com/c429b8ffa2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>