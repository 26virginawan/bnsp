<div id="label-page">
    <h3>Input Data Anggota</h3>
</div>
<div id="content">
    <form action="proses/surat-input-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">nomor surat</td>
                <td class="isian-formulir"><input type="text" name="nomor_surat"
                        class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Kategori</td>
                <td><select class="isian-formulir" name="kategori" required="">
                        <option value=""></option>
                        <option value="Pengumuman">Pengumuman</option>
                        <option value="Undangan">Undangan</option>
                    </select></td>
            </tr>
            <tr>
                <td class="label-formulir">Judul</td>
                <td class="isian-formulir"><input type="text" name="judul" class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">File Surat (PDF)</td>
                <td class="isian-formulir"><input type="date" class="form-control" name="waktu"
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