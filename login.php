<?php
	$con = mysqli_connect("localhost", "root", "", "tubes_si");

	if(!$con){
		die("Connection failed: " . mysqli_connect_error());
	}

	$username = $_POST["username"];
	$password = $_POST["password"];
	$sql = "SELECT * FROM pegawai WHERE username='". $username."'";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));;
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		if($password == $row["password"]){	
			echo '	<div id="user">'.$row["username"].'</div>
					<div id="role">'.$row["status"].'</div>';
		}
	}else{
		echo 'null';
	}

	mysqli_close($con);
?>