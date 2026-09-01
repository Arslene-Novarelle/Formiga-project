<?php $currentPage = 'dashboard'; ?>
<!DOCTYPE html>
<!-- =============================================================================
     FILE INI: dashboard.php
     KETERANGAN: Halaman "Dashboard". Masih tahap FRONTEND saja (belum ada koneksi
     database / PHP logic). Cari komentar "TODO(backend)" untuk bagian yang
     perlu kamu sambungkan ke backend PHP kamu sendiri.
     Daftar lengkap semua id & class ada di file IDS_CLASSES.md.
     ============================================================================= -->
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard | Nama App</title>
  <link rel="stylesheet" href="assets/css/dashboard.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
</head>
<body>

  <!-- Bungkus paling luar seluruh halaman (sidebar + konten) -->
    <!-- ============================================================
         KONTEN UTAMA halaman "Dashboard"
         ============================================================ -->
    <main class="main-content" id="mainContent">

      <header class="content-header" id="dashboardHeader">
        <h1 class="content-header__title">Dashboard</h1>
      </header>

      <!-- 4 kartu statistik ringkas -->
      <section class="stats-grid" id="dashboardStatsGrid">
        <div class="stat-card" id="statTotalProduk">
          <div class="stat-card__label">Total Produk</div>
          <!-- TODO(backend): isi dengan COUNT(*) dari tabel produk -->
          <div class="stat-card__value" id="statTotalProdukValue">0</div>
        </div>
        <div class="stat-card" id="statTotalStokMasuk">
          <div class="stat-card__label">Total Stok Masuk</div>
          <div class="stat-card__value" id="statTotalStokMasukValue">0</div>
        </div>
        <div class="stat-card" id="statTotalStokKeluar">
          <div class="stat-card__label">Total Stok Keluar</div>
          <div class="stat-card__value" id="statTotalStokKeluarValue">0</div>
        </div>
        <div class="stat-card" id="statNilaiInventori">
          <div class="stat-card__label">Nilai Inventori</div>
          <!-- TODO(backend): format ke Rupiah -->
          <div class="stat-card__value" id="statNilaiInventoriValue">Rp 0</div>
        </div>
      </section>

      <div class="chart-box">
        <section class="card card--chart" id="cardDashboardChartOut">
          <h2 class="card__title">Grafik Pengeluaran Stok Paling tinggi</h2>
          <!-- Chart beneran pakai Chart.js. Data & konfigurasinya ada di
              assets/js/charts.js (cari fungsi yang cocok dengan id canvas ini). -->
          <div class="chart-canvas-wrapper">
            <canvas id="dashboardBarChartOut"></canvas>
          </div>
        </section>

        <section class="card card--chart" id="cardDashboardChartIn">
          <h2 class="card__title">Grafik Penambahan Stok Paling tinggi</h2>
          <!-- Chart beneran pakai Chart.js. Data & konfigurasinya ada di
              assets/js/charts.js (cari fungsi yang cocok dengan id canvas ini). -->
          <div class="chart-canvas-wrapper">
            <canvas id="dashboardBarChartIn"></canvas>
          </div>
        </section>
      </div>

      <!-- 2 kolom: barang banyak masuk & barang menipis -->
      <section class="grid-2col" id="dashboardListsGrid">
        
        <div class="card" id="cardDashboardStockIn">
          <h2 class="card__title">Daftar Barang Banyak Masuk</h2>
          <ul class="simple-list" id="listDashboardStockIn">
          <li class="simple-list__item" id="dashStockInItem1">
            <span>Nama Barang 1</span>
            <span class="badge badge--neutral">0 pcs</span>
          </li>
          <li class="simple-list__item" id="dashStockInItem2">
            <span>Nama Barang 2</span>
            <span class="badge badge--neutral">0 pcs</span>
          </li>
          <li class="simple-list__item" id="dashStockInItem3">
            <span>Nama Barang 3</span>
            <span class="badge badge--neutral">0 pcs</span>
          </li>
          </ul>
        </div>

        <div class="card" id="cardDashboardLowStock">
          <h2 class="card__title">Daftar Barang Banyak Keluar</h2>
          <ul class="simple-list" id="listDashboardLowStock">
          <li class="simple-list__item" id="dashLowStockItem1">
            <span>Nama Barang 1</span>
            <span class="badge badge--neutral">0 pcs</span>
          </li>
          <li class="simple-list__item" id="dashLowStockItem2">
            <span>Nama Barang 2</span>
            <span class="badge badge--neutral">0 pcs</span>
          </li>
          <li class="simple-list__item" id="dashLowStockItem3">
            <span>Nama Barang 3</span>
            <span class="badge badge--neutral">0 pcs</span>
          </li>
          </ul>
        </div>
      </section>

    </main>


  <script src="assets/js/main.js"></script>
  <script src="assets/js/charts.js"></script>
</body>
</html>
