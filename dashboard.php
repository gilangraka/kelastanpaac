<?php
require("fungsi.php");
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit(); // Terminate script execution after the redirect
}
tambah_data_mhs();
tambah_data_berita();
tambah_data_berita_gambar();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="assets/css/dashboard.css" />
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
  <title>KELASTANPAAC - Dashboard</title>
</head>

<body>
  <section>
    <div class="title">
      <h1>
        <img src="assets/img/logo.png" width="40" alt="Logo" />Dashboard (<?= $_SESSION['username']; ?>)
      </h1>
      <div class="tombol">
        <div class="button-list">
          <button id="btn-mhs" type="button" class="btn btn-aktif">
            Data Mahasiswa
          </button>
          <button id="btn-berita" type="button" class="btn">
            Berita / Kegiatan
          </button>
          <button id="btn-berita-gambar" type="button" class="btn">
            Berita Bergambar
          </button>
        </div>
        <form method="post" action="logout.php" class="btn-logout">
          <button type="submit" class="btn btn-danger">
            <i class="fa-solid fa-power-off" style="color: white"></i>
          </button>
        </form>
      </div>
    </div>

    <div id="div-mhs" class="mahasiswa" data-aos="fade-up">
      <div class="button-list">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalMhs">
          <i class="fa-solid fa-plus" style="color: white"></i>Tambah Data
        </button>
      </div>

      <table id="dataMahasiswa" class="table table-striped" style="width: 100%">
        <thead>
          <tr>
            <th>NIM</th>
            <td>Nomor Absen</td>
            <td>Foto</td>
            <th>Nama</th>
            <th>L/P</th>
            <th>Role</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $data = lihat_data_mhs();
          while ($d = mysqli_fetch_array($data)) {
          ?>
            <tr>
              <td><?= $d['nim']; ?></td>
              <td><?= substr($d['nim'], 6); ?></td>
              <td><?= $d['foto']; ?></td>
              <td><?= $d['nama']; ?></td>
              <td><?= $d['gender']; ?></td>
              <td><?= $d['role']; ?></td>
              <td class="d-flex flex-row gap-2">
                <a href="delete_mhs.php?nim=<?php echo $d['nim'] ?>" class="btn btn-danger">
                  <i class="fa-solid fa-trash" style="color: white"></i>
                </a>
                <a data-bs-toggle="modal" data-bs-target="#edit<?= $d['nim'] ?>" href="#" class=" btn btn-warning">
                  <i class="fa-regular fa-pen-to-square"></i>
                </a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>

    <div id="div-berita" class="berita" data-aos="fade-up">
      <div class="button-list">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalBerita">
          <i class="fa-solid fa-plus" style="color: white"></i>Tambah Data
        </button>
      </div>

      <table id="dataBerita" class="table table-striped" style="width: 100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Waktu Posting</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $data = lihat_data_berita();
          while ($d = mysqli_fetch_array($data)) {
          ?>
            <tr>
              <td><?= $d['id']; ?></td>
              <td><?= $d['judul']; ?></td>
              <td><?= $d['deskripsi']; ?></td>
              <td><?= $d['waktu_posting']; ?></td>
              <td>
                <a href="delete_berita.php?id=<?php echo $d['id'] ?>" class="btn btn-danger">
                  <i class="fa-solid fa-trash" style="color: white"></i>
                </a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>

    <div id="div-berita-gambar" class="berita-gambar" data-aos="fade-up">
      <div class="button-list">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalBeritaGambar">
          <i class="fa-solid fa-plus" style="color: white"></i>Tambah Data
        </button>
      </div>

      <table id="dataBeritaGambar" class="table table-striped" style="width: 100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Waktu Posting</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $data = lihat_data_berita_gambar();
          while ($d = mysqli_fetch_array($data)) {
          ?>
            <tr>
              <td><?= $d['id']; ?></td>
              <td><?= $d['judul']; ?></td>
              <td><?= $d['deskripsi']; ?></td>
              <td><?= $d['waktu_posting']; ?></td>
              <td><?= $d['foto']; ?></td>
              <td>
                <a href="delete_berita_gambar.php?id=<?php echo $d['id'] ?>" class="btn btn-danger">
                  <i class="fa-solid fa-trash" style="color: white"></i>
                </a>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>

  <!-- Modal Tambah-->
  <!-- Tambah Mahasiswa -->
  <div class="modal fade" id="modalMhs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Mahasiswa</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <input required type="text" name="nim" placeholder="NIM" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <input required type="file" accept="image/png, image/jpeg" name="berkas_mhs" placeholder="Foto" class="form-control" id="berkas_mhs">
            </div>
            <div class="mb-3">
              <input required type="text" name="nama" placeholder="Nama" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                <option selected>Jenis Kelamin</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
            <div class="mb-3">
              <select name="role" class="form-select" aria-label="Default select example">
                <option selected>Role</option>
                <option value="Wali Dosen">Wali Dosen</option>
                <option value="Ketua Kelas">Ketua Kelas</option>
                <option value="Wakil Ketua Kelas">Wakil Ketua Kelas</option>
                <option value="Bendahara">Bendahara</option>
                <option value="Sekretaris">Sekretaris</option>
                <option value="Mahasiswa">Mahasiswa</option>
              </select>
            </div>

            <input type="submit" class="btn btn-success m-auto" name="btnMhs" value="Tambah">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambah Berita -->
  <div class="modal fade" id="modalBerita" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Berita / Kegiatan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="mb-3">
              <input required type="text" name="judul" placeholder="Judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <div class="form-floating">
                <textarea required name="deskripsi" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Deskripsi</label>
              </div>
            </div>

            <input type="submit" class="btn btn-success m-auto" name="btnBerita" value="Tambah">
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambah Berita Gambar -->
  <div class="modal fade" id="modalBeritaGambar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Berita Gambar</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <input required type="text" name="judul" placeholder="Judul" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <div class="form-floating">
                <textarea name="deskripsi" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Deskripsi</label>
              </div>
            </div>
            <div class="mb-3">
              <input required type="file" accept="image/png, image/jpeg" name="berkas_gambar" placeholder="Foto" class="form-control" id="berkas_gambar">
            </div>

            <input type="submit" class="btn btn-success m-auto" name="btnGambar" value="Tambah">
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Tambah End -->

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script>
    new DataTable("#dataMahasiswa");
    new DataTable("#dataBerita");
    new DataTable("#dataBeritaGambar");
  </script>
</body>

</html>