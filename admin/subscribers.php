<?php 
      require './script/login_session.php';
      // include __DIR__ . '/script/all_post_script.php';
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
  <title>Admin panel | Subscribers</title>
</head>
<body>

<div class="container">
  <?php include __DIR__ . '/aside.php'; ?>

  <main>
    <?php include __DIR__ . '/navbar.php'; ?>

    <div class="header-overview">
      <div class="left">Dashboard</div>

      <div class="right">
        Blog management / Admin / <span>Subscribers</span> 
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

        <div class="subscribers">
          
          <div class="subscriber-wrap">

            <div class="subscriber-email">
              <h4>tysoab@gmail.com</h4>
            </div>
            

            <div class="control-actions">
              
              <a href="" class="del-subscriber">Delete</a>
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