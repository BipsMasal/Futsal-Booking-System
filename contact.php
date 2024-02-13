<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php include 'header.php'; ?>
    <br>
    <br>
    <div class="content">
        <h1>Contact Us</h1>

        <p style="color: black;">If you have any questions or inquiries, please feel free to contact us using the form below:</p>

        <form action="contact_process.php" method="post">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Your Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="message">Your Message:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br>

            <button type="submit">Submit</button>
        </form>
    </div>
    

    <?php include 'footer.php'; ?>

</body>
</html>
