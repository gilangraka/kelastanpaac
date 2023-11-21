new DataTable("#dataMahasiswa");

AOS.init({
  duration: 1000,
});

let comingSoon = () => {
  alert("Coming Soon!");
};

let goTo = (namaSitus, statsBlank = true) => {
  if (statsBlank == true) {
    window.open(namaSitus, "_blank");
  } else {
    window.open(namaSitus, "_parent");
  }
};

let removeAttr = () => {
  div_mhs.classList.remove("aos-animate");
  div_berita.classList.remove("aos-animate");
  div_berita_gambar.classList.remove("aos-animate");
};

let btn_mhs = document.getElementById("btn-mhs");
let btn_berita = document.getElementById("btn-berita");
let btn_berita_gambar = document.getElementById("btn-berita-gambar");

let div_mhs = document.getElementById("div-mhs");
let div_berita = document.getElementById("div-berita");
let div_berita_gambar = document.getElementById("div-berita-gambar");

btn_mhs.addEventListener("click", () => {
  btn_berita.classList.remove("btn-aktif");
  btn_berita_gambar.classList.remove("btn-aktif");
  btn_mhs.classList.add("btn-aktif");

  // div_mhs.setAttribute("data-aos", "fade-down");
  div_mhs.classList.add("aos-animate");

  div_mhs.style.display = "block";
  div_berita.style.display = "none";
  div_berita_gambar.style.display = "none";

  AOS.init({
    initClassName: "aos-init",
    startEvent: "click",
  });
  removeAttr();
});

btn_berita.addEventListener("click", () => {
  btn_berita.classList.add("btn-aktif");
  btn_berita_gambar.classList.remove("btn-aktif");
  btn_mhs.classList.remove("btn-aktif");

  // div_berita.setAttribute("data-aos", "fade-down");
  div_berita.classList.add("aos-animate");

  div_berita.style.display = "block";
  div_mhs.style.display = "none";
  div_berita_gambar.style.display = "none";

  AOS.init({
    initClassName: "aos-init",
    startEvent: "click",
  });
  removeAttr();
});

btn_berita_gambar.addEventListener("click", () => {
  btn_berita.classList.remove("btn-aktif");
  btn_berita_gambar.classList.add("btn-aktif");
  btn_mhs.classList.remove("btn-aktif");

  // div_berita.setAttribute("data-aos", "fade-down");
  div_berita_gambar.classList.add("aos-animate");

  div_berita.style.display = "none";
  div_mhs.style.display = "none";
  div_berita_gambar.style.display = "block";

  AOS.init({
    initClassName: "aos-init",
    startEvent: "click",
  });
  removeAttr();
});
