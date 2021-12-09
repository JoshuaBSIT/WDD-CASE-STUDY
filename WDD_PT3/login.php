<?php
require_once('connect.php');

if(isset($_POST['submit'])){ 
    $username=$_POST['username'];
    $password = $_POST['password'];
    $login_query ="SELECT * from users WHERE email='$username' AND pass='$password' ";

    $result = mysqli_query($con, $login_query);

    if(mysqli_num_rows($result)){
        echo "<script>alert('You are Successfully logged in');</script>";
        include("dashboard.php");
       echo $_SESSION['email'];
        $_SESSION ['email'] = $username;
    }
    
    else{ 
        echo "<script>alert('Email and Password is incorrect!')</script>";
        include("login.html");
        exit;
    }
}
 ?>