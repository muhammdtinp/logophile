<?php
include('../dbconn/dbconn.php');
session_start();


if (isset($_POST['edit_siswa'])) {
    // Ambil data dari form dan lakukan sanitasi
    $id_siswa = mysqli_real_escape_string($conn, $_POST['id_siswa']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $nis = mysqli_real_escape_string($conn, $_POST['nis']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);

    // Update query
    $query = "UPDATE data_siswa SET 
              nama = '$nama',
              email = '$email', 
              username = '$username', 
              password = '$password', 
              nis = '$nis', 
              gender = '$gender', 
              alamat = '$alamat', 
              no_hp = '$no_hp' 
              WHERE id_siswa = '$id_siswa'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: data-siswa.php');
    } else {
        echo "Update data gagal: " . mysqli_error($conn);
    }
} else {
    die("Akses dilarang...");
}
?>
