/* =========================================================================
   FILE: assets/js/stock-in-out.js
   Logic khusus modal "Tambah Transaksi Stok": field yang muncul beda-beda
   tergantung tipe transaksi yang dipilih di dropdown (masuk / keluar /
   pindah), sesuai kolom di tabel stock_movement:
     - masuk  -> field Supplier tampil, Tujuan Kirim & Gudang Tujuan sembunyi
     - keluar -> field Tujuan Kirim tampil, Supplier & Gudang Tujuan sembunyi
     - pindah -> field Gudang Tujuan tampil, Supplier & Tujuan Kirim sembunyi
   ========================================================================= */

document.addEventListener("DOMContentLoaded", function () {
  initStockMovementTypeSwitch();
});

function initStockMovementTypeSwitch() {
  // Dropdown pilihan tipe transaksi (masuk / keluar / pindah)
  var typeSelect = document.getElementById("fieldMovementType");

  // 3 "kotak pembungkus" field yang mau kita sembunyikan/tampilkan
  var groupSupplier = document.getElementById("fieldGroupSupplier");
  var groupTujuanKirim = document.getElementById("fieldGroupTujuanKirim");
  var groupGudangTujuan = document.getElementById("fieldGroupGudangTujuan");

  // Kalau salah satu elemennya gak ketemu (misal lagi bukan di halaman
  // Stock In/Out), berhenti -- gak usah lanjut daripada error
  if (!typeSelect || !groupSupplier || !groupTujuanKirim || !groupGudangTujuan) return;

  // Fungsi ini yang nentuin field mana yang tampil/sembunyi, sesuai
  // pilihan dropdown-nya SEKARANG
  function updateVisibleFields() {
    var type = typeSelect.value; // isinya: "masuk" / "keluar" / "pindah"

    // style.display = "" artinya "pakai tampilan normal" (jadi keliatan)
    // style.display = "none" artinya disembunyikan total
    groupSupplier.style.display = (type === "masuk") ? "" : "none";
    groupTujuanKirim.style.display = (type === "keluar") ? "" : "none";
    groupGudangTujuan.style.display = (type === "pindah") ? "" : "none";

    // Field yang lagi disembunyikan gak boleh ditandai "required", biar
    // form tetap bisa disubmit walau field itu kosong (soalnya memang
    // tidak relevan buat tipe transaksi yang dipilih)
    var supplierInput = document.getElementById("fieldMovementSupplier");
    var tujuanInput = document.getElementById("fieldMovementTujuan");
    var gudangTujuanInput = document.getElementById("fieldMovementGudangTujuan");

    if (supplierInput) supplierInput.required = (type === "masuk");
    if (tujuanInput) tujuanInput.required = (type === "keluar");
    if (gudangTujuanInput) gudangTujuanInput.required = (type === "pindah");
  }

  // Setiap kali dropdown-nya diganti pilihannya, jalankan lagi fungsi di atas
  typeSelect.addEventListener("change", updateVisibleFields);

  // Jalankan juga sekali di awal (pas modal baru dibuka), biar field yang
  // tampil sesuai pilihan default dropdown-nya
  updateVisibleFields();
}
