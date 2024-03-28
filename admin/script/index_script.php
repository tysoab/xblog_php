<?php

$postCounts = null;

$mysqli = require __DIR__ . '/dbconnection.php';

$sql = "SELECT * FROM post";

$result = $mysqli->query($sql);

if($result){
  $postCounts = mysqli_num_rows($result); 
}

$mysqli->close();