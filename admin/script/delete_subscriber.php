<?php

$mysqli = require __DIR__ . '/dbconnection.php';
$sql = sprintf("DELETE FROM subscribers WHERE email='%s'", $mysqli->real_escape_string($_GET['email']));

$result = $mysqli->query($sql);
if(!$result){
echo 'Failed to delete post';
$mysqli->close();
return;
}

header('Location: ../subscribers.php');

$mysqli->close();