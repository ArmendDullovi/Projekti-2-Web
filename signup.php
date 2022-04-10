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