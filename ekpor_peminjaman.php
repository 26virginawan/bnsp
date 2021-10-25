<?php
require 'vendor/autoload.php';
require 'koneksi.php';

use Dompdf\Dompdf;

$nomor = 1;
$query = 'SELECT * FROM tbpeminjaman ORDER BY idpeminjaman';
$q_tampil_pinjam = mysqli_query($db, $query);

$html = '<h1 style="text-align: center;">Data Anggota</h1>';
$html .= '<table width="100%" border="1" cellspacing="0" cellpadding="2">
            <thead>
                <tr>
                    <th id="label-tampil-no">No</th>
                    <th>ID Peminjaman</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                </tr>
            </thead>
            <tbody>';
if (mysqli_num_rows($q_tampil_pinjam) > 0) {
    while ($r_tampil_pinjam = mysqli_fetch_array($q_tampil_pinjam)) {
        if (
            empty($r_tampil_pinjam['foto']) or
            $r_tampil_pinjam['foto'] == '-'
        ) {
            $foto = 'admin-no-photo.jpg';
        } else {
            $foto = $r_tampil_pinjam['foto'];
        }

        $html .=
            '<tr>
            <td>' .
            $nomor .
            '</td>
            <td>' .
            $r_tampil_pinjam['idpeminjaman'] .
            '</td>
            <td>' .
            $r_tampil_pinjam['nama'] .
            '</td>
            <td>' .
            $r_tampil_pinjam['judul_buku'] .
            '</td>
            <td>' .
            $r_tampil_pinjam['tgl_pinjam'] .
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