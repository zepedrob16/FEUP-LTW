<?php

    include_once('includes/init.php');
    

    $db = new PDO('sqlite:database.db');

    $stmt = $db->prepare('SELECT * FROM users');
    $stmt->execute();
    $articles = $stmt->fetchAll();

    ?>-