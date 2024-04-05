<?php

$postCounts = null;
$commentCounts = null;
$subscriberCounts = null;

$mysqli = require __DIR__ . '/dbconnection.php';

$sql = "SELECT * FROM post";

$result = $mysqli->query($sql);

if($result){
  $postCounts = mysqli_num_rows($result); 
}

$sql = "SELECT * FROM comments";

$result = $mysqli->query($sql);

if($result){
  $commentCounts = mysqli_num_rows($result); 
}

$sql = "SELECT * FROM subscribers";

$result = $mysqli->query($sql);

if($result){
  $subscriberCounts = mysqli_num_rows($result); 
}



$mysqli->close();