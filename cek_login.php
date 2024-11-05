<?php
include("dbconn/dbconn.php");

            if (isset($_POST["login"])) {
                session_start();
            if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty("level")){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $level = $_POST["level"];
            if ($level == '1') {
                $sql = "SELECT * FROM guru WHERE username = '$username' AND password = '$password' limit 1";
            $ambil = $conn->query($sql);
            if(mysqli_num_rows($ambil)>0){
                $cek = mysqli_fetch_array($ambil);
                $_SESSION['id_guru'] = $cek['id_guru'];
                $_SESSION['nama'] = $cek['nama'];
                $_SESSION['email'] = $cek['email'];
                $_SESSION['username'] = $cek['username'];
                $_SESSION['password'] = $cek['password'];
                $_SESSION['no_hp'] = $cek['no_hp'];
            echo "<script>alert('anda sukses login');</script>";
            header("location: admin/index-admin.php");
            }  
            else
            {
            echo "<script>alert('anda gagal login, periksa akun Anda');</script>";
            echo "<script>location='index.php';</script>";
            }
            }
            else if ($level == '2')
            {
                $sql = "SELECT * FROM data_siswa WHERE username = '$username' AND password = '$password' limit 1";
            $ambil = $conn->query($sql);
            if(mysqli_num_rows($ambil)>0){
                $cek = mysqli_fetch_array($ambil);
                $_SESSION['id_siswa'] = $cek['id_siswa'];
                $_SESSION['nama'] = $cek['nama'];
                $_SESSION['email'] = $cek['email'];
                $_SESSION['username'] = $cek['username'];
                $_SESSION['password'] = $cek['password'];
                $_SESSION['nis'] = $cek['nis'];
                $_SESSION['gender'] = $cek['gender'];
                $_SESSION['alamat'] = $cek['alamat'];
                $_SESSION['no_hp'] = $cek['no_hp'];
            echo "<script>alert('anda sukses login');</script>";
            header("location: dashboard.php");
            }  
            else
            {
            echo "<script>alert('anda gagal login, periksa akun Anda');</script>";
            echo "<script>location='index.php';</script>";
            }
            }
            }
        }
            ?>