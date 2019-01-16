<?php
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$link = mysqli_connect("localhost", "root", "", "db1");

		if(!$link) {
			echo "".mysqli_connect_error();
			header("Location: index.php");
		}
		else{
			function ekziston($input){
				 global $originaltitulli, $link, $titulli;
				 	if($input){
						$query = "SELECT * FROM services WHERE Titulli = '$titulli'";
					}
					else{
						$query = "SELECT * FROM services WHERE Titulli = '$originaltitulli'";
					}

					$rreshtat = mysqli_query($link, $query);
					$flag = true;
					if(mysqli_num_rows($rreshtat) == 1) {
						$flag = false;
						if($input && $input != "delete"){
						$message = "Ky service ekziston!";
							echo "<script type='text/javascript'>
									alert('$message');
									location='servicescrud.php';
								   </script>";}
					}
					else if($input==null || $input=="delete"){
						$message = "Ky service nuk ekziston!";
							echo "<script type='text/javascript'>
									alert('$message');
									location='servicescrud.php';
								   </script>";}			
					return $flag;
			}

			function mesazhi(){
						$message = "Services jane perditsuar me sukses!";
						echo "<script type='text/javascript'>
								alert('$message');
								location='servicescrud.php';
							   </script>";
			}
			
		session_start();

		/* img settings */
	  	$image = $_FILES['image']['name'];

	  	$target = "serviceimages/".basename($image);


		$originaltitulli = mysqli_real_escape_string($link, $_POST['Originaltitle']);
		$titulli = mysqli_real_escape_string($link, $_POST['Title']);
		$pershkrimi = mysqli_real_escape_string($link, $_POST['Description']);

		if (isset($_POST['Create'])) {
			if(ekziston("asd")){
				$query = "INSERT INTO `services`(`Titulli`, `Pershkrimi`, `Serviceimage`) VALUES('$titulli', '$pershkrimi','$image')";
			move_uploaded_file($_FILES['image']['tmp_name'], $target);
			mysqli_query($link, $query);
			mesazhi();
			}     
	    } 

	    else if (isset($_POST['Update'])){

	    	if(!ekziston(null)){
	    		if(($titulli!=$originaltitulli)?ekziston("asd"):true){
					if($_FILES['image']['size'] == 0)
						$query = "UPDATE services set Titulli = '$titulli', Pershkrimi = '$pershkrimi' where Titulli = '$originaltitulli'";
					else{
						

						$query1 = "SELECT * from services WHERE Titulli = '$originaltitulli'";
						$asd=mysqli_query($link, $query1);
						$row = mysqli_fetch_array($asd, MYSQLI_NUM);				
						$vlera = $row[2];
						$path = "serviceimages/".$vlera;
						unlink($path);


						$query = "UPDATE services set Titulli = '$titulli',  Pershkrimi = '$pershkrimi', Serviceimage='$image' where Titulli = '$originaltitulli'";
						move_uploaded_file($_FILES['image']['tmp_name'], $target); 
					}
					mysqli_query($link, $query); 
					mesazhi();
				}
			}
	    }

	 	else if (isset($_POST['Delete'])){
	    	if(!ekziston("delete")){
	    		
				$query1 = "SELECT * from services WHERE Titulli = '$originaltitulli'";
				$asd=mysqli_query($link, $query1);
				$row = mysqli_fetch_array($asd, MYSQLI_NUM);				
				$vlera = $row[2];
				$path = "serviceimages/".$vlera;
				unlink($path);	

				$query = "DELETE from services where Titulli = '$titulli'"; 
				mysqli_query($link, $query);

				mesazhi();
			}    	
	    }	
		


	mysqli_close($link);
	}
}
else{
	header("Location: index.php");}
?>