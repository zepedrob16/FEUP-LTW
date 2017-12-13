 <?php
 include_once('includes/session.php');

 function get_id($username) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT id_list FROM List WHERE username = ?");
    $stmt->execute(array($username));   
    while ($row = $stmt->fetch()) {
     echo ' ID ' . $row['id_list'];
    }

}

 function get_title($username) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT title FROM List WHERE username = ?");
    $stmt->execute(array($username));   
    while ($row = $stmt->fetch()) {
     echo ' Title ' . $row['title'];
    }
  }

  function get_creation_date($username) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT creation_date FROM List WHERE username = ?");
    $stmt->execute(array($username));   
    while ($row = $stmt->fetch()) {
     echo ' Creation Date ' . $row['creation_date'];
    }
  }

  function get_priority($username) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT priority FROM List WHERE username = ?");
    $stmt->execute(array($username));   
    while ($row = $stmt->fetch()) {
     echo ' Priority ' . $row['priority'];
    }
  }

  function get_tags($username) {
    global $dbh;
    $stmt = $dbh->prepare("SELECT tags FROM List WHERE username = ?");
    $stmt->execute(array($username));   
    while ($row = $stmt->fetch()) {
     echo ' Tags ' . $row['tags'];
    }
  }



?>