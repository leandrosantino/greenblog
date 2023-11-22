<!-- signin -->


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
  <link rel="stylesheet" href="/styles/signin_header.css">
  <title>GreenBlog - Login</title>
</head>

<body>
  <main>
    <section>
      <header id="main">
        <a href="/" id="logo_green"></a>
        <button id="theme_button">
          <span class="bi bi-sun"></span>
        </button>
      </header>
      <form id="login_form" action="/actions/auth.php" method="post">
        <h1>Login</h1>
        <div>
          <label for="">Email:</label>
          <input type="email" name="email" required>
          <span><?= $email_erro ?></span>
        </div>
        <div>
          <label for="">Senha:</label>
          <div id="passInputCase">
            <input type="password" name="password" required>
            <div id="CaseButton">
              <i class="fas fa-eye" id="PasswordButton" onclick="togglePW()" aria-hidden="true"></i>
            </div>
          </div>
          <span>
            <?= $pass_erro ?>
          </span>
        </div>
        <a href="/signup.php">Inscrever-se</a>

        <button>
          <span id="login_icon" class="bi bi-box-arrow-in-left"></span>
          Entrar
        </button>
        <span>&copy;tech_soluctions</span>
      </form>

    </section>
    <section>
      <span>
        Um lugar mais verde na Internet
      </span>
      <div>
        <img src="/assets/tree.png" alt="tree">
      </div>
    </section>
  </main>
  <script src="/scripts/jquery.js"></script>
  <script src="/scripts/theme.js"></script>
  <script src="scripts/passwordvis.js"></script>
  <script src="https://kit.fontawesome.com/3086f3a53a.js" crossorigin="anonymous"></script>
</body>

</html>