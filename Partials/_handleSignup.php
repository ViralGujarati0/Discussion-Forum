<?php
$showErr = "false";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupCpassword'];

    //Check wheter this email exist.
    $existSql = "select * from `users` where user_email = '$user_email'";
    $result = mysqli_query($conn,$existSql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows > 0)
    {
        $showErr = "Email alread in use";
    }       
    else
    {
        $pass_regex = "/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
        if(!preg_match($pass_regex, $pass))
        {  
            $showErr = "Please enter a valid password (1 Uppercase, 1 Number, 1 Special Character, minimum 8 characters)";
        }
        else if($pass == $cpass)
        {
            $hash = password_hash($pass,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            if($result)
            {
                $showErr = true;
                header("Location: /forum/index.php?signupsuccess=true");
                exit();
            }
        }
        else
        {
            
            $showErr = "Passwords do not match";
        }
    }
    header("Location: /forum/index.php?signupsuccess=fasle&error=$showErr");

}

 ?>