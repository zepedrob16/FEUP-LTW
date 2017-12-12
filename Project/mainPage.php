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
        include_once('includes/session.php');
        ?>
    </head>
    <body class="main">
        <header id="mainHeader">
            <span id="title">
                <!--<img src="resources/logo.png" width="50"/>-->
                <a href="mainPage.php"><h1>LIST MAKER</h1></a>
            </span>
            <span id="headerMenu">
                <button type="button" id="dropdown"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></button>
                <div id="headerDropdown">
                    <p>Profile</p>
                    <p>Archived</p>
                    <p>Logout</p>
                </div>
            </span>
            <span id="searchBox">
                <input id="filter" type="text" placeholder="Search" />
                <i id="filtersubmit" class="fa fa-search" aria-hidden="true"></i>
            </span>
        </header>
        
        <aside class="categories">
            <div id="sortByDate">
                <i class="fa fa-calendar-o fa-fw" id="dateIcon" aria-hidden="true"></i>
                <button><p>Today</p></button>
                <i class="fa fa-forward fa-fw" id="dateIcon" aria-hidden="true"></i>
                <button><p>Week</p></button>
                <i class="fa fa-fast-forward fa-fw" id="dateIcon" aria-hidden="true"></i>
                <button><p>Someday</p></button>
            </div>

            <div id="sortByFilter">
                <button><p>Projects</p></button>
                <button><p>Filters</p></button>
            </div>
        </aside>
        <div class="content">
            <button id="todo_add_button" type="submit" value="Add a list..."><img src="resources/add_b2.png"></button>
            <form id="list_adder" onsubmit="return false;">
            </form>
            
            <div id="lists">
                <?php
                include_once("profile_functions.php");
                get_lists($_SESSION['username']);
                ?>
            </div>
        </div>
        <footer>
            © 2017
            <span>Currently logged in as <?php echo $_SESSION['username'] ?></span>
        </footer>
    </body>
</html>