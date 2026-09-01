<?php
/**
 * [DIUBAH] index.php — dulu bernama app.php, di-rename supaya jadi
 * halaman default yang kebuka duluan saat website dibuka (server web
 * otomatis cari index.php sebagai halaman utama).
 *
 * Halaman Home yang lama (isi kontennya) sekarang ada di home.php,
 * supaya nama "index.php" bisa dipakai file shell ini.
 *
 * SHELL UTAMA aplikasi. Ini satu-satunya file yang dibuka user di
 * browser. Sidebar cuma dimuat SEKALI di sini, konten halaman lain
 * (Home, Dashboard, dst) dimuat di dalam <iframe> di bawah. Karena
 * itu, URL di address bar browser TIDAK PERNAH berubah walau kamu
 * klik-klik menu di sidebar — yang berubah cuma isi iframe-nya.
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formiga</title>
  <link rel="stylesheet" href="assets/css/base.css">
  <link rel="stylesheet" href="assets/css/sidebar.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <style>
    /* Style khusus buat shell: iframe mengisi semua ruang konten,
       persis menggantikan posisi <main class="main-content"> */
    .content-frame {
      flex: 1;
      min-width: 0;
      height: 100vh;
      border: 0;
      display: block;
      margin-left: var(--sidebar-width);
      transition: margin-left .32s cubic-bezier(.4,0,.2,1);
      background: var(--color-bg);
    }
    .app-layout--sidebar-collapsed .content-frame {
      margin-left: var(--sidebar-collapsed-width);
    }
  </style>
</head>
<body>

  <div class="app-layout" id="appLayout">

    <?php include __DIR__ . '/includes/sidebar.php'; ?>

    <!-- Iframe: "jendela" tempat semua halaman lain ditampilkan.
         name="contentFrame" dipakai oleh target="contentFrame" di
         link-link sidebar.php supaya klik link ganti isi iframe ini,
         bukan navigasi browser biasa. -->
    <iframe src="home.php" name="contentFrame" id="contentFrame" class="content-frame"></iframe>

  </div>

  <script src="assets/js/main.js"></script>
  <script src="assets/js/shell.js"></script>
</body>
</html>
