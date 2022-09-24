<?php
session_start();
// hapus seession yang telah di set
unset($_SESSION['id_user']);
unset($_SESSION['nama_user']);

session_destroy();
echo
"
    <script>
        alert('anda berhasil keluar !');
        document.location = 'login.php';
    </script>
";
