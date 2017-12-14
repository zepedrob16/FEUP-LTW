<!DOCTYPE html>
<html>
    <head>
        <title> List Maker Lite </title>
        <meta charset="utf-8" />
        <script src="javascript/script-profile.js" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Unica+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/style.css" rel="stylesheet">
        <?php
        include_once('includes/init.php');
        include_once('databases/user.php');
        include_once('includes/session.php');
        require_once('databases/getter-db.php')
        ?>
    </head>
    <body class="main">
        <header id="mainHeader">
            <span id="title">
                <!--<img src="resources/logo.png" width="50"/>-->
                <a href="main-page.php"><h1>LIST MAKER</h1></a>
            </span>
            <span id="headerMenu">
                <button type="button" id="dropdown"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></button>
                <div id="headerDropdown">
                    <a href="profile.php">Profile</a>
                    <a href="#">Archived</a>
                    <a href="index.html">Logout</a>
                </div>
            </span>
        </header>
        
        <aside class="categories">
            <div id="sortByDate">
                <button>
                <i class="fa fa-user-circle-o" id="userIcon" aria-hidden="true"></i>
                <p>Edit Profile</p>
                </button>
                <button>
                <i class="fa fa-lock" id="lockIcon" aria-hidden="true"></i>
                <p>Change Password</p>
                </button>
            </div>
        </aside>
        <div class="content">
            <div id="info">
                
                <span id="cropPic">
                    <img id="profilePic" src="resources/avatars/<?php get_avatar_name($_SESSION['username']); ?>">
                </span>

                <span id="fullName">
                    <?php
                    include_once("databases/getter-db.php");
                    get_name($_SESSION['username']);
                    ?>
                </span>
                <span id="username">
                    <?php
                    include_once("databases/getter-db.php");
                    get_username($_SESSION['username']);
                    ?>
                </span>
                <span id="email">
                    <?php
                    include_once("databases/getter-db.php");
                    get_email($_SESSION['username']);
                    ?>
                </span>
                <form id="upload_file" method="post" enctype="multipart/form-data">
                    <input id="upload_button" type="file" name="image" />
                    <input id="submit_button" type="submit" name="submit" value="Upload" />
                </form>
            </div>
        </div>
        <footer>
            © 2017
        </footer>
    </body>
</html>