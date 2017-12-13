<?php
require_once('includes/session.php');

$function = $_POST['function'];
$session_username = $_SESSION['username']; 

// Uploads a profile pic to a given username.
if ($function == 'upload_file') {
	global $dbh;
	$stmt = $dbh->prepare("UPDATE Image SET name = ?, extension = ?, size = ?, last_modified = ? WHERE username = ?");
	return $stmt->execute(array($_POST['name'], $_POST['extension'], $_POST['size'], $_POST['last_modified'], $session_username));
}

?>