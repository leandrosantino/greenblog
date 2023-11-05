<?php 
  include './components/header.php';
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

    <form action="/scripts/create_post.php" method="post">

      <input type="text" name="user_id" hidden id="user_id" >

      <label for="title">Título:</label>
      <input name="title" id="title" type="text"  required/>

      <label for="content">Conteúdo:</label>
      <textarea name="content" id="content" cols="30" rows="10" required></textarea>

      <button type="submit" >Postar</button>

    </form>

  </main>

</body>
<script src="/scripts/create_post.js" ></script>
</html>