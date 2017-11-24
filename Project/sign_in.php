<?php

include_once('includes/init.php');
include_once('databases/user.php');

if (is_login_correct($_POST['username'], $_POST['password'])) {
	header('Location: mainPage.html');
	exit;
}
else {
	header('Location: index.html');
}

?>