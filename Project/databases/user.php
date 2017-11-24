<?php

function new_account($username, $password) {
	global $dbh;
    $stmt = $dbh->prepare('INSERT INTO users (username, password) VALUES (? , ?)');
    return $stmt->execute(array($username, $password));
}
function is_login_correct($username, $password) {
	global $dbh;
	$stmt = $dbh->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
 	$stmt->execute(array($username, $password));
  	return $stmt->fetch() !== false;
}

?> 	