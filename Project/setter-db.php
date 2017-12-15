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

else if ($function == 'update_user') {
	global $dbh;
	$stmt = $dbh->prepare("UPDATE User SET password = ?, name = ?, email = ? WHERE username = ?");
	return $stmt->execute(array(password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['name'], $_POST['email'], $session_username));
}

else if ($function == 'init_list') {
	global $dbh;
	$stmt = $dbh->prepare("INSERT INTO List(username, title, creation_date, priority, tags) VALUES (?, ?, ?, ?, ?)");
	return $stmt->execute(array($session_username, $_POST['title'], date('Y/m/d'), 1, ''));
}

else if ($function == 'delete_list') {
	global $dbh;
	$stmt = $dbh->prepare("DELETE FROM List WHERE id_list = ?");
	return $stmt->execute(array($_POST['id_list'])); 	
}

else if ($function == 'update_title') {
	global $dbh;
	$stmt = $dbh->prepare("UPDATE List SET title = ? WHERE id_list = ?");
	return $stmt->execute(array($_POST['title'], $_POST['id_list']));
}

else if ($function == 'update_priority') {
	global $dbh;
	$stmt = $dbh->prepare("UPDATE List SET priority = ? WHERE id_list = ?");
	return $stmt->execute(array($_POST['priority'], $_POST['id_list']));
}

else if ($function == 'add_bulletpoint') {
	global $dbh;
	$stmt = $dbh->prepare("INSERT INTO Bulletpoint(content, checked, id_list) VALUES (?, 0, ?)");
	return $stmt->execute(array($_POST['content'], $_POST['id_list']));
}

else if ($function == 'update_bulletpoint') {
	global $dbh;
	$stmt = $dbh->prepare("UPDATE Bulletpoint SET content = ?, checked = ? WHERE id_bp = ?");
	return $stmt->execute(array($_POST['content'], $_POST['checked'], $_POST['id_bp'])); 
}

else if ($function == 'delete_bulletpoint') {
	global $dbh;
	$stmt = $dbh->prepare("DELETE FROM Bulletpoint WHERE id_bp = ?");
	return $stmt->execute(array($_POST['id_bp'])); 	
}

?>