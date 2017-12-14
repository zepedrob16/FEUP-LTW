<?php

// Gets projects associated with username.
function get_projects($username) {
	global $dbh;
	$stmt = $dbh->prepare("SELECT title FROM Project WHERE username = ?");
	$stmt->execute(array($username));
	$array_info = $stmt->fetch();
  
  if ($array_info == ' ')
    echo implode(',', $array_info);
}

function get_filters($username) {
	global $dbh;
	$stmt = $dbh->prepare("SELECT tags FROM List WHERE username = ?");
	$stmt->execute(array($username));
	while ($row = $stmt->fetch()) {
     	echo $row['tags'];
    }
}

// Getter for last ID of list.
function get_new_list_id($username) {
  global $dbh;
  $stmt = $dbh->prepare("SELECT id_list FROM List WHERE username = ? ORDER BY id_list DESC LIMIT 1");
  $stmt->execute(array($username));
  $array_info = $stmt->fetch();

  if ($array_info == ' ')
    echo implode(',', $array_info);
}

// Getter for information relative to USER.
function get_name($username) {
 	global $dbh;
  	$stmt = $dbh->prepare("SELECT name FROM User WHERE username = ?");
  	$stmt->execute(array($username));   
  	$array_info = $stmt->fetch();
  	$string_version = implode(',', $array_info);
  	echo $string_version;
}

function get_username($username) {
	global $dbh;
    $stmt = $dbh->prepare("SELECT username FROM User WHERE username = ?");
    $stmt->execute(array($username));   
    $array_info = $stmt->fetch();
    $string_version = implode(',', $array_info);
    echo "Username: " . $string_version;
}

function get_email($username) {
	global $dbh;
    $stmt = $dbh->prepare("SELECT email FROM User WHERE username = ?");
    $stmt->execute(array($username));   
    $array_info = $stmt->fetch();
    $string_version = implode(',', $array_info);
    echo "Email: " . $string_version;
}

function get_lists($username) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT * FROM List WHERE username = ?");
    $stmt->execute(array($username));   
    $array_info = $stmt->fetch();
    $string_version = implode(',', $array_info);
    echo "Your Lists: " . $string_version;
}

?>