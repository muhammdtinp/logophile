<?php
include("../dbconn/dbconn.php");
session_start();
if (!isset($_SESSION['username']) and !isset($_SESSION['nama']) and !isset($_SESSION['id_guru'])) {
  header("Location: index.php");
  exit(); // Terminate script execution after the redirect
}
$id_guru = $_SESSION['id_guru'];

$sql_guru = "SELECT * FROM guru WHERE id_guru=$id_guru";
$result_guru = $conn->query($sql_guru);
$row_guru = $result_guru->fetch_assoc();
$nama_guru = $row_guru['nama'];
$username = $row_guru['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Logophile</title>
  <link rel="icon" href="/logophile/img/logo.png" type="image/png">  
  <script src="https://kit.fontawesome.com/970e29512e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-image: url('/logophile/img/header.png'); background-size: cover; background-position: center; height: 100px;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item" style="padding-left: 20px;">
      <div style="display: inline-block; padding: 15px 18px 0px 18px !important; background-color: #1D5D9B; border-radius: 10px; text-align: center;">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: white; font-size: 18px; padding: 0; margin: 0;">
            <i class="fas fa-bars"></i>
        </a>
    </div>
      </li>
      <li class="nav-item" style="padding-left: 20px;">
      <div style="display: inline-block; padding: 15px 18px 0px 18px !important; background-color: #1D5D9B; border-radius: 10px; text-align: center;">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button" style="color: #CAF4FF; font-size: 18px; padding: 0; margin: 0;">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
      </div>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      </li>
      <li class="nav-item d-none d-sm-inline-block" style="text-align: left; padding-right:5px;">
          <a href="index-admin.php" class="nav-link" style="color: white; display: block; margin-bottom: 0; line-height: 1; padding-left:0px;">
              Halo <?php echo $nama_guru ?>,
          </a>
          <h2 style="color: #CAF4FF; margin: 0; line-height: 0;">
              Semangat Mengajar
          </h2>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient(180deg, #1D5D9B, #00A9FF);">
    <!-- Brand Logo -->
    <a href="index-admin.php" class="brand-link" style="text-decoration: none;">
    <img src="/logophile/img/logo.png" alt="Logo" class="brand-image" style="opacity: .8; width: 40px; display: block; margin-top: 8px;">
    <span class="brand-text font-weight-light">Logophile </span>
    </a> 

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index-admin.php" class="nav-link">
            <i class="nav-icon fas fa-border-all"></i>
              <p> 
                Dashboard
              </p>
            </a>
          </li>    
          <li class="nav-item">
            <a href="materi.php" class="nav-link">
            <i class="nav-icon far fa-file-lines"></i>
              <p>
                Materi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kuis.php" class="nav-link">
            <i class="nav-icon far fa-file"></i>
              <p>
                Kuis
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data-siswa.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data-laporan.php" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Data Laporan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data-nilai.php" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Rekap Nilai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="forum.php" class="nav-link">
              <i class="nav-icon far fa-comment-dots"></i>
              <p>
                Forum Kolaboratif
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-arrow-right-from-bracket"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
      </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <h1 class="m-0">Tambah Materi</h1>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
     <div class="content" style="padding: 0px 20px 20px 20px;">
      <div class="card mb-0" style="border-radius: 25px; padding:15px 15px 15px 15px;">
        <div class="card-body">
          <div class="container-fluid">
            <div class="row">
                <form action="proses-tambah-materi.php" method="post" enctype="multipart/form-data">
                  <label for="judul" class="form-label">Nama Materi :</label><br>
                  <input class="form-control" type="text" id="judul" name="judul" required><br>
                  <label for="link_youtube" class="form-label">Link Video YouTube:</label><br>
                  <div style="display: inline;">
                      <span style="white-space: nowrap; margin-right: 5px;">https://www.youtube.com/watch?v=</span>
                      <input class="form-control" type="text" id="link_youtube" name="link_youtube" placeholder="ID Video" style="display: inline; width: auto;"/>
                  </div><br><br>
                  <label for="pembuka" class="form-label">Awal Materi:</label><br>
                  <textarea class="form-control" id="pembuka" name="pembuka" style="height: 100px"></textarea><br>
                  <label for="isi" class="form-label">Isi Materi:</label><br>
                  <textarea class="form-control" id="isi" name="isi" style="height: 100px"></textarea><br>
                  <label for="penutup" class="form-label">Akhir Materi:</label><br>
                  <textarea class="form-control" id="penutup" name="penutup" style="height: 100px"></textarea><br>
                  <label for="gambar" class="form-label">Thumbnail Materi :</label>
                  <input class="form-control" type="file" id="gambar" name="gambar"><br>
                  <label for="gambar_materi" class="form-label">Gambar dalam Materi :</label>
                  <input class="form-control" type="file" id="gambar_materi" name="gambar_materi"><br>
                  <label for="modul" class="form-label">Modul: <span style="color: lightgray;">*dalam bentuk PDF</span></label>
                  <input class="form-control" type="file" id="modul" name="modul"><br>
                  <label for="lkpd" class="form-label">LKPD: <span style="color: lightgray;">*dalam bentuk PDF</span></label>
                  <input class="form-control" type="file" id="lkpd" name="lkpd"><br>
                  <label for="id_kategori" class="form-label">Kategori Kuis untuk Soal Materi:</label><br>
                  <select id="id_kategori" name="id_kategori" class="form-control">
                      <?php
                      $sql_kategori = "SELECT * FROM kategori_kuis";
                      $result_kategori = $conn->query($sql_kategori);
                      if ($result_kategori->num_rows > 0) {
                          while ($row_kategori = $result_kategori->fetch_assoc()) {
                              echo "<option value='" . $row_kategori["id_kategori"] . "'>" . $row_kategori["nama_kategori"] . "</option>";
                          }
                      }
                      ?>
                  </select>
                  <small class="form-text text-muted">
                      *untuk menambah kategori kuis, dapat akses fitur kuis dan tambah kategori.
                  </small><br>
                  <label for="nama_guru">Nama Guru:</label><br>
                  <select id="nama_guru" name="nama_guru" class="form-control">
                      <?php
                      $sql_guru = "SELECT * FROM guru";
                      $result_guru = $conn->query($sql_guru);
                      if ($result_guru->num_rows > 0) {
                          while ($row_guru = $result_guru->fetch_assoc()) {
                              echo "<option value='" . $row_guru["id_guru"] . "'>" . $row_guru["nama"] . "</option>";
                          }
                      }
                      ?>
                  </select><br>
                  <label for="keterangan" class="form-label">Keterangan</label><br>
                  <textarea class="form-control" id="keterangan" name="keterangan" style="height: 100px"></textarea>
                  <br>
                  <button value="Tambah Kategori" name="upload" type="submit" class="btn btn-primary">Tambah Kategori</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../js/jquery.js"></script>
  <script src="../js/styles.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>