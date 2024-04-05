<?php
$newsletter_suc = false;
if($_SERVER["REQUEST_METHOD"] === 'POST'){
  if(empty($_POST['newsletter-email'])) return;

$mysqli = require __DIR__ . '../../admin/script/dbconnection.php';
$sql = "INSERT INTO subscribers (email, date) VALUES(?, ?)";
$date = date('d-m-Y');
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ss', $_POST['newsletter-email'], $date);

if($stmt->execute()){
$newsletter_suc = true;
$_POST['newsletter-email'] = '';

$stmt->close();
$mysqli->close();
}
}