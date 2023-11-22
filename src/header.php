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
    <nav>
      <!-- <a href="#">Sobre</a>
      <a href="/">Recentes</a>
      <a href="#">Relevantes</a> -->
    </nav>  
    <div>   
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