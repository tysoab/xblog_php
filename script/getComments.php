<?php

$mysqli = require __DIR__ . '../../admin/script/dbconnection.php';
$sql = sprintf("SELECT * FROM comments WHERE post_id='%s'", $mysqli->real_escape_string($_GET['postId']));
$result = $mysqli->query($sql);
$commentData = $result->fetch_all(MYSQLI_ASSOC);

  header("Content-Type: application/json");
  echo json_encode(["comment" => $commentData]);


$mysqli->close();