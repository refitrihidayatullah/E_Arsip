<!-- add data departement -->

<!-- end add data departement -->
<!-- show data departement -->
<div class="card mt-3">
    <div class="card-header bg-primary text-white">
        Data Pengirim Surat
    </div>
    <div class="card-body">
        <a href="?halaman=arsip_surat&hal=tambaharsip" class="btn btn-primary btn-sm">Tambah</a>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Tanggal Surat</th>
                    <th scope="col">Tanggal Diterima</th>
                    <th scope="col">Prihal</th>
                    <th scope="col">Departement/Tujuan</th>
                    <th scope="col">Pengirim</th>
                    <th scope="col">File</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tb_arsip INNER JOIN tb_departemen ON tb_arsip.id_departemen = tb_departemen.id_departemen INNER JOIN tb_pengirim_surat ON tb_arsip.id_pengirim = tb_pengirim_surat.id_pengirim";
                $shows = mysqli_query($koneksi, $sql);
                $no = 1;
                while ($data = mysqli_fetch_array($shows)) :
                ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $data["no_surat"]; ?></td>
                        <td><?= $data["tgl_surat"]; ?></td>
                        <td><?= $data["tgl_diterima"]; ?></td>
                        <td><?= $data["perihal"]; ?></td>
                        <td><?= $data["nama_departemen"]; ?></td>
                        <td><?= $data["nama_pengirim"]; ?> |
                            <?= $data["no_hp"];  ?>
                        </td>
                        <td>
                            <?php
                            // cek file
                            if (empty($data['file'])) { ?>
                                echo "-";
                            <?php } else { ?>

                                <a class="btn btn-sm btn-info" href="file/<?= $data['file'] ?>" target="$_blank">lihat</a>
                            <?php
                            }
                            ?>

                        </td>
                        <td>
                            <a href="?halaman=arsip_surat&hal=edit&id=<?= $data["id_arsip"]; ?>" class="btn btn-warning btn-sm">edit</a>
                            <a href="?halaman=arsip_surat&hal=delete&id=<?= $data["id_arsip"]; ?>" class=" btn btn-danger btn-sm" onclick="return confirm('yakin ingin menghapus data ini ?')">hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

    </div>
</div>
<!-- end shows data departement -->