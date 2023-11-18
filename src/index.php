<!-- index-->


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
  <link rel="shortcut icon" href="./assets//small-logo-green.png" type="image/x-icon">
  <link rel="stylesheet" href="./styles/global.css">
  <link rel="stylesheet" href="./styles/home.css">
  <script src="/scripts/jquery.js"></script>
  <title>GreenBlog - Home</title>
</head>

<body>
  <?= $header ?>

  <main id="container">

    <div id="content">
      <?php foreach ($posts as &$post) {

        $title = &$post['title'];
        $content = &$post['content'];
        $content = '"' . substr($content, 0,  310) . '..."';
        $post_id = &$post['post_id'];
        $subtitle = &$post['subtitle'];

        $date = &$post['created_at'];
        $created_at = new DateTime($date);
        $created_at = $created_at->format('d/m/Y');

        echo <<<HTML

            <div id="post" >
              <h1 class="h3">$title</h1>
              <p class="h6">$subtitle</p>
              <!-- <p  >$content</p> -->
              <div>
                <span id="post_date" >$created_at</span>
                <a id="view_more" href="/post.php?id=$post_id">
                    ver mais...
                </a>
              </div>
            </div>

          HTML;
      } ?>

    </div>
  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>