<?php
    include('dbconn/dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logophile</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <script src="https://kit.fontawesome.com/970e29512e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>

<body style=" background-image: url('img/login_.png'); background-size: 100% auto; background-position: center center; background-repeat: no-repeat;">
  <div class="container col-xl-12 col-xxl-10 px-8 py-5">
    <div class="col-md-10 mx-auto col-lg-5 float-right" style="margin-top: 30px; padding-top: 10px;">
      <div class="card" style="background-color: #1D5D9B; padding: 20px 20px 10px 20px; border-radius:10px;">
        <div class="card-body">
          <div class="card" style="padding: 25px 25px 15px 25px; border-radius:10px;">
            <div class="card-body">
              <form method="POST" action="cek_login.php">
                <h1 style="text-align: center;">Selamat Datang</h1>
                <p style="text-align: center;"> Login </p>
                <div class="form-floating mb-3">
                  <input class="form-control" style="border: 1px solid black; border-radius: 10px;" name="username" type="text" placeholder="Place your username here" />
                  <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input class="form-control" style="border: 1px solid black; border-radius:10px;" name="password" type="password" placeholder="Password" />
                  <label for="password">Password</label>
                </div>
                <div class="input-group mb-3">
                  <label class="input-group-text" for="level" style="border: 1px solid black; border-radius: 10px 0px 0px 10px;">Pengguna</label>
                  <select class="form-select" name="level" style="border: 1px solid black; border-radius:0px 10px 10px 0px;">
                  <option selected>---Pilih tipe Pengguna---</option>
                  <option value="1">Guru</option>
                  <option value="2">Siswa</option>
                </select>
                </div>
                <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                  <button value="LOGIN" name="login" type="submit" class="btn btn-outline-secondary" style="background-color: #1D5D9B; color: white; border: none; width: 195px; height: 40px; border-radius: 10px;">
                  Masuk
                  </button>  
                </div>
                <div class="d-flex align-items-center justify-content-center mt-2 mb-0">
                  <p>Belum memiliki akun? <a href="register.php" style="color: #1D5D9B; text-decoration: none;">Register</a></p>
                </div>
              </form>
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