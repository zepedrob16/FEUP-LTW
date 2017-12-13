<!DOCTYPE html>
<html>
    <head>
        <title> List Maker Lite </title>
        <meta charset="utf-8" />
        <script src="javascript/script.js" defer></script>
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
                <button>
                <i class="fa fa-calendar-o fa-fw" id="dateIcon" aria-hidden="true"></i>
                <p>Today</p>
                </button>
                <button>
                <i class="fa fa-calendar fa-fw" id="dateIcon" aria-hidden="true"></i>
                <p>Week</p>
                </button>
                <button>
                <i class="fa fa-calendar-minus-o fa-fw" id="dateIcon" aria-hidden="true"></i>
                <p>Someday</p>
                </button>
            </div>
            <div id="sortByFilter">
                <button class="tab_link" onclick="switch_filter_tab(event, 'project_tab_content')"><p>Projects</p></button>
                <button class="tab_link" onclick="switch_filter_tab(event, 'filter_tab_content')"><p>Filters</p></button>
            </div>
            <div id="project_tab_content" class="tab_content">
                <!-- Extract from database, obviously. These values are just for testing. -->
                <p>Deep</p>
                <p>Dark</p>
                <p>Fantasies</p>
            </div>
            <div id="filter_tab_content" class="tab_content" style="display: none">
                <!-- Extract from database, obviously. These values are just for testing. -->
                <p>Mexican</p>
                <p>Cuisine</p>
            </div>
        </aside>
        <div class="content">
            <button id="todo_add_button" type="submit" value="Add a list..."><i class="fa fa-plus fa-2x" aria-hidden="true"></i></button>
            </form>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form id="list_adder" onsubmit="return false;">
                </div>
            </div>
            
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