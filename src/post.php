<?php 
  include './database/database.php';
  include './components/header.php';

  $host = $_SERVER['HTTP_HOST'];

  if(!isset($_GET['id'])){
    echo "<script> window.location.replace('http://$host/') </script>";
  }

  $post_id = $_GET['id'];
  $post = get_post_by_id($post_id);

  if(!$post){
    echo "<script> window.location.replace('http://$host/') </script>";
  }

  $comments = get_comments_by_post_id($post_id);

  // var_dump($comments); exit();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/global.css">
  <script src="/scripts/jquery.js" ></script>
  <title>Post</title>
</head>
<body>
  <?=get_header()?>

  <main>

    <div>
      <h1><?=$post['title']?></h1>
      <p><?=$post['content']?></p>
      <form action="/scripts/comment.php" method="post">
        <input type="text" hidden name="id" value="<?=$post_id?>">
        <input type="text" hidden name="user_id" id="user_id">
        <textarea name="comment" id="comment_field" cols="30" rows="10" disabled required></textarea>
        <button id="send_comment_bt"  disabled >Enviar</button>
      </form>
    </div>
    <div>

      <?php 
        if($comments){
          foreach($comments as &$comment){
            $content = &$comment['content'];
            $username = &$comment['username'];
            $date = &$comment['created_at'];
            echo "
              <div>
                <span>$username</span>    
                <span>$date</span>    
                <p>$content</p>
              </div> <br>
            ";
          } 
        }
      ?>

    </div>

  </main>

</body>
<script src="/scripts/post.js" ></script>

</html>