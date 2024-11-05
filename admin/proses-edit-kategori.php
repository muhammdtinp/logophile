<?php
include("../dbconn/dbconn.php");
session_start();

if (isset($_POST['edit_kategori'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];
    $keterangan = $_POST['keterangan'];
    $id_guru = $_POST['id_guru'];

    // Update query
    $sql = "UPDATE kategori_kuis SET nama_kategori=?, keterangan=?, id_guru=? WHERE id_kategori=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nama_kategori, $keterangan, $id_guru, $id_kategori);

    if ($stmt->execute()) {
        header("Location: kuis.php?update_success");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>