<?php
if (isset($_POST["bsubmit"])) {
    // simpan
    // jika data di edit
    if ($_GET['hal'] == "edit") {
        // edit data
        $updated = mysqli_query($koneksi, "UPDATE tb_departemen SET nama_departemen = '$_POST[nama_departement]' WHERE id_departemen = '$_GET[id]' ");

        if ($updated) {
            echo "
            <script>
                alert('data berhasil diubah!!');
                document.location='?halaman=departement'
            </script>
            ";
        }
    } else {
        // add data
        $saved = mysqli_query($koneksi, "INSERT INTO tb_departemen 
                                            VALUES('','$_POST[nama_departement]')");
        if ($saved) {
            echo "
                <script>
                    alert('data berhasil disimpan!!');
                    document.location='?halaman=departement'
                </script>;
                ";
        }
    }
}
// edit
if (isset($_GET['hal'])) {

    if ($_GET['hal'] == "edit") {
        // show data berdasarkan id
        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_departemen where id_departemen = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);

        if ($data) {
            // if data tersedia
            $var_nama_departement = $data['nama_departemen'];
        }
    } else {
        // data dihapus
        $hapus = mysqli_query($koneksi, "DELETE FROM tb_departemen WHERE id_departemen = '$_GET[id]' ");
        if ($hapus) {
            echo "
            <script>
                alert('data berhasil dihapus!!')
                document.location ='?halaman=departement'
            </script>
            ";
        }
    }
}

?>

<!-- add data departement -->
<div class="card mt-3">
    <div class="card-header bg-primary text-white">
        Form Data Departement
    </div>
    <div class="card-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama_departement" class="form-label">Nama Departement</label>
                <input type="text" class="form-control" name="nama_departement" id="nama_departement" value="<?= @$var_nama_departement ?>">
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
        Data Departement
    </div>
    <div class="card-body">

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Data Departement</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $shows = mysqli_query($koneksi, "SELECT * FROM tb_departemen ORDER BY id_departemen DESC");
                $no = 1;
                while ($data = mysqli_fetch_array($shows)) :
                ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $data["nama_departemen"]; ?></td>
                        <td>
                            <a href="?halaman=departement&hal=edit&id=<?= $data["id_departemen"]; ?>" class="btn btn-warning btn-sm">edit</a>
                            <a href="?halaman=departement&hal=delete&id=<?= $data["id_departemen"]; ?>" class=" btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini ?')">hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

    </div>
</div>
<!-- end shows data departement -->