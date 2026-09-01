<?php $currentPage = 'notifications'; ?>
<!DOCTYPE html>
<!-- =============================================================================
     FILE INI: notifications.php
     KETERANGAN: Halaman "Notifications". Masih tahap FRONTEND saja (belum ada koneksi
     database / PHP logic). Cari komentar "TODO(backend)" untuk bagian yang
     perlu kamu sambungkan ke backend PHP kamu sendiri.
     Daftar lengkap semua id & class ada di file IDS_CLASSES.md.
     ============================================================================= -->
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifications | Nama App</title>
  <link rel="stylesheet" href="assets/css/notifications.css">
  
</head>
<body>

  <!-- Bungkus paling luar seluruh halaman (sidebar + konten) -->
    <!-- ============================================================
         KONTEN UTAMA halaman "Notifications"
         ============================================================ -->
    <main class="main-content" id="mainContent">

      <header class="content-header" id="notificationsHeader">
        <h1 class="content-header__title">Notifications</h1>
        <div class="content-header__actions">
          <button type="button" class="btn btn--danger" id="btnReadAllNotif">
            Read All
          </button>
        </div>
      </header>

      <!-- Daftar notifikasi. 3 contoh tipe warna disiapkan: danger, warning, neutral -->
      <section class="card" id="notificationsListCard">
        <ul class="notification-list" id="notificationList">

          <!-- Contoh notifikasi urgent (misal: stok habis) -->
          <li class="notification-item notification-item--danger" id="notifItem1">
            <span class="notification-item__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg></span>
            <span class="notification-item__body">
              <!-- TODO(backend): ganti dengan pesan notifikasi asli -->
              <span class="notification-item__title">Stok "Nama Barang" habis</span>
              <span class="notification-item__desc">Segera lakukan restock ke supplier</span>
            </span>
            <span class="notification-item__time">Baru saja</span>
          </li>

          <!-- Contoh notifikasi peringatan (misal: stok menipis) -->
          <li class="notification-item notification-item--warning" id="notifItem2">
            <span class="notification-item__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg></span>
            <span class="notification-item__body">
              <span class="notification-item__title">Stok "Nama Barang" menipis</span>
              <span class="notification-item__desc">Sisa stok di bawah batas minimum</span>
            </span>
            <span class="notification-item__time">1 jam lalu</span>
          </li>

          <!-- Contoh notifikasi netral/info (misal: transaksi berhasil) -->
          <li class="notification-item notification-item--neutral" id="notifItem3">
            <span class="notification-item__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg></span>
            <span class="notification-item__body">
              <span class="notification-item__title">Transaksi stock in berhasil dicatat</span>
              <span class="notification-item__desc">Oleh: Nama User</span>
            </span>
            <span class="notification-item__time">Kemarin</span>
          </li>

        </ul>
      </section>

    </main>


  <script src="assets/js/main.js"></script>
  
</body>
</html>
