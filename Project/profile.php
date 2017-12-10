<!DOCTYPE html>
<html>
    <head>
        <title> List Maker Lite </title>
        <meta charset="utf-8" />
        <script src="generate-list.js" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Unica+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/style.css" rel="stylesheet">

        <?php
        include_once('includes/init.php');
        include_once('databases/user.php');
        include_once('includes/session.php');
        ?>

    </head>
    <body class="main">
        <header id="mainHeader">
            <span id="title">
                <i class="fa fa-youtube" aria-hidden="true"></i>
                <a href="editPage.php"><h1>LIST MAKER</h1></a>
            </span>
            <span id="headerMenu">
                <a href="editPage.php">Your Lists</a>
                <a href="index.html">Log out</a>
            </span>
        </header>
        
        <div class="categories">
            <aside>
                <div>
                    <i class="fa fa-cog" id="settingsIcon" aria-hidden="true"></i>
                    <p id="settings">Settings</p>
                </div>
                <a href="something">Achievements</a>
                <a href="something">Archived Lists</a>
                <a href="something">Color Scheme</a>
            </aside>
        </div>
        <div class="content">
            <div id="info">
                <img id="profilePic" style="vertical-align:middle" src="resources/bust_a_telmo.jpg" height="200">
                <span>
                   <?php
                        include_once("profile_functions.php");
                        get_name($_SESSION['username']);
                   ?>
                </span>
                <span>
                    <?php 
                        include_once("profile_functions.php");
                        get_username($_SESSION['username']);
                    ?>
                </span>
                <span>
                    <?php 
                        include_once("profile_functions.php");
                        get_email($_SESSION['username']);
                    ?>
                </span>
            </div>
        </div>
        <footer>
            © 2017
        </footer>
    </body>
</html>