<?php
include("../dbconn/dbconn.php");
    //Hapus Data
    $hapus = $_GET['hapus'];
    $sql_hapus = "DELETE FROM materi WHERE id_materi='$hapus'";
    if ($conn->query($sql_hapus)===TRUE) {
        echo "<script>alert('Data anda berhasil dihapus');</script>";
         echo "<script>location='materi.php';</script>";
    }
    else {
        echo "error:".$conn->error;
    }
    $conn->close();
?>