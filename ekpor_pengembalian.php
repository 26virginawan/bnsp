<?php
require 'vendor/autoload.php';
require 'koneksi.php';

use Dompdf\Dompdf;

$nomor = 1;
$query = 'SELECT * FROM tbpengembalian ORDER BY idpeminjaman';
$q_tampil_kembali = mysqli_query($db, $query);

$html = '<h1 style="text-align: center;">Data Pengembalian</h1>';
$html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
            <thead>
                <tr>
                    <th id="label-tampil-no">No</th>
                    <th>ID Pengembalian</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pengembalian</th>
                </tr>
            </thead>
            <tbody>';
if (mysqli_num_rows($q_tampil_kembali) > 0) {
    while ($r_tampil_kembali = mysqli_fetch_array($q_tampil_kembali)) {
        if (
            empty($r_tampil_kembali['foto']) or
            $r_tampil_kembali['foto'] == '-'
        ) {
            $foto = 'admin-no-photo.jpg';
        } else {
            $foto = $r_tampil_kembali['foto'];
        }

        $html .=
            '<tr>
            <td>' .
            $nomor .
            '</td>
            <td>' .
            $r_tampil_kembali['idpengembalian'] .
            '</td>
            <td>' .
            $r_tampil_kembali['nama'] .
            '</td>
            <td>' .
            $r_tampil_kembali['judul_buku'] .
            '</td>
            <td>' .
            $r_tampil_kembali['tgl_kembali'] .
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