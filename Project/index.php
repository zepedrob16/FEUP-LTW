<?php include_once("includes/session.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title> List Maker Lite </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Unica+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body class="login">
        <header>
            <span id="title">
                <!--<img src="resources/logo.png" width="50" />-->
                <a href="index.php"><h1>LIST MAKER</h1></a>
            </span>
        </header>
        <div class="content">
            <div id="signIn">
                <form action="sign_in.php" method="post">
                    <div id="text">Insert your credentials </div>
                    <div>
                        <i class="fa fa-user-circle-o" id="userIcon" aria-hidden="true"></i>
                        <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']?>">
                        <input type="text" name="username" id="inputVar" placeholder="Username...">
                    </div>
                    <div>
                        <i class="fa fa-lock" id="lockIcon" aria-hidden="true"></i>
                        <input type="password" name="password" id="inputVar" placeholder="Password...">
                    </div>
                    <div> <input type="submit" id="submit" value="Submit"> </div>
                </form>
            </div>
            
            <div id="signUp">
                <span id="noAccount">
                    <a href="register.php" id="text">Don't have an account yet? Create one now!</a>
                </span>
            </div>
        </div>
        <footer>
            © 2017
        </footer>
    </body>
</html>