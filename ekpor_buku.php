<?php
require 'vendor/autoload.php';
require 'koneksi.php';

use Dompdf\Dompdf;

$nomor = 1;
$query = 'SELECT * FROM tbbuku ORDER BY kode_buku';
$q_tampil_buku = mysqli_query($db, $query);

$html = '<h1 style="text-align: center;">Data Anggota</h1>';
$html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
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
            <td><img src="http://localhost/jwd_11/images/' .
            $foto .
            '" width="60px" height="70px"></td>
            <td>' .
            $r_tampil_buku['pengarang'] .
            '</td>
        <td>' .
            $r_tampil_buku['lokasi'] .
            '</td>
        </tr>';
        $nomor++;
    }
}
$html .= '</tbody></html>';

// echo $html;

$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled', true);
$dompdf->load_html($html);
$dompdf->setPaper('a4', 'landscape');
$dompdf->render();
$dompdf->stream();

?>