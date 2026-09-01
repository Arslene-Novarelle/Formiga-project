<?php $currentPage = 'transaction-history'; ?>
<!DOCTYPE html>
<!-- =============================================================================
     FILE INI: transaction-history.php
     KETERANGAN: Halaman "Transaction History". Masih tahap FRONTEND saja (belum ada koneksi
     database / PHP logic). Cari komentar "TODO(backend)" untuk bagian yang
     perlu kamu sambungkan ke backend PHP kamu sendiri.
     Daftar lengkap semua id & class ada di file IDS_CLASSES.md.
     ============================================================================= -->
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction History | Nama App</title>
  <link rel="stylesheet" href="assets/css/transaction-history.css">
  
</head>
<body>

  <!-- Bungkus paling luar seluruh halaman (sidebar + konten) -->
    <!-- ============================================================
         KONTEN UTAMA halaman "Transaction History"
         ============================================================ -->
    <main class="main-content" id="mainContent">

      <header class="content-header" id="transactionHistoryHeader">
        <h1 class="content-header__title">Transaction History</h1>
        <div class="content-header__actions">
          <!-- TODO(backend): generate & download laporan (Excel/PDF) -->
          <button type="button" class="btn btn--outline" id="btnExportTransactionHistory">
            Export
          </button>
        </div>
      </header>

      <!-- Filter tanggal laporan -->
      <div class="filters-row" id="transactionHistoryFilters">
        <div class="filter-field">
          <label for="transactionHistoryDateFrom">Dari Tanggal</label>
          <input type="date" id="transactionHistoryDateFrom">
        </div>
        <div class="filter-field">
          <label for="transactionHistoryDateTo">Sampai Tanggal</label>
          <input type="date" id="transactionHistoryDateTo">
        </div>
      </div>


      <section class="card" id="transactionHistoryTableCard">
        <div class="table-wrapper">
          <table class="data-table" id="transactionHistoryTable">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Tipe</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>User</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <!-- TODO(backend): loop <tr> data laporan dari database -->
            <tbody id="transactionHistoryTableBody">
              <tr class="table-empty-row">
                <td colspan="6">Belum ada riwayat transaksi</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

    </main>


  <script src="assets/js/main.js"></script>
  
</body>
</html>
