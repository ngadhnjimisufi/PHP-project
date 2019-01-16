<!DOCTYPE html>
<head>
	<title>Services</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css">
	<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
</head>
<body>
	<?php
	if(!isset($_SESSION)) 
    { 
       session_start(); 
    } 
    	$link = mysqli_connect("localhost", "root", "", "db1");										
		$query1 = "SELECT * FROM `services`";

		$asd=mysqli_query($link, $query1);
		$lista = [];
		if(mysqli_num_rows($asd) > 0 ){
		while ($row = mysqli_fetch_array($asd, MYSQLI_NUM)) {
    		$lista[] = array('titulli' => $row[0], 'pershkrimi' => $row[1],  'image' => $row[2]);}}

    	mysqli_close($link);
	 
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
								echo "<li><a href=\"$path2\">Services Edit</a></li>";

						} else {
							$path = "login.php";
							
						echo "<li><a href=\"$path\">Login</a></li>";
						}
					?>
			</ul>
		</div>
		<h2>Our Services</h2>
	</header>
	<div class="containerv2">
		<!-- <div class="columnservice">
			<img src="images/settings.png">
			<h1>Service 1</h1>
			<p>It is a long established fact that a reader will be distracted</p>
		</div>-->	
	</div>
	<div class="containerv3">
		<p>&copy; 2011 Zeences Design. All Right Reserved</p> <span class="background-arrow"><i class="up"></i> </span>
	</div>

	<script>
		$(document).ready(function(){

			var structure = "";
			var namevalue = '<?php echo json_encode($lista) ?>';
			$.each(JSON.parse(namevalue),function(index,value){
				structure += "<div class='columnservice'><img src='serviceimages/"+value.image+"'>"+
					"<h1>"+value.titulli+"</h1>"+
					"<p>"+value.pershkrimi+"</p></div>";	
			});

			$(".containerv2").append(structure);


		});
	</script>
	
</body>
</html>

