<!DOCTYPE html>
<head>
	<title>Services Crud</title>
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
		session_start();
		if (!isset( $_SESSION['Username']))
			header('Location: index.php');
		else if(!isset($_SESSION['IsAdmin'])==1)
			header('Location: index.php');
			$link = mysqli_connect("localhost", "root", "", "db1");										
		$query1 = "SELECT * FROM `services`";

		$asd=mysqli_query($link, $query1);
		$lista = [];
		if(mysqli_num_rows($asd) > 0 ){
		while ($row = mysqli_fetch_array($asd, MYSQLI_NUM)) {
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

			<?php 
				if($_SESSION['Username']){
				$profile = $_SESSION['Username'];
				echo "<h2>@$profile</h2>";}
				else{
				echo "<h2>PROFILE</h2>";}
			?>
		</header>
		<div class="containercolor2">
			<div class="containervimg">
				<img id="2" src="images/serviceblank.png">
			</div>
			<div class="containerv2">
				<div class ="content">
					<div class="column">
						<h1>Services Edit</h1>
						<form id="forma" action="servicescrudprocess.php" method="POST" enctype="multipart/form-data">
							<label for="profileimg">Service img:</label><input  name="image" type="file" id="serviceimg" />
							<label for="title">Title:</label><input name="Title" id="title" type="text"/>
							<label for="description">Description:</label><textarea type="crud" name="Description" id="description" type="text"></textarea>
							<input name="Originaltitle" id="originaltitle" style="display: none;"/>
							<div class="centerr">
								<button id="create" name="Create" type="submit">Create</button>
								<button id="delete" name="Delete" type="submit">Delete</button>
								<button id="update" name="Update" type="submit">Update</button>
								<button id="clear" type="submit">Clear</button>
							</div>
						</form>
						<script src="js/validimi.js"> </script> 
					</div>
				</div>
				<select size="5" id="selectlista">
					<option id="none" selected>None</option>
				</select>
			</div>
		</div>
		<div class="containerv3">	<p>&copy; 2011 Zeences Design. All Right Reserved</p> <span class="background-arrow"><i class="up"></i> </span></div>
	
</body>
</html>
<script>
	$(document).ready(function(){

	var structure = "";
	var namevalue = '<?php echo json_encode($lista) ?>';
	$.each(JSON.parse(namevalue),function(index,value){
		structure += "<option imgsrc='"+value.image+"' pershkrimi='"+value.pershkrimi+"'>"+value.titulli+"</option>";
		
	});

	$("#selectlista").append(structure);
});
</script>
<script src="js/servicecrud.js"> </script>