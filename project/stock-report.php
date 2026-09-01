<?php $currentPage = 'stock-report'; ?>
<!DOCTYPE html>
<!-- =============================================================================
     FILE INI: stock-report.php
     KETERANGAN: Halaman "Stock Report". Masih tahap FRONTEND saja (belum ada koneksi
     database / PHP logic). Cari komentar "TODO(backend)" untuk bagian yang
     perlu kamu sambungkan ke backend PHP kamu sendiri.
     Daftar lengkap semua id & class ada di file IDS_CLASSES.md.
     ============================================================================= -->
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stock Report | Nama App</title>
  <link rel="stylesheet" href="assets/css/stock-report.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
</head>
<body>

  <!-- Bungkus paling luar seluruh halaman (sidebar + konten) -->
    <!-- ============================================================
         KONTEN UTAMA halaman "Stock Report"
         ============================================================ -->
    <main class="main-content" id="mainContent">

      <header class="content-header" id="stockReportHeader">
        <h1 class="content-header__title">Stock Report</h1>
        <div class="content-header__actions">
          <!-- TODO(backend): generate & download laporan (Excel/PDF) -->
          <button type="button" class="btn btn--outline" id="btnExportStockReport">
            Export
          </button>
        </div>
      </header>

      <!-- Filter tanggal laporan -->
      <div class="filters-row" id="stockReportFilters">
        <div class="filter-field">
          <label for="stockReportDateFrom">Dari Tanggal</label>
          <input type="date" id="stockReportDateFrom">
        </div>
        <div class="filter-field">
          <label for="stockReportDateTo">Sampai Tanggal</label>
          <input type="date" id="stockReportDateTo">
        </div>
      </div>


      <section class="card card--chart" id="stockReportChartCard">
        <h2 class="card__title">Grafik Stock Report</h2>
        <!-- Chart beneran pakai Chart.js. Data & konfigurasinya ada di
             assets/js/charts.js (cari fungsi yang cocok dengan id canvas ini). -->
        <div class="chart-canvas-wrapper">
          <canvas id="stockReportChart"></canvas>
        </div>
      </section>

      <section class="card" id="stockReportTableCard">
        <div class="table-wrapper">
          <table class="data-table" id="stockReportTable">
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Gudang</th>
                <th>Stok Masuk</th>
                <th>Stok Keluar</th>
                <th>Sisa Stok</th>
              </tr>
            </thead>
            <!-- TODO(backend): loop <tr> data laporan dari database -->
            <tbody id="stockReportTableBody">
              <tr class="table-empty-row">
                <td colspan="6">Belum ada data laporan stok</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

    </main>


  <script src="assets/js/main.js"></script>
  <script src="assets/js/charts.js"></script>
</body>
</html>
