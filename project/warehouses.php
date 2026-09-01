<?php $currentPage = 'warehouses'; ?>
<!DOCTYPE html>
<!-- =============================================================================
     FILE INI: warehouses.php
     KETERANGAN: Halaman "Warehouses". Masih tahap FRONTEND saja (belum ada koneksi
     database / PHP logic). Cari komentar "TODO(backend)" untuk bagian yang
     perlu kamu sambungkan ke backend PHP kamu sendiri.
     Daftar lengkap semua id & class ada di file IDS_CLASSES.md.
     ============================================================================= -->
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Warehouses | Nama App</title>
  <link rel="stylesheet" href="assets/css/warehouses.css">
  <link rel="stylesheet" href="assets/css/modal.css"> <!-- [DIUBAH] tambah CSS modal -->
  
</head>
<body>

  <!-- Bungkus paling luar seluruh halaman (sidebar + konten) -->
    <!-- ============================================================
         KONTEN UTAMA halaman "Warehouses"
         ============================================================ -->
    <main class="main-content" id="mainContent">

      <header class="content-header" id="warehousesHeader">
        <h1 class="content-header__title">Warehouses</h1>
        <div class="content-header__actions">
          <!-- [DIUBAH] tombol sekarang buka modal lewat data-modal-open -->
          <button type="button" class="btn btn--primary" id="btnAddWarehouses" data-modal-open="modalAddWarehouse">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add Warehouse
          </button>
        </div>
      </header>

      <!-- [BARU] Modal Tambah Gudang. Form submit LANGSUNG ke actions/add-warehouse.php
           pakai method POST biasa -- tinggal isi PHP-nya buat insert ke database. -->
      <div class="modal-overlay" id="modalAddWarehouse" data-modal>
        <div class="modal">
          <div class="modal__header">
            <span class="modal__title">Tambah Gudang</span>
            <button type="button" class="modal__close" data-modal-close>&times;</button>
          </div>
          <form class="modal__body" method="POST" action="actions/add-warehouse.php">
            <div class="modal__field">
              <label for="field_kd_gudang">Kode Gudang</label>
              <input type="text" id="field_kd_gudang" name="kd_gudang" required>
            </div>
            <div class="modal__field">
              <label for="field_nama_gudang">Nama Gudang</label>
              <input type="text" id="field_nama_gudang" name="nama_gudang" required>
            </div>
            <div class="modal__field">
              <label for="field_alamat_gudang">Alamat Gudang</label>
              <input type="text" id="field_alamat_gudang" name="alamat_gudang">
            </div>
            <div class="modal__footer">
              <button type="button" class="btn btn--outline" data-modal-close>Batal</button>
              <button type="submit" class="btn btn--primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>

      <section class="card" id="warehousesListCard">
        <div class="table-wrapper">
          <table class="data-table" id="warehousesTable">
            <thead>
              <tr>
                <th>Nama Gudang</th>
                <th>Lokasi</th>
                <th>Kapasitas</th>
                <th>Jumlah Item</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <!-- TODO(backend): loop <tr> data dari database -->
            <tbody id="warehousesTableBody">
              <tr class="table-empty-row">
                <td colspan="5">Belum ada data gudang</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

    </main>


  <script src="assets/js/main.js"></script>
  <script src="assets/js/modal.js"></script> <!-- [DIUBAH] tambah script modal -->
  
</body>
</html>
