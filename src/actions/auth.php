<?php 

include '../database/database.php';

$host = 'http://'.$_SERVER['HTTP_HOST'];

if(!isset($_POST['email']) || !isset($_POST['password'])){
  header("Location: $host/signin.php");
  exit();
}

$email = $_POST['email'];
$password = $_POST['password'];
$user = get_user_by_email($email);

if(!$user){

  header("Location: $host/signin.php?erro=usuário%20não%20encontrado");
  exit();

}elseif($user['password'] != $password){

  header("Location: $host/signin.php?erro=senha%20inválida");
  exit();

}else{

  $session_data = json_encode((object) [
    "userid" => $user["user_id"],
    "username" => $user["username"],
  ]);

  echo "
    <script>
      window.sessionStorage.setItem('green_blog_session', '$session_data')
      window.location.replace('$host')
    </script>
  ";

}
