<?php
require_once __DIR__."/koneksi.php";
/**
 * [BARU] actions/delete-all-items.php
 * Dipanggil dari tombol "Delete All" di item.php (lewat konfirmasi
 * dialog JS dulu, lihat assets/js/main.js -> initDeleteAllConfirm()).
 *
 * TODO(backend):
 * 1. Buka koneksi DB.
 * 2. TRUNCATE atau DELETE FROM barang (hati-hati, ini hapus SEMUA data).
 *    Pertimbangkan juga hapus data terkait di item_warehouse & stock_movement
 *    kalau ada foreign key constraint yang mewajibkan urutan hapus tertentu.
 */

// TODO(backend): jalankan query DELETE / TRUNCATE di sini
// Contoh:
// $koneksi->query("DELETE FROM barang");

// header("Location: ../item.php");
exit;
