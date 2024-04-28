<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Contact Us Form  | CodingLab </title>
    <link rel="stylesheet" href="contect.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <button class="btn"><a href="index.php"><img src="home.png" hight="60px" width="65"></a></button>
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">BVM college</div>	
          <div class="text-two">Vidyanagar,Anand</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">7283806261</div>
          <div class="text-two">7433857006</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">yashdangashiya0@gmail.com</div>
          <div class="text-two">viralrajput33@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have any work from us or any types of quries related to our website, you can send me message from here. It's our pleasure to help you.</p>
      <form action="add.php" method="POST">
        <div class="input-box">
          <input type="email" name="email" placeholder="Enter your name">
        </div>
        <div class="input-box">
          <input type="text" name="qry" placeholder="Enter your Work/Quires">
        </div>
        <div class="input-box message-box">
        </div>
        <div class="button">
          <input type="submit" value="Send Now" >
        </div>
      </form>
    </div>
    </div>
  </div>
</body>
</html>