<?php

	include_once('config.php');
	session_start();

	$user_id = $_SESSION['user_id'];

	$stmt = $pdo->prepare('SELECT * FROM users WHERE user_id=? AND activated=1');
	$stmt->execute([$user_id]);
	$users = $stmt->fetchAll();
	if(count($users) != 1){
		unset($user_id);
		unset($role);
		//session_destroy();
		return;
	}
	$role = $users[0]["role"];
?>