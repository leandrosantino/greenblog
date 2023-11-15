<?php
include './database/database.php';

$header = include './header.php';

$host = $_SERVER['HTTP_HOST'];

if (!isset($_GET['id'])) {
  echo "<script> window.location.replace('http://$host/') </script>";
}

$post_id = $_GET['id'];
$post = get_post_by_id($post_id);

if (!$post) {
  echo "<script> window.location.replace('http://$host/') </script>";
}

$comments = get_comments_by_post_id($post_id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="./assets//small-logo-green.png" type="image/x-icon">
  <link rel="stylesheet" href="/styles/global.css">
  <link rel="stylesheet" href="/styles/posts.css">
  <script src="/scripts/jquery.js"></script>

  <title><?= $post['title'] ?></title>
</head>

<body>
  <?= $header ?>

  <main id="container">

    <div id="content">

      <h1 class="h1"><?= $post['title'] ?></h1>
      <p class="h4" id="subtitle"><?= $post['subtitle'] ?></p>
      <p id="content_body"><?= $post['content'] ?></p>

      <form action="/actions/comment.php" method="post" id="form">

        <input type="text" hidden name="id" value="<?= $post_id ?>">
        <input type="text" hidden name="user_id" id="user_id">

        <textarea name="comment" id="comment_field" cols="30" rows="10" disabled required
          placeholder=Comentário></textarea>
        <div>
          <span>Para adicionar um comentário, primeiro faça login!</span>
          <button id="send_comment_bt" disabled>
            Comentar
            <span class="bi bi-chat-left-dots"></span>
          </button>
        </div>
      </form>

    </div>

    <div id="comments">

      <h5 class="h5">Comentários:</h5>
      <!-- <div></div> -->
      <?php
      if ($comments) {
        foreach ($comments as &$comment) {
          $content = &$comment['content'];
          $username = &$comment['username'];
          $date = &$comment['created_at'];

          $date = &$comment['created_at'];
          $date = new DateTime($date);

          $created_at = calculate_time_diff($date);

          echo <<<HTML

              <div id="comment" >
                <div id="comment_title" >
                  <span>$username</span>  
                  <span class="bi bi-calendar-event"></span>  
                  <span> $created_at</span>    
                </div>
                <p>$content</p>
              </div>

            HTML;
        }
      }
      ?>

    </div>

  </main>

</body>


<script src="/scripts/post.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>