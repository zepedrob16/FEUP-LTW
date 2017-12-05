 <?php
  function get_name() {
  global $dbh;
  $stmt = $dbh->prepare("SELECT name FROM users");
  $stmt->execute();   
  $array_info = $stmt->fetch();
  $string_version = implode(',', $array_info);
  echo $string_version;
}
?>