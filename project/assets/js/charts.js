/* =========================================================================
   FILE: assets/js/charts.js
   TUJUAN: bikin diagram batang (bar chart) pakai library Chart.js, buat
   halaman Home, Dashboard, dan Stock Report.

   [DISEDERHANAKAN] Versi ini sengaja ditulis apa adanya (warna ditulis
   langsung, gak pakai fungsi baca-CSS atau hitung-hash) supaya lebih
   gampang dibaca & diubah-ubah sendiri, walau belum jago JS.
   ========================================================================= */

// Jalanin semua fungsi di bawah SETELAH seluruh HTML halaman selesai dimuat
// (kalau dijalanin sebelum HTML siap, canvas chart-nya belum ada -> error)
document.addEventListener("DOMContentLoaded", function () {
  initHomeChart();          // render chart di halaman Home
  initDashboardChartOut();  // render chart di halaman Dashboard
  initDashboardChartIn();   // render chart di halaman Dashboard
  initStockReportChart();   // render chart di halaman Stock Report
});

/* -------------------------------------------------------------------------
   1. Warna-warna yang dipakai chart
   Ditulis langsung di sini (bukan diambil otomatis dari CSS) biar gampang
   dicari & diganti. Kalau mau ganti tema warna chart, cukup ubah di sini.
   ------------------------------------------------------------------------- */
var WARNA_TEKS = "#e8e8ea";              // warna label legend & angka chart
var WARNA_TEKS_REDUP = "#8a8a96";        // warna label sumbu (lebih pudar)
var WARNA_GARIS = "rgba(255,255,255,.07)"; // warna garis grid / pinggir bar
var WARNA_LATAR_TOOLTIP = "#141416";     // warna latar balon info pas hover
var WARNA_HOVER_BAR = "rgba(255,255,255,.05)"; // warna bar pas di-hover

// Daftar warna buat bar per-kategori (dipakai bergantian sesuai urutan).
// Mau nambah warna baru? Tinggal tambahin di array ini.
var WARNA_KATEGORI = ["#7c5cfc", "#22c55e", "#f59e0b", "#ef4444", "#3b82f6", "#ec4899", "#14b8a6"];

// Ambil 1 warna dari WARNA_KATEGORI berdasarkan urutannya (index ke-0, 1, 2, dst).
// Kalau kategorinya lebih banyak dari warnanya, otomatis ulang dari awal lagi.
function warnaKategoriKe(index) {
  return WARNA_KATEGORI[index % WARNA_KATEGORI.length];
}

/* -------------------------------------------------------------------------
   2. Pengaturan tampilan chart (dipakai bareng oleh semua chart)
   Kalau ini diubah, efeknya ke SEMUA chart di halaman Home/Dashboard/
   Stock Report sekaligus.
   ------------------------------------------------------------------------- */
function buatPengaturanChart() {
  return {
    responsive: true,           // chart otomatis menyesuaikan ukuran layar/container
    maintainAspectRatio: false, // chart boleh berubah rasio tinggi:lebar (gak dipaksa persegi)
    layout: {
      padding: 20                // jarak kosong (padding) di sekeliling area chart
    },
    plugins: {
      legend: {                  // kotak keterangan warna di atas/bawah chart
        display: true,
        labels: {
          color: WARNA_TEKS,
          font: { family: "Geist, sans-serif", size: 14 },
          boxWidth: 14,
          boxHeight: 14,
          borderRadius: 4,
          padding: 16
        }
      },
      tooltip: {                 // balon info yang muncul saat hover ke bar
        enabled: true,
        backgroundColor: WARNA_LATAR_TOOLTIP,
        titleColor: WARNA_TEKS,
        bodyColor: WARNA_TEKS_REDUP,
        borderColor: WARNA_GARIS,
        borderWidth: 1,
        padding: 10,
        cornerRadius: 8,
        displayColors: true
      }
    },
    scales: {                    // sumbu X (mendatar) dan Y (tegak)
      x: {
        ticks: { color: WARNA_TEKS_REDUP, font: { family: "Geist, sans-serif", size: 14 } },
        grid: { display: false },   // garis grid tegak dimatikan biar lebih bersih
        border: { display: false }
      },
      y: {
        beginAtZero: true,          // sumbu Y wajib mulai dari 0
        ticks: { color: WARNA_TEKS_REDUP, font: { family: "Geist, sans-serif", size: 14 } },
        grid: { color: WARNA_GARIS },   // garis grid mendatar tetap ada, tapi tipis
        border: { display: false }
      }
    },
    animation: { duration: 1500 },  // lama animasi waktu chart pertama muncul (1.5 detik)
    interaction: { mode: "index", intersect: false } // hover gak perlu tepat kena bar-nya
  };
}

