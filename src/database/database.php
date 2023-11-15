<?php

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

	$sql = "--sql
		INSERT INTO comments (post_id, owner_id, content) VALUES (
			$data->post_id,
			$data->user_id,
			'$data->content'
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
		SELECT * FROM posts
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

	$sql = "--sql
		INSERT INTO posts (
		owner_id, title, content, subtitle
	) VALUES (
		'$data->user_id',
		'$data->title',
		'$data->content',
		'$data->subtitle'
		
	)
	";

	$query = $db->prepare($sql);
	$query = $query->execute();

	return $query;
}


function calculate_time_diff(DateTime $date)
{
	$timezone = new DateTimeZone('America/Sao_Paulo');
	$now = new DateTime('now', $timezone);

	$diff = $now->diff($date);


	$text_diff = 'há ' . $diff->d . ' dias';

	if ($diff->d > 7) {
		$text_diff = $date->format('d/m/Y');
	}
	if ($diff->d == 7) {
		$text_diff = 'há 1 sem';
	}
	if ($diff->d <= 1) {
		$text_diff = 'há ' . $diff->h . ' h';
	}
	if ($diff->h <= 1) {
		$text_diff = 'há ' . $diff->i . ' min';
	}
	if ($diff->i <= 1) {
		$text_diff = 'agora';
	}

	return $text_diff;
}
