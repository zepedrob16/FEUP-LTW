<?php

include_once('includes/init.php');
include_once('databases/user.php');

if (is_login_correct($_POST['username'], $_POST['password'])) {
	header('Location: main-page.php');
	set_current_user($_POST['username']);
	exit;
}
else {
	header('Location: index.html');
}

?>