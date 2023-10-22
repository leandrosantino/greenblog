<?php 
$host = $_SERVER['HTTP_HOST'];

if(isset($_POST['id']) && isset($_POST['comment'])){
  $id = $_POST['id'];
  $comment = $_POST['comment'];

  


  header("Location: http://$host/post.php?id=$id");
  exit();
}
