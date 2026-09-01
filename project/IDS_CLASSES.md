# 📌 IDS_CLASSES.md — Daftar ID & Class Project Warehouse Inventory

File ini isinya **daftar semua `id` dan `class`** yang ada di seluruh
halaman `.php`, supaya kamu tahu elemen mana yang bisa kamu pakai buat:
- Nyambungin ke JS (`document.getElementById(...)`)
- Nyambungin ke data backend PHP (misalnya `id="itemTableBody"` = tempat
  taruh hasil query produk)
- Styling tambahan lewat CSS

---

## 1. BAGIAN SHARED (ada di SEMUA halaman) — Sidebar

| ID | Class | Elemen | Fungsi |
|---|---|---|---|
| `appLayout` | `.app-layout` | `<div>` | Bungkus paling luar (sidebar + main content). Dapat class `.app-layout--sidebar-collapsed` waktu sidebar ditutup |
| `sidebar` | `.sidebar` | `<aside>` | Kotak sidebar kiri |
| `sidebarHeader` | `.sidebar-header` | `<div>` | Baris atas sidebar (logo + tombol) |
| `sidebarBrand` | `.sidebar-header__brand` | `<div>` | Bungkus logo + nama app |
| `sidebarLogo` | `.sidebar-header__logo` | `<span>` | Kotak logo (gradient) — belum ada icon/gambar asli |
| `sidebarAppName` | — | `<span>` | Teks nama aplikasi, isinya masih "Nama App" |
| `sidebarHeaderActions` | `.sidebar-header__actions` | `<div>` | Bungkus tombol bell + toggle |
| `navBtnNotifications` | `.icon-btn` | `<a>` | Tombol lonceng (icon `bell`) → link ke `notifications.php` |
| `notifUnreadBadge` | `.icon-btn__badge` | `<span>` | Titik merah kecil penanda ada notif belum dibaca |
| `navBtnSidebarToggle` | `.icon-btn` | `<button>` | **Tombol nutup/buka sidebar** (icon `sidebar`) — klik sekali sidebar mengecil jadi icon-only, klik lagi kembali normal. Sudah jalan (lihat bagian 6 di bawah) |
| `sidebarNavMain` | `.sidebar-nav-main` | `<nav>` | Bungkus menu utama (Search, Home, Dashboard, Item) |
| `navBtnSearch` | `.sidebar-link` | `<button>` | Tombol "Search" (icon `search`) — belum ada fungsi search-nya |
| `navLinkHome` | `.sidebar-link` (+`.is-active`) | `<a>` | Link ke `index.php`, icon `home` |
| `navLinkDashboard` | `.sidebar-link` | `<a>` | Link ke `dashboard.php`, icon `grid` |
| `navLinkItem` | `.sidebar-link` | `<a>` | Link ke `item.php`, icon `box` |
| `sidebarDivider` | `.sidebar-divider` | `<div>` | Garis pemisah horizontal |
| `sidebarGroupInventory` | `.sidebar-group` | `<section>` | Bungkus grup menu "Inventory" |
| `navLinkStockInOut` | `.sidebar-link` | `<a>` | Link ke `stock-in-out.php`, icon `repeat` |
| `navLinkWarehouses` | `.sidebar-link` | `<a>` | Link ke `warehouses.php`, icon `archive` |
| `navLinkCategories` | `.sidebar-link` | `<a>` | Link ke `categories.php`, icon `list` |
| `navLinkSuppliers` | `.sidebar-link` | `<a>` | Link ke `suppliers.php`, icon `truck` |
| `sidebarGroupReports` | `.sidebar-group` | `<section>` | Bungkus grup menu "Reports" |
| `navLinkStockReport` | `.sidebar-link` | `<a>` | Link ke `stock-report.php`, icon `clipboard` |
| `navLinkValuationReport` | `.sidebar-link` | `<a>` | Link ke `valuation-report.php`, icon `dollar-sign` |
| `navLinkTransactionHistory` | `.sidebar-link` | `<a>` | Link ke `transaction-history.php`, icon `clock` |
| `sidebarFooter` | `.sidebar-footer` | `<div>` | Bungkus kartu profil user di bawah sidebar |
| `sidebarUserProfile` | `.sidebar-user` | `<a>` | Link ke `profile.php` (pintu masuk tab Profile), icon `chevron-right` |
| `sidebarUserAvatar` | `.sidebar-user__avatar` | `<span>` | Inisial/foto user, isinya masih huruf "U" |
| `sidebarUserName` / `sidebarUserRole` | — | `<span>` | Nama & sub-teks user, masih statis |

---

## 2. SUMBER ICON (PENTING)

Semua icon di project ini **bukan buatan sendiri** — di-ambil dari
**[Feather Icons](https://feathericons.com/)** (via package npm
`feather-icons`), lalu SVG-nya di-copy langsung ke dalam HTML (inline
SVG). Jadi:
- Tidak butuh koneksi internet buat nampilin icon (beda dengan font-icon
  seperti Font Awesome yang butuh CDN).
- Kalau mau ganti icon tertentu, tinggal cari nama icon-nya di
  https://feathericons.com/, copy SVG-nya, dan tempel menggantikan SVG
  lama di file `.php` terkait (posisinya ada di dalam `<span class="sidebar-link__icon">...</span>` atau `<span class="icon-btn">`/dst).

Daftar icon yang dipakai & di mana:

| Nama Icon (Feather) | Dipakai untuk |
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
| `sidebar` | Tombol nutup/buka sidebar |
| `chevron-right` | Panah kecil di kartu profil |
| `plus` | Tombol tambah (Add Product/Warehouse/dst) |
| `trash-2` | Tombol Delete All |
| `arrow-up` / `arrow-down` | Toggle Stock Masuk / Stock Keluar |
| `alert-triangle` | Notifikasi danger & warning |
| `check-circle` / `check-square` | Notifikasi netral/info |

