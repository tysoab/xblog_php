<?php
$retrieveError = false;
$commentStat = false;

$mysqli = require __DIR__ . '../../admin/script/dbconnection.php';

$sql = sprintf("SELECT * FROM post WHERE title='%s'", $mysqli->real_escape_string($_GET['title']));

$result = $mysqli->query($sql);
$data = $result->fetch_assoc();
if(!$data) return $retrieveError = true;



function comment(){
  

  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $postId = $GLOBALS['data']['post_id'];
    $commentDate = date('d-m-Y');
    
    if(empty($_POST['name']) || empty($_POST['comment'])) return;
    $mysqli = require __DIR__ . '../../admin/script/dbconnection.php';
    $sql = "INSERT INTO comments (post_id, name, comment, date) VALUES(?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssss', $postId, $_POST['name'], $_POST['comment'], $commentDate);
    if($stmt->execute()){
      $GLOBALS['commentStat'] = 'Thanks for the comment';
      $stmt->close();

      header("Location: post-detail.php?title=" . $GLOBALS['data']['title']);
    }
  }
}


$mysqli->close();