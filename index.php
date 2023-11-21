<?php
require("fungsi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
  <title>KELASTANPAAC - IKC 2022</title>
  <style>

  </style>
</head>

<body>
  <!-- Navbar -->
  <header>
    <nav>
      <div class="logo">
        <img src="assets/img/logo.png" alt="Logo" width="35px" />
        <a href="#">KELASTANPAAC</a>
      </div>

      <div class="list">
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#berita">Berita</a></li>
          <li><a href="#mahasiswa">Mahasiswa</a></li>
        </ul>
      </div>

      <div class="login">
        <button class="login" onclick="goTo(`login.php`, false)">
          LOGIN
        </button>
      </div>
    </nav>
  </header>
  <!-- Navbar End -->
  <main>
    <!-- Hero -->
    <section id="home" class="hero container-fluid">
      <div class="hero-logo">
        <img src="assets/img/logo.png" width="200" alt="Hero Logo" />
      </div>
      <div class="hero-content" data-aos="zoom-in">
        <div class="judul">
          <h1 style="color: white; text-align: center">
            Kelastanpaac - T. Informatika C 2022
          </h1>
        </div>
        <div class="btn-sosmed">
          <button onclick="goTo(`https://www.instagram.com/kelastanpaac/`)">
            <i class="fa-brands fa-instagram" style="color: #ffffff"></i>
            Instagram
          </button>
          <button onclick="comingSoon()">
            <i class="fa-solid fa-wallet" style="color: #ffffff"></i>
            SimKas
          </button>
        </div>
        <button class="jadwal" onclick="goTo(`assets/dinamis/jadwal_kelas.pdf`)">
          <i class="fa-regular fa-calendar" style="color: white"></i>Lihat
          Jadwal
        </button>
      </div>
    </section>
    <!-- Hero End -->

    <!-- Kegiatan -->
    <section id="berita" class="kegiatan container-lg py-5" data-aos="fade-down">
      <h1>Berita Terbaru</h1>
      <div>
        <div class="berita">
          <div class="berita-konten" onclick="comingSoon()">
            <p style="color: white">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia
              qui libero suscipit earum ipsam eum dolore minima velit illum
              veritatis?
            </p>
            <p style="color: #ffd43b" class="date">
              <i class="fa-regular fa-calendar" style="color: #ffd43b"></i>25
              September 2023
            </p>
          </div>
          <div class="berita-konten">
            <p style="color: white">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia
              qui libero suscipit earum ipsam eum dolore minima velit illum
              veritatis?
            </p>
            <p style="color: #ffd43b" class="date">
              <i class="fa-regular fa-calendar" style="color: #ffd43b"></i>25
              September 2023
            </p>
          </div>
          <div class="berita-konten">
            <p style="color: white">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia
              qui libero suscipit earum ipsam eum dolore minima velit illum
              veritatis?
            </p>
            <p style="color: #ffd43b" class="date">
              <i class="fa-regular fa-calendar" style="color: #ffd43b"></i>25
              September 2023
            </p>
          </div>
        </div>
        <div class="berita-terbaru" onclick="comingSoon()">
          <img src="assets/img/hero_img.png" alt="Berita Terbaru" style="object-fit: cover" />
          <div class="detail">
            <h3>Mahasiswa IK - 1C Foto Bersama Dosen</h3>
            <p class="date">
              <i class="fa-regular fa-calendar"></i>25 September 2023
            </p>
            <p style="margin-top: -20px; font-size: 0.8rem">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rerum
              adipisci expedita eum libero maxime accusantium minus architecto
              quo asperiores delectus?
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Kegiatan End -->

    <!-- Mahasiswa -->
    <section id="mahasiswa" class="mahasiswa container-fluid" data-aos="fade-up">
      <div class="container-lg">
        <h1 class="text-center pb-3">Data Mahasiswa</h1>

        <table id="dataMahasiswa" class="table table-striped" style="width: 100%">
          <thead>
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>L/P</th>
              <th>Role</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = lihat_data_mhs();
            while ($d = mysqli_fetch_array($data)) {
            ?>
              <tr>
                <td><?= $d['nim']; ?></td>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['gender']; ?></td>
                <td><?= $d['role']; ?></td>
                <td>
                  <button data-bs-toggle="modal" data-bs-target="#modal<?= $d['nim'] ?>">Detail</button>
                </td>
              </tr>

              <div class="modal fade" id="modal<?= $d['nim'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Detail Mahasiswa</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex flex-row gap-4">
                      <div class="border" style="flex-basis: 30%">
                        <img src="./assets/dinamis/img_mhs/<?= $d['foto'] ?>" alt="Foto Profil" width="100%">
                      </div>
                      <div class="d-flex flex-row align-items-center" style="gap: 20px">
                        <div class="th fw-bold">
                          <p>Nama</p>
                          <p>NIM</p>
                          <p>L/P</p>
                          <p>Role</p>
                        </div>
                        <div class="td">
                          <p><?= $d['nama']; ?></p>
                          <p><?= $d['nim']; ?></p>
                          <p><?= $d['gender']; ?></p>
                          <p><?= $d['role']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </section>
    <!-- Mahasiswa End -->
  </main>

  <footer class="container-fluid">
    <p>Copyright &copy; 2023</p>
    <p>
      Made with 💙 by
      <a href="https://www.instagram.com/kelastanpaac/" target="_blank">Mahasiswa Polines</a>
    </p>
  </footer>

  <!-- Import DataTables -->
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>