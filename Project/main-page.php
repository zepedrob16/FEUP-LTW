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

        <form action="user.php" method="post">
            <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        </form>
        <header id="mainHeader">
            <span id="title">
                <!--<img src="resources/logo.png" width="50"/>-->
                <a href="main-page.php"><h1>LIST MAKER</h1></a>
            </span>
            <span id="headerMenu">
                <button type="button" id="dropdown"><i class="fa fa-cog fa-2x" aria-hidden="true"></i></button>
                <div id="headerDropdown">
                    <a href="profile.php">Profile</a>
                    <a href="sign-out.php">Logout</a>
                </div>
            </span>
            <span id="searchBox">
                <input id="filter" type="text" placeholder="Search" />
                <i id="filtersubmit" class="fa fa-search" aria-hidden="true"></i>
            </span>
        </header>
        <aside class="categories">
        </aside>
        <div class="content">
            
            <div id="new_list" unique_id= <?php include_once("databases/getter-db.php"); get_new_list_id($_SESSION['username']) ?>>
                <input type="text" name="title" id="list_title_add" placeholder="Title..." required>
            </div>
            <div class="savedLists">
                <?php
                include_once("includes/session.php");
                global $dbh;
                $stmt = $dbh->prepare("SELECT * FROM List WHERE username = ?");
                $stmt->execute(array($_SESSION['username']));
                $allrows = $stmt->fetchAll();
                foreach ($allrows as $row) {
                echo "<div id='single_list' unique_id=".$row['id_list'].">";
                    echo "<div id='list_header'>";
                        echo "<div id='header'>";
                            echo "<span id = 'list_title'>";
                                echo $row['title'];
                            echo "</span>";
                            echo "<span id = 'list_date'>";
                                echo $row['creation_date'];
                            echo "</span>";
                        echo "</div>";
                        echo "<button class='delete_list_butt'><i class='fa fa-trash-o' aria-hidden='true'></i></button>";
                    echo "</div>";
                    echo "<div id = 'bulletpoints'>";
                        $stmt2 = $dbh->prepare("SELECT DISTINCT * FROM Bulletpoint B JOIN List L WHERE L.username = ? AND B.id_list = ? AND L.id_list = ?");
                        $stmt2->execute(array($_SESSION['username'], $row['id_list'], $row['id_list']));
                        echo "<div class = 'bulletpoint_selection'>";
                        while($second_row = $stmt2->fetch()) {
                            echo "<input type='text' class='item' value=".$second_row['content']." unique_id=".$second_row['id_bp']." disabled>";
                            echo "<button class='delete_item'><i class='fa fa-trash-o' aria-hidden='true'></i></button>";
                            echo "<button class='edit_item'><i class='fa fa-pencil' aria-hidden='true'></i></button>";
                            echo "<button class='tick_item'><i class='fa fa-check-circle' aria-hidden='true'></i></button>";
                        }
                        echo "</div>";

                        echo "<input type='text' name='add_item' class='single_bulletpoint_add' placeholder='Add an item...'>";
                    echo "</div>";
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