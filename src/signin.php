<?php 
    $erro = '';
    if(isset($_GET['erro'])){
        $erro = $_GET['erro'];
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/global.css">
  <link rel="stylesheet" href="/styles/login.css">
  <title>Home</title>
</head>

<body>
    <section>
        <span>
            Um lugar mais verde na Internet
        </span>
        <div>
            <img src="/assets/tree.png" alt="tree">
        </div>
    </section>
    <section>
        <img id="logo_green" src="/assets/logo-green.png" alt="tree">
        

        <form id="login_form" action="/scripts/auth.php" method="post">
            <h1>Login</h1>
            <div>
                <label for="">Email:</label>
                <input type="email" name="email" required >
            </div>
            <div>
                <label for="">Senha:</label>
                <input type="password" name="password" required>
            </div>
            <a href="/signup.php">cadastrar-se</a>
            <span><?=$erro?></span>
            <button>Entrar</button>
            <span>&copy;techSoluctions</span>
        </form>
        
    </section>
</body>

</html>