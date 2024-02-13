<?php
include 'C:\xampp\htdocs\php\connect.php';
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$stime = $_POST['stime'];
$etime = $_POST['etime'];
$phone = $_POST['num'];
$futsalType = $_POST['futsalType'];
switch ($futsalType) {
    case "B-Grade":
        $price = 1200.00;
        break;
    case "A-Grade":
        $price = 1800.00;
        break;
    // Add more cases for other futsal types
    default:
        $price = 0.00;
}
// Check for existing bookings at the same date and time
$checkQuery = "SELECT * FROM bookings WHERE date = '$date' AND futsal_type = '$futsalType' AND ((stime <= '$stime' AND etime > '$stime') OR (stime < '$etime' AND etime >= '$etime'))";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) {
    echo "<script>alert('Time alredy booked try Again')
    window.location.href = 'booking.php'
    </script>";
}else{
// Insert data into the database
$sql = "INSERT INTO bookings (name, email, date, stime, etime,PhoneNujmber, futsal_type, price) VALUES ('$name', '$email', '$date', '$stime', '$etime','$phone','$futsalType', $price)";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Booking Successful')
    window.location.href = 'booking.php'
    </script>";
} else {
    echo "<script>alert('time alredy booked try Again')
    window.location.href = 'booking.php'
    </script>";
    // echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>