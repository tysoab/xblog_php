<?php

$mysqli = require __DIR__ . '/dbconnection.php';
$sql = "SELECT * FROM " . $_GET['table'];
$result = $mysqli->query($sql);
$posts = $result->fetch_all(MYSQLI_ASSOC);

$result->free_result();
$mysqli->close();

header("Content-Type: application/json");
echo json_encode(["data" => $posts]);
