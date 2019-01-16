<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	    
	
		$link = mysqli_connect("localhost", "root", "", "db1");

		if(!$link) {
			echo "".mysqli_connect_error();
			header("Location: index.php");
		}
		else{

		$username = mysqli_escape_string($link, $_POST['Usernamelog']);
		$password = mysqli_escape_string($link, $_POST['Passwordlog']);
		$password = hash('sha256', $password);
		$query = "SELECT * from user where Username='$username' and Password='$password'";

		$rreshtat = mysqli_query($link , $query);

		if(mysqli_num_rows($rreshtat) ==1)
		{
			session_start();
			$_SESSION['Username']=$username;
			$rreshti =  mysqli_fetch_row($rreshtat);
			$_SESSION['Name']= $rreshti[0];
			$_SESSION['Lastname']= $rreshti[1];
			if($rreshti[6])
		 	$_SESSION['imagepath']= $rreshti[6];
		 	if($rreshti[7])
		 	$_SESSION['IsAdmin']=$rreshti[7];

			echo "<script type='text/javascript'>
					alert('Jeni loguar me sukses');
					location='index.php';
			 </script>";
		}
		else{
			echo "<script type='text/javascript'>
					alert('Username ose password eshte gabim!');
					location='login.php';
			 </script>";
		}}

	}
	else{
		header("Location: index.php");
	}

?>