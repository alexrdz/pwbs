<?php if (!isAjax()): ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/styles/styles.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600&display=swap" rel="stylesheet">

  <script src="/scripts/unpoly.js"></script>
  <script src="/scripts/bundle.js"></script>
</head>
<body>
  <div class="content p-2">
    <?php include 'partials/nav.partial.php'; ?>
    <?php include 'partials/auth.partial.php'; ?>
  </div>
<?php endif; // !isAjax ?>


  <div class="content p-2">
    <?= $content ?>
  </div>



  <?php if (!isAjax()): ?>

  <?php
  $is_playlist = str_contains($uri, '/playlists/');
  if ($is_playlist)
    echo '<script src="/scripts/pl.js"></script>';
  ?>
</body>
</html>
<?php endif; ?>
