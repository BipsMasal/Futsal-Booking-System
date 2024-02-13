<?php
    include 'C:\xampp\htdocs\php\connect.php';
    
    // Check if the ID is set in the URL


        // Delete the service from the database
        $sql = "DELETE FROM bookings WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo 'Service deleted successfully.';
        } else {
            echo "<script>alert('Deleted Succesfull.')
                window.location.href = 'booking.php'
               </script>";
        }
   

    $conn->close();
?>