<?php
include("dbconn/dbconn.php");
session_start();
 
if (!isset($_SESSION['username']) and !isset($_SESSION['nama']) and !isset($_SESSION['id_siswa'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}
$id_siswa = $_SESSION['id_siswa'];
$sql_siswa = "SELECT * FROM data_siswa WHERE id_siswa=$id_siswa";
$result_siswa = $conn->query($sql_siswa);
$row_siswa = $result_siswa->fetch_assoc();
$nama_siswa = $row_siswa['nama'];
$username = $row_siswa['username'];
$sql_materi = "SELECT * FROM materi";
$result_materi = $conn->query($sql_materi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Logophile</title>
  <link rel="icon" href="img/logo.png" type="image/png">
  <script src="https://kit.fontawesome.com/970e29512e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-image: url('img/header.png'); background-size: cover; background-position: center; height: 100px;">
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
          <a href="dashboard.php" class="nav-link" style="color: white; display: block; margin-bottom: 0; line-height: 1; padding-left:0px;">
              Halo <?php echo $nama_siswa ?>,
          </a>
          <h2 style="color: #CAF4FF; margin: 0; line-height: 0;">
              Selamat Belajar
          </h2>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient(180deg, #1D5D9B, #00A9FF);">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link" style="text-decoration: none;">
    <img src="img/logo.png" alt="Logo" class="brand-image" style="opacity: .8; width: 40px; display: block; margin-top: 8px;">
    <span class="brand-text font-weight-light">Logophile </span>
    </a>  

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
            <i class="nav-icon fas fa-border-all"></i>
              <p> 
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pretest.php" class="nav-link">
            <i class="nav-icon far fa-file"></i>
                <p>
                Pretest
                </p>
            </a>
          </li>
          <?php
          // Ambil data id_materi dari tabel
          $query_materi = "SELECT id_materi, judul, keterangan FROM materi ORDER BY id_materi ASC"; // Mengambil id_materi, judul, dan keterangan
          $result_materi = $conn->query($query_materi);

          // Cek jika hasil query ada
          if ($result_materi->num_rows > 0) {
              $counter = 1; // Inisialisasi counter untuk urutan
              // Loop melalui hasil query
              while ($row_materi = $result_materi->fetch_row()) {
                  $id_materi = $row_materi[0]; // Mengakses id_materi
                  ?>
                  <li class="nav-item">
                      <a href="materi.php?detail=<?php echo $id_materi; ?>" class="nav-link"> <!-- Menggunakan $id_materi -->
                          <i class="nav-icon far fa-file-lines"></i>
                          <p>
                              Materi <?php echo $counter; ?> <!-- Menampilkan urutan dari 1 hingga total materi -->
                          </p>
                      </a>
                  </li>
                  <?php
                  $counter++; // Increment counter untuk urutan berikutnya
              }
          } else {
              echo "Tidak ada materi yang ditemukan.";
          }
          ?>
          <li class="nav-item">
            <a href="posttest.php" class="nav-link">
            <i class="nav-icon far fa-file"></i>
                <p>
                Posttest
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
            <a href="about.php" class="nav-link">
              <i class="nav-icon far fa-circle-question"></i>
              <p>
                Tentang WEB
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
            <h1 class="m-0">Dashboard</h1>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" style="padding: 0px 20px 20px 20px;">
      <div class="card mb-0" style="border-radius: 25px; padding:15px 15px 15px 15px;">
        <div class="card-body">
          <h4 style="color: #1D5D9B; padding-bottom:10px;">Pembelajaran</h4>
            <div class="container-fluid">
              <div class="row">
                <?php
                $result_materi->data_seek(0);

                while($row_materi = $result_materi->fetch_assoc()) {
                    $judul = $row_materi['judul'];
                    $keterangan = $row_materi['keterangan'];
                ?>
                <div class="card card-success" style="background-color: #CAF4FF; border-radius: 25px;">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-12">
                              <div class="card-body" style="padding: 0px;">
                                  <h5 class="card-title font-weight-bold" style="color:#1D5D9B">
                                      <?php echo $judul; ?>
                                  </h5>
                                  <p class="card-text text-justify"><?php echo $keterangan; ?></p>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              <?php
              }
              ?>
              </div>
          </div>
          <div class="row">
          <div class="row">
            <div class="col-6 d-flex flex-column">
                <h4 style="color: #1D5D9B; padding-bottom:10px;">Penilaian</h4>
                <div class="card card-success flex-fill" style="background-color: #CAF4FF; border-radius: 25px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body" style="padding: 5px 15px;">
                                  <table class="table">
                                    <thead>
                                        <tr style="color: #1D5D9B;">
                                            <th style="text-align: left;">Nama Kuis</th>
                                            <th style="text-align: right;">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Misalnya, $id_siswa sudah didefinisikan sebelumnya
                                        $id_siswa = $_SESSION['id_siswa']; // Ambil ID siswa dari session

                                        // Ambil semua materi
                                        $query_materi = "SELECT m.id_materi, m.judul, m.id_kategori 
                                                        FROM materi m
                                                        ORDER BY m.id_materi ASC"; // Mengambil id_materi

                                        $result_materi = $conn->query($query_materi);

                                        // Cek jika hasil query ada
                                        if ($result_materi->num_rows > 0) {
                                            while ($row_materi = $result_materi->fetch_assoc()) {
                                                $id_materi = $row_materi['id_materi'];
                                                $judul = $row_materi['judul'];

                                                // Ambil nilai dari hasil_kuis untuk siswa dan materi
                                                $query_nilai = "
                                                    SELECT hk.skor 
                                                    FROM hasil_kuis hk 
                                                    JOIN kuis k ON hk.id_kuis = k.id_kategori 
                                                    WHERE hk.id_siswa = ? AND k.id_kategori = ?";
                                                
                                                $stmt = $conn->prepare($query_nilai);
                                                $stmt->bind_param("ii", $id_siswa, $row_materi['id_kategori']);
                                                $stmt->execute();
                                                $result_nilai = $stmt->get_result();

                                                // Cek apakah ada nilai yang ditemukan
                                                if ($result_nilai->num_rows > 0) {
                                                    $row_nilai = $result_nilai->fetch_assoc();
                                                    $skor = $row_nilai['skor'];
                                                } else {
                                                    $skor = 0; // Jika belum mengerjakan, nilai adalah 0
                                                }
                                                ?>

                                                <tr>
                                                    <td style="text-align: left; padding-bottom:0px;">
                                                        <ul style="padding: 0; list-style-type: none;"> <!-- Menghapus bullet point -->
                                                            <li><?php echo $judul; ?></li> <!-- Menampilkan judul materi -->
                                                        </ul>
                                                    </td>
                                                    <td style="text-align: right;"><?php echo $skor; ?></td> <!-- Menampilkan nilai -->
                                                </tr>
                                                
                                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='2'>Tidak ada materi yang ditemukan.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 d-flex flex-column">
                <h4 style="color: #1D5D9B; padding-bottom:10px;">Tentang WEB</h4>
                <div class="card card-success flex-fill" style="background-color: #CAF4FF; border-radius: 25px;">
                    <div class="card-body d-flex align-items-center" style="padding: 25px 25px;">
                        <div>
                            <h5 class="card-title font-weight-bold" style="color:#1D5D9B;">Logophile</h5>
                            <p class="card-text text-justify">Website ini dikembangkan sebagai bagian dari tugas akhir kuliah 
                              sebagai Multimedia Interaktif untuk membantu proses pengajaran dengan menerapkan Model Scaffolding. 
                              Melalui platform ini, pengguna diharapkan adanya peningkatan Berpikir Logika dalam materi 
                              Konsep Pemrograman Berorientasi Objek (PBO) dari elemen Pemrograman Berbasis Teks, Grafis, dan Multimedia. 
                              Website ini juga diharapkan dapat menjadi motivasi yang bermanfaat bagi guru dan siswa dalam proses pembelajaran.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/styles.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
