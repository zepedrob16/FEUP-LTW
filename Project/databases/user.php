<?php

include_once('includes/session.php');

function new_account($username, $password, $firstName, $lastName, $email) {
	global $dbh;
    $stmt = $dbh->prepare('INSERT INTO users (username, password, email, name) VALUES (? , ?, ?, ?)');
    return $stmt->execute(array($username, $password, $email, $firstName . " " . $lastName));
}
function is_login_correct($username, $password) {
	global $dbh;
	$stmt = $dbh->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
 	$stmt->execute(array($username, $password));
  	return $stmt->fetch() !== false;
}

function set_current_user($username) {
	$_SESSION['username'] = $username;
}

?> 	