<!DOCTYPE html>
<head>
	<title>About Us</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
		<header>
			<a href="index.php"><h1 class="brand"> Alphine Design</h1></a>
			<div class="navigation">
				<ul>
					<li><a href="index.php">Home</a> </li>
					<li><a href="#">Portfolio</a></li>
					<li><a href="about.php">About</a> </li>
					<li><a href="services.php">Services</a></li>
					<li><a href="#">News</a> </li>
					<?php
						if(!isset($_SESSION)) 
    						{ 
        						session_start(); 
    						} 
						if(isset($_SESSION['Username'])) {
							$path = "logoutprocess.php";
							$path1 = "profile.php";
							$path2 = "servicescrud.php";
							echo "<li><a href=\"$path\" >Logout</a></li>";
							echo "<li><a href=\"$path1\" >Profile</a></li>";
							if(isset($_SESSION['IsAdmin'])==1)
								echo "<li><a href=\"$path2\" >Services Edit</a></li>";

						} else {
							$path = "login.php";
							
						echo "<li><a href=\"$path\">Login</a></li>";
						}
					?>
				</ul>
			</div>
			<h2>About Us</h2>
			
			<p><span class="firstcharacter">C</span>um sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vestibulum id ligula porta felis euismod semper. Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis quis rutrum lorem. Duis blandit urna at rhoncus sagittis. Nullam in tincidunt nunc, ac faucibus est. In pretium erat sed dictum finibus. Sed accumsan facilisis sodales. Cras iaculis rhoncus justo, non facilisis lorem tincidunt a. Quisque aliquam, risus fringilla sollicitudin semper, purus elit facilisis dui, nec efficitur velit lorem vitae quam. Maecenas lacus velit, facilisis non magna quis, elementum ullamcorper lorem. Vestibulum nec porta justo. Phasellus accumsan porta sem, nec vulputate turpis condimentum et. Quisque in dapibus ipsum, sagittis sollicitudin lorem. Mauris at nisl eu nunc blandit aliquam. Pellentesque nec mollis neque. Donec quis dictum urna. Sed vitae quam non orci lobortis semper. </p>
			<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vestibulum id ligula porta felis euismod semper. Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam.</p>
			<p>Aenean lacinia bibendum nulla sed consectetur. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.Vestibulum id ligula porta felis euismod semper. Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam.</p>
			<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vestibulum id ligula porta felis euismod semper. Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam.  Vestibulum nec porta justo. Phasellus accumsan porta sem, nec vulputate turpis condimentum et. Quisque in dapibus ipsum, sagittis sollicitudin lorem. Mauris at nisl eu nunc blandit aliquam. Pellentesque nec mollis neque. Donec quis dictum urna. Sed vitae quam non orci lobortis semper.</p>	
		</header>
		
		<div class="containerv3">	<p>&copy; 2011 Zeences Design. All Right Reserved</p> <span class="background-arrow"><i class="up"></i> </span></div>
	
</body>
</html>