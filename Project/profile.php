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
        include_once('databases/getter-db.php');
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
                    <a href="index.php">Logout</a>
                </div>
            </span>
        </header>
        <div class="content">
            <div id="info">
                <div id="editProfilePic">
                    <span id="cropPic">
                        <img id="profilePic" src="resources/avatars/<?php get_avatar_name($_SESSION['username']); ?>"/>
                    </span>
                    <form id="upload_file" method="post" enctype="multipart/form-data">
                        <input id="upload_button" type="file" name="image" />
                        <input type="submit" name="submit" value="Upload" />
                    </form>
                </div>
                
                <div class="editInfo">
                    <div class="fullName">
                        Full Name:
                        <input id="fullName" value=<?php get_name($_SESSION['username']); ?> />
                    </div>

                    <div class="username">
                        Username: 
                        <input id="username" value=<?php get_username($_SESSION['username']); ?> disabled/>
                    </div>

                    <div class="email">
                        E-mail:
                        <input id="email" value=<?php get_email($_SESSION['username']); ?> />
                    </div>

                    <div class="password">
                        Password:
                        <input id="password" type="password" />
                    </div>

                    <div> <button id="save_changes">Save changes</button> </div>
                    
                </div>
            </div>
        </div>
        <footer>
            © 2017
        </footer>
    </body>
</html>