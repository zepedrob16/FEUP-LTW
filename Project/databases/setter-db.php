<?php
include_once('includes/session.php');

// Uploads a profile pic to a given username.
function set_profile_pic($id, $name, $extension, $username) {
	global $dbh;
	$stmt = $dbh->prepare("INSERT INTO Image (?, ?, ?, ?)");
	return $stmt->execute(array($username, $image));
}

?>