<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Futsal</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        img {
            max-width: 10%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 15px;
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

<?php
    include 'header.php';
    include 'C:\xampp\htdocs\php\connect.php';
  
    // Check if the ID is set in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Retrieve the service details based on the ID
        $sql = "SELECT * FROM services WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
?>
            <h2>Edit Service</h2>
            <form action="update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                <label for="title">Title:</label>
                <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br>

                <label for="description">Description:</label>
                <textarea name="description" required><?php echo $row['description']; ?></textarea><br>

                <label for="image">Current Image:</label>
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>"><br>
                <label for="new_image">New Image:</label>
                <input type="file" name="new_image"><br>

                <input type="submit" value="Update">
            </form>
<?php
        } else {
            echo 'Service not found.';
        }
    } else {
        echo 'Invalid request.';
    }

    include 'footer.php';
?>
</body>
</html>