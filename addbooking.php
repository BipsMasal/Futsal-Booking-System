<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        .form-container {
        background-color: #fff;
        position: relative;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        }
        label {
        display: block;
        margin: 10px 0 5px;
        color: #555;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
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
<?php include 'header.php';?>
<div class="form-container">
        <br>
        

        <form action="booking_process.php" method="post">
        <h2 style="font-size: 30px;">Futsal Booking Form</h2>
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" >

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" >

            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date" required>
            
            <label for="time">Start Time:(Booking: 6 AM - 10 PM.)</label>
            <input type="time" id="stime" name="stime" required step="3600" step="3600" min="06:00" max="22:00" required>

            <label for="time">End Time:(Booking: 6 AM - 10 PM.)</label>
            <input type="time" id="etime" name="etime"required step="3600" step="3600" min="06:00" max="22:00"  required>

            <label for="phone">Phone Number:</label>
            <input type="number" id="num" name="num" required>

            <label for="futsalType">Select Futsal Type:</label>
            <select id="futsalType" name="futsalType" onchange="displayPrice()" required>
                <option value="" disabled selected>Select Futsal Type</option>
                <option value="B-Grade">B-Grade</option>
                <option value="A-Grade">A-Grade</option>
                <!-- Add more options as needed -->
            </select>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" placeholder="Price will be displayed here" readonly required>

            <button type="submit">Book Now</button>
        </form>
    </div>

    <script>
        function displayPrice() {
            var futsalType = document.getElementById("futsalType");
            var priceInput = document.getElementById("price");

            // Set prices based on selected futsal type
            switch (futsalType.value) {
                case "B-Grade":
                    priceInput.value = "1200.00";
                    break;
                case "A-Grade":
                    priceInput.value = "1800.00";
                    break;
                // Add more cases for other futsal types
                default:
                    priceInput.value = "";
            }
        }
    </script>
    <?php include 'footer.php';?>
</body>
</html>