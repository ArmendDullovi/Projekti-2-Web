<?php
require_once 'config/dbconnection.php';
session_start();

// Checks if session exists
if ($_SESSION) {
   header("location: ../admin?id=index");
   exit;
}

$errors = [];
if (isset($_POST['submit_register'])) {
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $repeatpassword = $_POST['repeatpassword'];

   $query = $conn->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
   $query->bindValue(":username", $username);
   $query->bindValue(":email", $email);
   $query->execute();

   $user = $query->fetch();
   $userName = $user["username"] ?? null;
   $userEmail = $user["email"] ?? null;

   if (trim($username) === "") {
      $errors[] = "Username is required!";
   }
   if (trim($email) === "") {
      $errors[] = "Email is required!";
   }

   if (trim($password) === "") {
      $errors[] = "Password is required!";
   } else if (strlen($password) < 6) {
      $errors[] = "Password should be greater than 6!";
   }

   if (trim($repeatpassword) === "") {
      $errors[] = "Confirm password is required!";
   }
   if ($password !== $repeatpassword) {
      $errors[] = "Confirm password should be the same!";
   }
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Invalid email format";
   }
   if ($username === $userName) {
      $errors[] = "Username already exists!";
   }
   if ($userEmail === $email) {
      $errors[] = "Email already exists!";
   }

   if (empty($errors)) {
      $query = $conn->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
      $query->bindValue(":username", $username);
      $query->bindValue(":email", $email);
      $query->bindValue(":password", password_hash($password, PASSWORD_DEFAULT));

      $query->execute();
      $successMsg = "You have been successfully registered!";

      // Reset variables
      $errors = [];
      $username = "";
      $email = "";
      $password = "";
      $rpassword = "";
   }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>GONEX - LOGIN</title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <!-- CSS -->
   <link rel="stylesheet" href="css/login.css">
</head>

<body>


   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-md-2"></div>
         <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
               <i class="fa fa-key" aria-hidden="true"></i>
            </div>

            <?php foreach ($errors as $error) : ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
               </div>
            <?php endforeach; ?>

            <?php if (isset($_POST['submit_register']) && empty($errors)) : ?>
               <div class="alert alert-success" role="alert">
                  <?php echo $successMsg; ?>
               </div>
            <?php endif; ?>

            <div class="col-lg-12 login-title">
               ADMIN PANEL
            </div>

            <div class="col-lg-12 login-form">
               <div class="col-lg-12 login-form">
                  <form method="POST">
                     <div class="form-group">
                        <label class="form-control-label">USERNAME</label>
                        <input type="text" name="username" class="form-control">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">EMAIL</label>
                        <input type="text" name="email" class="form-control" i>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">PASSWORD</label>
                        <input type="password" name="password" class="form-control" i>
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">REPEAT PASSWORD</label>
                        <input type="password" name="repeatpassword" class="form-control" i>
                     </div>
                     <div class="col-lg-12 loginbttm">
                        <div class="col-lg-6 login-btm login-text">
                          
                        </div>
                        <div class="col-lg-12 loginbttm">
                           <button type="submit" name="submit_register" class="btn btn-outline-primary w-100">REGISTER</button>
                        </div>
                     </div>
                  </form>
                  <a href="login.php" class="btn btn-outline-primary my-2 w-100">
                     LOGIN
                  </a>
               </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
         </div>
      </div>
</body>

</html>