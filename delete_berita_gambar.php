<?php
include("koneksi.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $file = "SELECT foto FROM berita_gambar WHERE id = $id";
    $res_file  = mysqli_query($GLOBALS["conn"], $file);

    $query = "DELETE FROM berita_gambar WHERE id = $id";
    $data = mysqli_query($GLOBALS["conn"], $query);

    if (mysqli_num_rows($res_file) > 0) {
        $row = mysqli_fetch_assoc($res_file);
        $get_file = $row['foto'];
        unlink("assets/dinamis/img_berita/$get_file");
    }

    if ($data) {
        echo '<script>alert("Data berhasil dihapus !")</script>';
        echo '<script>window.location.href="dashboard.php";</script>';
        // header("Location:dashboard.php");
    }
}
