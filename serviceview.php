<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        img {
            max-width: 30%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 15px;
        }
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

<?php
    include 'header.php';
   

     include 'C:\xampp\htdocs\php\connect.php'; 

    $sql = "SELECT * FROM services";
    $result = $conn->query($sql);
   
    echo '<table border="1">';
    echo '<tr><th>Image</th><th>Title</th><th>Description</th><th>Action</th></tr>';

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td><img src="' . $row['image'] . '" alt="' . $row['title'] . '"></td>';
        echo '<td><b>' . $row['title'] . '</b></td>';
        echo '<td>' . $row['description'] . '</td>';
        echo '<td>';
        echo '<a href="edit.php?id=' . $row['id'] . '">Edit</a>';
        echo ' | ';
        echo '<a href="delete.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this record?\')">Delete</a>';
        echo '</td>';
        echo '</tr>';
        }
    } else {
    echo '<tr><td colspan="4">0 results</td></tr>';
    }

    echo '</table>';
   
?>
    <button onclick="window.location.href = 'addservice.php';">Add Services</button><br><br><br><br><br><br><br><br>

 <?php include 'footer.php'; ?>
</body>
</html>

