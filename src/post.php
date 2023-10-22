<?php 
  $host = $_SERVER['HTTP_HOST'];
  include './components/header.php';

  $post_id = '';
  if(isset($_GET['id'])){
    $post_id = $_GET['id'];
  }else{
    echo "
      <script>
        window.location.replace('http://$host/')
      </script>
    ";
  }

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
      <h1>post</h1>
      <p>Lorem ipsum, dolor adipisicing elit. Est deserunt nostrum doloribus, saepe modi </p>
      <form action="/scripts/comment.php" method="post">
        <input type="text" hidden name="id" value="<?=$post_id?>">
        <input type="text" hidden name="user_id" id="user_id">
        <textarea name="comment" id="comment_field" cols="30" rows="10" disabled ></textarea>
        <button id="send_comment_bt"  disabled >Enviar</button>
      </form>
    </div>


  </main>

</body>
<script src="/scripts/post.js" ></script>

</html>