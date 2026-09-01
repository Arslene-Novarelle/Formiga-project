# Warehouse Inventory — Frontend (Tahap Awal)

Project ini baru berisi **frontend murni** (HTML dalam file `.php` + CSS +
JS). Belum ada koneksi database / logic PHP — ini baru "tempat" buat kamu
koding backend-nya sendiri (pure PHP, sesuai setup Laragon kamu). Kamu
yang pegang bagian sistem/backend-nya — semua titik yang perlu disambungkan
sudah aku tandai `TODO(backend)` dan didaftar di `IDS_CLASSES.md`.

## Cara menjalankan
1. Copy folder ini ke `www/` (atau `htdocs/`) di Laragon.
2. Buka lewat browser via Laragon, contoh: `http://localhost/warehouse-frontend/index.php`.
3. Pastikan komputer terkoneksi internet minimal sekali (lihat bagian
   "Cara kerja diagram" di bawah — Chart.js di-load dari CDN).

## Struktur folder
```
warehouse-frontend/
├── index.php / dashboard.php / item.php / stock-in-out.php
├── warehouses.php / categories.php / suppliers.php
├── stock-report.php / valuation-report.php / transaction-history.php
├── notifications.php / profile.php
├── assets/
│   ├── css/style.css   -> semua style (dipakai bareng semua halaman)
│   ├── js/main.js      -> interaksi UI (toggle sidebar, toggle stock, read all)
│   └── js/charts.js    -> config & data diagram batang (Chart.js)
└── IDS_CLASSES.md      -> daftar lengkap semua id & class + fungsinya
```

## Icon
Semua icon (Home, Dashboard, bell, dst) sekarang pakai **Feather Icons**
asli (di-copy dari package `feather-icons` di npm), bukan gambar buatan
sendiri — jadi bentuknya konsisten dan sudah teruji dipakai banyak
aplikasi. Kalau mau ganti salah satu, tinggal ambil SVG-nya dari
https://feathericons.com/ dan tempel menggantikan yang lama.

## Tombol sebelah bell (icon panel/sidebar)
Sekarang berfungsi **menutup & membuka sidebar**. Klik sekali → sidebar
mengecil jadi cuma tampil icon (hemat ruang), klik lagi → kembali normal.
Logic-nya di `assets/js/main.js` (`initSidebarToggle`), efek visualnya di
`assets/css/style.css` bagian **"7b. SIDEBAR COLLAPSED STATE"`.

## Cara kerja diagram (Chart.js)
Diagram batang di halaman **Home**, **Dashboard**, dan **Stock Report**
sekarang bukan kotak placeholder lagi, tapi diagram beneran pakai library
**[Chart.js](https://www.chartjs.org/)** — library open-source yang paling
umum dipakai buat chart di web (ringan, gampang, banyak tutorial Bahasa
Indonesia-nya).

Cara kerjanya, singkatnya:
1. Di `<head>` tiap halaman yang butuh chart, ada
   `<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/...">` —
   ini yang download library Chart.js dari internet (CDN) saat halaman
   dibuka. **Butuh koneksi internet** waktu halaman diakses.
2. Di HTML, sudah disiapkan elemen `<canvas id="homeBarChart">` (dan 2
   canvas lain) sebagai "kanvas" gambar chart-nya.
3. Di `assets/js/charts.js`, kita ambil canvas itu, terus bikin
   `new Chart(canvas, { type: "bar", data: {...}, options: {...} })`.
   Chart.js otomatis yang gambar batang-batangnya sesuai angka yang kita
   kasih di `data.datasets[0].data`.
4. **Semua angka di `charts.js` sekarang masih data contoh/dummy** (ditulis
   manual di JS). Supaya jadi data asli, nanti kamu tinggal:
   - Di file PHP-nya, query data dari database (misal total stok masuk
     per hari), lalu `echo json_encode($data)` ke dalam JS, atau
   - Bikin endpoint PHP terpisah yang return JSON, terus di `charts.js`
     ambil datanya pakai `fetch('data.php').then(res => res.json())...`
     sebelum bikin `new Chart(...)`.

Kalau mau ganti tipe chart (misal jadi line chart / pie chart), tinggal
ganti `type: "bar"` jadi `type: "line"` / `type: "pie"` — dokumentasi
lengkap tipe & opsinya ada di https://www.chartjs.org/docs/latest/.

> Catatan: kalau kamu preview filenya offline / tanpa internet, chart
> tidak akan muncul (karena library-nya gagal di-download dari CDN).
> Kalau mau chart tetap jalan offline, download file
> `chart.umd.min.js` dari https://www.chartjs.org/, taruh di
> `assets/js/chart.min.js`, terus ganti `<script src="https://cdn...">`
> jadi `<script src="assets/js/chart.min.js">` di tiap file `.php`.

## Yang sudah disesuaikan dari brief kamu (riwayat perubahan)
- Icon diganti total pakai Feather Icons asli (bukan bikin sendiri lagi).
- Tombol di sebelah bell sekarang beneran nutup/buka sidebar.
- Diagram batang di Home, Dashboard, Stock Report sudah pakai Chart.js
  beneran (bukan placeholder teks lagi).
- Tab yang tidak ada contoh gambarnya (Notifications, Stock In/Out) sudah
  di-custom sendiri tapi tetap nyambung dengan tab lain.
- Tab Profile diakses lewat kartu user di bawah sidebar (bukan menu baru).
- Fitur "tambah tab baru" (+) dan kartu upsell/AI sengaja dihilangkan.
- Setiap bagian kode diberi komentar penanda + `TODO(backend)`.
- Belum ada logic PHP — bagian sistem/backend sepenuhnya kamu yang pegang.

## Asumsi yang masih berlaku
- Nama aplikasi masih placeholder **"Nama App"** (ganti di `sidebarAppName`,
  ada di semua file karena belum pakai PHP `include`).
- Dashboard: 2 kartu yang di gambar referensi sama-sama "total Stok" aku
  bedakan jadi **"Total Stok Masuk"** dan **"Total Stok Keluar"**.
- Data di dalam chart & list masih dummy — cari `TODO(backend)`.


## Sidebar
Sidebar sekarang hanya didefinisikan satu kali di `includes/sidebar.php`.
Setiap halaman mengatur `$currentPage` lalu memanggil file tersebut.
`assets/css/sidebar.css` juga membuat sidebar fixed pada desktop, sehingga sidebar tidak ikut bergerak ketika halaman utama di-scroll. Isi sidebar tetap bisa di-scroll jika menu melebihi tinggi layar.
