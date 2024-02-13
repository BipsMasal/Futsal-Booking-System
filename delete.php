<?php
// Include the database connection file
include 'C:\xampp\htdocs\php\connect.php';

// Check if the 'id' parameter is set in the POST request
if(isset($_POST['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = $_POST['id'];

    // Prepare the SQL statement
    $sql = "DELETE FROM bookings WHERE id = ?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("s", $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo 'Booking deleted successfully.';
    } else {
        echo 'Error deleting booking: ' . $conn->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle case where 'id' parameter is not set
    echo 'ID parameter is not set.';
}

// Close the database connection
$conn->close();
?>
