 <?php
 	include_once('includes/session.php');

 	function get_name($username) {
 		global $dbh;
  		$stmt = $dbh->prepare("SELECT name FROM users WHERE username = ?");
  		$stmt->execute(array($username));   
  		$array_info = $stmt->fetch();
  		$string_version = implode(',', $array_info);
  		echo $string_version;
}

	function get_username($username) {
		global $dbh;
        $stmt = $dbh->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->execute(array($username));   
        $array_info = $stmt->fetch();
        $string_version = implode(',', $array_info);
        echo "Username: " . $string_version;
	}

	function get_email($username) {
		global $dbh;
        $stmt = $dbh->prepare("SELECT email FROM users WHERE username = ?");
        $stmt->execute(array($username));   
        $array_info = $stmt->fetch();
        $string_version = implode(',', $array_info);
        echo "Email: " . $string_version;
	}

?>