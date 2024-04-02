<?php
$data = null;
$isUpdate = false;
$mysqli = require __DIR__ . '/dbconnection.php';

$sql = sprintf("SELECT * FROM post WHERE post_id='%s'", $mysqli->real_escape_string($_GET['post_id']));

$result = $mysqli->query($sql);
$data = $result->fetch_assoc();
if($data){
  
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if($_POST['title'] && $_POST['title'] !== $data['title']){
    $sql = sprintf("UPDATE post SET title='".htmlspecialchars($_POST['title'])."' WHERE post_id='%s'", $mysqli->real_escape_string($_GET['post_id']));

    $title_res = $mysqli->query($sql);
    if($title_res) $isUpdate = true;

  }
   
  if($_POST['content'] && $_POST['content'] !== $data['content']){
    $sql = sprintf("UPDATE post SET content='".htmlspecialchars($_POST['content'])."' WHERE post_id='%s'", $mysqli->real_escape_string($_GET['post_id']));

    $content_res = $mysqli->query($sql);
    if($content_res) $isUpdate = true;

  }

  
$target_dir = "./uploadFile/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$ext = explode(".", $_FILES['fileToUpload']['name']);
$fileName = "xblog_" . round(microtime(true)) . '.'. end($ext);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "mp4" && $imageFileType != "mpeg") {
  echo "<script>alert('Sorry, only JPG, JPEG, PNG & mp4 files are allowed.')</script>";
  $uploadOk = 0;
  return;
}

if($uploadOk){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$fileName)) {
      $sql = sprintf("UPDATE post SET upload_file='".$fileName."' WHERE post_id='%s'", $mysqli->real_escape_string($_GET['post_id']));

    $upload_res = $mysqli->query($sql);
    if($upload_res) $isUpdate = true;
    }
  }
  
  }
  
  if($isUpdate) header("location: ./all_posts.php");
}

$mysqli->close();