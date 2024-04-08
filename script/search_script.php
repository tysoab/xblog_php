<?php

$mysqli = require __DIR__ . '../../admin/script/dbconnection.php';

$sql = "SELECT * FROM post";

$result = $mysqli->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);

if($data){
  $posts  = array_filter($data, fn($post)=> str_contains(strtolower($post['title']), strtolower($_GET['query'])) && $post);
}

if($posts){
    header("Content-Type: application/json");
    echo json_encode(["search" => $posts]);
}


$mysqli->close();