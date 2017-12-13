<?php
include_once('includes/session.php');

// Gets projects associated with username.
function get_projects($username) {
	global $dbh;
	$stmt = $dbh->prepare("SELECT title FROM Project WHERE username = ?");
	$stmt->execute(array($username));
	$array_info = $stmt->fetch();
	echo implode(',', $array_info);
}

function get_filters($username) {
	global $dbh;
	$stmt = $dbh->prepare("SELECT tags FROM List WHERE username = ?");
	$stmt->execute(array($username));
	$array_info = $stmt->fetch();
	echo implode(',', $array_info);
}

?>