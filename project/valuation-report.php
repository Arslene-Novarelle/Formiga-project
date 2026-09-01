<?php $currentPage = 'valuation-report'; ?>
<!DOCTYPE html>
<!-- =============================================================================
     FILE INI: valuation-report.php
     KETERANGAN: Halaman "Valuation Report". Masih tahap FRONTEND saja (belum ada koneksi
     database / PHP logic). Cari komentar "TODO(backend)" untuk bagian yang
     perlu kamu sambungkan ke backend PHP kamu sendiri.
     Daftar lengkap semua id & class ada di file IDS_CLASSES.md.
     ============================================================================= -->
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valuation Report | Nama App</title>
  <link rel="stylesheet" href="assets/css/valuation-report.css">
  
</head>
<body>

  <!-- Bungkus paling luar seluruh halaman (sidebar + konten) -->
    <!-- ============================================================
         KONTEN UTAMA halaman "Valuation Report"
         ============================================================ -->
    <main class="main-content" id="mainContent">

      <header class="content-header" id="valuationReportHeader">
        <h1 class="content-header__title">Valuation Report</h1>
        <div class="content-header__actions">
          <!-- TODO(backend): generate & download laporan (Excel/PDF) -->
          <button type="button" class="btn btn--outline" id="btnExportValuationReport">
            Export
          </button>
        </div>
      </header>

      <!-- Filter tanggal laporan -->
      <div class="filters-row" id="valuationReportFilters">
        <div class="filter-field">
          <label for="valuationReportDateFrom">Dari Tanggal</label>
          <input type="date" id="valuationReportDateFrom">
        </div>
        <div class="filter-field">
          <label for="valuationReportDateTo">Sampai Tanggal</label>
          <input type="date" id="valuationReportDateTo">
        </div>
      </div>


      <section class="card" id="valuationReportTableCard">
        <div class="table-wrapper">
          <table class="data-table" id="valuationReportTable">
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Jumlah Stok</th>
                <th>Harga Satuan</th>
                <th>Total Nilai</th>
              </tr>
            </thead>
            <!-- TODO(backend): loop <tr> data laporan dari database -->
            <tbody id="valuationReportTableBody">
              <tr class="table-empty-row">
                <td colspan="4">Belum ada data valuasi</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

    </main>


  <script src="assets/js/main.js"></script>
  
</body>
</html>
