<?php
include("../dbconn/dbconn.php");
session_start();

// Cek jika user sudah login
if (!isset($_SESSION['username']) || !isset($_SESSION['nama']) || !isset($_SESSION['id_guru'])) {
    header("Location: index.php");
    exit(); // Hentikan eksekusi skrip setelah redirect
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_materi = mysqli_real_escape_string($conn, $_POST['id_materi']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $pembuka = mysqli_real_escape_string($conn, $_POST['pembuka']);
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);
    $penutup = mysqli_real_escape_string($conn, $_POST['penutup']);
    $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);
    $id_kategori = mysqli_real_escape_string($conn, $_POST['id_kategori']);
    $nama_guru = mysqli_real_escape_string($conn, $_POST['nama_guru']);
    $link_youtube = mysqli_real_escape_string($conn, $_POST['link_youtube']);

    // Initialize gambar, gambar materi, modul, dan LKPD
    $gambar = '';
    $gambar_materi = '';
    $modul = '';
    $lkpd = '';

    // Upload gambar
    if (!empty($_FILES['gambar']['name'])) {
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi file
        if (getimagesize($_FILES["gambar"]["tmp_name"]) === false) {
            echo "File is not an image.";
            exit();
        }
        if ($_FILES["gambar"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            exit();
        }
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        // Upload file
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar = basename($_FILES["gambar"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else {
        // Ambil nama file lama jika tidak ada upload baru
        $sql = "SELECT gambar FROM materi WHERE id_materi='$id_materi'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_array($result);
            $gambar = $row['gambar'];
        }
    }

    // Upload gambar materi
    if (!empty($_FILES['gambar_materi']['name'])) {
        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["gambar_materi"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi file
        if (getimagesize($_FILES["gambar_materi"]["tmp_name"]) === false) {
            echo "File is not an image.";
            exit();
        }
        if ($_FILES["gambar_materi"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            exit();
        }
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }

        // Upload file
        if (move_uploaded_file($_FILES["gambar_materi"]["tmp_name"], $target_file)) {
            $gambar_materi = basename($_FILES["gambar_materi"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else {
        // Ambil nama file lama jika tidak ada upload baru
        $sql = "SELECT gambar_materi FROM materi WHERE id_materi='$id_materi'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_array($result);
            $gambar_materi = $row['gambar_materi'];
        }
    }

    // Upload modul
    if (!empty($_FILES['modul']['name'])) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["modul"]["name"]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi file
        if ($fileType != "pdf") {
            echo "Sorry, only PDF files are allowed for modul.";
            exit();
        }

        // Upload file
        if (move_uploaded_file($_FILES["modul"]["tmp_name"], $target_file)) {
            $modul = basename($_FILES["modul"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else {
        // Ambil nama file lama jika tidak ada upload baru
        $sql = "SELECT modul FROM materi WHERE id_materi='$id_materi'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_array($result);
            $modul = $row['modul'];
        }
    }

    // Upload LKPD
    if (!empty($_FILES['lkpd']['name'])) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["lkpd"]["name"]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validasi file
        if ($fileType != "pdf") {
            echo "Sorry, only PDF files are allowed for LKPD.";
            exit();
        }

        // Upload file
        if (move_uploaded_file($_FILES["lkpd"]["tmp_name"], $target_file)) {
            $lkpd = basename($_FILES["lkpd"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    } else {
        // Ambil nama file lama jika tidak ada upload baru
        $sql = "SELECT lkpd FROM materi WHERE id_materi='$id_materi'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $row = mysqli_fetch_array($result);
            $lkpd = $row['lkpd'];
        }
    }

    // Update database
    $sql = "UPDATE materi SET 
                judul='$judul', 
                pembuka='$pembuka', 
                isi='$isi', 
                penutup='$penutup', 
                gambar='$gambar', 
                gambar_materi='$gambar_materi', 
                modul='$modul', 
                lkpd='$lkpd', 
                keterangan='$keterangan', 
                id_kategori='$id_kategori', 
                id_guru='$nama_guru',
                link_youtube='$link_youtube' 
            WHERE id_materi='$id_materi'";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: materi.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
