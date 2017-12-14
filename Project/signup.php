<?php

include_once('includes/init.php');
include_once('databases/user.php');

if(!preg_match("/^[a-zA-Z0-9\s]+$/", $_POST['username'])) {
	header('Location: ' . urlencode('register.html'));
	exit;
}

else if (new_account($_POST['username'], $_POST['password'], $_POST['firstName'], $_POST['lastName'], $_POST['email'])) {

	header('Location: ' . urlencode('index.html'));
	exit;
}

else {
	header('Location: ' . urlencode('register.html'));
}
?>