<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php include 'header.php'; ?>
    <br><br>
    <div class="content">
        <h1>Our Services</h1>
    <?php
        include 'connect.php';
        
        $sql = "SELECT * FROM services";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
            while ($row = $result->fetch_assoc()) {
              
                echo '<div class="service">';
                echo '<img src="'."admin/". $row['image']. '" alt="' . $row['title'] . '">';
                echo '<h2>' . $row['title'] . '</h2>';
                echo '<p style="color: black;">' . $row['description'] . '</p>';
                // echo '<button onclick="location.href=\'booking.php\'">Learn More</button>';
                echo '</div>';
                }
            } else {
                echo "0 results";
        }
        
?>
</div>
    <?php include 'footer.php'; ?>

</body>
</html>
