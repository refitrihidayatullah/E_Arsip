<?php

session_start();
include("config/koneksi.php");
@$passw = md5($_POST['password']);


// mengamankan dari inject sql
@$nama_user = mysqli_escape_string($koneksi, $_POST['nama_user']);
@$password = mysqli_escape_string($koneksi, $passw);

$login = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE nama_user = '$nama_user' AND password = '$password' ");
$data = mysqli_fetch_array($login);

if ($data) {
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['nama_user'] = $data['nama_user'];
    header('location:admin.php?halaman=beranda');
} else {
    echo "
        <script>
            alert('maaf username dan password salah!!');
            document.location='login.php';
        </script>
    ";
}
