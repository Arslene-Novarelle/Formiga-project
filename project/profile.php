<?php $currentPage = 'profile'; ?>
<!DOCTYPE html>
<!-- =============================================================================
     FILE INI: profile.php
     KETERANGAN: Halaman "Profile". Masih tahap FRONTEND saja (belum ada koneksi
     database / PHP logic). Cari komentar "TODO(backend)" untuk bagian yang
     perlu kamu sambungkan ke backend PHP kamu sendiri.
     Daftar lengkap semua id & class ada di file IDS_CLASSES.md.
     ============================================================================= -->
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile | Nama App</title>
  <link rel="stylesheet" href="assets/css/profile.css">
  
</head>
<body>

  <!-- Bungkus paling luar seluruh halaman (sidebar + konten) -->
    <!-- ============================================================
         KONTEN UTAMA halaman "Profile"
         ============================================================ -->
    <main class="main-content" id="mainContent">

      <header class="content-header" id="profileHeader">
        <h1 class="content-header__title">Profile</h1>
      </header>

      <section class="card" id="profileCard">
        <div class="profile-card" id="profileCardInner">
          <!-- TODO(backend): ganti dengan foto/inisial user yang login -->
          <span class="profile-card__avatar" id="profileAvatar">U</span>
          <div>
            <div class="content-header__title" id="profileName" style="font-size:18px;">Nama User</div>
            <div style="color:var(--color-text-secondary);" id="profileEmail">user@email.com</div>
          </div>
        </div>

        <!-- Form data profil (belum ada aksi submit / simpan ke backend) -->
        <form class="profile-form" id="profileForm">
          <div class="form-field">
            <label for="profileInputName">Nama Lengkap</label>
            <input type="text" id="profileInputName" placeholder="Nama lengkap">
          </div>
          <div class="form-field">
            <label for="profileInputEmail">Email</label>
            <input type="email" id="profileInputEmail" placeholder="Email">
          </div>
          <div class="form-field">
            <label for="profileInputPhone">No. Telepon</label>
            <input type="text" id="profileInputPhone" placeholder="No. telepon">
          </div>
          <div class="form-field">
            <label for="profileInputRole">Role</label>
            <input type="text" id="profileInputRole" placeholder="Role / jabatan" disabled>
          </div>
          <div class="form-field form-field--full">
            <!-- TODO(backend): submit ke PHP untuk update data user -->
            <button type="submit" class="btn btn--primary" id="btnSaveProfile" style="width:fit-content;">
              Save Changes
            </button>
          </div>
        </form>
      </section>

    </main>


  <script src="assets/js/main.js"></script>
  
</body>
</html>
