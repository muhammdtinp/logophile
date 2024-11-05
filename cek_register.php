<?php
include('dbconn/dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nis = $_POST['nis'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO data_siswa (nama, email, username, password, nis, gender, alamat, no_hp) 
            VALUES ('$nama', '$email', '$username', '$password', '$nis', '$gender', '$alamat', '$no_hp')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "<script>location='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
