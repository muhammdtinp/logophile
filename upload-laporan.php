<?php
include('dbconn/dbconn.php');

$nama_kelompok = $_POST['nama_kelompok'];
$anggota = $_POST['anggota'];
$tema = $_POST['tema'];
$hasil = $_POST['hasil'];
$sumber = $_FILES['berkas']['tmp_name'];
    $target = 'uploads/';
    $nama_berkas = $_FILES['berkas']['name'];
$pindah = move_uploaded_file($sumber, $target.$nama_berkas);

if($pindah){

$query = "insert into laporan values('','$nama_kelompok', '$anggota', '$tema', '$hasil', '$nama_berkas')";

$hasil = mysqli_query($conn, $query);

}

if($hasil)

{
echo "<script>alert('Data anda berhasil disimpan');</script>";
header("location:dashboard.php");

}

else{

    echo "Penyimpanan gagal";

} 

?>