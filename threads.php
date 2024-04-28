<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Welcome to Lets Discuss - Coding Forums</title>
</head>
<body>
    <?php include 'partials/_header.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id=$id"; 
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result))
        {
            $catname = $row['category_name'];
            $catdes = $row['category_description'];
        }
    ?>
    <?php
    $showAlert=false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method=='POST')
    {
    //insert thread into db
    $th_title = $_POST['title'];
    $th_desc = $_POST['desc'];
    $sql = "INSERT INTO `threads` (`thread_title`, `thread_des`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '0', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    $showAlert=true;
    if($showAlert)
    {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your thread has been added.Please wait for community respond.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    else
    {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR!</strong> Your thread has not been added.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }

}
?>
    <!-- Category container starts here-->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname;?> forums</h1>
            <p class="lead"><?php echo $catdes ;?></p>
            <hr class="my-4">
            <p>It use for peer to peer comunication only. </p>
            <p>No Spam / Advertising / Self-promote in the forums. </p>
            <p>Do not post copyright-infringing material. </p>
            <p>Do not post “offensive” posts, links or images. </p>
            <p>Do not cross post questions. </p>
            <p>Remain respectful of other members at all times.</p>
            <p>Posted By : <b>Team Inovation</b></p>
        </div>
    </div>

<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
  echo '<div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <form action=" '.$_SERVER['REQUEST_URI'].' " method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Problem title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Keep your problem short and crisp as
                    possible.</small>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Elaborate Your Concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>';
}
    else{
        echo '
        <div class="container">
        <h1 class="py-2">Start a Discussion</h1> 
           <p class="lead">You are not logged in. Please login to be able to start a Discussion</p>
        </div>
        ';
    }
    ?>

    <div class="container">
        <h1 class="py-2">Browse Queation</h1>

        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id ORDER BY timestamp DESC"; 
        $result = mysqli_query($conn,$sql);
        $noResult=true;
        while($row = mysqli_fetch_assoc($result))
        {
            $noResult=false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_des'];
            $thread_time = $row['timestamp'];
  
        echo '<div class="media my-3">
            <img src="img/userimg.jpg" width=54px class="mr-3" alt="image not found">
            <div class="media-body">
            <p class="font-weight-bold my-0" >Anonymous User at '.$thread_time.'</p>
                <h5 class="mt-0"><a class="text-dark" href="threadin.php?threadid='.$id.'">'.$title.'</a></h5>
                '.$desc.'
            </div>
        </div>';
}
/* echo var_dump($noResult); */
if($noResult)
{
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="display-4">No Threads found</p>
      <p class="lead">Be the first person to ask a question.</p>
    </div>
  </div>';
}
?>
        <?php include 'partials/_footer.php'; ?>
</body>

</html>