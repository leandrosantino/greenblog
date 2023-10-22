<?php

const DATABASE_PATH = __DIR__."/app.db";

$db = new PDO("sqlite:".DATABASE_PATH);

function get_user_by_email($email){
  global $db;
  $sql = "--sql
		SELECT * FROM user WHERE email = '$email'
	";

  $query = $db->prepare($sql);
	$query->execute();
  $query = $query->fetch(PDO::FETCH_ASSOC);
  
  if(!$query){
    return false;
  }
  
  return $query;

}

function create_user($data) {
  global $db;
	$sql = "--sql
		INSERT INTO user (
      email, password, username
    ) VALUES (
			'{$data->email}',
			'{$data->password}',
			'{$data->username}'
		)
	";

	$query = $db->prepare($sql);
	$query->execute();
	
	if(!$query){
		return json_encode(["error" => "insert failure"]);
	}
	return json_encode(["data" => $data]);
}

function get_users(PDO $db){
  global $db;
	$sql = "--sql
		SELECT * FROM user
	";
	
	$query = $db->prepare($sql);
	$query->execute();
	$query = $query->fetchAll(PDO::FETCH_ASSOC);

	return json_encode(["data" => $query]);
}
	
