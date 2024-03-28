<?php
$errorMsg = false;
$successMsg = false;
$post_id = 'xblog_'. round(microtime(true));
$post_date = date('d-m-Y');

if($_SERVER["REQUEST_METHOD"] === "POST"){

  $title = htmlspecialchars($_POST['title']);
  $content = htmlspecialchars($_POST['content']);

  // $file = htmlspecialchars($_POST['fileToUpload']);
  

  if(empty($title) || empty($content)) return;

$target_dir = "./uploadFile/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$ext = explode(".", $_FILES['fileToUpload']['name']);
$fileName = "xblog_" . round(microtime(true)) . '.'. end($ext);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "mp4" && $imageFileType != "mpeg") {
  $errorMsg = "Sorry, only JPG, JPEG, PNG & mp4 files are allowed.";
  $uploadOk = 0;
  return;
}

if($uploadOk){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$fileName)) {
      $mysqli = require __DIR__ . '/dbconnection.php';
      
      $sql = "INSERT INTO post(post_id, title, content, upload_file, post_date) VALUES(?, ?, ?, ?, ?)";

      $stmt = $mysqli->prepare($sql);
      $stmt->bind_param('sssss', $post_id, $title, $content, $fileName, $post_date);

      if($stmt->execute()){

        $successMsg = 'Post uploaded successfully';
       $_POST['title'] = '';
       $_POST['content']= '';
       $post_date = '';
       $post_id = '';

       $stmt->close();
       $mysqli->close();
      }

  } else {
    $errorMsg = "Sorry, there was an error uploading your file.";
  }
}

}