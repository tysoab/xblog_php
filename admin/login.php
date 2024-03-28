<?php 
session_start(); 
require __DIR__ . '/script/login_script.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/loader.css" />
    <script src="js/loader.js" defer></script>
 <script src="https://kit.fontawesome.com/dad8ebce2d.js" crossorigin="anonymous"></script>
  <script src="js/validation.js" defer></script>
  <link rel="stylesheet" href="css/login.css">
  <title>Login to continue</title>
</head>
<body>

<div class="logo">
  <a href="index.php">x<small>Blog</small></a>
</div>

<div class="error-msg">
  <p>error</p>
</div>

<div class="container">

  <h2>Login</h2>

  <form action="" method="POST" id="login">
    <div class="form-group">
      <i class="fa-solid fa-user"></i>
      <input type="text" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>"
       placeholder="Username">
    </div>
    <div class="form-group">
      <i class="fa-solid fa-key"></i>
      <input type="password" name="password" id="password" placeholder="Password">
    </div>

    <div class="control-action">
      <button type="submit">Login</button>
    </div>
  </form>
</div>
  <div class="loader"></div>
</body>
</html>