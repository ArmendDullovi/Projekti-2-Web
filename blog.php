<?php
include './config/dbconnection.php';
$posts = $conn->query('SELECT * FROM posts ORDER BY create_date')->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
   body,
   h1,
   h2,
   h3,
   h4,
   h5,
   h6 {
      font-family: "Raleway", sans-serif
   }
</style>

<body class="w3-light-grey " style="max-width:1600px">
   
   <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

 
   <header id="portfolio">
      <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
      <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
      <div class="w3-container">
         <h1><b>My BLOG - GONEX</b></h1>
         <h2>
            <a href="index.php">
               GO BACK
            </a>
         </h2>
      </div>
   </header>

   <div class="w3-row-padding">
   <?php foreach ($posts as $post) : ?>
         <div class="w3-third w3-container w3-margin-bottom">
            <img src="admin/<?php echo $post['post_image'] ?>" alt="Norway" style="width:100%" class="w3-hover-opacity">
            <div class="w3-container w3-white">
               <p><b><?php echo $post['post_title']; ?></b></p>
               <p><?php echo $post['post_desc']; ?></p>
               <p><?php echo $post['create_date']; ?></p>
            </div>
         </div>
            <?php endforeach; ?>
   </div>
</body>

</html>