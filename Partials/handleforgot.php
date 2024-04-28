<?php
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include '_dbconnect.php';
    $email = $_POST['email'];
    $newpass = $_POST['newpass'];
    $hash = password_hash($newpass,PASSWORD_DEFAULT);
   $sql = "UPDATE `users` SET `user_pass` = '$hash' WHERE `user_email`='$email'";
    $result = mysqli_query($conn, $sql);
    if($result)
    {
	$showErr = "Successfully Forgot";
        header("Location: /forum/index.php?forgotsuccess=true&error=$showErr");
    }
    else
    {
        $showErr = "Accont is not exists";
        header("Location: /forum/index.php?forgotsuccess=fasle&error=$showErr");
    }
}
?>