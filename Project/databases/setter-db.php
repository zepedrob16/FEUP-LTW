<?php
include_once('../includes/session.php');

$function = $_POST['function'];
$session_username = $_SESSION['username'];

// Uploads a profile pic to a given username.
if ($function == 'upload_file') {
	global $dbh;
	$stmt = $dbh->prepare("SELECT id FROM Image WHERE username = ?");
	return $stmt->execute(array($session_username));
}

?>