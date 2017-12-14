<?php
require_once('includes/session.php');

$function = $_POST['function'];
$session_username = $_SESSION['username']; 

// Uploads a profile pic to a given username.
if ($function == 'upload_file') {
	global $dbh;
	copy($_POST['raw'], 'resources/avatars/' . $_POST['name']); // Store new avatar on local server.

	$stmt = $dbh->prepare("UPDATE Image SET name = ?, extension = ?, size = ?, last_modified = ? WHERE username = ?");
	return $stmt->execute(array($_POST['name'], $_POST['extension'], $_POST['size'], $_POST['last_modified'], $session_username));
}

else if ($function == 'init_list') {
	global $dbh;
	$stmt = $dbh->prepare("INSERT INTO List(username, title, creation_date, priority, tags) VALUES (?, ?, ?, ?, ?)");
	return $stmt->execute(array($session_username, '', date('Y/m/d'), 1, ''));
}

else if ($function == 'update_title') {
	global $dbh;
	$stmt = $dbh->prepare("UPDATE List SET title = ?");
	return $stmt->execute(array($_POST['title']));
}

/*else if ($function == 'add_bulletpoint') {
	global $dbh;
	$title = $_POST['title'];

	$stmt = $dbh->prepare('INSERT INTO Bulletpoint VALUES (?, '', 0, ?)');
	return $stmt->execute(array(5, 'admin', $title, '2017/12/12', 3, 'food'));
}*/

?>