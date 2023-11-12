<?php
include './database/database.php';
$header = include './header.php';
$posts = get_all_posts();
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/global.css">
  <script src="/scripts/jquery.js"></script>
  <title>Home</title>
</head>

<body>
  <?= $header ?>

  <main id="main_home">

    <?php
    foreach ($posts as &$post) {

      $title = &$post['title'];
      $content = &$post['content'];
      $post_id = &$post['post_id'];

      echo <<<HTML

          <div>
            <h1>$title</h1>
            <p>$content</p>
            <a href="/post.php?id=$post_id">
              ver mais...
            </a>
          </div>

        HTML;
    }
    ?>

  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>