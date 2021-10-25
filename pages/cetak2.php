<?php
include '../koneksi.php'; ?>
<link rel="stylesheet" type="text/css" href="style.css">
<h3>Data Buku</h3>
<div id="content">
    <table border="1" id="tabel-tampil">
        <thead>
            <tr>
                <th id="label-tampil-no">No</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Foto</th>
                <th>Pengarang</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $query = 'SELECT * FROM tbbuku ORDER BY kode_buku DESC';
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
                <td><img src="../images/<?php echo $foto; ?>" width="70px" height="70px"></td>
                <td><?php echo $r_tampil_buku['pengarang']; ?></td>
                <td><?php echo $r_tampil_buku['lokasi']; ?></td>

            </tr>
            <?php $nomor++;
                }
            }
            ?>
            <script>
            window.print();
            </script>

        </tbody>
    </table>
</div>