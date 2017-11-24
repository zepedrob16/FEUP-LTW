<?php
  include_once('includes/init.php');


function new_account($username, $password) {
	global $dbh;
    $stmt = $dbh->prepare('INSERT INTO users (username, password) VALUES (? , ?)');
    $stmt->execute(array($username, sha1($password)));

    return PDOStatement->execute();

}

?>