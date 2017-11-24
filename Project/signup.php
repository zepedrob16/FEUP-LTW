<?php

  include_once('includes/init.php');
  include_once('database/user.php');

   new_account($_POST['username'], $_POST['password']);

?>