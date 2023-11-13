<?php

include '../database/database.php';

$host = 'http://' . $_SERVER['HTTP_HOST'];

if (!isset($_POST['email']) || !isset($_POST['password'])) {
  header("Location: $host/signin.php");
  exit();
}

$email = $_POST['email'];
$password = $_POST['password'];
$user = get_user_by_email($email);

if (!$user) {
  $msg = urlencode("usuário não encontrado!");
  header("Location: $host/signin.php?email-erro=$msg");
  exit();
} elseif ($user['password'] != $password) {
  $msg = urlencode("senha inválida!");
  header("Location: $host/signin.php?pass-erro=$msg");
  exit();
} else {

  $session_data = json_encode((object) [
    "userid" => $user["user_id"],
    "username" => $user["username"],
    "isAdmin" => $user['isAdmin'],
  ]);

  echo <<<HTML
    <script>
      window.localStorage.setItem('theme', 'ligth')
      window.sessionStorage.setItem('green_blog_session', '$session_data')
      window.location.replace('$host')
    </script>
  HTML;
}
