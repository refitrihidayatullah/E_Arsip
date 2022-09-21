<?php
if (isset($_POST["bsubmit"])) {
    // simpan
    // jika data di edit
    if (@$_GET['hal'] == "edit") {
        // edit data
        $updated = mysqli_query($koneksi, "UPDATE tb_pengirim_surat SET
                                           nama_pengirim = '$_POST[nama_pengirim]',
                                           alamat = '$_POST[alamat]',
                                           no_hp = '$_POST[no_hp]',
                                           email = '$_POST[email]'
                                           WHERE id_pengirim = '$_GET[id]' ");

        if ($updated) {
            echo "
            <script>
                alert('data berhasil diubah!!');
                document.location='?halaman=pengirim_surat'
            </script>
            ";
        }
    } else {
        // add data
        $saved = mysqli_query($koneksi, "INSERT INTO tb_pengirim_Surat 
                                        VALUES('',
                                        '$_POST[nama_pengirim]',
                                        '$_POST[alamat]',
                                        '$_POST[no_hp]',
                                        '$_POST[email]'
                                        
                                        )");
        if ($saved) {
            echo "
                <script>
                    alert('data berhasil disimpan!!');
                    document.location='?halaman=pengirim_surat'
                </script>;
                ";
        } else {
            echo "
            <script>
                alert('data gagal disimpan!!');
                document.location='?halaman=pengirim_surat'
            </script>;
            ";
        }
    }
}
// edit
if (isset($_GET['hal'])) {

    if ($_GET['hal'] == "edit") {
        // show data berdasarkan id
        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_pengirim_surat where id_pengirim = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);

        if ($data) {
            // if data tersedia
            $var_nama_pengirim = $data['nama_pengirim'];
            $var_alamat = $data['alamat'];
            $var_no_hp = $data['no_hp'];
            $var_email = $data['email'];
        }
    } else {
        // data dihapus
        $hapus = mysqli_query($koneksi, "DELETE FROM tb_pengirim_surat WHERE id_pengirim = '$_GET[id]' ");
        if ($hapus) {
            echo "
            <script>
                alert('data berhasil dihapus!!')
                document.location ='?halaman=pengirim_surat'
            </script>
            ";
        }
    }
}

?>

<!-- add data departement -->
<div class="card mt-3">
    <div class="card-header bg-primary text-white">
        Form Pengirim Surat
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama_pengirim" class="form-label">Nama Pengirim</label>
                <input type="text" class="form-control" name="nama_pengirim" id="nama_pengirim" value="<?= @$var_nama_pengirim ?>" placeholder="masukkan nama pengirim.." required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= @$var_alamat ?>" placeholder="masukkan alamat.." required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No Hp</label>
                <input type="number" class="form-control" name="no_hp" id="alamat" value="<?= @$var_no_hp ?>" placeholder="masukkan no hp" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="<?= @$var_email ?>" placeholder="masukkan email.." required>
            </div>
            <button type="submit" name="bsubmit" class="btn btn-primary">Simpan</button>
            <button type="reset" name="bbatal" class="btn btn-primary">Batal</button>
        </form>
    </div>
</div>
<!-- end add data departement -->
<!-- show data departement -->
<div class="card mt-3">
    <div class="card-header bg-primary text-white">
        Data Pengirim Surat
    </div>
    <div class="card-body">

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pengirim</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $shows = mysqli_query($koneksi, "SELECT * FROM tb_pengirim_surat ORDER BY id_pengirim DESC");
                $no = 1;
                while ($data = mysqli_fetch_array($shows)) :
                ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $data["nama_pengirim"]; ?></td>
                        <td><?= $data["alamat"]; ?></td>
                        <td><?= $data["no_hp"]; ?></td>
                        <td><?= $data["email"]; ?></td>
                        <td>
                            <a href="?halaman=pengirim_surat&hal=edit&id=<?= $data["id_pengirim"]; ?>" class="btn btn-warning btn-sm">edit</a>
                            <a href="?halaman=pengirim_surat&hal=delete&id=<?= $data["id_pengirim"]; ?>" class=" btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini ?')">hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

    </div>
</div>
<!-- end shows data departement -->