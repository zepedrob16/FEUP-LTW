<?php
	global $dbh;
	try {
		$dbh = new PDO('sqlite:databases/database.db');
	}
	catch(PDOException $e) {
		print $e->getMessage();
	}

	$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
