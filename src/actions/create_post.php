<?php 

include '../database/database.php';

$host = 'http://'.$_SERVER['HTTP_HOST'];

if(!isset($_POST['user_id']) || !isset($_POST['title']) || !isset($_POST['content']) ){
  header("Location: $host/create_post.php");
  exit();
}