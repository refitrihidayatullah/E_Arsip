<?php
// jika user masuk menggunakan link
session_start();
if (empty($_SESSION['id_user']) or empty($_SESSION['nama_user'])) {
    echo "
    <script>
        alert('maaf anda harus login terlebih dahulu');
        document.location='login.php';
    </script>
    ";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E_Arsip</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body {
            scroll-behavior: smooth;
        }

        .container-coba {
            min-height: 100vh;
        }
    </style>

</head>

<body>
    <!-- nav first -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="?halaman=beranda">E-Arsip</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php if ($_GET['halaman'] == "beranda") { ?>
                            <a <?php if ($_GET['halaman'] == "beranda") echo "class='nav-link active'"; ?> aria-current="page" href="?halaman=beranda">Beranda</a>
                        <?php } else { ?>
                            <a class="nav-link" aria-current="page" href="?halaman=beranda">Beranda</a>
                    </li>
                <?php } ?>



                <li class="nav-item">
                    <?php if ($_GET['halaman'] == "departement") { ?>
                        <a <?php if ($_GET["halaman"] == "departement") echo "class='nav-link active '"; ?> href="?halaman=departement">Data Departement</a>
                    <?php } else { ?>
                        <a class="nav-link" href="?halaman=departement">Data Departement</a>
                    <?php } ?>
                </li>


                <li class="nav-item">
                    <?php if ($_GET['halaman'] == "pengirim_surat") { ?>
                        <a <?php if ($_GET['halaman'] == "pengirim_surat") echo " class='active nav-link' "; ?> href="?halaman=pengirim_surat">Data Pengirim Surat</a>
                    <?php } else { ?>
                        <a class="nav-link" href="?halaman=pengirim_surat">Data Pengirim Surat</a>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <?php if ($_GET['halaman'] == "arsip_surat") { ?>
                        <a <?php if ($_GET['halaman'] == "arsip_surat") echo "class='nav-link active' "; ?> href="?halaman=arsip_surat">Data Arsip Surat</a>
                    <?php } else { ?>
                        <a class="nav-link" href="?halaman=arsip_surat">Data Arsip Surat</a>
                    <?php } ?>
                </li>
                </ul>
            </div>
            <a class="btn btn-sm btn-info text-light float-end" href="login.php">Login</a>
        </div>
    </nav>
    <!-- end nav -->

    <div class="container mb-5 container-coba">