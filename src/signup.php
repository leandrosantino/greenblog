<!-- signup.php -->

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
  <script src="scripts/passwordvis.js"></script>
  <script src="https://kit.fontawesome.com/3086f3a53a.js" crossorigin="anonymous"></script>
  <title>GreenBlog - Cadastro</title>
</head>

<body>
  <main>
    <section>
      <a href="/" id="logo_green"></a>
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
          <span>
          <i class="fas fa-eye" id="PasswordButton" onclick="togglePW()" aria-hidden="true"></i>
          </span>
        </div>
        <a href="/signin.php">Já tem uma conta? Faça Login</a>

        <button>
          <span id="login_icon" class="bi bi-box-arrow-in-left"></span>
          Cadastrar
        </button>
        <span>&copy;techSoluctions</span>
      </form>

    </section>
    <section>
      <span>
        Um lugar mais verde na Internet
      </span>
      <div>
        <img src="../../assets/tree.png" alt="tree">
      </div>
    </section>
  </main>
  <script src="/scripts/theme.js"></script>
</body>


</html>