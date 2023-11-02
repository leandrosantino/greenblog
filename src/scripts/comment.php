<?php 

include '../database/database.php';

$host = $_SERVER['HTTP_HOST'];

if(!isset($_POST['id']) || !isset($_POST['comment']) || !isset($_POST['user_id'])){
  header("Location: http://$host/"); exit();
}

$post_id = $_POST['id'];
$user_id = $_POST['user_id'];
$content = $_POST['comment'];

$resp = create_comment((object) [
  'post_id' => $post_id,
  'user_id' => $user_id,
  'content' => $content
]);

if(!$resp){
  header("Location: http://$host/"); exit();
}


header("Location: http://$host/post.php?id=$post_id"); exit();