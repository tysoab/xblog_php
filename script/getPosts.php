<?php

$mysqli = require __DIR__ . '../../admin/script/dbconnection.php';
$sql = "SELECT * FROM post";
$result = $mysqli->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
if($data){
  header("Content-Type: application/json");
  echo json_encode(["post" => $data]);
}