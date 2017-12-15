<?php
session_start();
require_once('databases/connection.php');

if (!isset($_SESSION['csrf'])) {
  $_SESSION['csrf'] = generate_random_token();
}


function generate_random_token() {
  return bin2hex(openssl_random_pseudo_bytes(32));
}

if (isset($_SESSION['csrf']) && isset($_POST['csrf'])) {
	if ($_SESSION['csrf'] !== $_POST['csrf']) {
  		session_unset();
		session_destroy();

		header('Location: ' . urlencode('index.php'));
		exit();
	}
}

?>