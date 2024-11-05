<?php 
include ("../dbconn/dbconn.php");

// Mengambil data dari form
$judul = $_POST['judul'];
$pembuka = $_POST['pembuka'];
$isi = $_POST['isi'];
$penutup = $_POST['penutup'];
$keterangan = $_POST['keterangan'];
$id_guru = $_POST['nama_guru'];
$id_kategori = $_POST['id_kategori']; // Pastikan ini sesuai dengan input form
$link_youtube = $_POST['link_youtube'];
$modul = $_FILES['modul']['tmp_name'];
$lkpd = $_FILES['lkpd']['tmp_name'];
$sumber = $_FILES['gambar']['tmp_name'];
$foto = $_FILES['gambar_materi']['tmp_name'];

// Menentukan target folder
$target_gambar = '../img/'; // Untuk gambar
$target_modul = '../uploads/'; // Untuk modul
$target_lkpd = '../uploads/'; // Untuk LKPD

// Mengambil nama file
$nama_gambar = $_FILES['gambar']['name'];
$nama_foto = $_FILES['gambar_materi']['name'];
$nama_modul = $_FILES['modul']['name'];
$nama_lkpd = $_FILES['lkpd']['name'];

// Memindahkan file yang diunggah
$pindah = move_uploaded_file($sumber, $target_gambar . $nama_gambar);
$move = move_uploaded_file($foto, $target_gambar . $nama_foto);
$move_modul = move_uploaded_file($modul, $target_modul . $nama_modul);
$move_lkpd = move_uploaded_file($lkpd, $target_lkpd . $nama_lkpd);

// Memeriksa apakah semua file berhasil dipindahkan
if ($pindah && $move && $move_modul && $move_lkpd) {
    // Query untuk menyimpan data ke tabel materi
    $query = "INSERT INTO materi (judul, pembuka, isi, penutup, keterangan, gambar, gambar_materi, id_guru, id_kategori, link_youtube, modul, lkpd) 
              VALUES ('$judul', '$pembuka', '$isi', '$penutup', '$keterangan', '$nama_gambar', '$nama_foto', '$id_guru', '$id_kategori', '$link_youtube', '$nama_modul', '$nama_lkpd')";

    // Eksekusi query
    $hasil = mysqli_query($conn, $query);

    // Mengecek hasil eksekusi query
    if ($hasil) {
        // Jika berhasil, redirect ke halaman materi
        header("location:materi.php");
        exit(); // Pastikan tidak ada kode lain yang dieksekusi setelah ini
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Penyimpanan gagal: " . mysqli_error($conn);
    }
} else {
    // Jika gagal memindahkan file, tampilkan pesan
    echo "Pindah file gagal.";
} 
?>