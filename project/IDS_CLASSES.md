# IDS_CLASSES.md — Referensi ID & Class Warehouse Inventory

Ini semacam contekan biar gak bolak-balik buka file `.php` cuma buat nyari nama id/class. Kepake pas mau colok elemen ke JS (`getElementById`), tarik data dari PHP, atau tempel CSS baru.

## 1. Sidebar (nempel di semua halaman)

| ID | Class | Tag | Cerita singkat |
|---|---|---|---|
| `appLayout` | `.app-layout` | `<div>` | Pembungkus paling luar, isinya sidebar + konten. Pas sidebar diciutin, nempel class `.app-layout--sidebar-collapsed` |
| `sidebar` | `.sidebar` | `<aside>` | Panel kiri |
| `sidebarHeader` | `.sidebar-header` | `<div>` | Baris teratas panel kiri, ada logo sama tombol-tombol |
| `sidebarBrand` | `.sidebar-header__brand` | `<div>` | Pembungkus logo + nama aplikasi |
| `sidebarLogo` | `.sidebar-header__logo` | `<span>` | Kotak gradient buat logo, gambarnya belum diisi |
| `sidebarAppName` | — | `<span>` | Nama app, sekarang masih ketulis "Nama App" doang |
| `sidebarHeaderActions` | `.sidebar-header__actions` | `<div>` | Wadah tombol lonceng sama tombol ciutin sidebar |
| `navBtnNotifications` | `.icon-btn` | `<a>` | Lonceng notif (icon `bell`), ngarah ke `notifications.php` |
| `notifUnreadBadge` | `.icon-btn__badge` | `<span>` | Bulatan merah kecil tanda ada notif baru |
| `navBtnSidebarToggle` | `.icon-btn` | `<button>` | Ciutin/lebarin sidebar (icon `sidebar`) — sekali klik jadi mode icon doang, klik lagi balik lebar. Fiturnya udah beres, cek poin 6 |
| `sidebarNavMain` | `.sidebar-nav-main` | `<nav>` | Kumpulan menu inti: Search, Home, Dashboard, Item |
| `navBtnSearch` | `.sidebar-link` | `<button>` | Tombol Search, tapi fungsinya belum digarap |
| `navLinkHome` | `.sidebar-link` (+`.is-active`) | `<a>` | Nuju `index.php`, pake icon `home` |
| `navLinkDashboard` | `.sidebar-link` | `<a>` | Nuju `dashboard.php`, icon `grid` |
| `navLinkItem` | `.sidebar-link` | `<a>` | Nuju `item.php`, icon `box` |
| `sidebarDivider` | `.sidebar-divider` | `<div>` | Cuma garis pembatas |
| `sidebarGroupInventory` | `.sidebar-group` | `<section>` | Kumpulan menu Inventory |
| `navLinkStockInOut` | `.sidebar-link` | `<a>` | Nuju `stock-in-out.php`, icon `repeat` |
| `navLinkWarehouses` | `.sidebar-link` | `<a>` | Nuju `warehouses.php`, icon `archive` |
| `navLinkCategories` | `.sidebar-link` | `<a>` | Nuju `categories.php`, icon `list` |
| `navLinkSuppliers` | `.sidebar-link` | `<a>` | Nuju `suppliers.php`, icon `truck` |
| `sidebarGroupReports` | `.sidebar-group` | `<section>` | Kumpulan menu Reports |
| `navLinkStockReport` | `.sidebar-link` | `<a>` | Nuju `stock-report.php`, icon `clipboard` |
| `navLinkValuationReport` | `.sidebar-link` | `<a>` | Nuju `valuation-report.php`, icon `dollar-sign` |
| `navLinkTransactionHistory` | `.sidebar-link` | `<a>` | Nuju `transaction-history.php`, icon `clock` |
| `sidebarFooter` | `.sidebar-footer` | `<div>` | Kotak profil user, nongkrong paling bawah sidebar |
| `sidebarUserProfile` | `.sidebar-user` | `<a>` | Nuju `profile.php`, ada icon `chevron-right` |
| `sidebarUserAvatar` | `.sidebar-user__avatar` | `<span>` | Foto/inisial user, sekarang cuma huruf "U" |
| `sidebarUserName` / `sidebarUserRole` | — | `<span>` | Nama sama jabatan user, isinya masih hardcode |

## 2. Asal-usul icon

