<?php 
  include './components/header.php';
  include './database/database.php';

  $posts = get_all_posts();
  
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/global.css">
  <script src="/scripts/jquery.js" ></script>
  <title>Home</title>
</head>

<body>
  <?=get_header()?>

  <main id="main_home">

    <?php
      foreach ($posts as &$post){

        $title = &$post['title'];
        $content = &$post['content'];
        $post_id = &$post['post_id'];

        echo "
          <div>
            <h1>$title</h1>
            <p>$content</p>
            <a href=\"/post.php?id=$post_id\">
              ver mais...
            </a>
          </div>
        ";
      }
    ?>

  </main>

</body>

</html>
