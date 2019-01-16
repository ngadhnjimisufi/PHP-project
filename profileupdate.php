<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$link = mysqli_connect("localhost", "root", "", "db1");

	if(!$link) {
		echo "".mysqli_connect_error();
		header("Location: index.php");
	}
	else{
	session_start();

  	$image = $_FILES['image']['name'];

  	// image file directory
  	$target = "profileimages/".basename($image);

	move_uploaded_file($_FILES['image']['tmp_name'], $target);

	$username = mysqli_real_escape_string($link, $_SESSION['Username']);

	$name = $_POST['Name'];
	$lastname = $_POST['Lastname'];

	if($_FILES['image']['size'] == 0)
		$query = "UPDATE user set `Name` = '$name', `Last Name`='$lastname' where Username = '$username'";
	else
	$query = "UPDATE user set `Name` = '$name', `Last Name`='$lastname', `Image`='$image' where Username = '$username'";

	$rreshtat = mysqli_query($link, $query);

	$query1 = "SELECT * from user where Username = '$username' ";

	$asd=mysqli_query($link, $query1);
	 $rreshti =  mysqli_fetch_row($asd);

	 $_SESSION['imagepath']= $rreshti[6];
	 $_SESSION['Name']= $rreshti[0];
	 $_SESSION['Lastname']= $rreshti[1];

		$message = "Te dhenat jane perditsuar me sukses!!";
			echo "<script type='text/javascript'>
					alert('$message');
					location='profile.php';
				   </script>";



	mysqli_close($link);
	}
}
else{header("Location: index.php");}


?>