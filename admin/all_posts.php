<?php 
      require './script/login_session.php';
      include __DIR__ . '/script/all_post_script.php';
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
  <link rel="stylesheet" href="css/all_posts.css">
  <title>Admin panel</title>
</head>
<body>

<div class="container">
  <?php include __DIR__ . '/aside.php'; ?>

  <main>
    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="header-overview">
      <div class="left">Dashboard</div>

      <div class="right">
        Blog management / Admin / <span>All post</span> 
      </div>
    </div>

    <section class="wrapper">
      <div class="post-container">
        <div class="change-rows">
          <form action="" method="POST">
            <div class="form-group">
            <label for="row">Number of rows:</label>
            <select name="rows" id="rows">
              <option></option>
              <option value="20">20 per row</option>
              <option value="35">35 per row</option>
              <option value="50">50 per row</option>
            </select>
            </div>
          </form>
        </div>

        <div class="all-posts">
          <?php if($posts) :?>
          <?php foreach($posts as $key) :?>
            <div class="post-wrap">
            <div class="post-img">
              <img src="./uploadFile/<?= $key['upload_file'] ?>" alt="<?= $key['title'] ?>">
            </div>

            <div class="post-title">
              <h4><?= $key['title'] ?></h4>
            </div>

            <div class="control-actions">
              <a href="./update_post.php?post_id=<?= $key['post_id'] ?>" class="edit-post">Update</a>
              <button class="del-post" data-id="<?= $key['post_id'] ?>">Delete</button>
            </div>
          </div>
          <?php endforeach ?>
          <?php endif ?>

          <!-- <div class="post-wrap">
            <div class="post-img">
              <img src="./uploadFile/xblog_1711609115.JPG" alt="title">
            </div>

            <div class="post-title">
              <h4>post title</h4>
            </div>

            <div class="control-actions">
              <a href="" class="edit-post">Update</a>
              <a href="" class="del-post">Delete</a>
            </div>
          </div> -->
        </div>

      </div>
      <div>
       
      </div>
    </section>
  </main>
</div>
  
<div class="loader"></div>

<script src="./js/all_posts.js"></script>
</body>
</html>