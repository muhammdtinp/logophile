<?php
    // Memanggil file koneksi db
	include('../dbconn/dbconn.php');
	
    //Hapus Data
    $id_hapus = $_GET['id_hapus'];
    $sql_hapus = "DELETE FROM kategori_kuis WHERE id_kategori='$id_hapus'";
    if ($conn->query($sql_hapus)===TRUE) {
        echo "<script>alert('Data anda berhasil dihapus');</script>";
         echo "<script>location='kuis.php';</script>";
    }
    else {
        echo "error:".$conn->error;
    }
    $conn->close();
?>