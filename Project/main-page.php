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
            <input type="text" name="title" id="list_title_add" placeholder="Title..." required>
            <div class="savedLists">
                <?php
                include_once("includes/session.php");
                global $dbh;
                $stmt = $dbh->prepare("SELECT * FROM List WHERE username = ?");
                $stmt->execute(array($_SESSION['username']));
                while($row = $stmt->fetch()) {
                echo "<div id='single_list'>";
                    echo "<span id = 'list_title'>";
                        echo $row['title'];
                    echo "</span>";
                    echo "<span id = 'list_date'>";
                        echo $row['creation_date'];
                    echo "</span>";
                    echo "<div id = 'bulletpoints'>";
                        $stmt2 = $dbh->prepare("SELECT DISTINCT content FROM Bulletpoint B JOIN List L WHERE L.username = ? AND B.id_list = ?");
                        $stmt2->execute(array($_SESSION['username'], $row['id_list']));
                        while($second_row = $stmt2->fetch()) {
                        echo "<span id='single_bulletpoint'>";
                            echo "<i class='fa fa-square-o' aria-hidden='true'></i>";
                            echo $second_row['content'];
                        echo "</span>";
                        }
                    echo "</div>";
                    echo "<span id = 'list_priority'>";
                        if($row['priority'] == 3){
                        echo "<i class='fa fa-thermometer-empty' id='thermometer' aria-hidden='true'></i>";
                        } else if($row['priority'] == 2){
                        echo "<i class='fa fa-thermometer-half' id='thermometer' aria-hidden='true'></i>";
                        } else {
                        echo "<i class='fa fa-thermometer-full' id='thermometer' aria-hidden='true'></i>";
                        }
                    echo "</span>";
                    echo "<span id = 'list_tags'>";
                        echo $row['tags'];
                    echo "</span>";
                echo "</div>";
                }?>
            </div>
        </div>
        <footer>
            © 2017
            <span>Currently logged in as <?php echo $_SESSION['username'] ?></span>
        </footer>
    </body>
</html>