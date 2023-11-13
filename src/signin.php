<?php
$email_erro = '';
$pass_erro = '';
if (isset($_GET['email-erro'])) {
  $email_erro = $_GET['email-erro'];
}
if (isset($_GET['pass-erro'])) {
  $pass_erro = $_GET['pass-erro'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="./assets//small-logo-green.png" type="image/x-icon">
  <link rel="stylesheet" href="/styles/global.css">
  <link rel="stylesheet" href="/styles/login.css">
  <title>GreenBlog - Login</title>
</head>

<body>
  <main>
    <section>
      <span>
        Um lugar mais verde na Internet
      </span>
      <div>
        <img src="/assets/tree.png" alt="tree">
      </div>
    </section>
    <section>
      <a href="/" id="logo_green">
        <!-- <img  src="/assets/logo-green.png" alt="tree"> -->
      </a>
      <form id="login_form" action="/actions/auth.php" method="post">
        <h1>Login</h1>
        <div>
          <label for="">Email:</label>
          <input type="email" name="email" required>
          <span><?= $email_erro ?></span>
        </div>
        <div>
          <label for="">Senha:</label>
          <input type="password" name="password" required>
          <span><?= $pass_erro ?></span>
        </div>
        <a href="/signup.php">Inscrever-se</a>

        <button>
          <span id="login_icon" class="bi bi-box-arrow-in-left"></span>
          Entrar
        </button>
        <span>&copy;tech_soluctions</span>
      </form>

    </section>
  </main>
  <script src="/scripts/theme.js"></script>
</body>

</html>