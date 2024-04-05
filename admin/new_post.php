<?php 
      require './script/login_session.php';
      require './script/new_post_script.php';
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/script.js" defer></script>
  <script src="js/new_post.js" defer></script>
  <link rel="stylesheet" href="css/loader.css" />
  <script src="js/loader.js" defer></script>
  <script src="https://kit.fontawesome.com/dad8ebce2d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/newpost.css">
  <title>Admin panel | New post</title>
</head>
<body>

<div class="container">
  <?php include __DIR__ . '/aside.php'; ?>

  <main>
    <?php if($errorMsg) :?>
    <div class="error-msg popup">
      <?= $errorMsg ?>
    </div>
      <?php endif ?>
    <?php if($successMsg) :?>
    <div class="success-msg popup">
      <?= $successMsg ?>
    </div>
      <?php endif ?>

    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="header-overview">
      <div class="left">Dashboard</div>

      <div class="right">
        Blog management / Admin / <span>New post</span> 
      </div>
    </div>

    <section class="wrapper">
      
      <div class="newpost">
        <h4>Add new post</h4>
        <form action="" method="POST" enctype="multipart/form-data" class="newpost-form">
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?=$_POST['title'] ?? '' ?>">
          </div>

          <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content"><?= $_POST['content'] ?? '' ?></textarea>
          </div>

          <div class="form-group">
            <label for="fileToUpload">File</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
          </div>

          <div class="control-action">
            <button type="submit">Add post</button>
          </div>
        </form>
      </div>
    </section>
  </main>
</div>
  <div class="loader"></div>
</body>
</html>