<?php
require_once __DIR__."/koneksi.php";
/**
 * [BARU] actions/add-warehouse.php
 * Handler form "Tambah Gudang" dari warehouses.php.
 *
 * TODO(backend): buka koneksi DB, validasi, lalu INSERT ke tabel `gudang`.
 * Ingat: kolom total_item TIDAK perlu diisi manual di sini -- otomatis
 * ke-update lewat trigger di tabel item_warehouse (lihat skema database).
 */

$kd_gudang     = $_POST['kd_gudang']     ?? '';
$nama_gudang   = $_POST['nama_gudang']   ?? '';
$alamat_gudang = $_POST['alamat_gudang'] ?? '';

// TODO(backend): validasi input

// TODO(backend): jalankan query INSERT INTO gudang (...) VALUES (...)
// Contoh:
// $stmt = $koneksi->prepare("INSERT INTO gudang (kd_gudang, nama_gudang, alamat_gudang) VALUES (?, ?, ?)");
// $stmt->bind_param("sss", $kd_gudang, $nama_gudang, $alamat_gudang);
// $stmt->execute();

// header("Location: ../warehouses.php");
exit;
