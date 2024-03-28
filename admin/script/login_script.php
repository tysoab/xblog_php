<?php
declare(strict_types = 1);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if(empty($_POST['email']) || empty($_POST['password'])) return;

  $mysqli = require __DIR__ . '/dbconnection.php';
  
  $sql = sprintf("SELECT * FROM admin WHERE email = '%s'", $mysqli->real_escape_string($_POST['email']));

  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();

  if($user){
    // session_start();
    session_regenerate_id();
    $_SESSION['id'] = $user['email'];
    
    header('Location: index.php');
    $mysqli->close();
    exit;
  }
}