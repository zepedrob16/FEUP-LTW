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
                    <a href="index.html">Logout</a>
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
                <!-- Extracts PROJECTS from the db. -->
                <p><?php
                    include_once("databases/getter-db.php");
                    get_projects($_SESSION['username']);
                ?></p>
            </div>
            <div id="filter_tab_content" class="tab_content" style="display: none">
                <!-- Extracts FILTERS from the db. -->
                <p><?php
                    include_once("databases/getter-db.php");
                    get_filters($_SESSION['username']);
                ?></p>
            </div>
        </aside>
        <div class="content">
            <button id="todo_add_button" type="submit"><i class="fa fa-plus fa-2x" aria-hidden="true"></i></button>
            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form id="list_adder" onsubmit="return false;"></form>
                </div>
            </div>
            
            <div class="savedLists">
                <span id="id">
                    <?php
                    include_once("list-functions.php");
                    get_id($_SESSION['username']);
                    ?>
                </span>
                <span id="title">
                    <?php
                    include_once("list-functions.php");
                    get_title($_SESSION['username']);
                    ?>
                </span>
                <span id="creation_date">
                    <?php
                    include_once("list-functions.php");
                    get_creation_date($_SESSION['username']);
                    ?>
                </span>
                <span id="priority">
                    <?php
                    include_once("list-functions.php");
                    get_priority($_SESSION['username']);
                    ?>
                </span>
                <span id="tags">
                    <?php
                    include_once("list-functions.php");
                    get_tags($_SESSION['username']);
                    ?>
                </span>
            </div>
        </div>
        
        <footer>
            © 2017
            <span>Currently logged in as <?php echo $_SESSION['username'] ?></span>
        </footer>
    </body>
</html>