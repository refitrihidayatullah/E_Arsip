<?php
include('config/koneksi.php');
if (isset($_POST["registerSubmit"])) {

    $pass = md5($_POST['password']);
    $saved = mysqli_query($koneksi, "INSERT INTO tb_user 
                            VALUES('','$_POST[nama_user]','$_POST[email_user]','$pass')");
    if ($saved) {
        echo "
            <script>
                alert('registrasi berhasil silahkan login !!');
                document.location='login.php'
            </script>;
            ";
    } else {
        echo "
        <script>
                alert('gagal registrasi harap registrasi ulang !!');
                document.location='login.php'
            </script>;
            ";
    }
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
    <div class="container card pt-2 pb-2 mt-5 border-opacity-10">
        <header class="sticky-bottom bg-primary text-center text-white pt-2 pb-2 mt-2 rounded-3">E_Arsip</header>


        <div class="row">
            <div class="col-sm-6 p-5">
                <div class="text-center fs-2 mb-2">Login</div>
                <div class="card">
                    <div class="card-body card-header">
                        <form action="ceklogin.php" method="POST">
                            <div class="mb-3">
                                <label for="nama_user" class="form-label">username</label>
                                <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="enter username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="enter your password">
                            </div>
                            <button type="submit" name="loginSubmit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 p-5">
                <div class="text-center fs-2 mb-2">Register</div>
                <div class="card">
                    <div class="card-body card-header">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="nama_user" class="form-label">Username</label>
                                <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="enter username..">
                            </div>
                            <div class="mb-3">
                                <label for="email_user" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email_user" name="email_user" aria-describedby="emailHelp" placeholder="enter email..">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="enter password">
                            </div>
                            <button type="submit" name="registerSubmit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="sticky-bottom bg-primary mt-5 rounded-3 text-center text-white pt-2 pb-2 mt-2">Copyright 2021 - <?= date('Y') ?> | Refi Tri Hidayatullah</footer>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>