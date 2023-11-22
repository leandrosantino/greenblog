<?php

date_default_timezone_set('America/Sao_Paulo');

const DATABASE_PATH = __DIR__ . "/app.db";

$db = new PDO("sqlite:" . DATABASE_PATH);

function get_user_by_email($email)
{
	global $db;
	$sql = "--sql
		SELECT * FROM user WHERE email = '$email'
	";

	$query = $db->prepare($sql);
	$query->execute();
	$query = $query->fetch(PDO::FETCH_ASSOC);

	if (!$query) {
		return false;
	}

	return $query;
}

function get_user_by_username($username)
{
	global $db;
	$sql = "--sql
		SELECT * FROM user WHERE username = '$username'
	";

	$query = $db->prepare($sql);
	$query->execute();
	$query = $query->fetch(PDO::FETCH_ASSOC);

	if (!$query) {
		return false;
	}

	return $query;
}

function create_user($data)
{
	global $db;

	$sql = "--sql
		INSERT INTO user (
		email, password, username, isAdmin
	) VALUES (
			'$data->email',
			'$data->password',
			'$data->username',
			FALSE
		)
	";

	$query = $db->prepare($sql);
	$query = $query->execute();

	return $query;
}

function get_users()
{
	global $db;
	$sql = "--sql
		SELECT * FROM user
	";

	$query = $db->prepare($sql);
	$query->execute();
	$query = $query->fetchAll(PDO::FETCH_ASSOC);

	return json_encode(["data" => $query]);
}

function create_comment($data)
{
	global $db;

	$created_at = new DateTime();
	$created_at = $created_at->format('Y-m-d H:i:s');

	$sql = "--sql
		INSERT INTO comments (post_id, owner_id, content, created_at) VALUES (
			$data->post_id,
			$data->user_id,
			'$data->content',
			'$created_at'
		)
	";

	$query = $db->prepare($sql);
	$query->execute();

	if (!$query) {
		return false;
	}
	return $data;
}

function get_comments_by_post_id(String $post_id)
{
	global $db;
	$sql = "--sql
		SELECT comments.*, user.username 
		FROM comments, user 
		WHERE user.user_id = comments.owner_id AND post_id = '$post_id'
		ORDER BY comments.created_at DESC
	";

	$query = $db->prepare($sql);
	$query->execute();
	$query = $query->fetchAll(PDO::FETCH_ASSOC);

	if (!$query) {
		return false;
	}

	return $query;
}

function get_all_posts()
{
	global $db;

	$sql = "--sql
		SELECT * FROM posts ORDER BY created_at DESC
	";

	$query = $db->prepare($sql);
	$query->execute();
	$query = $query->fetchAll(PDO::FETCH_ASSOC);

	return $query;
}

function get_post_by_id(String $id)
{
	global $db;
	$sql = "--sql
		SELECT * FROM posts WHERE post_id = '$id'
	";

	$query = $db->prepare($sql);
	$query->execute();
	$query = $query->fetch(PDO::FETCH_ASSOC);

	if (!$query) {
		return false;
	}

	return $query;
}

function get_comments_by_user_id(String $id)
{
	global $db;
	$sql = "--sql
		SELECT comments.*, posts.title, posts.post_id 
		FROM comments 
		INNER JOIN posts 
		ON comments.post_id = posts.post_id 
		WHERE comments.owner_id = '$id'
		ORDER BY comments.created_at DESC
	";

	$query = $db->prepare($sql);
	$query->execute();
	$query = $query->fetchAll(PDO::FETCH_ASSOC);

	if (!$query) {
		return false;
	}

	return $query;
}

function create_post($data)
{
	global $db;

	$created_at = new DateTime();
	$created_at = $created_at->format('Y-m-d H:i:s');

	$sql = "--sql
		INSERT INTO posts (
		owner_id, title, content, subtitle, created_at
	) VALUES (
		'$data->user_id',
		'$data->title',
		'$data->content',
		'$data->subtitle',
		'$created_at'
	)
	";

	$query = $db->prepare($sql);
	$query = $query->execute();

	return $query;
}


function calculate_time_diff(String $date_str)
{

	$now = new DateTime('now');
	$date = new DateTime($date_str);
	$diff = $now->diff($date);

	$days = $diff->days;
	$hours = $diff->h;
	$minutes = $diff->i;

	if ($days > 7) {
		return $date->format('d/m/Y');
	}

	if ($days == 7) {
		return 'Há 1 sem';
	}

	if ($days >= 1) {
		return 'Há ' . $days . ' d';
	}

	if ($days == 0 && $hours > 1 && $minutes >= 0) {
		return 'Há ' . $hours . ' h';
	}

	if ($days == 0 && $hours <= 1 && $minutes >= 1) {
		return 'Há ' . $minutes . ' min';
	}

	if ($days == 0 && $hours == 0 && $minutes == 0) {
		return 'Agora';
	}

	return '';
}

function get_favorite(String $post_id, String $user_id)
{
	global $db;

	$sql = "--sql
		SELECT * FROM favorite WHERE user_id = '$user_id' AND post_id= '$post_id'
	";

	$query = $db->prepare($sql);
	$query->execute();
	$query = $query->fetchAll(PDO::FETCH_ASSOC);

	return $query;
}

function create_favorite(String $post_id, String $user_id)
{
	global $db;

	$sql = "--sql
		INSERT INTO favorite VALUES ('$user_id','$post_id')
	";

	$query = $db->prepare($sql);
	$query = $query->execute();

	return $query;
}

function delete_favorite(String $post_id, String $user_id)
{
	global $db;

	$sql = "--sql
		DELETE FROM favorite WHERE user_id = '$user_id' AND post_id= '$post_id'
	";

	$query = $db->prepare($sql);
	$query = $query->execute();

	return $query;
}

function get_favorite_posts($user_id)
{
	global $db;

	$sql = "--sql
		SELECT posts.* 
		FROM favorite 
		INNER JOIN posts 
		ON favorite.post_id = posts.post_id
		WHERE favorite.user_id = '$user_id'
		ORDER BY created_at DESC
	";

	$query = $db->prepare($sql);
	$query->execute();
	$query = $query->fetchAll(PDO::FETCH_ASSOC);

	return $query;
}
