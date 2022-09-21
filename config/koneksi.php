<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "e_arsip";

//  koneksi database
$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));
