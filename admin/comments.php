<?php 
      require './script/login_session.php';
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="js/script.js" defer></script>
  <link rel="stylesheet" href="css/loader.css" />
  <script src="js/loader.js" defer></script>
  <script src="js/all_posts.js" defer></script>
  <script src="https://kit.fontawesome.com/dad8ebce2d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/all_posts.css">
  <title>Admin panel | Comments</title>
</head>
<body>

<div class="container">
  <?php include __DIR__ . '/aside.php'; ?>

  <main>
    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="header-overview">
      <div class="left">Dashboard</div>

      <div class="right">
        Blog management / Admin / <span>Comments</span> 
      </div>
    </div>

    <section class="wrapper">
      <div class="post-container">
        <div class="change-rows">
          
            <div class="form-group">
            <label for="row">Number of rows:</label>
            <select name="rows" id="rows">
              <option></option>
              <option value="2">2 per row</option>
              <option value="4">4 per row</option>
              <option value="6">6 per row</option>
            </select>
            </div>
          
        </div>

        <div class="comments">
          
          <div class="comment-wrap">

            <div class="comment-title">
              <h4>tysoab@gmail.com</h4>
            <div class="control-actions">
              <button class="del-subscriber">Delete</button>
            </div>
            </div>
            <div class="comment-detail">
              just for comment reply...... and nothing else
            </div>
          </div>
        </div>

        <div class="prev-next-btn">
          <button class="prev-btn">Prev</button>
          <button class="next-btn">Next</button>
        </div>

      </div>
      <div>
       
      </div>
    </section>
  </main>
</div>
  
<div class="loader"></div>

</body>
</html>