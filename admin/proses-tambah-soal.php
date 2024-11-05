<?php
include("../dbconn/dbconn.php");

$question = $_POST['pertanyaan'];
$option_a = $_POST['option_a'];
$option_b = $_POST['option_b'];
$option_c = $_POST['option_c'];
$option_d = $_POST['option_d'];
$option_e = $_POST['option_e'];
$jawaban = $_POST['jawaban'];
$kategori = $_POST['kategori'];

$sql = "INSERT INTO kuis (question, option_a, option_b, option_c, option_d, option_e, correct_option, id_kategori) 
VALUES ('$question', '$option_a', '$option_b', '$option_c', '$option_d', '$option_e', '$jawaban', '$kategori')";
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan";
    echo "<script>location='kuis.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>