Icon yang dipake bukan bikinan sendiri, semuanya narik dari [Feather Icons](https://feathericons.com/) lewat paket npm `feather-icons`. Kode SVG-nya ditempel langsung ke HTML (inline), jadi gak perlu koneksi internet buat nongolin icon — beda kalau pake font-icon macam Font Awesome yang butuh CDN.

Mau ganti salah satu icon? Buka feathericons.com, cari icon incaran, salin SVG-nya, tempel gantiin yang lama di file `.php` terkait. Posisinya biasanya di dalam `<span class="sidebar-link__icon">` atau `<span class="icon-btn">`.

Rekap icon yang kepake:

| Nama icon (Feather) | Lokasi pemakaian |
|---|---|
| `search` | Tombol Search |
| `home` | Menu Home |
| `grid` | Menu Dashboard |
| `box` | Menu Item |
| `repeat` | Menu Stock In/Out |
| `archive` | Menu Warehouses |
| `list` | Menu Categories |
| `truck` | Menu Suppliers |
| `clipboard` | Menu Stock Report |
| `dollar-sign` | Menu Valuation Report |
| `clock` | Menu Transaction History |
| `bell` | Tombol notifikasi |
| `sidebar` | Tombol ciutin/lebarin sidebar |
| `chevron-right` | Panah kecil di kartu profil |
| `plus` | Tombol tambah (Add Product/Warehouse/dll) |
| `trash-2` | Tombol Delete All |
| `arrow-up` / `arrow-down` | Toggle Stock Masuk / Keluar |
| `alert-triangle` | Notif danger & warning |
| `check-circle` / `check-square` | Notif netral/info |

## 3. Wadah konten utama

`mainContent` (class `.main-content`) — nampung semua isi sisi kanan layar, dari header sampai body tiap halaman.

## 4. Komponen yang muncul di banyak tempat

| Class | Kegunaan |
|---|---|
| `.btn`, `.btn--primary`, `.btn--danger`, `.btn--outline` | Tombol standar plus tiga varian warnanya |
| `.search-box` | Kotak pencarian dengan icon kaca pembesar |
| `.card`, `.card__title`, `.card__footer-link` | Panel/kotak dasar |
| `.grid-3col`, `.grid-2col` | Layout grid 3 kolom / 2 kolom |
| `.stats-grid`, `.stat-card`, `.stat-card__label`, `.stat-card__value` | Kartu angka statistik di Dashboard |
| `.chart-canvas-wrapper` | Pembungkus `<canvas>`, ngasih tinggi tetap 260px supaya Chart.js bisa hitung ukurannya |
| `.simple-list`, `.simple-list__item`, `.simple-list__empty` | List ringkas di dalam card |
| `.table-wrapper`, `.data-table` | Pembungkus tabel plus tabel datanya sendiri |
| `.badge`, `.badge--success/--danger/--warning/--neutral` | Label kecil buat status atau jumlah |
| `.toggle-group`, `.toggle-btn`, `.toggle-btn--in`, `.toggle-btn--out` | Toggle dua pilihan Stock Masuk/Keluar |
| `.filters-row`, `.filter-field` | Baris berisi dropdown/filter tanggal |
| `.notification-list`, `.notification-item`, `.notification-item--danger/--warning/--neutral` | Susunan daftar notifikasi |
| `.profile-card`, `.profile-form`, `.form-field` | Bagian-bagian halaman Profile |
| `.app-layout--sidebar-collapsed` | Otomatis nempel/lepas di `#appLayout` tiap tombol sidebar dipencet |

## 5. Canvas buat chart (Chart.js)

| ID Canvas | Muncul di | Isi sekarang |
|---|---|---|
| `homeBarChart` | `index.php` | Perbandingan Stok Masuk vs Keluar, 7 hari belakangan |
| `dashboardBarChart` | `dashboard.php` | Jumlah stok tiap kategori |
| `stockReportChart` | `stock-report.php` | Stok Masuk vs Keluar per bulan |

Setup masing-masing chart ada di `assets/js/charts.js`, cari fungsi `initHomeChart()`, `initDashboardChart()`, `initStockReportChart()`. Ada penjelasan lebih detail di komentar bagian atas file itu, plus di README pada bagian "Cara kerja diagram".

## 6. Rincian ID tiap halaman

**`index.php` (Home)** — `homeGreetingBanner`, `homeGreetingText`, `cardHomeChart` + canvas `homeBarChart`, `homeInsightsGrid`, `cardTopStockIn`/`listTopStockIn`, `cardLowStock`/`listLowStock`, `cardNotificationsPreview`/`listNotificationsPreview`.

**`dashboard.php`** — `dashboardHeader`, `dashboardStatsGrid` (di dalamnya ada `statTotalProduk(Value)`, `statTotalStokMasuk(Value)`, `statTotalStokKeluar(Value)`, `statNilaiInventori(Value)`), `cardDashboardChart` + canvas `dashboardBarChart`, `dashboardListsGrid` (`cardDashboardStockIn`, `cardDashboardLowStock`).

**`item.php`** — `itemToolbar`, `itemSearchInput`, `btnDeleteAllItems`, `btnAddProduct`, `itemTable` / `itemTableBody`.

**`stock-in-out.php`** — `stockTypeToggle` (`btnStockMasuk`, `btnStockKeluar`), `filterSupplier`, `filterGudang`, `filterTanggal`, `stockInOutTable` / `stockInOutTableBody`.

**`warehouses.php`, `categories.php`, `suppliers.php`** — semuanya ngikutin pola yang sama, cuma prefix-nya beda: `{prefix}Header`, `btnAdd{Prefix}`, `{prefix}Table` / `{prefix}TableBody`.

**`stock-report.php`, `valuation-report.php`, `transaction-history.php`** — pola serupa lagi, prefix beda-beda (`stockReport`, `valuationReport`, `transactionHistory`): `{prefix}Header`, `btnExport{Prefix}`, `{prefix}Filters` (`{prefix}DateFrom`/`DateTo`). Khusus Stock Report nambah `{prefix}ChartCard` + canvas `{prefix}Chart`, dan tetap ada `{prefix}Table` / `{prefix}TableBody`.

**`notifications.php`** — `notificationsHeader`, `btnReadAllNotif`, `notificationList`, `notifItem1` (danger), `notifItem2` (warning), `notifItem3` (neutral).

**`profile.php`** — `profileCard`/`profileCardInner`, `profileAvatar`, `profileName`, `profileEmail`, `profileForm`, `profileInput{Name/Email/Phone/Role}`, `btnSaveProfile`.

## 7. Cara penamaan yang dipegang

- ID selalu `camelCase`, contoh `btnAddProduct`, `itemTableBody`
- Class komponen ngikutin BEM sederhana: `blok__elemen`, `blok--varian`
- Setiap tabel kosong wajib punya `<tr class="table-empty-row">` sebagai pengganti sementara
- Bagian yang belum nyambung ke PHP/database dikasih penanda komentar `<!-- TODO(backend): ... -->` langsung di file `.php`-nya
