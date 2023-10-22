<?php 
$host = $_SERVER['HTTP_HOST'];

function auth($email, $password){
  global $host;
  $user = get_user_by_email($email);

  $base_location = "http://$host/signin.php";

  if(!$user){
    echo "
      <script>
        window.location.replace('$base_location?erro=usuário%20não%20encontrado')
      </script>
    ";
  }elseif($user['password'] != $password){
    echo "
      <script>
        window.location.replace('$base_location?erro=senha%20inválida')
      </script>
    ";
  }else{
    $session_data = json_encode((object) [
      "userid" => $user["user_id"],
      "username" => $user["username"],
    ]);

    echo "
      <script>
        window.sessionStorage.setItem('green_blog_session', '$session_data')
      </script>
    ";
  }
  
}
