<?php
$kode_buku = $_GET['id'];
$q_tampil_buku = mysqli_query(
    $db,
    "SELECT * FROM tbbuku WHERE kode_buku = '$kode_buku'"
);
$r_tampil_buku = mysqli_fetch_array($q_tampil_buku);

if (empty($r_tampil_buku['foto']) or $r_tampil_buku['foto'] == '-') {
    $foto = 'admin-no-photo.jpg';
} else {
    $foto = $r_tampil_buku['foto'];
}
?>
<div id="label-page">
    <h3>Edit Data Anggota</h3>
</div>
<div id="content">
    <form action="proses/buku-edit-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">

            <tr>
                <td class="label-formulir">Kode Buku</td>
                <td class="isian-formulir"><input type="text" name="kode_buku" value="<?php echo $r_tampil_buku[
                    'kode_buku'
                ]; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disable">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Judul Buku</td>
                <td class="isian-formulir"><input type="text" name="judul_buku" value="<?php echo $r_tampil_buku[
                    'judul_buku'
                ]; ?>" class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Cover</td>
                <td class="isian-formulir">
                    <img src="images/<?php echo $foto; ?>" width=70px height=75px>
                    <input type="file" name="foto" class="isian-formulir isian-formulir-border">
                    <input type="hidden" name="foto_awal" value="<?php echo $r_tampil_buku[
                        'foto'
                    ]; ?>">
                </td>

            </tr>

            <tr>

                <td class="label-formulir">Pengarang</td>
                <td class="isian-formulir">
                    <textarea name="pengarang" class="isian-formulir isian-formulir-border" cols="40" rows="2"><?php echo $r_tampil_buku[
                        'pengarang'
                    ]; ?> </textarea>
                </td>
            </tr>

            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
            </tr>
        </table>
    </form>
</div>