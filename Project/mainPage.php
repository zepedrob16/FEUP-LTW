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
    <body>
        <header id="mainHeader">
            <span id="title">
                <i class="fa fa-youtube" aria-hidden="true"></i>
                <a href="mainPage.html"><h1>LIST MAKER</h1></a>
            </span>
            <span id="headerMenu">
                <a href="profile.php">Profile</a>
                <a href="index.html">Log out</a>
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
        </div>
        <footer>
            © 2017
            <span>Currently logged in as <?php echo $_SESSION['username'] ?></span>
        </footer>
    </body>
</html>