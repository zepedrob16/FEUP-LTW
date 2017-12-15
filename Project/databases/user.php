<?php
include_once('includes/session.php');

/**
 *  Creates a new account (only if it already isn't on the database).
 *  Hashes the provided password.
**/

function new_account($username, $password, $first_name, $last_name, $email) {
	global $dbh;
    $stmt = $dbh->prepare('INSERT INTO User VALUES (?, ?, ?, ?)');
    $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT), $first_name . " " . $last_name, $email));

    $stmt = $dbh->prepare('INSERT INTO Image(name, extension, size, last_modified, username) VALUES (?, ?, ?, ?, ?)');
    return $stmt->execute(array('default-avatar.png', 'image/png', '0', '0', $username));
}

# Tries to match login credentials on the database.
function is_login_correct($username, $password) {
	global $dbh;
	$stmt = $dbh->prepare('SELECT password FROM User WHERE username = ?');
 	$stmt->execute(array($username));
  	$array_info = $stmt->fetch();
  	return password_verify($password, implode(',', $array_info));
}

# Enables current session.
function set_current_user($username) {
	$_SESSION['username'] = $username;
}

function check_existing_user($username){
	global $dbh;
	$stmt = $dbh->prepare('SELECT * FROM USER');
	$stmt->execute();
	while($row = $stmt->fetch()) {
		if ($row['username'] == $username) {
			return false;
		}
	}
	return true;
}

function check_existing_email($email) {
	global $dbh;
	$stmt = $dbh->prepare('SELECT * FROM USER');
	$stmt->execute();
	while($row = $stmt->fetch()) {
		if ($row['email'] == $email) {
			return false;
		}
	}
	return true;
}

function check_password($password, $confirm_pw) {
	if ($password != $confirm_pw){
		return false;
	}
	return true;
}

?>
