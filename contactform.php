<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$link = mysqli_connect("localhost", "root", "", "db1");

	if(!$link) {
		header("Location: index.php");
		echo "".mysqli_connect_error();
	}
	else{
	$name = mysqli_real_escape_string($link, $_POST['Name']);
	$subject = mysqli_real_escape_string($link,$_POST['Subject']);
	$email = mysqli_real_escape_string($link, $_POST['Email']);
	$message = mysqli_real_escape_string($link, $_POST['Message']);

	$query = "INSERT INTO `kontaktforma`(`Name`, `Subject`, `Email`, `Message`) 
				VALUES ('$name', '$subject', '$email', '$message')";

	session_start();
	if(isset($_SESSION['contactName'])){
			$message = "Nuk mund te dergosh me shum se nje mesazh!";
			echo "<script type='text/javascript'>
				alert('$message');
				window.location.replace('http://localhost/projekti/index.php');</script>";
		}

	else if(mysqli_query($link, $query)) {
	
		$_SESSION['contactName'] = $name;
		$message = "Mesazhi u dergua me sukses";
			echo "<script type='text/javascript'>
				alert('$message');
				window.location.replace('http://localhost/projekti/index.php');
			</script>";
	} else {
		echo "Error";
		header("Location: index.php");
	}

	mysql_close($link);}
}

else{
	header("Location: index.php");
}
?>