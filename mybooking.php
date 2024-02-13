<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <style>

    

    </style>
</head>
<body>
    <?php include 'header.php' ;?>

<?php
include 'connect.php';
// session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['username'];

$sql = "SELECT * FROM bookings WHERE name = '$user_id'";
$result = $conn->query($sql);
echo "<br><br><h1>Your Booking</h1>";
if ($result->num_rows > 0) {
    
    echo "<table><tr><th>Name</th><th>Email</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Phone Number</th><th>Ground Type</th><th>Price</th><th>Action</th></tr>";
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["date"] . "</td><td>" . $row["stime"] . "</td><td>" . $row["etime"] . "</td><td>" . $row["PhoneNujmber"] . "</td><td>" . $row["futsal_type"] . "</td><td>" . $row["price"] . "</td><td>
            <button onclick='deleteBooking(" . $row["id"] . ")'>Cancel</button>
        </td></tr>";
    }
    echo "</table>";
} else {
    echo "0 bookings";
}
echo "<h2><b>Previous Bookings</b></h2>";
$sql = "SELECT * FROM payment_table WHERE name = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// Display the table header

echo "<table border='1'>";
echo "<tr><th>Name</th><th>Email</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Phone Number</th><th>Ground Type</th><th>Price</th><th>Status</th></tr>";

// Output data of each row
while($row = $result->fetch_assoc()) {
     echo "<tr><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["date"]. "</td><td>" . $row["start_time"]. "</td><td>" . $row["end_time"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["ground_type"]. "</td><td>" . $row["price"]. "</td><td>Paid</td></tr>";
 }
echo "</table><br><br><br><br><br>";
} else {
echo "0 previous bookings<br><br><br><br><br><br><br><br><br>";
}

$conn->close();
?>
<script>
    function deleteBooking(id) {
        
        window.location.href = 'deletebooking.php?id=' + id;
    }
    </script>
 <?php include 'footer.php' ;?>
 
</body>
</html>
