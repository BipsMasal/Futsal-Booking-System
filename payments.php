<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment History</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <?php include 'header.php';?>
    
<form method="GET" action="">
    <label for="filter">Filter:</label>
    <select name="filter" id="filter">
        <option value="">Select Filter</option>
        <option value="daily">Daily</option>
        <option value="weekly">Weekly</option>
        <option value="monthly">Monthly</option>
        <option value="yearly">Yearly</option>
    </select>
    <button type="submit">Apply</button>
</form>

    <?php
    include 'C:\xampp\htdocs\php\connect.php';
        
        $filter = isset($_GET['filter']) ? $_GET['filter'] : '';

        // Modify the SQL query based on the selected filter
        switch ($filter) {
            case 'daily':
                $sql = "SELECT * FROM payment_table WHERE date = CURDATE()";
                echo"<h3>Daily Booking</h3>";
                break;
            case 'weekly':
                $sql = "SELECT * FROM payment_table WHERE YEARWEEK(date) = YEARWEEK(NOW())";
                echo"<h3>Weekly Booking</h3>";
                break;
            case 'monthly':
                $sql = "SELECT * FROM payment_table WHERE MONTH(date) = MONTH(NOW()) AND YEAR(date) = YEAR(NOW())";
                echo"<h3>Monthly Booking</h3>";
                break;
            case 'yearly':
                $sql = "SELECT * FROM payment_table WHERE YEAR(date) = YEAR(NOW())";
                echo"<h3>Yearly Booking</h3>";
                break;
            default:
                $sql = "SELECT * FROM payment_table";
                echo"<h3>History</h3>";
        }
        
        // Execute the modified SQL query
        $result = $conn->query($sql);
        
        // Initialize total price variable
        $totalPrice = 0;
        
        if ($result->num_rows > 0) {
            // Display the table header
            // echo "<h2>Payment Table</h2>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Date</th><th>Start Time</th><th>End Time</th><th>Phone Number</th><th>Ground Type</th><th>Price</th><th>Status</th></tr>";
        
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["date"] . "</td><td>" . $row["start_time"] . "</td><td>" . $row["end_time"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["ground_type"] . "</td><td>" . $row["price"] . "</td><td>Paid</td></tr>";
                
                // Add price to total
                $totalPrice += $row["price"];
            }
            echo "</table>";
            echo "<p><b>Grand Total: </b>$totalPrice</p><br><br><br><br><br><br><br><br>";
        } else {
            echo "0 results<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        }
        include 'footer.php';
    ?>
</body>
</html>