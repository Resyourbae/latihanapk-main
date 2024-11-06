<?php
// panggil koneksi database
include "koneksidb.php";
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
    <title>Daftar Tugas</title>
</head>

<body class="bg-danger bg-opacity-75">
    <nav class="navbar navbar-expand-lg p-3 mb-2 bg-danger">
        <div class="container-fluid">
            <div class="text-center">
                <img src="nubas.jpg.png" class="rounded" width="35%" margin-left="3cm">
            </div>
            <a class=" fs-4 navbar-brand  text-white" href="beranda.php">Beranda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="fs-4 nav-link active  text-white" aria-current="page" href="input.php">Input Tugas</a>
                    </li>
                    <li class="nav-item">
                        <a class="fs-4 nav-link  text-white" href="daftartugas.php">Daftar Tugas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <h2 class="text-center text-white"><u>Daftar Tugas</u></h2>
    <div class="container">
        <table align="table responsive" class="table table-light table-striped table-bordered">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Mapel</th>
                <th class="text-center">Tugas</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Tenggat</th>
                <th class="text-center">Keterangan</th>
            </tr>
            <?php
            $no = 1;
            $tampil = mysqli_query($koneksidb, "SELECT * FROM tb_tugas");
            while ($data = mysqli_fetch_array($tampil)):
                ?>

                <tr>
                    <td class="text-center table-warning"><?= $no++ ?></td>
                    <td class="text-center table-warning"><?= $data['Mapel'] ?></td>
                    <td class="text-center table-warning"><?= $data['Tugas'] ?></td>
                    <td class="text-center table-warning"><?= $data['Kelas'] ?></td>
                    <td class="text-center table-warning"><?= $data['Tenggat'] ?></td>
                    <td class="text-center table-warning">
                        <a href="ubah.php?id=<?= $data['ID']; ?>" <button class="btn btn-primary">Ubah</button></>
                            <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#hapus<?= $no ?>">Selesai
                                </button></a>
                    </td>
                </tr>
                <!-- Modal Hapus-->
                <div class="modal fade" id="hapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="'modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
                            </div>
                            <form method="post" action="hapus.php">
                                <input type="hidden" name="Nama" value="<?= $data['Nama'] ?>">
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah anda yakin akan hapus data ini? <br>
                                        <span class="text-danger"><?= $data['Nama'] ?> - <?= $data['Telp'] ?></span>
                                    </h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" nama="bhapus">Hapus</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--mpdal hapus-->
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>