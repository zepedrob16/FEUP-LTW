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
                <button type="button"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></button> 
            </span>
            <span id="searchBox">
                <input id="filter" type="text" placeholder="Search" />
                <i id="filtersubmit" class="fa fa-search" aria-hidden="true"></i>
            </span>
        </header>
        
        <div class="categories">
            <aside>
                <p>Filters</p>
                <label class="filters">One
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="filters">Two
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="filters">Three
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <label class="filters">Four
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </aside>
        </div>
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