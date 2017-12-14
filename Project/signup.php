<?php

include_once('includes/init.php');
include_once('databases/user.php');

if (new_account($_POST['username'], $_POST['password'], $_POST['firstName'], $_POST['lastName'], $_POST['email'])) {

	$message = "Account created";
	echo "<script type='text/javascript'>alert('$message');</script>";

	header('Location: main-page.php');
	exit;
}

else {
	header('Location: register.html');
}
?>