<?php
include("../dbconn/dbconn.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id = $_POST['id'];
    $pertanyaan = $_POST['pertanyaan'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $option_e = $_POST['option_e'];
    $jawaban = $_POST['jawaban'];
    $kategori = $_POST['kategori'];

    // Update query
    $sql = "UPDATE kuis SET 
            question = '$pertanyaan', 
            option_a = '$option_a', 
            option_b = '$option_b', 
            option_c = '$option_c', 
            option_d = '$option_d', 
            option_e = '$option_e', 
            correct_option = '$jawaban', 
            id_kategori = '$kategori' 
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: soal.php?id=$kategori"); // Redirect to a success page
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request method.";
}
?>
