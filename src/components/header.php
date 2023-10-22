<?php 

    function get_header(){
        return '
            <header>
                <div>
                    <img id="logo-white" src="/assets/logo-white.png" alt="logo-white">
                </div>
                <div>
                    <nav>
                        <a href="/">Home</a>
                        <a href="">Conteúdos</a>
                        <a href="">Temas</a>
                    </nav>
                </div>
                <div id="user_case" >   
                    <a id="login_link" href="signin.php" >Entrar</a>
                </div>
            </header>
            <script src="/scripts/header.js" ></script>
        ';
    }
        
?>

