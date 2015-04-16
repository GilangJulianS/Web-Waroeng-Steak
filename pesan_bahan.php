<?php
/**
 * Created by PhpStorm.
 * User: Yanfa
 * Date: 16/04/2015
 * Time: 18:33
 */
    $con = mysqli_connect("localhost","root","","tubes_si");
    $counter_total = mysqli_real_escape_string($con, $_POST['counter_total']);
    $username = mysqli_real_escape_string($con, $_POST['username']);

    //add query tabel pesanan
    $date = "".date("Y-m-d");
    $sql_pesanan = "INSERT INTO pesanan (tanggal, username_pemesan) VALUES ('$date', '$username')";
    if (!mysqli_query($con, $sql_pesanan)) {
        die('Error: ' . mysqli_error($con));
    }
    $result = mysqli_query($con,"SELECT * FROM pesanan WHERE id = (SELECT MAX(id) FROM pesanan)") or die(mysqli_error($con));
    $row = mysqli_fetch_row($result);

    $id_pesanan = $row[0];

    for($i = 0; $i < $counter_total; $i++){
        //add tabel bahan
        $nama_bahan = mysqli_real_escape_string($con, $_POST['option_' . $i]);
        $jumlah_bahan = mysqli_real_escape_string($con, $_POST['jumlah_' . $i]);
        if ($nama_bahan != null && $jumlah_bahan != null) {
            $sql_bahan = "INSERT INTO bahan (id_pesanan, nama_bahan, jumlah) VALUES ('$id_pesanan', '$nama_bahan', '$jumlah_bahan')";
            if (!mysqli_query($con, $sql_bahan)) {
                die('Error: ' . mysqli_error($con));
            }
        }
        else{
            echo "Judul, Tanggal, atau Konten tidak boleh kosong.";
        }
    }
    mysqli_close($con);
    header('Location: index.html');
?>