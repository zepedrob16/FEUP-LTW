 <?php
 include_once('includes/session.php');

 function get_id($username) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT id_list FROM List WHERE username = ?");
    $stmt->execute(array($username));   
    $array_info = $stmt->fetch();
    $string_version = implode(',', $array_info);
    echo "ID: " . $string_version;
  }

 function get_title($username) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT title FROM List WHERE username = ?");
    $stmt->execute(array($username));   
    $array_info = $stmt->fetch();
    $string_version = implode(',', $array_info);
    echo "Title: " . $string_version;
  }

  function get_creation_date($username) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT creation_date FROM List WHERE username = ?");
    $stmt->execute(array($username));   
    $array_info = $stmt->fetch();
    $string_version = implode(',', $array_info);
    echo "Creation Date: " . $string_version;
  }

  function get_priority($username) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT priority FROM List WHERE username = ?");
    $stmt->execute(array($username));   
    $array_info = $stmt->fetch();
    $string_version = implode(',', $array_info);
    echo "Priority: " . $string_version;
  }

  function get_tags($username) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT tags FROM List WHERE username = ?");
    $stmt->execute(array($username));   
    $array_info = $stmt->fetch();
    $string_version = implode(',', $array_info);
    echo "Tags: " . $string_version;
  }



?>