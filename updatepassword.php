<?php
// Connect to the database
include 'connect.php';

// Get form data
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

// Check if new password matches confirm password
if ($newPassword !== $confirmPassword) {
    http_response_code(400); // Bad Request
    echo "Passwords do not match.";
    exit();
}

// Validate current password and get user ID (you need to implement your own validation logic here)
// For example, you can query the database to verify the current password and get the user ID
// $userId = ...; // Get the user ID

// Here is an example of how you might verify the current password and get the user ID
session_start();
$userId = $_SESSION['username']; // Assuming you are using sessions to store user ID after login
$query = "SELECT * FROM users WHERE Username = $userId AND Password = '$currentPassword'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) !== 1) {
    http_response_code(400); // Bad Request
    echo "Incorrect current password.";
    exit();
}

// Update password in the user table
$updateQuery = "UPDATE users SET Password = '$newPassword' WHERE Username = $userId";
if (mysqli_query($conn, $updateQuery)) {
    // Password updated successfully
    echo "Password updated successfully.";
} else {
    // Error updating password
    http_response_code(500); // Internal Server Error
    echo "Error updating password. Please try again.";
}

// Close the database connection
mysqli_close($conn);
?>
