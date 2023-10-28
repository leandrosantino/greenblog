<?php 

include '../database/database.php';

$host = 'http://'.$_SERVER['HTTP_HOST'];

if(!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['username']) ){
  header("Location: $host/signup.php");
  exit();
}

$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];

$user = get_user_by_username($username);

if($user){
  $msg = urlencode("Esse nome de usuário já está sendo utilizado");
  header("Location: $host/signup.php?erro=$msg");
  exit();
}

$user = get_user_by_email($email);

if($user){
  $msg = urlencode("Este email já foi registrado");
  header("Location: $host/signup.php?erro=$msg");
  exit();
}

$resp = create_user((object) [
  'email' => $email,
  'password' => $password,
  'username' => $username
]);

if(!$resp){
  $msg = "Falha ao cadastar usuário";
  header("Location: $host/signup.php?erro=$msg");
  exit();
}

header("Location: $host/signin.php");
exit();