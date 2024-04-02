<?php
$mysqli = require __DIR__ . '/dbconnection.php';
$sql = "SELECT * FROM post";
$result = $mysqli->query($sql);
$posts = $result->fetch_all(MYSQLI_ASSOC);

$result->free_result();
$mysqli->close();
