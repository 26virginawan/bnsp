<div id="label-page">
    <h3>Input Data Pengembalian</h3>
</div>
<div id="content">
    <form action="proses/pengembalian-input-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">

            <tr>
                <td class="label-formulir">ID Pengembalian</td>
                <td class="isian-formulir"><input type="text" name="id_pengembalian"
                        class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir">Anggota</td>
                <td class="isian-formulir"> <select name="nama" class="isian-formulir isian-formulir-border">
                        <option value="" select="selected"> Pilih Anggota </option>
                        <?php
                        $nomor = 1;
                        $query = 'SELECT * FROM tbanggota';
                        $q_tampil_anggota = mysqli_query($db, $query);

                        if (mysqli_num_rows($q_tampil_anggota) > 0) {
                            while (
                                $r_tampil_anggota = mysqli_fetch_array(
                                    $q_tampil_anggota
                                )
                            ) { ?>
                        <option value="<?php echo $r_tampil_anggota[
                            'nama'
                        ]; ?>">
                            <?php echo $r_tampil_anggota['nama']; ?></option>
                        <?php }
                        }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td class="label-formulir">Buku</td>
                <td class="isian-formulir"> <select name="judul_buku" class="isian-formulir isian-formulir-border">
                        <option value="" select="selected"> Pilih Buku </option>
                        <?php
                        $nomor = 1;
                        $query = 'SELECT * FROM tbbuku';
                        $q_tampil_buku = mysqli_query($db, $query);

                        if (mysqli_num_rows($q_tampil_buku) > 0) {
                            while (
                                $r_tampil_buku = mysqli_fetch_array(
                                    $q_tampil_buku
                                )
                            ) { ?>
                        <option value="<?php echo $r_tampil_buku[
                            'judul_buku'
                        ]; ?>">
                            <?php echo $r_tampil_buku['judul_buku']; ?></option>
                        <?php }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Tanggal Pengembalian</td>
                <td class="isian-formulir"><input id="tgl_kembali" type="date" class="form-control" name="tgl_kembali"
                        value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}">
                </td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="simpan" class="tombol"></td>
            </tr>
        </table>
    </form>
</div>