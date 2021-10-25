<div id="label-page">
    <h3>Input Data Buku</h3>
</div>
<div id="content">
    <form action="proses/buku-input-proses.php" method="post" enctype="multipart/form-data">
        <table id="tabel-input">

            <tr>
                <td class="label-formulir">Kode Buku</td>
                <td class="isian-formulir"><input type="text" name="kode_buku"
                        class="isian-formulir isian-formulir-border"></td>
            </tr>
            <tr>
                <td class="label-formulir">Judul Buku</td>
                <td class="isian-formulir"><input type="text" name="judul_buku"
                        class="isian-formulir isian-formulir-border">
                </td>
            </tr>

            <tr>
                <td class="label-formulir">Cover</td>
                <td class="isian-formulir"><input type="file" name="foto" class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Pengarang</td>
                <td class="isian-formulir"><input type="text" name="pengarang"
                        class="isian-formulir isian-formulir-border">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Lokasi Buku</td>
                <td class="isian-formulir"><input type="radio" name="lokasi" value="rak1">Rak 1</label></td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="radio" name="lokasi" value="rak2">Rak 2</label></td>

            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="radio" name="lokasi" value="rak3">Rak 3</label></td>

            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir"><input type="submit" name="simpan" value="simpan" class="tombol"></td>
            </tr>
        </table>
    </form>
</div>