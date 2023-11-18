<!-- header-->

<?php
return <<<HTML
  <link rel="stylesheet" href="./styles/header.css">
  <header>
    <div>
      <a href="/" id="logo-white">
        <!-- <img  src="/assets/logo-white.png" alt="logo-white"> -->
      </a>    
    </div>
    <div  >   
      <button id="theme_button" class="dropdown-item" ></button> 
      <div id="user_case">
        <a href="signin.php" >
          <button id="login_link">
            <span id="login_icon" class="bi bi-box-arrow-in-left"></span>
            <span>Entrar</span>
          </button>
        </a>
      </div>
    </div>
  </header>
  <script src="/scripts/header.js" ></script>
  <script src="/scripts/theme.js" ></script>
 
HTML;
?>

<!-- <nav>
    <a href="/">Home</a>
    <a href="">Conteúdos</a>
    <a href="">Temas</a>
</nav> -->