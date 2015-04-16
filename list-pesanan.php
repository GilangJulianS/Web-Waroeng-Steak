<?php
	$con = mysqli_connect("localhost", "root", "", "tubes_si");

	if(!$con){
		die("Connection failed: " . mysqli_connect_error());
	}

	$date = $_POST['tanggal'];
	$sql = "SELECT *, outlet.id AS outletid, pesanan.id AS pesananid FROM pesanan,outlet,pegawai WHERE tanggal='$date' AND username_pemesan = username AND outlet.id = id_outlet";
	$result = mysqli_query($con, $sql) or die(mysqli_error($con));
	if(mysqli_num_rows($result) > 0){
		echo '<tbody>
				<tr>
					<th>Alamat Outlet</th>
					<th>Nama Pemesan</th>
					<th></th>
				</tr>';
		while($row = mysqli_fetch_assoc($result)){
			echo '	<tr>
						<td>'. $row['alamat'].'</td>
						<td>'. $row['nama']. '</td>
						<td><a href="#openModal" class="btn btn-default cust-btn" id="lihat-pesanan-'.$row['pesananid'].'" data-toggle="modal">Lihat pesanan</a></td>
					</tr>';
		}
		echo '</tbody>';
	}else{
		echo '<h1>Tidak ada pesanan hari ini</h1>';
	}

	mysqli_close($con);
?>