<?php

include __DIR__ . '/script/login_session.php';
$email = 'tysoab@gmail.com';
$password = password_hash('0987', PASSWORD_DEFAULT);

$mysqli = require __DIR__ . '/script/dbconnection.php';

$sql = "INSERT INTO admin(email, password) VALUES(?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ss', $email, $password);

$stmt->execute();
$stmt->close();
$mysqli->close();