/* -------------------------------------------------------------------------
   3. Bikin 1 kelompok data (dataset) buat chart, misal "Stok Masuk"
   `warna` boleh diisi 1 warna aja (contoh: "#22c55e") ATAU array warna
   kalau tiap bar warnanya beda-beda (contoh: dipakai di chart Dashboard).
   ------------------------------------------------------------------------- */
function buatDataset(label, data, warna) {
  return {
    label: label,               // nama dataset, muncul di legend
    data: data,                 // angka-angka datanya, jadi tinggi tiap bar
    backgroundColor: warna,
    borderColor: WARNA_GARIS,
    borderWidth: 1,
    borderRadius: 5,            // sudut atas bar sedikit membulat
    barThickness: 50,           // lebar tetap tiap bar (pixel)
    categoryPercentage: 1.0,
    barPercentage: 1.0,
    hoverBackgroundColor: WARNA_HOVER_BAR,
    hoverBorderColor: WARNA_GARIS
  };
}

// Fungsi ini yang benar-benar bikin chart-nya pakai Chart.js.
function buatBarChart(canvas, labels, datasets) {
  // kalau <canvas>-nya gak ada di halaman, atau Chart.js belum kemuat -> berhenti
  if (!canvas || typeof Chart === "undefined") return;

  Chart.defaults.font.family = "Geist, sans-serif";
  Chart.defaults.color = WARNA_TEKS;

  new Chart(canvas, {
    type: "bar",
    data: { labels: labels, datasets: datasets },
    options: buatPengaturanChart()
  });
}

/* -------------------------------------------------------------------------
   4. Chart per halaman
   Data di bawah ini MASIH CONTOH/DUMMY, cari "TODO(backend)" buat ganti
   jadi data asli dari database kamu.
   ------------------------------------------------------------------------- */

// Chart di halaman HOME: Stok Masuk vs Stok Keluar per hari
function initHomeChart() {
  var canvas = document.getElementById("homeBarChart");
  if (!canvas) return;

    var labels = dataWeek.labelTanggal;
    var dataMasuk = dataWeek.dataMasuk;
    var dataKeluar = dataWeek.dataKeluar;

  buatBarChart(canvas, labels, [
    buatDataset("Stok Masuk", dataMasuk, "#22c55e"),
    buatDataset("Stok Keluar", dataKeluar, "#ef4444")
  ]);
}

// Chart di halaman DASHBOARD (2 chart: total stok per kategori)
function initDashboardChartOut() {
  var canvas = document.getElementById("dashboardBarChartOut");
  if (!canvas) return;

  var labels = ["Elektronik", "Alat Tulis", "Makanan", "Pakaian", "Lainnya"];
  // TODO(backend): ganti dengan data total stok asli per kategori
  var dataStok = [120, 75, 200, 60, 40];

  // Kasih warna beda-beda tiap bar, sesuai urutannya di WARNA_KATEGORI
  var warnaTiapBar = labels.map(function (label, index) {
    return warnaKategoriKe(index);
  });

  buatBarChart(canvas, labels, [
    buatDataset("Total Stok", dataStok, warnaTiapBar)
  ]);
}

function initDashboardChartIn() {
  var canvas = document.getElementById("dashboardBarChartIn");
  if (!canvas) return;

  var labels = ["Elektronik", "Alat Tulis", "Makanan", "Pakaian", "Lainnya"];
  // TODO(backend): ganti dengan data total stok asli per kategori
  var dataStok = [120, 75, 200, 60, 40];

  var warnaTiapBar = labels.map(function (label, index) {
    return warnaKategoriKe(index);
  });

  buatBarChart(canvas, labels, [
    buatDataset("Total Stok", dataStok, warnaTiapBar)
  ]);
}

// Chart di halaman STOCK REPORT: Stok Masuk vs Stok Keluar per bulan
function initStockReportChart() {
  var canvas = document.getElementById("stockReportChart");
  if (!canvas) return;

  var labels = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun"];
  // TODO(backend): ganti 2 array di bawah dengan data stok asli per bulan
  var dataMasuk = [40, 55, 60, 45, 70, 65];
  var dataKeluar = [30, 42, 50, 38, 60, 55];

  buatBarChart(canvas, labels, [
    buatDataset("Stok Masuk", dataMasuk, "#22c55e"),
    buatDataset("Stok Keluar", dataKeluar, "#ef4444")
  ]);
}
