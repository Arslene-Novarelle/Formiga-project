<?php $currentPage = 'stock-in-out'; ?>
<!DOCTYPE html>
<!-- =============================================================================
     FILE INI: stock-in-out.php
     KETERANGAN: Halaman "Stock In/Out". Masih tahap FRONTEND saja (belum ada koneksi
     database / PHP logic). Cari komentar "TODO(backend)" untuk bagian yang
     perlu kamu sambungkan ke backend PHP kamu sendiri.
     Daftar lengkap semua id & class ada di file IDS_CLASSES.md.
     ============================================================================= -->
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stock In/Out | Nama App</title>
  <link rel="stylesheet" href="assets/css/stock-in-out.css">
  <link rel="stylesheet" href="assets/css/modal.css"> <!-- [DIUBAH] tambah CSS modal -->
</head>
<body>

  <!-- Bungkus paling luar seluruh halaman (sidebar + konten) -->
    <!-- ============================================================
         KONTEN UTAMA halaman "Stock In/Out"
         ============================================================ -->
    <main class="main-content" id="mainContent">

      <header class="content-header" id="stockInOutHeader">
        <h1 class="content-header__title">Stock In/Out</h1>
        <div class="content-header__actions">
          <!-- [BARU] Sebelumnya halaman ini TIDAK PUNYA tombol tambah transaksi sama
               sekali -- ditambahkan di sini, buka modal di bawah. -->
          <button type="button" class="btn btn--primary" id="btnAddStockMovement" data-modal-open="modalAddStockMovement">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Tambah Transaksi
          </button>
        </div>
      </header>

      <!-- [BARU] Modal tambah transaksi stok. Field "Supplier" (kalau Masuk) atau
           "Tujuan Kirim" (kalau Keluar) otomatis muncul/sembunyi sesuai tipe yang
           dipilih -- lihat logic-nya di assets/js/stock-in-out.js.
           Form submit ke actions/add-stock-movement.php pakai method POST biasa. -->
      <div class="modal-overlay" id="modalAddStockMovement" data-modal>
        <div class="modal">
          <div class="modal__header">
            <span class="modal__title">Tambah Transaksi Stok</span>
            <button type="button" class="modal__close" data-modal-close>&times;</button>
          </div>
          <form class="modal__body" method="POST" action="actions/add-stock-movement.php" id="formAddStockMovement">
            <div class="modal__field">
              <label for="fieldMovementType">Tipe Transaksi</label>
              <select id="fieldMovementType" name="type" required>
                <option value="masuk">Stock Masuk</option>
                <option value="keluar">Stock Keluar</option>
                <option value="pindah">Pindah Gudang</option>
              </select>
            </div>
            <div class="modal__field">
              <label for="fieldMovementItem">Produk</label>
              <!-- TODO(backend): isi <option> dari tabel barang -->
              <select id="fieldMovementItem" name="id_brg" required>
                <option value="">Pilih produk</option>
              </select>
            </div>
            <div class="modal__field">
              <label for="fieldMovementWarehouse">Gudang<span id="labelWarehouseHint"></span></label>
              <!-- TODO(backend): isi <option> dari tabel gudang -->
              <select id="fieldMovementWarehouse" name="id_gudang" required>
                <option value="">Pilih gudang</option>
              </select>
            </div>

            <!-- Field ini CUMA muncul kalau tipe = masuk -->
            <div class="modal__field" id="fieldGroupSupplier">
              <label for="fieldMovementSupplier">Supplier (asal barang)</label>
              <!-- TODO(backend): isi <option> dari tabel suppliers -->
              <select id="fieldMovementSupplier" name="id_supplier">
                <option value="">Pilih supplier</option>
              </select>
            </div>

            <!-- Field ini CUMA muncul kalau tipe = keluar -->
            <div class="modal__field" id="fieldGroupTujuanKirim" style="display:none;">
              <label for="fieldMovementTujuan">Tujuan Kirim</label>
              <input type="text" id="fieldMovementTujuan" name="tujuan_kirim" placeholder="Misal: Toko Mitra Cempaka">
            </div>

            <!-- Field ini CUMA muncul kalau tipe = pindah -->
            <div class="modal__field" id="fieldGroupGudangTujuan" style="display:none;">
              <label for="fieldMovementGudangTujuan">Gudang Tujuan</label>
              <!-- TODO(backend): isi <option> dari tabel gudang -->
              <select id="fieldMovementGudangTujuan" name="id_gudang_tujuan">
                <option value="">Pilih gudang tujuan</option>
              </select>
            </div>

            <div class="modal__field">
              <label for="fieldMovementQty">Jumlah</label>
              <input type="number" id="fieldMovementQty" name="qty" min="1" required>
            </div>
            <div class="modal__field">
              <label for="fieldMovementDate">Tanggal</label>
              <input type="date" id="fieldMovementDate" name="tanggal" required>
            </div>
            <div class="modal__field">
              <label for="fieldMovementNote">Keterangan</label>
              <textarea id="fieldMovementNote" name="keterangan"></textarea>
            </div>

            <div class="modal__footer">
              <button type="button" class="btn btn--outline" data-modal-close>Batal</button>
              <button type="submit" class="btn btn--primary">Simpan Transaksi</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Toggle pilihan tipe transaksi: Stock Masuk / Stock Keluar -->
      <div class="toggle-group" id="stockTypeToggle">
        <button type="button" id="btnStockMasuk" class="toggle-btn toggle-btn--in is-active">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg> Stock Masuk
        </button>
        <button type="button" id="btnStockKeluar" class="toggle-btn toggle-btn--out">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><polyline points="19 12 12 19 5 12"></polyline></svg> Stock Keluar
        </button>
      </div>

      <!-- Filter data: Supplier, Gudang, Tanggal -->
      <div class="filters-row" id="stockFilters">
        <div class="filter-field">
          <label for="filterSupplier">Suppliers</label>
          <!-- TODO(backend): isi <option> dari tabel suppliers -->
          <select id="filterSupplier"><option value="">Semua Supplier</option></select>
        </div>
        <div class="filter-field">
          <label for="filterGudang">Gudang</label>
          <!-- TODO(backend): isi <option> dari tabel warehouses -->
          <select id="filterGudang"><option value="">Semua Gudang</option></select>
        </div>
        <div class="filter-field">
          <label for="filterTanggal">Tanggal</label>
          <input type="date" id="filterTanggal">
        </div>
      </div>

      <!-- Tabel riwayat stock in/out, isi mengikuti toggle Masuk/Keluar di atas -->
      <section class="card" id="stockInOutListCard">
        <div class="table-wrapper">
          <table class="data-table" id="stockInOutTable">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Nama Produk</th>
                <th>Supplier</th>
                <th>Gudang</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <!-- TODO(backend): loop <tr> sesuai filter & toggle Masuk/Keluar -->
            <tbody id="stockInOutTableBody">
              <tr class="table-empty-row">
                <td colspan="6">Belum ada data transaksi stok</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

    </main>


  <script src="assets/js/main.js"></script>
  <script src="assets/js/modal.js"></script> <!-- [DIUBAH] tambah script modal -->
  <script src="assets/js/stock-in-out.js"></script> <!-- [BARU] logic toggle field modal -->
  
</body>
</html>
