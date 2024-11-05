<?php
include('../dbconn/dbconn.php');
    $nama_kategori = $_POST['nama_kategori'];
    $id_guru = $_POST['nama_guru'];
    $keterangan = $_POST['keterangan'];

    $sql = "INSERT INTO kategori_kuis (nama_kategori, id_guru, keterangan) VALUES ('$nama_kategori', '$id_guru', '$keterangan')";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
        echo "<script>location='kuis.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>