<?php
//  session_start();

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <?php

    // if (!isset($_SESSION['username'])) {
    // // Redirect to the login page if not logged in
    // header("location: \php\login.php");
    //     exit();
    // }
?>
    <header>
        <a href="admin.php"><img class="logo"src="\php\img\logo.png" alt="Logo"></a>
        <h1>Star Futsal Admin Panel</h1>
    </header>

    <nav>
        <a href="admin.php">Home</a>
        <a href="booking.php">Booking Management</a>
        <a href="serviceview.php">Service View</a>
        <!-- <a href="addservice.php">Add New Service</a> -->
        <a href="payments.php">Payment Management</a>
        <?php
        if(isset($_SESSION['loggedin'])){
         echo"<a href='logout.php' class='logout'>Logout<small> (" .$_SESSION['username'].") </small></a>";
        }
        ?>
    </nav>
    </body>
    </html>


