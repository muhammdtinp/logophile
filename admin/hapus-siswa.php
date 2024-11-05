<?php
include("../dbconn/dbconn.php");
    //Hapus Data
    $hapus = $_GET['hapus'];
    $sql_hapus = "DELETE FROM data_siswa WHERE id_siswa='$hapus'";
    if ($conn->query($sql_hapus)===TRUE) {
        echo "<script>alert('Data anda berhasil dihapus');</script>";
         echo "<script>location='data-siswa.php';</script>";
    }
    else {
        echo "error:".$conn->error;
    }
    $conn->close();
?>