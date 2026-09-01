<?php $currentPage = 'home'; 
require_once 'actions/koneksi.php';
require_once 'actions/action.php';

// if ($conn) {
//     echo "Koneksi berhasil!";
// } else {
//     echo "Koneksi gagal!";
// }

// /** @var mysqli $conn */

    $conn = new mysqli('localhost','root','','warehouse_logistik');

$data = new Query($conn);
$dataWeek = $data->getDataWeek();

?>
<!DOCTYPE html>
<!-- =============================================================================
     FILE INI: index.php
     KETERANGAN: Halaman "Home". Masih tahap FRONTEND saja (belum ada koneksi
     database / PHP logic). Cari komentar "TODO(backend)" untuk bagian yang
     perlu kamu sambungkan ke backend PHP kamu sendiri.
     Daftar lengkap semua id & class ada di file IDS_CLASSES.md.
     ============================================================================= -->
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | Nama App</title>
  <link rel="stylesheet" href="assets/css/index.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
</head>
<body>

  <!-- Bungkus paling luar seluruh halaman (sidebar + konten) -->
    <!-- ============================================================
         KONTEN UTAMA halaman "Home"
         ============================================================ -->
    <main class="main-content" id="mainContent">

      <header class="content-header content-header--banner" id="homeGreetingBanner">
        <!-- TODO(backend): ganti "User" dengan nama user yang login,
             dan sesuaikan sapaan (Pagi/Siang/Malam) berdasarkan jam server -->
        <h1 class="content-header__title" id="homeGreetingText">Selamat Pagi, User</h1>
      </header>

      <section class="card card--chart" id="cardHomeChart">
        <h2 class="card__title">Ringkasan Stok (Masuk vs Keluar)</h2>
        <!-- Chart beneran pakai Chart.js. Data & konfigurasinya ada di
             assets/js/charts.js (cari fungsi yang cocok dengan id canvas ini). -->
        <div class="chart-canvas-wrapper">
          <canvas id="homeBarChart"></canvas>
        </div>
      </section>

      <!-- 3 kolom: barang banyak masuk, barang menipis, notifikasi terbaru -->
      <section class="grid-3col" id="homeInsightsGrid">

        <div class="card" id="cardTopStockIn">
          <h2 class="card__title">Barang Banyak Masuk</h2>
          <ul class="simple-list" id="listTopStockIn">
          <li class="simple-list__item" id="homeStockInItem1">
            <span>Nama Barang 1</span>
            <span class="badge badge--neutral">0 pcs</span>
          </li>
          <li class="simple-list__item" id="homeStockInItem2">
            <span>Nama Barang 2</span>
            <span class="badge badge--neutral">0 pcs</span>
          </li>
          <li class="simple-list__item" id="homeStockInItem3">
            <span>Nama Barang 3</span>
            <span class="badge badge--neutral">0 pcs</span>
          </li>
          </ul>
        </div>

        <div class="card" id="cardLowStock">
          <h2 class="card__title">Barang Menipis</h2>
          <ul class="simple-list" id="listLowStock">
          <li class="simple-list__item" id="homeLowStockItem1">
            <span>Nama Barang 1</span>
            <span class="badge badge--neutral">0 pcs</span>
          </li>
          <li class="simple-list__item" id="homeLowStockItem2">
            <span>Nama Barang 2</span>
            <span class="badge badge--neutral">0 pcs</span>
          </li>
          <li class="simple-list__item" id="homeLowStockItem3">
            <span>Nama Barang 3</span>
            <span class="badge badge--neutral">0 pcs</span>
          </li>
          </ul>
        </div>

        <div class="card" id="cardNotificationsPreview">
          <h2 class="card__title">Notifikasi Terbaru</h2>
          <ul class="simple-list" id="listNotificationsPreview">
            <li class="simple-list__empty">Belum ada notifikasi</li>
          </ul>
          <a href="notifications.php" class="card__footer-link">Lihat semua notifikasi &rarr;</a>
        </div>

      </section>

    </main>

  <script>
      const dataWeek = <?php echo json_encode($dataWeek); ?>;
  </script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/charts.js"></script>
</body>
</html>
