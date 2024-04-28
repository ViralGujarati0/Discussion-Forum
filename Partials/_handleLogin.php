<?php
session_start(); // Make sure session is started

// Code to verify login credentials and set session variables upon successful login

// Add these lines to check if session variables are set correctly
var_dump($_SESSION["loggedin"]);
var_dump($_SESSION["useremail"]);

$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];
    $sql = "SELECT * FROM `users` WHERE `user_email`='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows == 1)
    {
        $row = mysqli_fetch_assoc($result);
            if(password_verify($pass, $row['user_pass']))
            {
                $_SESSION["loggedin"] = true;   
                $_SESSION["useremail"] = $email;
                echo "logged in". $email;
            }
            else    
            {
                $showErr = "Password is wrong";
                header("Location: /forum/index.php?loginsuccess=false&error=$showErr");
            }
            header("Location: /forum/index.php");
    }
    else
    {
        $showErr = "Account does not exist";
        header("Location: /forum/index.php?loginsuccess=false&error=$showErr");
    }
}
?>
