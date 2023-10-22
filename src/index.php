<?php 
  include './components/header.php';
  include './database/database.php';
  include './scripts/auth.php';

  if(isset($_POST['email']) && isset($_POST['password'])){
    auth($_POST['email'], $_POST['password']);
  }
  
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/global.css">
  <title>Home</title>
</head>

<body>
  <?=get_header()?>

  <main id="main_home">
    <!-- Colocar o conteúdo da página aqui https://github.com/ossu/computer-science#advanced-math -->
    <div>
      <h1>post</h1>
      <p>Lorem ipsum, dolor adipisicing elit. Est deserunt nostrum doloribus, saepe modi </p>
      <a href="/post.php?id=aiusdpfiuasdigf">
        ver mais...
      </a>
    </div>

  </main>

</body>

</html>
