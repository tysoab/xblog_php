<?php
$mysqli = require __DIR__ . '../../admin/script/dbconnection.php';
$sql = sprintf("SELECT * FROM subscribers WHERE email='%s'", $mysqli->real_escape_string($_GET['newsletter-email']));

$result = $mysqli->query($sql);
$is_available = $result->num_rows > 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]);
$mysqli->close();