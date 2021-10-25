<?php
require 'vendor/autoload.php';
require 'koneksi.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$nomor = 1;
$query = 'SELECT * FROM tbbuku ORDER BY kode_buku';
$q_tampil_buku = mysqli_query($db, $query);

$spreadsheet = new Spreadsheet();
$spreadsheet
    ->setActiveSheetIndex(0)
    ->setCellValue('C1', 'Data Buku')
    ->setCellValue('A3', 'No')
    ->setCellValue('B3', 'Kode Buku')
    ->setCellValue('C3', 'judul_buku')
    ->setCellValue('D3', 'pengarang')
    ->setCellValue('E3', 'lokasi');

$sheet = $spreadsheet->getActiveSheet();

$index = 5;

if (mysqli_num_rows($q_tampil_buku) > 0) {
    while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
        if (empty($r_tampil_buku['foto']) or $r_tampil_buku['foto'] == '-') {
            $foto = 'admin-no-photo.jpg';
        } else {
            $foto = $r_tampil_buku['foto'];
        }

        $sheet->setCellValue('A' . $index, $nomor);
        $sheet->setCellValue('B' . $index, $r_tampil_buku['kode_buku']);
        $sheet->setCellValue('C' . $index, $r_tampil_buku['judul_buku']);
        $sheet->setCellValue('D' . $index, $r_tampil_buku['pengarang']);
        $sheet->setCellValue('E' . $index, $r_tampil_buku['lokasi']);

        $index++;
        $nomor++;
    }
}

$sheet->setTitle('Daftar Buku Perpustakaan');
$spreadsheet->setActiveSheetIndex(0);

$filename = 'Daftar-Buku.xlsx';

ob_end_clean();

header(
    'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
);
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Cache-Control: max-age=0');
header('Cache-C0ntrol: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');

$write = IOFactory::createWriter($spreadsheet, 'Xlsx');
$write->save('php://output');
exit();

?>