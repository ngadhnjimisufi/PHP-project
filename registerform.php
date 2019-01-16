<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$link = mysqli_connect("localhost", "root", "", "db1");

	if(!$link) {
		echo "".mysqli_connect_error();
		header("Location: index.php");
	}
	else{
	$name = mysqli_real_escape_string($link, $_POST['Name']);
	$lastname = mysqli_real_escape_string($link, $_POST['Lastname']);
	$gender = $_POST['Gender'];
	$username = mysqli_real_escape_string($link, $_POST['Username']);
	$email = mysqli_real_escape_string($link, $_POST['Email']);
	$password = mysqli_real_escape_string($link, $_POST['Password']);
	$password = hash('sha256', $password);

	$query = "SELECT * FROM user WHERE Username = '$username'";
	$query1 = "SELECT * FROM user WHERE Email = '$email'";
	$rreshtat = mysqli_query($link, $query);
	$rreshtat1 = mysqli_query($link, $query1);

	if(mysqli_num_rows($rreshtat) == 1) {
		$message = "Ky username eshte perdorur, provoni nje tjeter!";
			echo "<script type='text/javascript'>
					alert('$message');
					location='login.php';
				   </script>";
	}
	else if(mysqli_num_rows($rreshtat1) == 1) {
		$message = "Ky email eshte perdorur, provoni nje tjeter!";
			echo "<script type='text/javascript'>
					alert('$message');
					location='login.php';
				   </script>";
	}

	else {
		session_start();
		$query = "INSERT INTO `user`(`Name`, `Last Name`, `Gender`, `Username`, `Email`, `Password`) VALUES('$name', '$lastname', '$gender' , '$username','$email','$password')";
		mysqli_query($link, $query);

		$_SESSION['Name'] = $name;
		$_SESSION['Lastname'] = $lastname;
		$_SESSION['Username'] = $username;
		$_SESSION['Email'] = $email;
		$message = "Jeni regjistruar me sukses.";
		echo "<script type='text/javascript'>
					alert('$message');
					location='index.php';
				   </script>";
	}

	mysqli_close($link);
	}
}
else{
		header("Location: index.php");
	}
	

?>