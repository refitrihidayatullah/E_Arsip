 <?php

    // call function upload
    include "uploads.php";


    // edit
    if (isset($_GET['hal'])) {

        if ($_GET['hal'] == "edit") {
            // show data berdasarkan id
            $tampil = mysqli_query($koneksi, "SELECT * FROM tb_arsip INNER JOIN tb_departemen ON tb_arsip.id_departemen = tb_departemen.id_departemen INNER JOIN tb_pengirim_surat ON tb_arsip.id_pengirim = tb_pengirim_surat.id_pengirim where id_arsip = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);

            if ($data) {
                // if data tersedia
                $var_no_surat = $data['no_surat'];
                $var_tgl_surat = $data['tgl_surat'];
                $var_tgl_diterima = $data['tgl_diterima'];
                $var_perihal = $data['perihal'];
                $var_id_departemen = $data['id_departemen'];
                $var_nama_departemen = $data['nama_departemen'];
                $var_id_pengirim = $data['id_pengirim'];
                $var_nama_pengirim = $data['nama_pengirim'];
                $var_file = $data['file'];
            }
        } elseif ($_GET['hal'] == "delete") {

            $deletes = mysqli_query($koneksi, "DELETE FROM tb_arsip WHERE id_arsip= '$_GET[id]' ");
            if ($deletes) {
                echo "
                <script>
                alert('data berhasil dihapus!!')
                document.location = '?halaman=arsip_surat'
                </script>
                ";
            }
        }
    }


    if (isset($_POST["bsubmit"])) {
        // simpan
        // jika data di edit
        if (@$_GET['hal'] == "edit") {

            // cek apakah user pilih file/img atau tdk
            if ($_FILES['file']['error'] === 4) {
                $file = $var_file;
            } else {
                $file = upload();
            }
            // edit data
            $updated = mysqli_query($koneksi, "UPDATE tb_arsip SET
                                           no_surat = '$_POST[no_surat]',
                                           tgl_surat = '$_POST[tgl_surat]',
                                           tgl_diterima = '$_POST[tgl_diterima]',
                                           perihal = '$_POST[perihal]',
                                           id_departemen = '$_POST[id_departemen]',
                                           id_pengirim = '$_POST[id_pengirim]',
                                           file = '$file'
                                           WHERE id_arsip = '$_GET[id]' ");

            if ($updated) {
                echo "
            <script>
                alert('data berhasil diubah!!');
                document.location='?halaman=arsip_surat'
            </script>
            ";
            } else {
                echo "
            <script>
                alert('data gagal diubah!!');
                document.location='?halaman=arsip_surat'
            </script>
            ";
            }
        } else {
            // add data
            $file = upload();
            $saved = mysqli_query($koneksi, "INSERT INTO tb_arsip 
                                        VALUES('',
                                        '$_POST[no_surat]',
                                        '$_POST[tgl_surat]',
                                        '$_POST[tgl_diterima]',
                                        '$_POST[perihal]',
                                        '$_POST[id_departemen]',
                                        '$_POST[id_pengirim]',
                                        '$file'
                                        
                                        )");
            if ($saved) {
                echo "
                <script>
                    alert('data berhasil disimpan!!');
                    document.location='?halaman=arsip_surat'
                </script>;
                ";
            }
        }
    }




    ?>
 <div class="card mt-3">
     <div class="card-header bg-primary text-white">
         Form Arsip Surat
     </div>
     <div class="card-body">
         <form action="" method="POST" enctype="multipart/form-data">
             <div class="mb-3">
                 <label for="no_surat" class="form-label">No Surat</label>
                 <input type="text" class="form-control" name="no_surat" id="no_surat" value="<?= @$var_no_surat ?>" placeholder="masukkan nama pengirim.." required>
             </div>
             <div class="mb-3">
                 <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                 <input type="date" class="form-control" name="tgl_surat" id="tgl_surat" value="<?= @$var_tgl_surat ?>" placeholder="masukkan alamat.." required>
             </div>
             <div class="mb-3">
                 <label for="tgl_diterima" class="form-label">Tanggal Diterima</label>
                 <input type="date" class="form-control" name="tgl_diterima" id="tgl_diterima" value="<?= @$var_tgl_diterima ?>" placeholder="masukkan alamat.." required>
             </div>
             <div class="mb-3">
                 <label for="perihal" class="form-label">Perihal</label>
                 <input type="text" class="form-control" name="perihal" id="alamat" value="<?= @$var_perihal ?>" placeholder="masukkan perihal" required>
             </div>
             <div class="mb-3">
                 <label for="id_departemen" class="form-label">Departemen/Tujuan</label>
                 <select class="form-select" name="id_departemen" aria-label="Default select example">
                     <?php if (@$_GET['hal'] == "edit") { ?>
                         <option value="<?= @$var_id_departemen ?>"><?= @$var_nama_departemen ?></option>
                     <?php } else { ?>
                         <option selected>pilih departemen..</option>
                     <?php } ?>
                     <?php
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_departemen order by nama_departemen asc");

                        while ($data = mysqli_fetch_array($tampil)) {

                            echo "<option value= '$data[id_departemen]' > $data[nama_departemen] </option>";
                        }
                        ?>

                 </select>
             </div>

             <div class="mb-3">
                 <label for="id_pengirim" class="form-label">Pengirim Surat</label>
                 <select class="form-select" name="id_pengirim" aria-label="Default select example">
                     <?php if (@$_GET['hal'] == "edit") { ?>
                         <option selected value="<?= @$var_id_pengirim ?>"><?= @$var_nama_pengirim ?></option>
                     <?php } else { ?>
                         <option selected>pilih pengirim..</option>
                     <?php } ?>
                     <?php
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tb_pengirim_surat order by nama_pengirim asc");
                        while ($data = mysqli_fetch_array($tampil)) {
                            echo "<option value= '$data[id_pengirim]' > $data[nama_pengirim] </option>";
                        }
                        ?>

                 </select>
             </div>

             <div class="mb-3">
                 <label for="file" class="form-label">file</label>
                 <input type="file" class="form-control" name="file" id="file" value="<?= @$var_file ?>">
             </div>
             <button type="submit" name="bsubmit" class="btn btn-primary">Simpan</button>
             <button type="reset" name="bbatal" class="btn btn-primary">Batal</button>
         </form>
     </div>
 </div>