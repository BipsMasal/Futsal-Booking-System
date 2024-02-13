<?php
    include 'C:\xampp\htdocs\php\connect.php';
    session_start();
    if (!isset($_SESSION['username'])) {
        // Redirect to the login page if not logged in
        header("location: \php\login.php");
            exit();
        }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        // Check if a new image file is uploaded
        if ($_FILES['new_image']['error'] === UPLOAD_ERR_OK) {
            $new_image_tmp_name = $_FILES['new_image']['tmp_name'];
            $new_image_name = $_FILES['new_image']['name'];

            // Move the uploaded image to a desired directory
            $target_dir = "uploads/";
            $target_path = $target_dir . $new_image_name;

            if (move_uploaded_file($new_image_tmp_name, $target_path)) {
                // Update the service in the database with the new image path
                $sql = "UPDATE services SET title = '$title', description = '$description', image = '$target_path' WHERE id = $id";

                if ($conn->query($sql) === TRUE) {
                    echo 'Service updated successfully.';
                } else {
                    echo 'Error updating service: ' . $conn->error;
                }
            } else {
                echo 'Error uploading new image.';
            }
        } else {
            // Update the service in the database without changing the image
            $sql = "UPDATE services SET title = '$title', description = '$description' WHERE id = $id";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Service updated successfully.')
                     window.location.href = 'serviceview.php'
                    </script>";
                
            } else {
                echo "<script>alert('Error.')
                window.location.href = 'serviceview.php'
               </script>";
            }
        }
    } else {
        echo 'Invalid request.';
    }
?>
