<?php
include_once('includes/session.php');

# Creates a new account (only if it already isn't on the database).
function new_account($username, $password, $first_name, $last_name, $email) {

	if(check_existing_user($username)) {
		global $dbh;
    	$stmt = $dbh->prepare('INSERT INTO User VALUES (?, ?, ?, ?)');
    	return $stmt->execute(array($username, $password, $first_name . " " . $last_name, $email));
	}
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