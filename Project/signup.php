<?php

include_once('includes/init.php');
include_once('databases/user.php');

if (new_account($_POST['username'], $_POST['password'])) {
	$message = "Account created";
	echo "<script type='text/javascript'>alert('$message');</script>";

	header('Location: mainPage.html');
	exit;
}
?>