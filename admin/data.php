<?php
include("../dbconn/dbconn.php");
session_start();

// Query untuk mengambil data
$sql = "SELECT hasil_kuis.id_hasil, data_siswa.nama, kategori_kuis.nama_kategori,
        hasil_kuis.skor, hasil_kuis.date FROM hasil_kuis
        INNER JOIN kategori_kuis ON hasil_kuis.id_kuis = kategori_kuis.id_kategori
        INNER JOIN data_siswa ON hasil_kuis.id_siswa = data_siswa.id_siswa";

$result = $conn->query($sql);

if (!$result) {
    die("Error: " . $conn->error);
}

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Tutup koneksi
$conn->close();

// Kembalikan data dalam format JSON
echo json_encode(array('data' => $data));
?>
