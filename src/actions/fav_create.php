<?php

include '../database/database.php';
header('Content-Type: application/json; charset=utf-8');

if (isset($_GET['user_id_fav']) && isset($_GET['post_id'])) {
  $post_id = $_GET['post_id'];
  $user_id_fav = $_GET['user_id_fav'];

  $resp = false;

  $is_fav = count(get_favorite($post_id, $user_id_fav));
  if ($is_fav > 0) {
    $resp = delete_favorite($post_id, $user_id_fav);
    echo json_encode((object) [
      "is_fav" => $is_fav,
      "a" => "sss",
      "success" => $resp
    ]);
  } else {
    $resp = create_favorite($post_id, $user_id_fav);
    echo json_encode((object) [
      "is_fav" => $is_fav,
      "a" => "gggg",
      "success" => $resp
    ]);
  }
}
