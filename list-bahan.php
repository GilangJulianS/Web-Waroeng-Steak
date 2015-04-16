<?php
	$con = mysqli_connect("localhost", "root", "", "tubes_si");

	if(!$con){
		die("Connection failed: " . mysqli_connect_error());
	}

	$id = $_POST['id-pesanan'];
	$sql = "SELECT * FROM bahan WHERE id_pesanan=$id";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
	if(mysqli_num_rows($result) > 0){
		echo '<tbody>
				<tr>
					<th>Nama Bahan</th>
					<th>Jumlah</th>
				</tr>';
		while($row = mysqli_fetch_assoc($result)){
			echo '	<tr>
						<td>'. $row['nama_bahan'].'</td>
						<td>'. $row['jumlah']. ' kg</td>
					</tr>';
		}
		echo '</tbody>';
	}

	mysqli_close($con);
?>