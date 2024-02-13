<?php
include 'connect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['submit'])){
        $username=$_POST['username'];

        $email=$_POST['email'];
        $password=$_POST['password'];
        $repassword=$_POST['confirm_password'];

        if($username==NULL){
            echo "<script>alert('Enter Username')</script>";
            header('location:register.php');
            
        }
      
        else if($email==NULL){
            echo "<script>alert('Enter your email')</script>";
            header('location:register.php');
            
        }
        else if($password==NULL){
            echo "<script>alert('Enter your password')</script>";
            header('location:register.php');
            
        }
        else if($repassword==NULL){
            echo "<script>alert('Enter your re-password')</script>";
            header('location:register.php');
            
        }
        else if($password!=$repassword){
            echo "<script>alert('Passwords does not match, Try Again')</script>";
            header('location:register.php');
        }
       
        else{
            $sql="INSERT INTO users(Username,Email,Password)
        values('$username','$email','$password')
        ";
        $result=mysqli_query($conn,$sql);
        if($result){
            // echo "<script>alert('Account Created, Please Login In')</script>";
            // header('location:login.php');

            echo "<script>alert('Account Created, Please Login In')
            window.location.href = 'login.php'
            </script>";
        }
        else{
            // echo "<script>alert('Error, Please Register Again')</script>";
            // header('location:register.php');

            echo "<script>alert('Error, Please Register Again')
            window.location.href = 'login.php'
            </script>";
        }
        }

    }
}
?>