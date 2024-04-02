<?php 
      require './script/login_session.php';
      include __DIR__ . '/script/update_post_script.php';
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/script.js" defer></script>
  
  <link rel="stylesheet" href="css/loader.css" />
  <script src="js/loader.js" defer></script>
  <script src="https://kit.fontawesome.com/dad8ebce2d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/newpost.css">
  <title>Update post || xblog</title>
</head>
<body>

<div class="container">
  <?php include __DIR__ . '/aside.php'; ?>

  <main>

    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="header-overview">
      <div class="left">Dashboard</div>

      <div class="right">
        Blog management / Admin / <span>Update post</span> 
      </div>
    </div>

    <section class="wrapper">
      
      <div class="newpost">
        <h4>Update post</h4>
        <form action="" method="POST" enctype="multipart/form-data" class="newpost-form">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?=$data['title'] ?? '' ?>">
          </div>

          <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content"><?= $data['content'] ?? '' ?></textarea>
          </div>

          <div class="form-group">
            <label for="fileToUpload">File</label>
            <input type="file" name="fileToUpload" id="fileToUpload" value="<?= $data['upload_file'] ?? ''?>">
          </div>

          <div class="control-action">
            <button type="submit">Update post</button>
          </div>
        </form>
      </div>
    </section>
  </main>
</div>
  <div class="loader"></div>
</body>
</html>