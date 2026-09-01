<?php $currentPage = 'item'; ?>
<!DOCTYPE html>
<!-- =============================================================================
     FILE INI: item.php
     KETERANGAN: Halaman "Item". Masih tahap FRONTEND saja (belum ada koneksi
     database / PHP logic). Cari komentar "TODO(backend)" untuk bagian yang
     perlu kamu sambungkan ke backend PHP kamu sendiri.
     Daftar lengkap semua id & class ada di file IDS_CLASSES.md.
     ============================================================================= -->
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Item | Nama App</title>
  <link rel="stylesheet" href="assets/css/item.css">
  <link rel="stylesheet" href="assets/css/modal.css"> <!-- [DIUBAH] tambah CSS modal -->
  
</head>
<body>

  <!-- Bungkus paling luar seluruh halaman (sidebar + konten) -->
    <!-- ============================================================
         KONTEN UTAMA halaman "Item"
         ============================================================ -->
    <main class="main-content" id="mainContent">

      <header class="content-header content-header--toolbar" id="itemToolbar">
        <div class="search-box" id="itemSearchBox">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          <input type="text" id="itemSearchInput" placeholder="Search...">
        </div>
        <div class="content-header__actions" id="itemToolbarActions">
          <!-- TODO(backend): konfirmasi + hapus semua produk -->
          <button type="button" class="btn btn--danger" id="btnDeleteAllItems">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete All
          </button>
          <!-- [DISEDERHANAKAN] Form tersembunyi ini yang bakal di-submit lewat JS
               (assets/js/main.js) begitu tombol "Delete All" di atas diklik & user
               konfirmasi. Sebelumnya form ini dibikin dadakan lewat JS, sekarang
               sudah ada di sini dari awal supaya JS-nya lebih pendek & simpel. -->
          <form method="POST" action="actions/delete-all-items.php" id="formDeleteAllItems" style="display:none;"></form>
          <!-- [DIUBAH] tombol sekarang buka modal tambah produk lewat data-modal-open -->
          <button type="button" class="btn btn--primary" id="btnAddProduct" data-modal-open="modalAddItem">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Add Product
          </button>
        </div>
      </header>

      <!-- [BARU] Modal tambah produk. Form ini submit LANGSUNG ke actions/add-item.php
           pakai method POST biasa (bukan AJAX) -- tinggal kamu isi PHP-nya buat
           insert ke database, lihat komentar TODO(backend) di file itu. -->
      <div class="modal-overlay" id="modalAddItem" data-modal>
        <div class="modal">
          <div class="modal__header">
            <span class="modal__title">Tambah Produk</span>
            <button type="button" class="modal__close" data-modal-close>&times;</button>
          </div>
          <form class="modal__body" method="POST" action="actions/add-item.php">
            <div class="modal__field">
              <label for="fieldItemName">Nama Produk</label>
              <input type="text" id="fieldItemName" name="nm_brg" required>
            </div>
            <div class="modal__field">
              <label for="fieldItemCategory">Kategori</label>
              <!-- TODO(backend): isi <option> dari tabel kategori -->
              <select id="fieldItemCategory" name="id_kategori" required>
                <option value="">Pilih kategori</option>
              </select>
            </div>
            <div class="modal__field">
              <label for="fieldItemWarehouse">Gudang</label>
              <!-- TODO(backend): isi <option> dari tabel gudang -->
              <select id="fieldItemWarehouse" name="id_gudang" required>
                <option value="">Pilih gudang</option>
              </select>
            </div>
            <div class="modal__field">
              <label for="fieldItemSupplier">Supplier</label>
              <!-- TODO(backend): isi <option> dari tabel suppliers -->
              <select id="fieldItemSupplier" name="id_supplier" required>
                <option value="">Pilih supplier</option>
              </select>
            </div>
            <div class="modal__field">
              <label for="fieldItemUnit">Satuan</label>
              <!-- TODO(backend): isi <option> dari tabel satuan_barang -->
              <select id="fieldItemUnit" name="id_satuan" required>
                <option value="">Pilih satuan</option>
              </select>
            </div>
            <div class="modal__field">
              <label for="fieldItemStock">Stok Awal</label>
              <input type="number" id="fieldItemStock" name="stok" min="0" value="0" required>
            </div>
            <div class="modal__field">
              <label for="fieldItemPrice">Harga Satuan (Rp)</label>
              <input type="number" id="fieldItemPrice" name="harga_satuan" min="0" step="0.01" required>
            </div>
            <div class="modal__footer">
              <button type="button" class="btn btn--outline" data-modal-close>Batal</button>
              <button type="submit" class="btn btn--primary">Simpan Produk</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Tabel daftar produk -->
      <section class="card" id="itemListCard">
        <div class="table-wrapper">
          <table class="data-table" id="itemTable">
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Supplier</th>
                <th>Gudang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <!-- TODO(backend): loop <tr> data produk di sini -->
            <tbody id="itemTableBody">
              <tr class="table-empty-row">
                <td colspan="7">Belum ada data produk (Daftar Produk)</td>
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
