<?php 
 session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Futsal Booking Management</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php 

    if (!isset($_SESSION['username'])) {
        // Redirect to the login page if not logged in
        header("location: \php\login.php");
            exit();
        }
        ?>
<?php include 'header.php'?>
<?php include 'C:\xampp\htdocs\php\connect.php'; 
   
   
    
   $sql = "SELECT * FROM bookings ORDER BY date DESC, etime DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Phone Number</th><th>Ground Type</th><th>Price</th><th>Status</th><th>Action</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["date"]. "</td><td>" . $row["stime"]. "</td><td>" . $row["etime"]. "</td><td>" . $row["PhoneNujmber"]. "</td><td>" . $row["futsal_type"]. "</td><td>" . $row["price"]. "</td><td id='bookingStatus" . $row["id"] . "'>Unpaid</td><td><button onclick='togglePaidStatus(" . $row["id"] . ")'>Paid</button>


            
            <form action='bookprocess.php' method='post'>
                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                    <input type='hidden' name='name' value='" . $row["name"] . "'>
                    <input type='hidden' name='email' value='" . $row["email"] . "'>
                    <input type='hidden' name='date' value='" . $row["date"] . "'>
                    <input type='hidden' name='stime' value='" . $row["stime"] . "'>
                    <input type='hidden' name='etime' value='" . $row["etime"] . "'>
                    <input type='hidden' name='phone' value='" . $row["PhoneNujmber"] . "'>
                    <input type='hidden' name='ground_type' value='" . $row["futsal_type"] . "'>
                    <input type='hidden' name='price' value='" . $row["price"] . "'>
                    
                    <input type='submit' name='submit' value='Delete'>
                    <input type='submit' name='submit' value='Done'>
                </form>
            </td>";

        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    
    $conn->close();
    ?>
    
    <button onclick="window.location.href = 'addbooking.php';">Add Booking</button><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




    

    <?php include 'footer.php'?>

    <script>
        function togglePaidStatus(bookingId) {
            // Get the current status
            const currentStatus = document.getElementById("bookingStatus" + bookingId).textContent;
            
            // Toggle the status
            const newStatus = currentStatus === "Paid" ? "Unpaid" : "Paid";

            // Add logic to update the booking status in your backend system
            console.log(`Toggling Booking ID ${bookingId} from ${currentStatus} to ${newStatus}`);

            // Update the status in the table
            document.getElementById("bookingStatus" + bookingId).textContent = newStatus;
        }
    </script>
</body>
</html>
