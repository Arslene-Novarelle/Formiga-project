<?php
require_once __DIR__."/koneksi.php";
/**
 * [BARU] actions/add-stock-movement.php
 * Handler form "Tambah Transaksi Stok" dari stock-in-out.php.
 * Field yang terisi beda-beda tergantung $type (lihat modal__field yang
 * disembunyikan/ditampilkan oleh assets/js/stock-in-out.js):
 *   - masuk  -> id_supplier terisi, tujuan_kirim & id_gudang_tujuan kosong
 *   - keluar -> tujuan_kirim terisi, id_supplier & id_gudang_tujuan kosong
 *   - pindah -> id_gudang_tujuan terisi, id_supplier & tujuan_kirim kosong
 *
 * TODO(backend):
 * 1. Buka koneksi DB.
 * 2. Validasi $type harus salah satu dari 'masuk'/'keluar'/'pindah'.
 * 3. INSERT ke tabel `stock_movement`.
 * 4. PENTING: sesuaikan juga stok di tabel `item_warehouse`:
 *    - masuk  -> stok GUDANG TUJUAN (id_gudang) bertambah sebesar $qty
 *    - keluar -> stok GUDANG ASAL (id_gudang) berkurang sebesar $qty
 *    - pindah -> stok GUDANG ASAL (id_gudang) berkurang $qty,
 *                stok GUDANG TUJUAN (id_gudang_tujuan) bertambah $qty
 *    (trigger yang sudah dibuat di skema database otomatis update kolom
 *    total_item di tabel gudang begitu item_warehouse berubah, jadi kamu
 *    CUKUP update item_warehouse saja, gudang.total_item ikut otomatis)
 */

$type             = $_POST['type']             ?? '';
$id_brg           = $_POST['id_brg']           ?? '';
$id_gudang        = $_POST['id_gudang']        ?? '';
$id_supplier      = $_POST['id_supplier']      ?: null;
$tujuan_kirim     = $_POST['tujuan_kirim']     ?: null;
$id_gudang_tujuan = $_POST['id_gudang_tujuan'] ?: null;
$qty              = $_POST['qty']              ?? 0;
$tanggal          = $_POST['tanggal']          ?? '';
$keterangan       = $_POST['keterangan']       ?? '';

// TODO(backend): $id_user harusnya diambil dari sesi login yang sedang aktif,
// BUKAN hardcode, ini cuma placeholder:
$id_user = 1;

// TODO(backend): validasi input sesuai $type (lihat catatan di atas)

// TODO(backend): jalankan query INSERT INTO stock_movement (...) VALUES (...)
// Contoh:
// $stmt = $koneksi->prepare(
//   "INSERT INTO stock_movement (id_brg, id_gudang, type, qty, tanggal, id_supplier, tujuan_kirim, id_gudang_tujuan, id_user, keterangan)
//    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
// );
// $stmt->bind_param("iisdssssis", $id_brg, $id_gudang, $type, $qty, $tanggal, $id_supplier, $tujuan_kirim, $id_gudang_tujuan, $id_user, $keterangan);
// $stmt->execute();

// TODO(backend): update tabel item_warehouse sesuai $type (lihat catatan di atas)

// header("Location: ../stock-in-out.php");
exit;
