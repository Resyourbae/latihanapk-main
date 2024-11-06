<?php
$server = "localhost";
$database = "db_apkrasya";
$username = "root";
$password = "";
$koneksidb = mysqli_connect(
    $server,
    $username,
    $password,
    $database
);
// if ($koneksidb) {
//     echo "sukses anjay";
// } else {
//     echo "gagal bjirr";
// }