<?php

include 'Partials/_dbconnect.php';
$email = $_POST['email'];
$query = $_POST['qry'];
$sql = "INSERT INTO `contact` (`Email`, `Query`) VALUES ('$email', '$query')";
$result = mysqli_query($conn,$sql);
if($result)
{
    $showErr = "not send your query";
    header("Location: /forum/index.php?sendsuccess=true");
    exit();
}
header("Location: /forum/index.php?sendsuccess=fasle&error=$showErr");

?>