<?php
    include 'connect.php';

    // Check if the ID is set in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Delete the service from the database
        $sql = "DELETE FROM bookings WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Deleted Succesfull.')
                window.location.href = 'mybooking.php'
               </script>";
        } else {
            echo "<script>alert('Error delecting.')
                window.location.href = 'mybooking.php'
               </script>";
        }
    } else {
        echo "<script>alert('Error.')
                window.location.href = 'mybooking.php'
               </script>";
    }

    $conn->close();
?>