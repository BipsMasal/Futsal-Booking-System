
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
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
// handle_booking_action.php
include 'C:\xampp\htdocs\php\connect.php';?>
        
<?php



// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check which action is submitted (Pay or Done)
    if (isset($_POST['submit'])) {
        // Check the value of the submit button
        if ($_POST['submit'] === 'Delete') {
            $id = $_POST["id"];
        
                // Delete the service from the database
                $sql = "DELETE FROM bookings WHERE id = $id";
        
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Deleted Succesfull.')
                    window.location.href = 'booking.php'
                   </script>";
                } else {
                    echo "<script>alert('Error Delecting booking.')
                        window.location.href = 'booking.php'
                       </script>";
                }
            $conn->close();
        } elseif ($_POST['submit'] === 'Done') {
            // Handle Done action
            // Perform database operations to mark the booking as done
            // For example:
            $booking_id = $_POST['id'];
            // Perform database operations to mark the booking as done
            // For example, update the status of the booking in the database

            // Display the submitted data in a table layout
            // echo "<h2>Booking Details:</h2>";
            // echo "<table border='1'>";
            // echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Phone Number</th><th>Ground Type</th><th>Price</th></tr>";
            // echo "<tr><td>" . $_POST["id"] . "</td><td>" . $_POST["name"] . "</td><td>" . $_POST["email"] . "</td><td>" . $_POST["date"] . "</td><td>" . $_POST["stime"] . "</td><td>" . $_POST["etime"] . "</td><td>" . $_POST["phone"] . "</td><td>" . $_POST["ground_type"] . "</td><td>" . $_POST["price"] . "</td></tr>";
            // echo "</table>";

            $id = $_POST["id"];
            $name = $_POST["name"];
            $email = $_POST["email"];
            $date = $_POST["date"];
            $start_time = $_POST["stime"];
            $end_time = $_POST["etime"];
            $phone = $_POST["phone"];
            $ground_type = $_POST["ground_type"];
            $price = $_POST["price"];

            $insert_sql = "INSERT INTO payment_table (id, name, email, date, start_time, end_time, phone, ground_type, price) VALUES ('$id', '$name', '$email', '$date', '$start_time', '$end_time', '$phone', '$ground_type', '$price')";
            // $conn->query($insert_sql);
            if ($conn->query($insert_sql) === TRUE) {
                echo "<script>alert('Insert Succesfull.')
                window.location.href = 'booking.php'
               </script>";
            } else {
                echo "<script>alert('Error Inserting booking.')
                    window.location.href = 'booking.php'
                   </script>";
            }
            

            $conn->query("DELETE FROM bookings WHERE id = ' $booking_id '");
        }
    }
}
//         $sql = "SELECT * FROM payment_table";
//         $result = $conn->query($sql);

//         if ($result->num_rows > 0) {
//         // Display the table header
//         // echo "<h2>Payment Table</h2>";
//         echo "<table border='1'>";
//         echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Phone Number</th><th>Ground Type</th><th>Price</th><th>Status</th></tr>";

//         // Output data of each row
//         while($row = $result->fetch_assoc()) {
//              echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["date"]. "</td><td>" . $row["start_time"]. "</td><td>" . $row["end_time"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["ground_type"]. "</td><td>" . $row["price"]. "</td><td>Paid</td></tr>";
//          }
//         echo "</table>";
// } else {
//      echo "0 results";
//     }



?>

</body>
</html>
