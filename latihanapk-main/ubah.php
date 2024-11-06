<?php
//panggi konkesi database
include "koneksidb.php";
$tampil = mysqli_query($koneksidb, "SELECT *FROM tb_tugas where id = $_GET[id]");
$data = mysqli_fetch_array(($tampil));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Ubah Data</title>
</head>
<form method="POST" name="ubah">
    <div class="col-md-4 mx-auto">
        <h2 class="text-center">Ubah Tugas</h2>
        <div class="mb-2">
            <label for="Mapel">Mata Pelajaran</label>
            <input type="text" class="form-control" name="Mapel" value="<?php echo $data['Mapel']; ?>">
        </div>
        <div class="mb-2">
            <label for="Tugas">Tugas</label>
            <input type="text" class="form-control" name="Tugas" value="<?php echo $data['Tugas']; ?>">
        </div>
        <div class="mb-2">
            <label for="Kls">Kelas</label>
            <input type="number" class="form-control" name="Kls" value="<?php echo $data['Kelas']; ?>">
        </div>
        <div class="mb-2">
            <label for="tgt">Tenggat Waktu</label>
            <input type="date" class="form-control" name="tgt" value="<?php echo $data['Tenggat']; ?>">
        </div>
    </div>
    <div class="d-grid gap-2 col-6 mx-auto">
        <button class="btn btn-primary" name="btubah" type="submit">Simpan</button>
        <a href="datamember.php">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-danger" type="submit">Batal</button>
            </div>
        </a>
    </div>
</form>
</div>
</body>

</html>
<?php
include "koneksidb.php";
//uji jika tombol ubah di klik
if (isset($_POST['btubah'])) {
    //persiapan ubah data
    $ubah = mysqli_query($koneksidb, "UPDATE tb_tugas SET
    Mapel = '$_POST[Mapel]',
    Tugas = '$_POST[Tugas]',
    Kelas = '$_POST[Kelas]',
    Tenggat = '$_POST[Tenggat]',
    Where id = '$_GET[id]'");

    //jika ubah akses
    if ($ubah) {
        echo "<script> alert ('ubah data berhasil');
            document.location= 'datamember.php';
            </script>";
    } else {
        echo "<script> alert ('ubah data gagal');
            document.location= 'datamember.php';
            </script>";
    }
}
?>