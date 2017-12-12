<?php

include_once('../includes/session.php');

# Creates a new account (only if it already isn't on the database).
function new_account($username, $password, $first_name, $last_name, $email) {
	global $dbh;
    $stmt = $dbh->prepare('INSERT INTO User VALUES (?, ?, ?, ?)');
    return $stmt->execute(array($username, $password, $first_name . " " . $last_name, $email));
}

# Tries to match login credentials on the database.
function is_login_correct($username, $password) {
	global $dbh;
	$stmt = $dbh->prepare('SELECT * FROM User WHERE username = ? AND password = ?');
 	$stmt->execute(array($username, $password));
  	return $stmt->fetch() !== false;
}

# Enables current session.
function set_current_user($username) {
	$_SESSION['username'] = $username;
}

?> 	