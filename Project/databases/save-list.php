<?php
include_once('../includes/session.php');

$title = $_POST['title'];
ChromePhp::log($title);
$stmt = $dbh->prepare('INSERT INTO List VALUES (?, ?, ?, ?, ?, ?)');
$stmt->execute(array(5, 'admin', $title, '2017/12/12', 3, 'food'));

?>