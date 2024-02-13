<?php

    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STAR FUTSAL</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        
    
    </style>
</head>
<body>

    <?php include 'header.php'; ?>
    <div class="slideshow-container">
        <div class="mySlides">
            <div class="slider-item"><img class="w-100" src="img\academy.jpg" alt="Image 1"></div>
            <div class="text"><p class="ex2"><b>STAR FUTSAL</p><small>(Working Toward Success.)</small>
            <button><a href="booking.php">Book Now</a></button>
        </div>
        </div>

        <div class="mySlides">
        <div class="slider-item"><img src="img\pic.jpg" alt="Image 2"></div>
            <div class="text"><p class="ex2">BEST OF THE BEST GROUNDS</p><br><button><a href="booking.php">Book Now</a></button></div>
        </div>
        <div class="mySlides">
        <div class="slider-item"><img src="img\academy.jpg" alt="Image 3"></div>
            <div class="text"><p class="ex2">PLAY AND ENJOY</p><br><button><a href="booking.php">Book Now</a></button></div>
        </div>
        

        <!-- Add more slides as needed -->

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br><br>
    <h4>About STAR FUTSAL</h4>
    
    <div class="custom-container">
        <div class="image-container1">
            <img class="imgg" src="img\image.jpg" alt="Image 1">
            <!-- <img class="imgg" src="groundf.jpg" alt="Image 2"> -->
        </div>
        
        <div class="title-container">
        
        <h1 style="text-align: left;">STAR FUTSAL-PLAY MORE</h1>
        <p class="paragraph">Star Futsal the home of the underdogs team.<br>Aims to be the top organization in the area.<br><br>Book Now fast to be the best</p>

            <button><a href="booking.php">Book Now</a></button>
        </div>
    </div>
    <br><br>
    <h4>STAR FUTSAL GROUNDS</h4>
        <h1>Ground Sizes</h1>
        
    <div class="container">
    <div class="column">
        <div class="image-container">
            <img class="image" src="img\academy.jpg" alt="Image 1" width="200">
        </div>
        <p style="color: black;"><b>A-Grade Ground.</b><br><br><b>Price: Rs.1800</b></p>
        <button><a href="booking.php">Book Now</a></button>
    </div>
    <div class="column">
        <div class="image-container">
            <img class="image" src="img\pic.jpg" alt="Image 2" width="200">
        </div>
        <p style="color: black;"><b>B-Grade Ground.</b><br><br><b>Price: Rs.1200</b></p>
        <button><a href="booking.php">Book Now</a></button>
  </div>
    </div>
    <br><br>
    <h4>PHOTOS</h4>
        <h1>Social Media</h1>
    <div class="photo-gallery">
        <div class="photo">
            <img src="img\groundf.jpg" alt="Photo 1">
        </div>
        <div class="photo">
            <img src="img\academy.jpg" alt="Photo 2">
        </div>
        <div class="photo">
            <img src="img\gg.jpg" alt="Photo 3">
        </div>
        <div class="photo">
            <img src="img\pic.jpg" alt="Photo 4">
        </div>
        <div class="photo">
            <img src="img\ground.jpg" alt="Photo 5">
        </div>
</div>

  

    <script src="script.js"></script>

    <?php include 'footer.php'; ?>

</body>
</html>
