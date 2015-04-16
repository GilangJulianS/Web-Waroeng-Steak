<?php
	$con = mysqli_connect("localhost", "root", "", "tubes_si");

	if(!$con){
		die("Connection failed: " . mysqli_connect_error());
	}

	$date = $_POST['tanggal'];
	$sql = "SELECT nama_bahan, SUM(jumlah) As sum FROM bahan, pesanan WHERE id_pesanan=id AND tanggal='$date' GROUP BY nama_bahan";
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
						<td>'. $row['sum']. ' kg</td>
					</tr>';
		}
		echo '</tbody>';
	}

	mysqli_close($con);
?>