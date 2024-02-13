<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <link rel="stylesheet" href="admin.css">
    <style>

     

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 90%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
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
<?php include 'header.php'?>
 
    
    <div class="container">
        <h2>Add New Service</h2>
        
        <form action="processService.php" method="post"  enctype="multipart/form-data">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br>

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea><br>

            <button type="submit">Add Service</button>
        </form>
    </div>

    <?php include 'footer.php'?>

</body>
</html>
