<?php
    include('dbconn/dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Legophile</title>
  <link rel="icon" href="img/logo.png" type="image/png">
  <script src="https://kit.fontawesome.com/970e29512e.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>

<body style=" background-image: url('img/login_.png'); background-size: 100% auto; background-position: center center; background-repeat: no-repeat;">
  <div class="container col-xl-12 col-xxl-10 px-8 py-5">
    <div class="col-md-12 mx-auto col-lg-6 float-right" style="padding-top: 10px; margin-bottom: 20px">
      <div class="text-center" style="margin-top: -40px;"></div>
        <div class="card" style="background-color: #1D5D9B; padding: 20px 20px 10px 20px; border-radius:10px;">
          <div class="card-body">
            <div class="card" style="padding: 10px 25px 15px 25px; border-radius:10px;">
              <div class="card-body">
                <h1 style="text-align: center;">Belum punya akun?</h1>
                <p style="text-align: center;"> Daftar </p>             
                <form method="POST" action="cek_register.php">
                  <div class="form-floating mb-3">
                    <input class="form-control" style="border: 1px solid black; border-radius: 10px;" name="nama" type="text" placeholder="Place your Name here" />
                    <label for="nama">Nama</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input class="form-control" style="border: 1px solid black; border-radius: 10px;" name="email" type="email" placeholder="Place your Email here" />
                    <label for="email">Email</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input class="form-control" style="border: 1px solid black; border-radius: 10px;" name="username" type="text" placeholder="Place your Username here" />
                    <label for="username">Username</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input class="form-control" style="border: 1px solid black; border-radius: 10px;" name="password" type="password" placeholder="Place your Password here" />
                    <label for="password">Password</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input class="form-control" style="border: 1px solid black; border-radius: 10px;" name="nis" type="text" placeholder="Place your NIS here" />
                    <label for="nis">NIS</label>
                  </div>
                  <div class="form-floating mb-3">
                    <fieldset>
                    <p class="fw-bold">Gender : </p>
                      <div>
                        <input type="radio" id="genderchoice1" name="gender" value="Laki-Laki" />
                        <label for="genderchoice1">Laki - Laki</label>
                        <input type="radio" id="genderchoice2" name="gender" value="Perempuan" />
                        <label for="genderchoice2">Perempuan</label>
                      </div>
                    </fieldset>
                  </div>
                  <div class="form-floating mb-3">
                    <input class="form-control" style="border: 1px solid black; border-radius: 10px;" name="alamat" type="text" placeholder="Place your Address here" />
                    <label for="alamat">Alamat</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input class="form-control" style="border: 1px solid black; border-radius: 10px;" name="no_hp" type="text" placeholder="Place your No HP here" />
                    <label for="no_hp">No HP</label>
                  </div>
                  <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                    <button value="REGISTER" name="register" type="submit" class="btn btn-outline-secondary" style="background-color: #1D5D9B; color: white; border: none; width: 195px; height: 40px; border-radius: 10px;">
                    Daftar
                    </button>  
                  </div>
                  <div class="d-flex align-items-center justify-content-center mt-2 mb-0">
                    <p>Sudah memiliki akun? <a href="index.php" style="color: #1D5D9B; text-decoration: none;">Login</a></p>
                  </div>
                </form>
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