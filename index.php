<!DOCTYPE html>
<head>
	<title>Home</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css">
	<script
			src="https://code.jquery.com/jquery-3.3.1.js"
			integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
	<script src="js/slider.js"></script>
</head>
<body>
	<?php
	if(!isset($_SESSION)) 
    { 
       session_start(); 
    } 
    	$link = mysqli_connect("localhost", "root", "", "db1");										
		$query1 = "SELECT * FROM `services` ORDER BY `Timestamp` DESC";
		$counter= 0;
		$asd=mysqli_query($link, $query1);
		$lista = [];
		if(mysqli_num_rows($asd) > 0 ){
		while ($row = mysqli_fetch_array($asd, MYSQLI_NUM)) {
			if($counter==3)
				break;
			$counter++;
    		$lista[] = array('titulli' => $row[0], 'pershkrimi' => $row[1],  'image' => $row[2]);


    	}}
    	mysqli_close($link);
	 
	?>	
	<header>
		<a href="index.php"><h1 class="brand"> Alphine Design</h1></a>
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
		<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus aliquet, ut fermentum massa justo sit amet risus erat a venenatis erat a ante.</p>
		<p class="filter">  filter:          Web   Design     /    Motion   graphics     /      photography </p>
	</header>

	<div class="containervservices">

	</div>

	<div class = "slidecontainer">
		<div class="fade" style="display: block;">
			<img style="width: 100%;" src="images/slide1.png">
		</div>
		<div class="fade" style="display: none;">
			<img style="width: 100%;" src="images/slide2.png">
		</div>
		<div class="fade" style="display: none;">
			<img style="width: 100%;" src="images/slide3.png">
		</div>
		<a class="right" onclick="slides(1)">&#10095;</a>
		<a class="left"  onclick="slides(-1)">&#10094;</a>
	</div>
	<div class="containerv">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
		<img src="images/44.jpg">
	</div>
	<div class="containercolor2">
		<div class="containerv2">
			<div class="content">
				<div class="column">
					<h1>About Us</h1>
					<p><span class="firstcharacter">C</span>um sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vestibulum id ligula porta felis euismod semper. Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam.</p>
					<p>Aenean lacinia bibendum nulla sed consectetur. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas sed diam eget risus varius blandit sit amet non magna.Vestibulum id ligula porta felis euismod semper. Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam.</p>
					<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vestibulum id ligula porta felis euismod semper. Nullam id dolor id nibh ultricies vehicula ut id elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam.</p>
					<a href="#">Hire Us</a>
				</div>
				<div class="column purple">
					<h1>Contact Us</h1>
					<p>Vestibulum id ligula porta felis euismod semper. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
					<form action="contactform.php" method="POST" id="contact1" name="contactForm">
						<label for="name">Name:</label><input name="Name" id="name" type="text"/>
						<label for="email">Email:</label><input name="Email" id="email" type="text"/>
						<label for="subject">Subject:</label><input name="Subject" id="subject" type="text"/>
						<label for="message">Message:</label><textarea name="Message" id="message" type="text"></textarea>
						<button type="submit">Submit</button>
					</form>
					<script src="js/validimi.js"> </script>
				</div>
			</div>
			<div class="content">
				<div class="column blue last">
					<h1>OUR SERVICES</h1>
					<p><span class="firstcharacter">N</span>ullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vestibulum id ligula porta felis euismod semper.</p>
					<h2>PHOTOGRAPHY</h2>
					<p>Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, fusce dapibus, tellus ac cursus commodo, tortor mauris.</p>
					<h2>WEB DESIGN</h2>
					<p>Sed posuere consectetur est at lobortis. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut.</p>
					<h2>MOTION GRAPHICS</h2>
					<p>Aenean lacinia bibendum nulla sed consectetur. Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vestibulum id ligula porta felis euismod semper.</p>
				</div>
				<div class="column red italic">
					<h1>POPULAR POSTS</h1>
					<div class="row">
						<img src="images/avatar.png">
						<a href="#">Inceptos    Pellentesque    Risus Ipsum</a>
						<p>12 November 2011  /  117 Comments</p></div>
						<div class="row">
							<img src="images/avatar2.png">
							<a href="#">Inceptos    Pellentesque    Risus Ipsum</a>
							<p>12 November 2011  /  117 Comments</p>
						</div>
						<img src="images/avatar3.png">
						<a href="#">Inceptos    Pellentesque    Risus Ipsum</a>
						<p>12 November 2011  /  117 Comments</p>
				</div>
			</div>
		</div>
	</div>
		
	<div class="containerv3"><p>&copy; 2011 Zeences Design. All Right Reserved</p> <span class="background-arrow"><i></i></span></div>

	<script>
		$(document).ready(function(){
			var structure = "";
			var namevalue = '<?php echo json_encode($lista) ?>';
			$.each(JSON.parse(namevalue),function(index,value){
				structure += "<div class='columnservice' style='margin-left:6.5%;'><img src='serviceimages/"+value.image+"'>"+
					"<h1>"+value.titulli+"</h1>"+
					"<p>"+value.pershkrimi+"</p></div>";	
			});

			$(".containervservices").append(structure);
		});
	</script>		
	</body>
</html>