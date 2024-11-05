<?php
session_start();
unset($_SESSION['Siswa']);
echo "<script>window.location='index.php';</script>";
?>