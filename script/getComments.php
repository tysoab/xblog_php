<?php

$mysqli = require __DIR__ . '../../admin/script/dbconnection.php';
$sql = sprintf("SELECT * FROM comments WHERE post_id='%s'", $mysqli->real_escape_string($_GET['post_id']));
$result = $mysqli->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);

if($data){
  header("Content-Type: application/json");
  echo json_encode(["comment" => $data]);
}

$mysqli->close();