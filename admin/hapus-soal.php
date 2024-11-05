<?php
include("../dbconn/dbconn.php");
    //Hapus Data
    $hapus = $_GET['id'];
    $sql_hapus = "DELETE FROM kuis WHERE id='$hapus'";
    if ($conn->query($sql_hapus)===TRUE) {
        echo "<script>alert('Data anda berhasil dihapus');</script>";
         echo "<script>location='kuis.php';</script>";
    }
    else {
        echo "error:".$conn->error;
    }
    $conn->close();
?>