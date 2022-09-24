<?php
include("config/koneksi.php");
$tampil_user = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE 
                            id_user = '$_SESSION[id_user]'");
$tampil = mysqli_fetch_array($tampil_user);

?>
<div class="alert alert-success mt-4" role="alert">
    <h4 class="alert-heading">Welcome <?php echo " $tampil[nama_user]"; ?>!</h4>
    <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
    <hr>
    <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
    <a class="btn btn-danger mt-2" href="logout.php" type="submit">Logout</a>
</div>