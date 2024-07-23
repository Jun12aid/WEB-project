

<?php
if(!isset($_SESSION)){
    session_start();
}

include("db_connection.php"); 
    if(isset($_REQUEST['Email']) && isset($_REQUEST['Password']) && isset($_REQUEST['Login']) ){
    // echo"hrllo";
    $Email=$_REQUEST['Email'];
    $Password=$_REQUEST['Password'];
    
    
    $sql="select Email,Password from register where
    Email='".$Email."' AND Password ='".$Password."'";
    
    $result=$conn->query($sql);
    $row=$result->num_rows;
    if($row == 1){
        $_SESSION['Email']=$Email;
        $_SESSION['is_login']=true;
    }
    else if ($row===0){
    }
    
    }
    
    if (isset($_REQUEST["feedback"])) {
    
        $name = $_REQUEST["Name"];
        $email = $_REQUEST["Email"];
        $number = $_REQUEST["Number"];
        $subject = $_REQUEST["Subject"];
        $message = $_REQUEST["Message"];
    
        // Insert the form data into the database
        $sql = "INSERT INTO feedback (Name, Email, Number, Subject, Message) VALUES ('$name', '$email', '$number', '$subject', '$message')";

        if ($conn->query($sql) === TRUE) {
            // echo "Registration successful!";
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
    <title>TOURS AND TRAVEL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 
</head>

<body>
    <header>
        <div id="menu-bar" class="fas fa-bars"></div>
        <a href="#" class="logo"><span>SHAIKH </span>(Tours & Travels)</a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#book">book</a>
            <?php 
              if(isset($_SESSION['is_login'])){
                echo '
                <a href="history.php">History</a>     
                    ' ;
              }
            ?>
            <a href="#packages">packages</a>
            <a href="#services">services</a>
            <a href="#gallery">gallery</a>
            <a href="#review">review</a>
            <a href="#contact">contact</a>
            <?php
            if(isset($_SESSION['Email'])){
            if($_SESSION['Email']=="admin@gmail.com"){
                // echo $_SESSION['Email'];
                echo '<a href="Feedbacks.php">Feedbacks</a>';
            }}
             ?>
        </nav>
            
            
        
        </nav>
        <div class="icons">
            <i class="fas fa-search" id="search-btn"></i>
            <?php 
            if(!isset($_SESSION['is_login'])){
               
                    echo '<i class="fas fa-user" id="login-btn"></i>';
                   }
                

        
    
        else{
            $email = $_SESSION['Email'];
            $sql = "SELECT * FROM register WHERE Email = '{$email}'";
            $result = $conn->query($sql);
            
            while ($row = $result->fetch_assoc()) {
                echo'  <a style="font-size: 2.5rem;  color: white; font-style: italic;"  href="logout.php">Logout</a>';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['Photo']) . '" class="rounded-circle" alt="User Photo" style="height:30px;">';
// echo'<a style="font-size: 2.5rem; color:white;" href="logout.php">Log</a>';
        }
    }
        ?></div>

        <form action="" class="search-bar-container">
            <input type="search" id="search-bar" palceholder="search here...">
            <label for="search-bar" class="fa fa-search"></label>
        </form>
    </header>

    <div class="login-form-container">

        <!-- <i class="fa-solid fa-xmark" id="form-close" style="color: #ffff;">Close</i> -->
        <!-- <i class="fa-solid fa-xmark" id="form-close">HELLO</i> -->
        <p  id="form-close" style="color: #ffff; font-size: 3rem;" >Close</p>
        <form active="">
            <h3>login</h3>
            <input type="email" name="Email" class="box" placeholder="Enter your Email">
            <input type="password" name="Password" class="box" placeholder="Enter your Password">
            <input type="submit" name="Login" value="login now" class="btn">
            <input type="checkbox" id="remember">
            <label for="remember">remember me</label>
            <p>forget password? <a href="pass.php">Click here</a></p>
            <p>don't have and account? <a href="register.php">register</a></p>
        </form>

    </div>


    <section class="home" id="home">
        <div class="content">
            <h3>adventure is worthwhile</h3>
            <p>discover new places with us,advneture awaits</p>
            <a href="https://www.cntraveller.in/gallery/28-adventures-to-travel-for-from-glacier-chasing-in-greenland-to-sand-surfing-in-the-sahara/" class="btn">discover more</a>
        </div>

        <div class="controls">
            <span class="vid-btn active" data-src="vid1.mp4"></span>
            <span class="vid-btn" data-src="vid2.mp4"></span>
            <span class="vid-btn" data-src="vid3.mp4"></span>
            <span class="vid-btn" data-src="vid4.mp4"></span>
        </div>

        <div class="video-container">
            <video src="vid1.mp4" id="video-slider" loop autoplay muted></video>
        </div>
    </section>

    <section class="book" id="book">
        <h1 class="heading">
            <span>b</span>
            <span>o</span>
            <span>o</span>
            <span>k</span>
            <span class="space"></span>
            <span>n</span>
            <span>o</span>
            <span>w</span>
        </h1>
        <div class="row">

            <div class="image">
                <img src="imgT1.jpg" alt="">
            </div>
            <form action="book.php" method="post">
                <div class="inputBox">
                    <h3>Where to</h3>
                    <input type="text" name="place" value="" placeholder="place name">
                </div>
                <div class="inputBox">
                    <h3>How many</h3>
                    <input type="number" name="numberOfGuest" placeholder="number of guest">
                </div>
                <div class="inputBox">
                    <h3>Arrivals</h3>
                    <input date="Date" name="Date" type="date">
                </div> 
                <div class="inputBox">
                    <h3>Leaving</h3>
                    <input type="date" name="date">
                </div>
                <div class="inputBox">
                    <h3>Payment</h3>
                    <input type="number" name="Amount" placeholder="Amount">
                </div>

                <!-- <a href="book.php" class="btn">Book Now</a> -->
                <input type="submit" name="BOOK" class="btn" value="Book Now">
            </form>
        </div>
    </section>

    <section class="packages" id="packages">
        <h1 class="heading">
            <span>p</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <!-- <span class="space"></span> -->
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>
        <div class="box-container">
            <div class="box">
                <img src="imgT2.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i>MUMBAI</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Conseqrum tempora iste sequi, impedit
                        facilis dolore fuga consectetur magn</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">$90.00<span>$120.00</span></div>
                    <form action="payment.php" method="post">
        <input type="text" name="string_value" value="Mumbai" hidden>
        <input type="submit" name="BOOK" class="btn" value="Book Now">
                        </form>
                    <!-- <input type="hidden" name="hidden_value" value="Mumbai"> -->
                    <!-- <a href="payment.php" class="btn">Book now</a> -->

                </div>
            </div>

            <div class="box">
                <img src="imgT3.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i>KASHMIR</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Conseqrum tempora iste sequi, impedit
                        facilis dolore fuga consectetur magn</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">$90.00<span>$120.00</span></div>
                    <form action="payment.php" method="post">
        <input type="text" name="string_value" value="Kashmir" hidden>
        <input type="submit" name="BOOK" class="btn" value="Book Now">
                        </form>
                </div>
            </div>

            <div class="box">
                <img src="imgT4.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i>DUBAI</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Conseqrum tempora iste sequi, impedit
                        facilis dolore fuga consectetur magn</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">$90.00<span>$120.00</span></div>
                    <form action="payment.php" method="post">
        <input type="text" name="string_value" value="Dubai" hidden>
        <input type="submit" name="BOOK" class="btn" value="Book Now">
                        </form>
                </div>
            </div>

            <div class="box">
                <img src="imgT5.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i>SWITZERLAND</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Conseqrum tempora iste sequi, impedit
                        facilis dolore fuga consectetur magn</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">$90.00<span>$120.00</span></div>
                    <form action="payment.php" method="post">
        <input type="text" name="string_value" value="SWITZERLAND" hidden>
        <input type="submit" name="BOOK" class="btn" value="Book Now">
                        </form>
                </div>
            </div>

            <div class="box">
                <img src="imgT6.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i>AURORA</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Conseqrum tempora iste sequi, impedit
                        facilis dolore fuga consectetur magn</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">$90.00<span>$120.00</span></div>
                    <form action="payment.php" method="post">
        <input type="text" name="string_value" value="AURORA" hidden>
        <input type="submit" name="BOOK" class="btn" value="Book Now">
                        </form>
                </div>
            </div>

            <div class="box">
                <img src="imgT7.jpg" alt="">
                <div class="content">
                    <h3> <i class="fas fa-map-marker-alt"></i>NEW YORK</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Conseqrum tempora iste sequi, impedit
                        facilis dolore fuga consectetur magn</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">$90.00<span>$120.00</span></div>
                    <form action="payment.php" method="post">
        <input type="text" name="string_value" value="New YorkF" hidden>
        <input type="submit" name="BOOK" class="btn" value="Book Now">
                        </form>
                </div>
            </div>
        </div>
    </section>


    <section class="service" id="service">
        <h1 class="heading">
            <span>s</span>
            <span>e</span>
            <span>r</span>
            <span>v</span>
            <!-- <span class="space"></span> -->
            <span>i</span>
            <span>c</span>
            <span>e</span>
            <span>s </span>
        </h1>

        <div class="box-container">
            <div class="box">
                <i class="fas fa-hotel"></i>
                <h3>Affordable Hotels</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos reiciendis, impedit odio molestiae
                    debitis quam praesentium eos, iusto quas enim nulla nihil voluptas!</p>
            </div>
            <div class="box">
                <i class="fas fa-utensils"></i>
                <h3>Food & Drinks</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos reiciendis, impedit odio molestiae
                    debitis quam praesentium eos, iusto quas enim nulla nihil voluptas!</p>
            </div>
            <div class="box">
                <i class="fas fa-bullhorn"></i>
                <h3>Safty Guide</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos reiciendis, impedit odio molestiae
                    debitis quam praesentium eos, iusto quas enim nulla nihil voluptas!</p>
            </div>
            <div class="box">
                <i class="fas fa-globe-asia"></i>
                <h3>Around the world</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos reiciendis, impedit odio molestiae
                    debitis quam praesentium eos, iusto quas enim nulla nihil voluptas!</p>
            </div>
            <div class="box">
                <i class="fas fa-plane"></i>
                <h3>Fastest travel</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos reiciendis, impedit odio molestiae
                    debitis quam praesentium eos, iusto quas enim nulla nihil voluptas!</p>
            </div>
            <div class="box">
                <i class="fas fa-hiking"></i>
                <h3>Adventures</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos reiciendis, impedit odio molestiae
                    debitis quam praesentium eos, iusto quas enim nulla nihil voluptas!</p>
            </div>
        </div>
    </section>



    <section class="gallery" id="gallery">

        <h1 class="heading">
            <span>g</span>
            <span>a</span>
            <span>l</span>
            <span>l</span>
            <!-- <span class="space"></span> -->
            <span>e</span>
            <span>r</span>
            <span>y</span>
        </h1>

        <div class="box-container">
            <div class="box">
                <img src="Aimg1.jpg" alt="">
                <div class="content">
                    <h3>Amazing Places</h3>
                    <p>The Amazon River Basin is home to the largest rainforest on Earth. The basin -- roughly the size of the forty-eight contiguous United States -- covers some 40 percent of the South American continent and includes parts of eight South American countries: Brazil, Bolivia, Peru, Ecuador, Colombia, Venezuela, Guyana, and Suriname, as well as French Guiana, a department of France.</p>
                    <a href="https://rainforests.mongabay.com/amazon/" class="btn">See More</a>
                </div>
            </div>
            <div class="box">
                <img src="Aimg2.jpg" alt="">
                <div class="content">
                    <h3>Amazing Places</h3>
                    <p>Navagio Beach is nicknamed “Shipwreck Beach” for the rusted ship named Panagiotis that crashed on its shore, which was thought to be smuggling cigarettes. The iconic image of a ship run ashore quickly drew tourists to the stunning coastline.</p>
                    <a href="https://en.wikipedia.org/wiki/Navagio_Beach" class="btn">See More</a>
                </div>
            </div>
            <div class="box">
                <img src="Aimg3.jpg" alt="">
                <div class="content">
                    <h3>Amazing Places</h3>
                    <p>World's End is a neighbourhood located in Burgess Hill, West Sussex. It is thought that the name arrived with the railway – it was here that the 'up' line met the 'down' line during construction of the Brighton Main Line in what is now the World's End area</p>
                    <a href="https://www.devdiscourse.com/article/other/604260-fact-check-truth-about-the-earths-end-picture-of-sussex-england" class="btn">See More</a>
                </div>
            </div>
            <div class="box">
                <img src="Aimg4.jpg" alt="">
                <div class="content">
                    <h3>Amazing Places</h3>
                    <p>Faroe Islands, also spelled Faeroe Islands, Faroese Føroyar, Danish Færøerne, group of islands in the North Atlantic Ocean between Iceland and the Shetland Islands. They form a self-governing overseas administrative division of the kingdom of Denmark. There are 17 inhabited islands and many islets and reefs. The main islands are Streymoy (Streym), Eysturoy (Eystur), Vágar, Suduroy (Sudur)</p>
                    <a href="https://www.britannica.com/place/Faroe-Islands-Atlantic-Ocean" class="btn">See More</a>
                </div>
            </div>
            <div class="box">
                <img src="Aimg5.jpg" alt="">
                <div class="content">
                    <h3>Amazing Places</h3>
                    <p>Saint Lucia is an Eastern Caribbean island nation with a pair of dramatically tapered mountains, the Pitons, on its west coast. Its coast is home to volcanic beaches, reef-diving sites, luxury resorts and fishing villages. Trails in the interior rainforest lead to waterfalls like the 15m-high Toraille, which pours over a cliff into a garden. The capital, Castries, is a popular cruise port.</p>
                    <a href="https://en.wikipedia.org/wiki/Saint_Lucia" class="btn">See More</a>
                </div>
            </div>
            <div class="box">
                <img src="Aimg6.jpg" alt="">
                <div class="content">
                    <h3>Amazing Places</h3>
                    <p>Pamukkale is a town in western Turkey known for the mineral-rich thermal waters flowing down white travertine terraces on a nearby hillside. It neighbors Hierapolis, an ancient Roman spa city founded around 190 B.C. Ruins there include a well-preserved theater and a necropolis with sarcophagi that stretch for 2km.</p>
                    <a href="https://en.wikipedia.org/wiki/Pamukkale" class="btn">See More</a>
                </div>
            </div>
            <div class="box">
                <img src="Aimg7.jpg" alt="">
                <div class="content">
                    <h3>Amazing Places</h3>
                    <p>The Matterhorn is a mountain of the Alps, straddling the main watershed and border between Italy and Switzerland. It is a large, near-symmetric pyramidal peak in the extended Monte Rosa area of the Pennine Alps, whose summit is 4,478 metres high, making it one of the highest summits in the Alps and Europe.</p>
                    <a href="https://en.wikipedia.org/wiki/Matterhorn" class="btn">See More</a>
                </div>
            </div>
            <div class="box">
                <img src="Aimg8.jpg" alt="">
                <div class="content">
                    <h3>Amazing Places</h3>
                    <p>The 4th largest waterfall lying on an international border, the Ban Gioc – Detian Falls has a home both in Vietnam and China. Although it mostly appears as two waterfalls but during the rainy season, it becomes one. Its thundering sound hitting the rocks can be heard from far and wide and is one of the best places to visit in Vietnam.

                        Address: TL 211, Đàm Thuỷ, Trùng Khánh, Cao Bằng, Vietnam
                        Height: 60 m</p>
                    <a href="https://en.wikipedia.org/wiki/Ban_Gioc%E2%80%93Detian_Falls" class="btn">See More</a>
                </div>
            </div>
        </div>
    </section>

    <section class="review" id="review">

        <h1 class="heading">
            <span>r</span>
            <span>e</span>
            <span>v</span>
            <span>i</span>
            <!-- <span class="space"></span> -->
            <span>e</span>
            <span>w</span>
        </h1>

        <div class="swiper mySwiper review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slid">
                    <div class="box">
                        <img src="Rimg1.jpg" alt="">
                        <h3>ROBERT DOWNEY JR.</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae inventore pariatur veritatis dolore! Veritatis harum quo illo, soluta laboriosam necessitatibus facere! Distinctio doloremque ex tenetur impedit aperiam totam unde quod.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slid">
                    <div class="box">
                        <img src="Rimg2.jpg" alt="">
                        <h3>WAHAJ ALI</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae inventore pariatur veritatis dolore! Veritatis harum quo illo, soluta laboriosam necessitatibus facere! Distinctio doloremque ex tenetur impedit aperiam totam unde quod.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slid">
                    <div class="box">
                        <img src="Rimg3.jpg" alt="">
                        <h3>ARNOLD SCHWARZENEGGER</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae inventore pariatur veritatis dolore! Veritatis harum quo illo, soluta laboriosam necessitatibus facere! Distinctio doloremque ex tenetur impedit aperiam totam unde quod.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

                <div class="swiper-slid">
                    <div class="box">
                        <img src="Rimg4.jpg" alt="">
                        <h3>MR NOBODY</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae inventore pariatur veritatis dolore! Veritatis harum quo illo, soluta laboriosam necessitatibus facere! Distinctio doloremque ex tenetur impedit aperiam totam unde quod.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </section>

<section class="contact">

    <h1 class="heading">
        <span>c</span>
        <span>o</span>
        <span>n</span>
        <span>t</span>
        <!-- <span class="space"></span> -->
        <span>a</span>
        <span>c</span>
        <span>t</span>
    </h1>
<div class="row">
    <div class="image">
        <img src="img_1.jpg" alt="">
    </div>

    <form action="Tour.php" method="post">
        <div class="inputBox">
            <input type="text" name="Name" placeholder="name">
            <input type="email" name="Email" placeholder="email">
        </div>
        <div class="inputBox">
            <input type="number" name="Number" placeholder="number">
            <input type="text" name="Subject" placeholder="subject">
        </div>
        <textarea placeholder="message" name="Message" name="" id="" cols="30" rows="10"></textarea>
        <input type="submit" name="feedback" class="btn" value="Send Messange">
    </form>
</div>
</section>    

<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>About Us</h3>
            <p>Welcome to our world of wanderlust! We're your go-to destination for unforgettable travel experiences. With a passion for exploration and a commitment to providing top-notch service, we're dedicated to crafting your dream vacation. Discover new horizons with us, where every journey is an adventure waiting to happen. Let's embark on an incredible voyage together. Your adventure begins here.</p>
        </div>
        <div class="box">
            <h3>Branch Location</h3>
            <a href="#">Mumbai</a>
            <a href="#">Pune</a>
            <a href="#">Delhi</a>
            <a href="#">Dubai</a>
        </div>
        <div class="box">
            <h3>Quick Links</h3>
            <a href="#">Home</a>
            <a href="#">Book</a>
            <a href="#">Packages</a>
            <a href="#">Services</a>
            <a href="#">Gallery</a>
            <a href="#">Review</a>
            <a href="#">Contact</a>
        </div>
        <div class="box">
            <h3>Quick Links</h3>
            <a href="https://www.facebook.com/">Facebook</a>
            <a href="https://www.instagram.com/">Instagram</a>
            <a href="https://twitter.com/i/flow/login">Twitter</a>
            <a href="https://www.linkedin.com/feed/">Linkedin</a>
        </div>
    </div>
</section>
<div class="header-text">
    <!-- <div class="text">Created By<span class="typing"></span></div> -->
    <h2>Created By <span class="typing"></span> SHAIKH</h2>
</div>
<script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
<script>
var typed = new Typed(".typing", {
    strings: ["JUNAID","ZAID"],
    typeSpeed: 100,
    backSpeed: 50,
    loop: true
})
</script>




<script src="https://kit.fontawesome.com/c429b8ffa2.js" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
    

</body>

</html>