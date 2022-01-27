<?php
$query = $conn->prepare("SELECT COUNT(*) AS num FROM users WHERE status = 'admin'");
$query->execute();
$admins = $query->fetch(PDO::FETCH_ASSOC);

$query = $conn->prepare("SELECT COUNT(*) AS num FROM users WHERE status = 'user'");
$query->execute();
$users = $query->fetch(PDO::FETCH_ASSOC);

$query = $conn->prepare("SELECT COUNT(*) AS num FROM posts");
$query->execute();
$posts = $query->fetch(PDO::FETCH_ASSOC);

$query = $conn->prepare("SELECT COUNT(*) AS num FROM subscribers");
$query->execute();
$subscribers = $query->fetch(PDO::FETCH_ASSOC);

$query = $conn->prepare("SELECT COUNT(*) AS num FROM contacts");
$query->execute();
$contacts = $query->fetch(PDO::FETCH_ASSOC);

?>

<?php if (!$isAdmin) { ?>
   <div class="content d-flex align-items-center">
      <div class="col-xl-12">
         <div class="text-center">
            <h4>NOTHING TO SHOW HERE FOR NOW!</h4>
         </div>
      </div>
   </div>