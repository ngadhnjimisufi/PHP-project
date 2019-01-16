<!DOCTYPE html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
	<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
</head>
<body>
	<?php
	session_start();
	if (isset( $_SESSION['Username']))
    		header('Location: index.php');
	?>	
		<header>
			<a href="index.php"><h1 class="brand"> Alphine Design</h1></a>
			<div class="navigation">
				<ul>
					<li><a href="index.php">Home</a> </li>
					<li><a href="#">Portfolio</a></li>
					<li><a href="about.php">About</a> </li>
					<li><a href="services.php">Services</a></li>
					<li><a href="#">News</a> </li>
					<li><a href="#">Login</a></li>
				</ul>
			</div>
			<h2 style="">LOG IN / REGISTER</h2>
		</header>

		<div class="containercolor2">
			<div class="containerv2">
				<div class ="content">
					<div class="column blue">
						<h1>Log In</h1>
						<form action="loginprocess.php" method="POST" id="login1" name="contactForm">
							<label for="username">Username:</label><input name="Usernamelog" id="username" type="text"/>
							<label for="password" style="float:none;">Password:</label><input name="Passwordlog" id="password" type="password"/>
							<button type="submit">Login</button>
						</form>
					</div>
				</div>
				<div class ="content">
					<div class="column green">
						<h1>Register</h1>
						<form action="registerform.php" method="POST" id="signup1" name="contactForm">
							<label for="name">Name:</label><input name="Name" id="name" type="text"/>
							<label for="lastname">Lastname:</label><input name="Lastname" id="lastname" type="text"/>
							<label>Gender:</label><input type="radio" name="Gender" value="M" id="male" checked><label type="gender" for="male">M</label> 
  							<input type="radio" name="Gender" value="F" id="female"><label type="gender" for="female">F</label>  <br>
							<label for="email">Email:</label><input name="Email" id="email" type="text"/>
							<label for="username1">Username:</label><input name="Username" id="username1" type="text"/>
							<label for="password1">Password:</label><input name="Password" id="password1" type="password"/>
							<label for="confirmpassword">Confirm Password:</label><input name="ConfirmPassword" id="confirmpassword" type="password"/>
							<button type="submit">Sign Up</button>
						</form>
						<script src="js/validimi.js"> </script>
					</div>
				</div>
			</div>
		</div>
		<div class="containerv3"><p>&copy; 2011 Zeences Design. All Right Reserved</p> <span class="background-arrow"><i class="up"></i> </span></div>
</body>
</html>