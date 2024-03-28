<?php
$servername = 'localhost';
$username = 'root';
$dbpassword = '';
$dbname = 'xblog';

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

if($conn->connect_error){
  die('database connection failed!');
}

return $conn;