<?php
include("koneksi.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $query = "DELETE FROM berita WHERE id = $id";
    $data = mysqli_query($GLOBALS["conn"], $query);

    if ($data) {
        echo '<script>alert("Data berhasil dihapus !")</script>';
        echo '<script>window.location.href="dashboard.php";</script>';
        // header("Location:dashboard.php");
    }
}
