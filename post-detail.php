<?php require __DIR__ . '/script/post_details_script.php'; 
comment();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="blog, entertainment, sport, lifestyle, coding, program">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/dad8ebce2d.js" crossorigin="anonymous"></script>
  <script src="js/http.js" defer></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/post-detail.css">
  
  <title>xblog || #1 blog in Nigeria ||</title>
</head>
<body>

<?php if($commentStat) :?>
<div class="comment-stat">
<?= $commentStat ?>
</div>
<?php endif ?>
  <?php include __DIR__ . '/header.php'; ?>
  <main>
    <h2 class="post-det-title">
      <?php if($retrieveError) :?>
        Couldn't get post details
        <?php else :?>
          <?= ucfirst($data['title']) ?>
        <?php endif ?>
    </h2>
<section class="post-detail">

  <div class="post-img">
    <img src="admin/uploadFile/<?=$data['upload_file'] ?>" alt="<?=$data['title'] ?>">
  </div>

  <div class="post-title">
    <div class="post-date">
      <small>
        Post date:
        <?=$data['post_date']?>
      </small>
    </div>

    <h4>
      <?=ucwords($data['title'])?>
    </h4>
  </div>

  <div class="post-desc">
    <p>
      <?=ucfirst($data['content'])?>
    </p>
  </div>
</section>

<section class="leave-comment">
  <h4><span>Leave a comment</span></h4>
  <form action="" method="POST" class="comment-form">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" placeholder="Enter your name">
    </div>
    <div class="form-group">
      <label for="comment">Your comment:</label>
      <textarea name="comment" id="comment" placeholder="Enter your name"></textarea>
    </div>

    <div class="control-action">
      <button type="submit">
        Comment
      </button>
    </div>
  </form>
  
</section>

<section class="comment-container" data-postId="<?=$data['post_id'] ?>">
  <div><?=$commentStat ?></div>
  <h4>Comment(s)</h4>
  <ul>
    <li>
      <div class="user-icon">
        <i class="fa-solid fa-user-plus"></i>
      </div>
      <div class="user-details">
        <h4>taiwo yusuf</h4>
        <p>20-11-2023</p>
      </div>

      <div class="user-comment">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit odio, accusamus repellat eveniet expedita cupiditate labore nostrum debitis rerum
        </p>
      </div>
    </li>
    <li>
      <div class="user-icon">
        <i class="fa-solid fa-user-plus"></i>
      </div>
      <div class="user-details">
        <h4>taiwo yusuf</h4>
        <p>20-11-2023</p>
      </div>

      <div class="user-comment">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit odio, accusamus repellat eveniet expedita cupiditate labore nostrum debitis rerum
        </p>
      </div>
    </li>
  </ul>

  <div class="prev-next-btn"></div>
</section>

  </main>




<?php include __DIR__ . '/footer.php'; ?>
<div class="loader"></div>
<div class="error-msg"></div>
  <script src="js/script.js"></script>
  <script src="js/post-detail.js" defer></script>
</body>
</html>