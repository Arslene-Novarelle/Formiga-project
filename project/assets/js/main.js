/* =========================================================================
   FILE: assets/js/main.js
   TUJUAN: interaksi UI dasar (murni tampilan, BELUM ada logic backend).
   Semua fungsi di sini hanya toggle class / tampilan saja. Nanti kamu
   tinggal sambungkan ke fetch()/AJAX ke file PHP kamu di bagian yang
   ditandai "// TODO(backend)".

   KONSEP YANG SERING MUNCUL DI FILE INI: classList
   Hampir semua fungsi di bawah cuma nambah/buang "class" CSS di sebuah
   elemen HTML, itu yang bikin tampilannya berubah (bukan JS yang
   langsung "menggambar" perubahannya). Ada 3 perintah yang dipakai:
     - elemen.classList.add("nama-class")     -> nambahin class
     - elemen.classList.remove("nama-class")  -> buang class itu
     - elemen.classList.toggle("nama-class")  -> kalau belum ada, tambahin;
                                                  kalau udah ada, buang
   Efek visualnya (warna, ukuran, animasi) semua diatur di file CSS,
   JS di sini cuma "nyalain/matiin saklarnya" doang.
   ========================================================================= */

document.addEventListener("DOMContentLoaded", function () {
  initSidebarToggle();
  initStockTypeToggle();
  initNotificationReadAll();
  initDeleteAllConfirm(); // [DIUBAH] tambah pemanggilan fungsi baru
});

/* -------------------------------------------------------------------------
   1. Tombol panel (id="navBtnSidebarToggle") di sebelah icon bell.
   Fungsinya MENUTUP/MEMBUKA sidebar (bukan cuma dekorasi).
   Caranya: toggle class ".app-layout--sidebar-collapsed" di elemen
   #appLayout. Efek visualnya (sidebar mengecil, label disembunyikan)
   diatur di assets/css/style.css bagian "7b. SIDEBAR COLLAPSED STATE".
   ------------------------------------------------------------------------- */
function initSidebarToggle() {
  var toggleBtn = document.getElementById("navBtnSidebarToggle");
  var appLayout = document.getElementById("appLayout");
  if (!toggleBtn || !appLayout) return;

  toggleBtn.addEventListener("click", function () {
    var isCollapsed = appLayout.classList.toggle("app-layout--sidebar-collapsed");
    toggleBtn.title = isCollapsed ? "Buka sidebar" : "Tutup sidebar";
    // TODO(opsional): simpan preferensi ini ke localStorage kalau mau
    // sidebar tetap collapsed walau halaman di-refresh/pindah halaman.
  });
}

/* -------------------------------------------------------------------------
   2. Toggle "Stock Masuk" / "Stock Keluar" di halaman Stock In/Out
   Hanya ganti tampilan tombol aktif. Data tabel/isi form silakan kamu
   ambil sesuai tipe yang aktif (masuk / keluar) lewat backend PHP kamu.
   ------------------------------------------------------------------------- */
function initStockTypeToggle() {
  var btnMasuk = document.getElementById("btnStockMasuk");
  var btnKeluar = document.getElementById("btnStockKeluar");
  if (!btnMasuk || !btnKeluar) return;

  btnMasuk.addEventListener("click", function () {
    btnMasuk.classList.add("is-active");
    btnKeluar.classList.remove("is-active");
    // TODO(backend): muat data "stock masuk" di sini
  });

  btnKeluar.addEventListener("click", function () {
    btnKeluar.classList.add("is-active");
    btnMasuk.classList.remove("is-active");
    // TODO(backend): muat data "stock keluar" di sini
  });
}

/* -------------------------------------------------------------------------
   3. Tombol "Read All" di halaman Notifications
   Sementara hanya menghapus tampilan "belum dibaca" dari tiap item.
   ------------------------------------------------------------------------- */
function initNotificationReadAll() {
  var btnReadAll = document.getElementById("btnReadAllNotif");
  var list = document.getElementById("notificationList");
  if (!btnReadAll || !list) return;

  btnReadAll.addEventListener("click", function () {
    list.querySelectorAll(".notification-item").forEach(function (item) {
      item.classList.add("is-read");
    });
    // TODO(backend): kirim request ke PHP untuk tandai semua notifikasi "read"
  });
}

/* -------------------------------------------------------------------------
   [BARU] 4. Tombol "Delete All" di halaman Item
   Sebelumnya tombol ini belum ada fungsinya sama sekali. Ditambahkan
   dialog konfirmasi dulu sebelum hapus (biar gak sengaja ke-klik dan
   langsung hapus semua data).

   Cara kerjanya simpel: begitu diklik, browser nanya dulu pakai
   confirm() (kotak dialog bawaan browser, ada tombol OK & Cancel).
   Kalau user pilih OK -> baru form tersembunyi yang ada di item.php
   (id="formDeleteAllItems") di-submit, itu yang kirim request hapus
   ke actions/delete-all-items.php.
   ------------------------------------------------------------------------- */
function initDeleteAllConfirm() {
  var btnDeleteAll = document.getElementById("btnDeleteAllItems");
  var formDeleteAll = document.getElementById("formDeleteAllItems");
  if (!btnDeleteAll || !formDeleteAll) return;

  btnDeleteAll.addEventListener("click", function () {
    var yakin = confirm("Yakin mau hapus SEMUA produk? Tindakan ini tidak bisa dibatalkan.");
    if (!yakin) return; // user pilih "Cancel" -> berhenti di sini, gak jadi hapus

    // TODO(backend): pastikan actions/delete-all-items.php beneran hapus
    // semua baris di tabel barang.
    formDeleteAll.submit();
  });
}
