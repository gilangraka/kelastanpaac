<?php
include("koneksi.php");

if (isset($_GET["nim"])) {
    $nim = $_GET["nim"];

    $file = "SELECT foto FROM mahasiswa WHERE nim = $nim";
    $res_file  = mysqli_query($GLOBALS["conn"], $file);

    $query = "DELETE FROM mahasiswa WHERE nim = $nim";
    $data = mysqli_query($GLOBALS["conn"], $query);

    if (mysqli_num_rows($res_file) > 0) {
        $row = mysqli_fetch_assoc($res_file);
        $get_file = $row['foto'];
        unlink("assets/dinamis/img_mhs/$get_file");
    }

    if ($data) {
        echo '<script>alert("Data berhasil dihapus !")</script>';
        echo '<script>window.location.href="dashboard.php";</script>';
        // header("Location:dashboard.php");
    }
}
