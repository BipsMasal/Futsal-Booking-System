<?php
// Assuming you have already established a connection to your database
include 'connect.php';
// Query to select reserved bookings from the database
echo "<h2>Reserved Bookings:</h2>";
$query = "SELECT * FROM bookings";
$result = mysqli_query($conn, $query);

// Check if there are any reserved bookings
if (mysqli_num_rows($result) > 0) {
    // Display reserved bookings
    
    echo "<table>";
    echo "<tr><th>Date</th><th>Start Time</th><th>End Time</th></tr>";

    // Loop through each row of the result set
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['stime'] . "</td>";
        echo "<td>" . $row['etime'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No reserved bookings found.";
}
// Close the database connection
mysqli_close($conn);
?>


