<?php

$mysqli = require __DIR__ . '/dbconnection.php';
$sql = sprintf("DELETE FROM post WHERE post_id='%s'", $mysqli->real_escape_string($_GET['id']));

$result = $mysqli->query($sql);
if(!$result){
echo 'Failed to delete post';
$mysqli->close();
return;
}

header('Location: ../all_posts.php');

$mysqli->close();