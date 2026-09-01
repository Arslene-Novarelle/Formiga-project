<?php
require_once __DIR__."/koneksi.php";
/**
 * [BARU] actions/add-supplier.php
 * Handler form "Tambah Supplier" dari suppliers.php.
 *
 * TODO(backend): buka koneksi DB, validasi, lalu INSERT ke tabel `suppliers`.
 */

$kd_supp   = $_POST['kd_supp']   ?? '';
$nama_supp = $_POST['nama_supp'] ?? '';
$almt_supp = $_POST['almt_supp'] ?? '';
$no_telp   = $_POST['no_telp']   ?? '';

// TODO(backend): validasi input

// TODO(backend): jalankan query INSERT INTO suppliers (...) VALUES (...)
// Contoh:
// $stmt = $koneksi->prepare("INSERT INTO suppliers (kd_supp, nama_supp, almt_supp, no_telp) VALUES (?, ?, ?, ?)");
// $stmt->bind_param("ssss", $kd_supp, $nama_supp, $almt_supp, $no_telp);
// $stmt->execute();

// header("Location: ../suppliers.php");
exit;
