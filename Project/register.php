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
                <!--<img src="resources/logo.png" width="50"/>-->
				<a href= <?php echo urlencode('register.php') ?>> <h1>LIST MAKER</h1></a>
			</span>
		</header>
		<div class="content">
			<div id="signIn">
				<form action= <?php echo urlencode('signup.php') ?> method="post">
					<div>Insert your credentials </div>
					<div>
						<input type="text" name="firstName" id="inputVar" placeholder="First Name..." required>
						<input type="text" name="lastName" id="inputVar" placeholder="Last Name..." required>
					</div>
					<!--<div>
						<input type="text" name="date" id="datepicker" placeholder="Month..." required>
					</div>-->
					<div>
						<i class="fa fa-envelope-o" id="emailIcon" aria-hidden="true"></i>
						<input type="email" name="email" id="inputVar" placeholder="E-mail..." required>
					</div>
					<div>
						<i class="fa fa-user-circle-o" id="userIcon" aria-hidden="true"></i>
						<input type="text" name="username" id="inputVar" placeholder="Username..." required>
					</div>
					<div>
						<i class="fa fa-lock" id="lockIcon" aria-hidden="true"></i>
						<input type="password" name="password" id="inputVar" placeholder="Password..." required>
					</div>
					<div> <input type="submit" id="submit" value="Submit"> </div>
				</form>
			</div>
		</div>
		<footer>
			© 2017
		</footer>
	</body>
</html>