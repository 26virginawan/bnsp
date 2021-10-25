<div id="label-page">
    <h3>Tampil Data Buku</h3>
</div>
<div id="content">
    <p id="tombol-tambah-container">
        <a href="index.php?p=buku-input" class="tombol">
            Tambah Buku
        </a>
        <a style="margin-right:15px; margin-left: 20px;" target="_blank" href="pages/cetak2.php"><img src="print.png"
                height="50px" height="50"></a>
        <a style="margin-right:15px;" target="_blank" href="ekpor_buku.php"><img src="pdf.png" height="50px"
                height="50"></a>
        <a target="_blank" href="ekpor_excel_buku.php"><img src="excel.png" height="50px" height="50"></a>
    <div class="form-inline">
        <div align="right">
            <form method="post">
                <input type="text" name="pencarian">
                <input type="submit" name="search" value="search" class="tombol">
            </form>
        </div>
    </div>
    </p>
    <table id="tabel-tampil">
        <thead>
            <tr>
                <th id="label-tampil-no">No</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Cover</th>
                <th>Pengarang</th>
                <th>No Rak</th>
                <th id="lable-opsi">Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $batas = 5;
            extract($_GET);
            if (empty($hal)) {
                $posisi = 0;
                $hal = 1;
                $nomor = 1;
            } else {
                $posisi = ($hal - 1) * $batas;
                $nomor = $posisi + 1;
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $pencarian = trim(
                    mysqli_real_escape_string($db, $_POST['pencarian'])
                );
                if ($pencarian != '') {
                    $sql = "SELECT * FROM tbbuku WHERE nama LIKE '%$pencarian%'
                            OR kode_buku LIKE '%$pencarian%'
                            OR judul_buku LIKE '%$pencarian%'";

                    $query = $sql;
                    $queryJml = $sql;
                } else {
                    $query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
                    $queryJml = 'SELECT * FROM tbbuku';
                    $no = $posisi * 1;
                }
            } else {
                $query = "SELECT * FROM tbbuku LIMIT $posisi, $batas";
                $queryJml = 'SELECT * FROM tbbuku';
                $no = $posisi * 1;
            }

            $q_tampil_buku = mysqli_query($db, $query);

            if (mysqli_num_rows($q_tampil_buku) > 0) {
                while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
                    if (
                        empty($r_tampil_buku['foto']) or
                        $r_tampil_buku['foto'] == '-'
                    ) {
                        $foto = 'admin-no-photo.jpg';
                    } else {
                        $foto = $r_tampil_buku['foto'];
                    } ?>
            <tr>
                <td><?php echo $nomor; ?></td>
                <td><?php echo $r_tampil_buku['kode_buku']; ?></td>
                <td><?php echo $r_tampil_buku['judul_buku']; ?></td>
                <td><img src="images/<?php echo $foto; ?>" width=70px height=70px></td>
                <td><?php echo $r_tampil_buku['pengarang']; ?></td>
                <td><?php echo $r_tampil_buku['lokasi']; ?></td>
                <td>
                    <div class="tombol-opsi-container"><a target="_blank" href="pages/cetak_buku.php?id=<?php echo $r_tampil_buku[
                        'kode_buku'
                    ]; ?>" class="tombol">Cetak buku</a></div>
                    <div class="tombol-opsi-container"><a href="index.php?p=buku-edit&id=<?php echo $r_tampil_buku[
                        'kode_buku'
                    ]; ?>" class="tombol">Edit</a></div>
                    <div class="tombol-opsi-container"><a href="proses/buku-hapus.php?id=<?php echo $r_tampil_buku[
                        'kode_buku'
                    ]; ?>" class="tombol"
                            onclick="return confirm ('Apakah anda yakin akan menghapus data ini?')">Hapus</a></div>
                </td>

            </tr>
            <?php $nomor++;
                }
            } else {
                echo '<tr><td colspan=6>Data Tidak Ditemukan</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <?php if (isset($_POST['pencarian'])) {
        if ($_POST['pencarian'] != '') {
            echo "<div style=\"float:left;\">";
            $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
            echo "Data Hasil Pencarian: <b>$jml</b>";
            echo '</div>';
        }
    } else {
         ?>
    <div style="float: left;">
        <?php
        $jml = mysqli_num_rows(mysqli_query($db, $queryJml));
        echo "Jumlah Data : <b>$jml</b>";
        ?>
    </div>
    <div class="pagination" style="float: right;">
        <?php
        $jml_hal = ceil($jml / $batas);
        for ($i = 1; $i <= $jml_hal; $i++) {
            if ($i != $hal) {
                echo "<a href=\"?p=buku&hal=$i\">$i</a>";
            } else {
                echo "<a class=\"active\">$i</a>";
            }
        }
        ?>
    </div>
    <?php
    } ?>

</div>