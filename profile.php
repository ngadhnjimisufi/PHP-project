<!DOCTYPE html>
<head>
	<title>Profile</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css">
	<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
</head>
<body>
	<?php
	session_start();
	if (!isset( $_SESSION['Username']))
    		header('Location: index.php');
		$name = $_SESSION['Name'];
		$lastname = $_SESSION['Lastname'];
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
								echo "<li><a href=\"$path2\" >Services Edit</a></li>";

						} else {
							$path = "login.php";
							
						echo "<li><a href=\"$path\">Login</a></li>";
						}
					?>
				</ul>
			</div>

			<?php 
				if($_SESSION['Username']){
				$profile = $_SESSION['Username'];
				echo "<h2>@$profile</h2>";}
				else{
						echo "<h2>PROFILE</h2>";}
			?>
	
		</header>
		<div class="containercolor2">
			<div class="containerv2">
				<div class ="content">
						<?php
						if(isset($_SESSION['imagepath'])!=null){
						$imagefile = $_SESSION['imagepath'];
						
						if($imagefile!=""){

						$part1 = "<img src =\"profileimages/";
							$part2 = $imagefile."\">";

						echo $part1.$part2;}

						else{echo "<span></span>";}	
						}
						else{
						echo "<span></span>";}

						?>
					<div class="column purple">
						<h1>Edit profile</h1>
						<form id="profilforma" action="profileupdate.php" method="POST" enctype="multipart/form-data">
							<label for="profileimg">Profile img:</label><input  name="image" type="file" id="profileimg" />
							<label for="name">Name:</label><input name="Name" id="name" type="text"/>
							<label style="float: none;" for="lastname">Last name:</label><input name="Lastname" id="lastname" type="text"/>
							<button type="submit">Save changes</button>
						</form>
						
					</div>
				</div>
			</div>
		</div>
		<div class="containerv3">	
			<p>&copy; 2011 Zeences Design. All Right Reserved</p> 
			<span class="background-arrow"><i class="up"></i></span>
		</div>

	<script src="js/validimi.js"></script>
	<script>
		var name= '<?php echo $name?>';
		var lastname= '<?php echo $lastname?>';
		$(document).ready(function(){
			$("#name").val(name);
			$("#lastname").val(lastname);
		});
	</script>	
</body>
</html>


