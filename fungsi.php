<?php
require("koneksi.php");

function validasi_login()
{
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $res = mysqli_query($GLOBALS["conn"], "SELECT * FROM users WHERE username='$username' AND password='$password'");
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Username / Password Salah!')</script>";
        }
    }
}

function lihat_data_mhs()
{
    $query = "SELECT * FROM mahasiswa ORDER BY nim ASC";
    return mysqli_query($GLOBALS["conn"], $query);
}

function lihat_data_berita()
{
    $query = "SELECT * FROM berita";
    return mysqli_query($GLOBALS["conn"], $query);
}

function lihat_data_berita_gambar()
{
    $query = "SELECT * FROM berita_gambar";
    return mysqli_query($GLOBALS["conn"], $query);
}

function tambah_data_berita()
{
    if (isset($_POST["btnBerita"])) {
        $judul = $_POST["judul"];
        $deskripsi = $_POST["deskripsi"];
        $waktu_posting = date("Y-m-d h:i:s");

        $query = "INSERT INTO berita VALUES ('', '$judul', '$deskripsi', '$waktu_posting')";
        $data = mysqli_query($GLOBALS["conn"], $query);
        if ($data) {
            echo "<script>alert(`Data berhasil ditambahkan`)</script>";
            header("refresh:0");
        }
    }
}

function tambah_data_mhs()
{
    if (isset($_POST["btnMhs"])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : false;
        $role = isset($_POST['role']) ? $_POST['role'] : false;

        $ekstensi = pathinfo($_FILES["berkas_mhs"]["name"], PATHINFO_EXTENSION);
        $nama_file = $nim . "." . $ekstensi;
        $nama_sementara = $_FILES['berkas_mhs']['tmp_name'];
        $dir = "assets/dinamis/img_mhs/";

        $query = "INSERT INTO mahasiswa VALUES('$nim', '$nama_file', '$nama', '$jenis_kelamin', '$role')";

        $move = move_uploaded_file($nama_sementara, $dir . $nama_file);
        $data = mysqli_query($GLOBALS["conn"], $query);

        if ($move and $data) {
            echo "<script>alert(`Data berhasil ditambahkan`)</script>";
            header("refresh:0");
        }
    }
}

function tambah_data_berita_gambar()
{
    if (isset($_POST["btnGambar"])) {
        $judul = $_POST["judul"];
        $deskripsi = $_POST["deskripsi"];
        $waktu_posting = date("Y-m-d h:i:s");
        $date = date("Ymihis");

        $ekstensi = pathinfo($_FILES["berkas_gambar"]["name"], PATHINFO_EXTENSION);
        $namaFile = $date . "." . $ekstensi;
        $namaSementara = $_FILES['berkas_gambar']['tmp_name'];
        $dirUpload = "assets/dinamis/img_berita/";

        $query = "INSERT INTO berita_gambar VALUES ('', '$judul', '$deskripsi', '$waktu_posting', '$namaFile')";
        $data = mysqli_query($GLOBALS["conn"], $query);
        $move = move_uploaded_file($namaSementara, $dirUpload . $namaFile);

        if ($move and $data) {
            echo "<script>alert(`Data berhasil ditambahkan`)</script>";
            header("refresh:0");
        }
    }
}
