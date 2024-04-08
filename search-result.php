<?php
if(!$_POST['search-query']) header('Location: http://localhost/blog/');
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="blog, entertainment, sport, lifestyle, coding, program">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/dad8ebce2d.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/posts.css">
  <script src="js/http.js" defer></script>
  <title>xblog || #1 blog in Nigeria || post</title>
</head>
<body>

<?php include __DIR__ . '/header.php'; ?>
  <main>

    <section>
      <h2>Search result(s):</h2>
      <input type="hidden" value="<?= $_POST['search-query'] ?>" id="search-query">
      <ul class="search-el"></ul>

      <div class="prev-next-btn">
      </div>
      
    </section>
    
  </main>

<?php include __DIR__ . '/footer.php'; ?>
<div class="loader"></div>
  <script src="js/script.js"></script>
</body>
</html>