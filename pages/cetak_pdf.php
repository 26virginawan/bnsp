<?php
require 'vendor/autoload.php';
require 'koneksi.php';

use Dompdf\Dompdf;

$html = '<table width="100%" border="1" id="tabel-tampil">
<thead>
    <tr>
        <th>No</th>
        <th>ID Anggota</th>
        <th>Nama</th>
        <th>Foto</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
    </tr>
</thead>
<tbody>';

$nomor = 1;
$query = 'SELECT * FROM tbanggota ORDER BY idanggota DESC';
$q_tampil_anggota = mysqli_query($db, $query);

if (mysqli_num_rows($q_tampil_anggota) > 0) {
    while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
        if (
            empty($r_tampil_anggota['foto']) or
            $r_tampil_anggota['foto'] == '-'
        ) {
            $foto = 'admin-no-photo.jpg';
        } else {
            $foto = $r_tampil_anggota['foto'];
        }

        $html .=
            '<tr>
        <td>' .
            $nomor .
            '</td>
        <td>' .
            $r_tampil_anggota['idanggota'] .
            '</td>
        <td>' .
            $r_tampil_anggota['nama'] .
            '</td>
        <td><img src="../images/' .
            $foto .
            '" width="70px" height="70px"></td>
        <td>' .
            $r_tampil_anggota['jeniskelamin'] .
            '</td>
        <td>' .
            $r_tampil_anggota['alamat'] .
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