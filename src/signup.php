<?php
$email_erro = '';
$user_erro = '';
if (isset($_GET['email-erro'])) {
  $email_erro = $_GET['email-erro'];
}
if (isset($_GET['user-erro'])) {
  $user_erro = $_GET['user-erro'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./assets//small-logo-green.png" type="image/x-icon">
  <link rel="stylesheet" href="../../styles/global.css">
  <link rel="stylesheet" href="../../styles/login.css">
  <title>GreenBlog - Cadastro</title>
</head>

<body>
  <section>
    <span>
      Um lugar mais verde na Internet
    </span>
    <div>
      <img src="../../assets/tree.png" alt="tree">
    </div>
  </section>
  <section>
    <img id="logo_green" src="../../assets/logo-green.png" alt="tree">


    <form id="login_form" method="post" action="/actions/create_user.php">
      <h1>Cadastre-se</h1>
      <div>
        <label for="name">Nome:</label>
        <input type="text" id="name" name="username" required>
        <span><?= $user_erro ?></span>
      </div>
      <div>
        <label for="">Email:</label>
        <input type="email" id="email" name="email" required>
        <span><?= $email_erro ?></span>
      </div>
      <div>
        <label for="">Senha:</label>
        <input type="password" id="password" name="password" required>
        <span></span>
      </div>
      <a href="/signin.php">Já tem uma conta? Faça Login</a>

      <button>
        <span id="login_icon" class="bi bi-box-arrow-in-left"></span>
        Cadastrar
      </button>
      <span>&copy;techSoluctions</span>
    </form>

  </section>
</body>

</html>