<?php
require_once __DIR__."/koneksi.php";
/**
 * [BARU] actions/add-item.php
 * Handler form "Tambah Produk" dari item.php.
 * Form mengirim data lewat method POST biasa (bukan AJAX), jadi file ini
 * dipanggil langsung sebagai tujuan submit form.
 *
 * TODO(backend):
 * 1. Buka koneksi database kamu (mysqli / PDO).
 * 2. Validasi input di bawah (jangan percaya begitu saja data dari $_POST).
 * 3. INSERT ke tabel `barang` sesuai skema database kamu.
 * 4. Redirect balik ke item.php (baris paling bawah sudah disiapkan).
 */

// Data yang dikirim dari form (nama field disamakan dengan kolom tabel `barang`):
$nm_brg        = $_POST['nm_brg']        ?? '';
$id_kategori   = $_POST['id_kategori']   ?? '';
$id_gudang     = $_POST['id_gudang']     ?? '';
$id_supplier   = $_POST['id_supplier']   ?? '';
$id_satuan     = $_POST['id_satuan']     ?? '';
$stok          = $_POST['stok']          ?? 0;
$harga_satuan  = $_POST['harga_satuan']  ?? 0;

// TODO(backend): validasi (semua field wajib ada isinya, angka harus valid, dst)

// TODO(backend): generate kd_brg otomatis (misal "BRG-0001", cek nomor urut
// terakhir di tabel barang), atau minta input manual dari form kalau kamu mau.

// TODO(backend): jalankan query INSERT INTO barang (...) VALUES (...)
// Contoh (sesuaikan dengan cara koneksi database kamu):
//
// $stmt = $koneksi->prepare(
//   "INSERT INTO barang (kd_brg, nm_brg, id_kategori, id_gudang, stok, id_satuan, id_supplier, harga_satuan)
//    VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
// );
// $stmt->bind_param("ssiiidid", $kd_brg, $nm_brg, $id_kategori, $id_gudang, $stok, $id_satuan, $id_supplier, $harga_satuan);
// $stmt->execute();

// Setelah berhasil simpan, balik lagi ke halaman item.php supaya user
// lihat data terbaru (ini tetap jalan di dalam iframe, gak bikin URL berubah)

// header("Location: ../item.php");
exit;
