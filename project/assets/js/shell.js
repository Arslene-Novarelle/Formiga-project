/* =========================================================================
   FILE: assets/js/shell.js
   TUJUAN: dipakai HANYA di index.php (shell utama / bungkus aplikasi).
   Kerjanya cuma 1: kasih tahu sidebar "menu mana yang lagi aktif sekarang",
   dengan cara ngintip halaman apa yang lagi tampil di dalam <iframe>.

   Kenapa perlu ini? Soalnya sidebar sekarang cuma di-render 1x saja (di
   index.php), sedangkan konten halaman lain (Home, Dashboard, dst) ganti-
   ganti di dalam iframe. Jadi PHP gak bisa lagi otomatis kasih tahu "lagi
   di halaman apa" -- makanya digantikan JS di sini.
   ========================================================================= */

document.addEventListener("DOMContentLoaded", function () {
  var iframe = document.getElementById("contentFrame");
  if (!iframe) return; // kalau iframe-nya gak ada, gak usah lanjut

  // "Kamus" terjemahan: nama file halaman -> nama menu di sidebar.
  // (Nama menu ini harus SAMA PERSIS dengan atribut data-nav-page yang
  // ada di link-link sidebar, lihat includes/sidebar.php)
  var PAGE_MAP = {
    "home.php": "home",
    "dashboard.php": "dashboard",
    "item.php": "item",
    "stock-in-out.php": "stock-in-out",
    "warehouses.php": "warehouses",
    "categories.php": "categories",
    "suppliers.php": "suppliers",
    "stock-report.php": "stock-report",
    "valuation-report.php": "valuation-report",
    "transaction-history.php": "transaction-history"
  };

  function updateActiveMenu() {
    // Setiap <iframe> itu kayak jendela kecil yang isinya halaman web
    // sendiri. `iframe.contentWindow` = jendela di dalam iframe itu.
    // `.location.pathname` = alamat URL halaman yang lagi tampil di
    // jendela itu, tapi cuma bagian nama filenya, contoh:
    // ".../warehouse-project/dashboard.php" -> kita cuma butuh "dashboard.php"
    var alamatLengkapDiDalamIframe;
    try {
      alamatLengkapDiDalamIframe = iframe.contentWindow.location.pathname;
    } catch (e) {
      // Kadang pas iframe-nya lagi loading, alamatnya belum bisa dibaca.
      // Kalau itu terjadi, gak apa-apa, lewati aja, nanti update lagi
      // begitu iframe selesai loading (lihat event "load" di bawah).
      return;
    }

    // Ambil cuma nama file-nya aja dari alamat lengkap tadi (potong
    // semua yang sebelum garis miring "/" terakhir)
    var namaFile = alamatLengkapDiDalamIframe.substring(
      alamatLengkapDiDalamIframe.lastIndexOf("/") + 1
    ) || "home.php"; // kalau kosong (halaman pertama dibuka), anggap "home.php"

    // Cari nama menu sidebar yang cocok buat file ini, pakai "kamus" di atas
    var namaMenuSidebar = PAGE_MAP[namaFile];

    // Langkah 1: matiin dulu highlight dari SEMUA menu sidebar
    document.querySelectorAll(".sidebar-link").forEach(function (link) {
      link.classList.remove("is-active");
    });

    // Langkah 2: nyalain highlight cuma di menu yang cocok
    if (namaMenuSidebar) {
      var menuYangAktif = document.querySelector(
        '.sidebar-link[data-nav-page="' + namaMenuSidebar + '"]'
      );
      if (menuYangAktif) menuYangAktif.classList.add("is-active");
    }
  }

  // Tiap kali iframe selesai load halaman baru (misal user klik menu
  // sidebar), jalankan lagi fungsi di atas buat update highlight-nya
  iframe.addEventListener("load", updateActiveMenu);

  // Panggil juga sekali di awal, buat pas halaman pertama kali dibuka
  updateActiveMenu();
});