---

## 3. BAGIAN SHARED — Main Content Wrapper

| ID | Class | Fungsi |
|---|---|---|
| `mainContent` | `.main-content` | Bungkus seluruh konten kanan (header + body halaman) |

---

## 4. KOMPONEN UMUM (class saja, dipakai berulang di banyak halaman)

| Class | Fungsi |
|---|---|
| `.btn`, `.btn--primary`, `.btn--danger`, `.btn--outline` | Tombol umum + 3 varian warna |
| `.search-box` | Kotak search dengan icon kaca pembesar |
| `.card`, `.card__title`, `.card__footer-link` | Kotak/panel dasar |
| `.grid-3col`, `.grid-2col` | Grid layout 3 kolom / 2 kolom |
| `.stats-grid`, `.stat-card`, `.stat-card__label`, `.stat-card__value` | Kartu statistik di Dashboard |
| `.chart-canvas-wrapper` | Bungkus `<canvas>` chart — kasih tinggi tetap (260px) supaya Chart.js tahu ukurannya |
| `.simple-list`, `.simple-list__item`, `.simple-list__empty` | List sederhana di dalam card |
| `.table-wrapper`, `.data-table` | Bungkus tabel + tabel data utama |
| `.badge`, `.badge--success/--danger/--warning/--neutral` | Label kecil status/jumlah |
| `.toggle-group`, `.toggle-btn`, `.toggle-btn--in`, `.toggle-btn--out` | Toggle 2 pilihan (Stock Masuk/Keluar) |
| `.filters-row`, `.filter-field` | Baris filter (dropdown/tanggal) |
| `.notification-list`, `.notification-item`, `.notification-item--danger/--warning/--neutral` | Komponen daftar notifikasi |
| `.profile-card`, `.profile-form`, `.form-field` | Komponen halaman Profile |
| `.app-layout--sidebar-collapsed` | Ditambahkan/dihapus otomatis di `#appLayout` waktu tombol sidebar diklik |

---

## 5. ID CANVAS CHART (Chart.js)

| ID Canvas | Ada di halaman | Isi contoh saat ini |
|---|---|---|
| `homeBarChart` | `index.php` | Stok Masuk vs Keluar, 7 hari terakhir |
| `dashboardBarChart` | `dashboard.php` | Total stok per kategori produk |
| `stockReportChart` | `stock-report.php` | Stok Masuk vs Keluar per bulan |

Konfigurasi & data masing-masing chart ada di **`assets/js/charts.js`**
(cari fungsi `initHomeChart()`, `initDashboardChart()`,
`initStockReportChart()`). Penjelasan cara kerjanya ada di komentar
paling atas file itu, dan juga di `README.md` bagian "Cara kerja diagram".

---

## 6. ID KHUSUS PER HALAMAN

### `index.php` (Home)
`homeGreetingBanner`, `homeGreetingText`, `cardHomeChart` + canvas `homeBarChart`,
`homeInsightsGrid`, `cardTopStockIn`/`listTopStockIn`,
`cardLowStock`/`listLowStock`, `cardNotificationsPreview`/`listNotificationsPreview`.

### `dashboard.php`
`dashboardHeader`, `dashboardStatsGrid` (isi: `statTotalProduk(Value)`,
`statTotalStokMasuk(Value)`, `statTotalStokKeluar(Value)`,
`statNilaiInventori(Value)`), `cardDashboardChart` + canvas `dashboardBarChart`,
`dashboardListsGrid` (`cardDashboardStockIn`, `cardDashboardLowStock`).

### `item.php`
`itemToolbar`, `itemSearchInput`, `btnDeleteAllItems`, `btnAddProduct`,
`itemTable` / `itemTableBody`.

### `stock-in-out.php`
`stockTypeToggle` (`btnStockMasuk`, `btnStockKeluar`), `filterSupplier`,
`filterGudang`, `filterTanggal`, `stockInOutTable` / `stockInOutTableBody`.

### `warehouses.php`, `categories.php`, `suppliers.php`
Pola sama, beda prefix: `{prefix}Header`, `btnAdd{Prefix}`,
`{prefix}Table` / `{prefix}TableBody`.

### `stock-report.php`, `valuation-report.php`, `transaction-history.php`
Pola sama, beda prefix (`stockReport`, `valuationReport`,
`transactionHistory`): `{prefix}Header`, `btnExport{Prefix}`,
`{prefix}Filters` (`{prefix}DateFrom`/`DateTo`), *(khusus Stock Report)*
`{prefix}ChartCard` + canvas `{prefix}Chart`, `{prefix}Table` / `{prefix}TableBody`.

### `notifications.php`
`notificationsHeader`, `btnReadAllNotif`, `notificationList`,
`notifItem1` (danger), `notifItem2` (warning), `notifItem3` (neutral).

### `profile.php`
`profileCard`/`profileCardInner`, `profileAvatar`, `profileName`,
`profileEmail`, `profileForm`, `profileInput{Name/Email/Phone/Role}`,
`btnSaveProfile`.

---

## 7. Penamaan yang dipakai

- **ID** pakai `camelCase` → `btnAddProduct`, `itemTableBody`
- **Class komponen** pakai gaya BEM sederhana → `blok__elemen`, `blok--varian`
- Tabel kosong selalu punya `<tr class="table-empty-row">` sebagai placeholder
- Semua bagian yang masih butuh disambungkan ke PHP/database ditandai
  komentar `<!-- TODO(backend): ... -->` langsung di file `.php`-nya
