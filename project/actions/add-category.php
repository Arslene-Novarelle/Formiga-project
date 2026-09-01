<?php
require_once __DIR__."/koneksi.php";

/**
 * [BARU] actions/add-category.php
 * Handler form "Tambah Kategori" dari categories.php.
 *
 * TODO(backend): sama seperti add-item.php -- buka koneksi DB, validasi,
 * lalu INSERT ke tabel `kategori`.
 */

$kd_kategori = $_POST['kd_kategori'] ?? '';
$nm_kategori = $_POST['nm_kategori'] ?? '';

// TODO(backend): validasi input

// TODO(backend): jalankan query INSERT INTO kategori (...) VALUES (...)
// Contoh:
// $stmt = $koneksi->prepare("INSERT INTO kategori (kd_kategori, nm_kategori) VALUES (?, ?)");
// $stmt->bind_param("ss", $kd_kategori, $nm_kategori);
// $stmt->execute();

// header("Location: ../categories.php");
exit;
