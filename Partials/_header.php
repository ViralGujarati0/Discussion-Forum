<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/forum/index.php">Lets Discuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/forum/index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/forum/about.php">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/forum/contact.php">Contact</a>
    </li>
  </ul>
  <div class=" row mx-2">';
 
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
  {
    echo  '<form class="form-inline my-2 my-lg-0">
    <p class="text-light my-0 mx-2">Welcome '. $_SESSION['useremail']. ' </p>
      <a href="Partials/_logout.php" class="btn btn-outline-success ml-2">Logout</a>
      </form>';
  }
else
{
       echo '
        <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
        <button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#signupModal">Signup</button>';

}
    
  
 echo '</div>
    </div>
    </nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true")
{
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You SignUP successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>