<?php
include './database/database.php';
$header = include './header.php';

if (!isset($_POST['user_id'])) {
  $host = 'http://' . $_SERVER['HTTP_HOST'];
  header("Location: $host");
  exit();
}

$user_id = $_POST['user_id'];
$post_id = 1;

$comments = get_comments_by_user_id($user_id);

// var_dump($comments);
// exit();

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./assets//small-logo-green.png" type="image/x-icon">
  <link rel="stylesheet" href="./styles/global.css">
  <link rel="stylesheet" href="./styles/posts.css">
  <script src="/scripts/jquery.js"></script>
  <title>GreenBlog - Home</title>
</head>

<body>
  <?= $header ?>

  <main id="container">
    <div id="comments">

      <h5 class="h5">Meus comentários:</h5>
      <?php
      if ($comments) {
        foreach ($comments as &$comment) {
          $content = &$comment['content'];
          $title = &$comment['title'];
          $post_id = &$comment['post_id'];

          $date = &$comment['created_at'];
          $created_at = calculate_time_diff($date);

          echo <<<HTML
            <div id="comment">
              <a href="/post.php?id=$post_id">
                <div id="comment_title">
                  <span>Post: $title</span>
                  <span class="bi bi-calendar-event"></span>
                  <span>$created_at</span>
                </div>
              </a>
              <p>$content</p>
            </div>

          HTML;
        }
      }
      ?>



    </div>
  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>