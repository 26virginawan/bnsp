<?php
require 'vendor/autoload.php';
require 'koneksi.php';

use Dompdf\Dompdf;

$html = '<table width="100%" border="1" id="tabel-tampil">
<thead>
    <tr>
        <th>No</th>
        <th>Kode Buku</th>
        <th>Judul Buku</th>
        <th>Foto</th>
        <th>Pengarang</th>
        <th>Lokasi</th>
    </tr>
</thead>
<tbody>';

$nomor = 1;
$query = 'SELECT * FROM tbbuku ORDER BY kode_buku DESC';
$q_tampil_buku = mysqli_query($db, $query);

if (mysqli_num_rows($q_tampil_buku) > 0) {
    while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
        if (empty($r_tampil_buku['foto']) or $r_tampil_buku['foto'] == '-') {
            $foto = 'admin-no-photo.jpg';
        } else {
            $foto = $r_tampil_buku['foto'];
        }

        $html .=
            '<tr>
        <td>' .
            $nomor .
            '</td>
        <td>' .
            $r_tampil_buku['kode_buku'] .
            '</td>
        <td>' .
            $r_tampil_buku['judul_buku'] .
            '</td>
        <td><img src="../images/' .
            $foto .
            '" width="70px" height="70px"></td>
        <td>' .
            $r_tampil_buku['pengarang'] .
            '</td>
        <td>' .
            $r_tampil_buku['lokasi'] .
            '</td>


</tr>';
    }
} else {
    $html = '<tr>
    <td colspan="4" align="center">Tidak ada data</td>
</tr>';
}
$html = '</tbody></html>';
?>