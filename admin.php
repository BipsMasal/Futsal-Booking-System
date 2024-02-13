<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking Admin Panel</title>
    <link rel="stylesheet" href="admin.css">
    <style>
   
    </style>
</head>
<body>
<?php 
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("location: \php\login.php");
    exit();
}
?>

<?php include 'header.php'; ?>

<main>
    <h1 style="color: white; text-align: center;">Welcome to the Admin Panel</h1>
    <p style="color: white; text-align: center;"><small>(Working Towards Success.)</small></p>

  
</main>

<?php include 'footer.php'?>


</body>
</html>
