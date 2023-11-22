<?php

include '../database/database.php';

$host = 'http://' . $_SERVER['HTTP_HOST'];

if (!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['username'])) {
  header("Location: $host/signup.php");
  exit();
}

$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];

$user = get_user_by_username($username);

if ($user) {
<<<<<<< HEAD
  $msg = urlencode("Esse nome de usuário já existe!");
=======
  $msg = urlencode("esse nome de usuário já está sendo utilizado!");
>>>>>>> master
  header("Location: $host/signup.php?user-erro=$msg");
  exit();
}

$user = get_user_by_email($email);

if ($user) {
<<<<<<< HEAD
  $msg = urlencode("Este email já foi registrado!");
=======
  $msg = urlencode("este email já foi registrado!");
>>>>>>> master
  header("Location: $host/signup.php?email-erro=$msg");
  exit();
}

$resp = create_user((object) [
  'email' => $email,
  'password' => $password,
  'username' => $username
]);

if (!$resp) {
<<<<<<< HEAD
  $msg = "Falha ao cadastrar usuário";
=======
  $msg = "Falha ao cadastar usuário";
>>>>>>> master
  header("Location: $host/signup.php?erro=$msg");
  exit();
}

header("Location: $host/signin.php");
exit();
