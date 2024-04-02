<?php 
      require './script/login_session.php';
      include __DIR__ .'/script/index_script.php';
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
        Blog management / Admin / <span>Dashboard</span> 
      </div>
    </div>

    <section class="wrapper">
      <div class="report-card">
        <div class="card">
          <h4>Posts</h4>
        <div class="stats">
          <div class="count">
            <?= $postCounts ?? 0 ?>
          </div>
          <i class="fa-regular fa-file-lines"></i>
        </div>
        </div>
        <div class="card">
          <h4>View</h4>
        <div class="stats">
          <div class="count">6</div>
          <i class="fa-regular fa-file-lines"></i>
        </div>
        </div>
        <div class="card">
          <h4>Comments</h4>
        <div class="stats">
          <div class="count">
            <?= $commentCounts ?? 0 ?>
          </div>
          <i class="fa-regular fa-file-lines"></i>
        </div>
        </div>
        <div class="card">
          <h4>Subscriber</h4>
        <div class="stats">
          <div class="count">6</div>
          <i class="fa-regular fa-file-lines"></i>
        </div>
        </div>
      </div>
    </section>
  </main>
</div>
  
<div class="loader"></div>
</body>
</html>