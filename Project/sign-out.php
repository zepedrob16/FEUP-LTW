<?php
session_start();
session_unset();
session_destroy();

header('Location: ' . urlencode('index.php'));
exit();
?>