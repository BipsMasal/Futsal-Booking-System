

<?php
    include 'C:\xampp\htdocs\php\connect.php';
    if (!isset($_SESSION['username'])) {
        // Redirect to the login page if not logged in
        header("location: \php\login.php");
            exit();
        }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect data from the form
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        // Handle uploaded image
        $targetDirectory = "uploads/";  // Create a directory named "uploads" in the same directory as your PHP files
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
        
        // Insert data into the services table
        $sql = "INSERT INTO services (image, title, description) VALUES ('$targetFile', '$title', '$description')";
        
        if ($conn->query($sql) === TRUE) {
            // echo "Service added successfully";
            echo "<script>alert('Services added successfully.')
            window.location.href = 'booking.php'
            </script>";
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            echo "<script>alert('Error adding service.')
            window.location.href = 'booking.php'
            </script>";
        }
    }
?>