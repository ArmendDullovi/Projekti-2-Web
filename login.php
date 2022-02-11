<?php
require_once 'config/dbconnection.php';
session_start();

// Checks if session exists
if ($_SESSION) {
   header("location: ../admin?id=index");
   exit;
}

$errors = [];

if (isset($_POST['submit_login'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   $query = $conn->prepare('SELECT * FROM users WHERE email = :email');
   $query->bindValue(":email", $email);
   $query->execute();

   $user = $query->fetch(PDO::FETCH_ASSOC);

   $userEmail = $user["email"] ?? null;
   $userPassword = $user["password"] ?? null;

   if (trim($email) === "")
      $errors[] = "Email field is required!";
   else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
      $errors[] = "Invalid email format";
   else if ($email !== $userEmail)
      $errors[] = "Email doesn't exist!";
   else if ($email === $userEmail && !password_verify($password, $userPassword))
      $errors[] = "Wrong password!";
   else if ($email !== $userEmail && !password_verify($password, $userPassword))
      $errors[] = "Wrong Credentials";

   if (empty($errors)) {
      $_SESSION['user_id'] = $user['user_id'];
      header("location: ./admin?id=index");
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
      <a href="index.php" class="text-light text-center my-2 d-block ">
         <span>GONEX HOMEPAGE</span>
      </a>
      <div class="row">
         <div class="col-lg-3 col-md-2"></div>
         <div class="col-lg-6 col-md-8 login-box">
            <div class="col-lg-12 login-key">
               <i class="fa fa-key" aria-hidden="true"></i>
            </div>


            <div class="col-lg-12 login-title">
               ADMIN PANEL
            </div>
            <?php foreach ($errors as $error) : ?>
               <div class="alert alert-danger" role="alert">
                  <?php echo $error; ?>
               </div>
            <?php endforeach; ?>

            <div class="col-lg-12 login-form">
               <div class="col-lg-12 login-form">
                  <form method="POST">
                     <div class="form-group">
                        <label class="form-control-label">EMAIL</label>
                        <input type="text" name="email" class="form-control">
                     </div>
                     <div class="form-group">
                        <label class="form-control-label">PASSWORD</label>
                        <input type="password" name="password" class="form-control" i>
                     </div>

                     <div class="col-lg-12 loginbttm">
                        <div class="col-lg-6 login-btm login-text">
                           <!-- Error Message -->
                        </div>
                        <div class="col-lg-12 loginbttm">
                           <button type="submit" name="submit_login" class="btn btn-outline-primary w-100">LOGIN</button>
                        </div>
                     </div>
                  </form>

                  <a href="signup.php" class="btn btn-outline-primary my-2 w-100">
                     REGISTER
                  </a>
               </div>
            </div>
            <div class="col-lg-3 col-md-2"></div>
         </div>
      </div>
</body>

</html>