<?php
 session_start();

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == NULL) {
            echo "<script>alert('Enter Username')</script>";
            header('location:login.php');
        } else if ($password == NULL) {
            echo "<script>alert('Enter Password')</script>";
            header('location:login.php');
        } else {
            $sql = "SELECT * FROM users WHERE Username='$username' AND Password='$password'";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);

            if ($num == 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                $_SESSION['test'] = "HELLO";

                if ($row['isAdmin'] == 1) {
                    // Admin login
                    header('location:\php\admin\admin.php');
                } else {
                    // Regular user login
                    header('location:index.php');
                }
            } else {
                echo "<script>alert('User not found, Please register')</script>";
                header('location:error.php');
            }
        }
    }
}
?>
