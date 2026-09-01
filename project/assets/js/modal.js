/* =========================================================================
   FILE: assets/js/modal.js
   Logic BUKA/TUTUP modal (kotak popup di tengah layar), dipakai bareng
   di semua halaman yang punya modal (Item, Stock In/Out, dll).

   CARA PAKAI di HTML:
   1. Tombol pembuka modal, kasih atribut data-modal-open="idModalnya":
        <button data-modal-open="modalTambahItem">+ Tambah Produk</button>

   2. Modal-nya sendiri, strukturnya:
        <div class="modal-overlay" id="modalTambahItem" data-modal>
          <div class="modal">
            <div class="modal__header">
              <span class="modal__title">Tambah Produk</span>
              <button type="button" class="modal__close" data-modal-close>&times;</button>
            </div>
            <form class="modal__body" method="POST" action="actions/add-item.php">
              ... field-field form ...
              <div class="modal__footer">
                <button type="button" class="btn btn--outline" data-modal-close>Batal</button>
                <button type="submit" class="btn btn--primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>

   Modal otomatis bisa ditutup dengan: klik tombol [data-modal-close],
   klik area gelap di luar modal, atau tekan tombol Escape.
   ========================================================================= */

document.addEventListener("DOMContentLoaded", function () {
  initModalOpenButtons();
  initModalCloseButtons();
  initModalOverlayClickOutside();
  initModalEscapeKey();
});

/* -------------------------------------------------------------------------
   Cara buka/tutup modal itu SIMPEL: cuma nambah/buang class "is-open" di
   elemen modal-nya. Tampilan "muncul"/"ilang"-nya diatur lewat CSS
   (assets/css/modal.css), bukan lewat JS ini. JS ini cuma tukang
   pencet saklarnya doang.
   ------------------------------------------------------------------------- */
function openModal(modalId) {
  var modal = document.getElementById(modalId);
  if (modal) modal.classList.add("is-open");
}

function closeModal(modalEl) {
  if (modalEl) modalEl.classList.remove("is-open");
}

/* -------------------------------------------------------------------------
   1. Tombol pembuka modal
   Cari SEMUA elemen yang punya atribut data-modal-open (bisa lebih dari
   satu tombol di 1 halaman), terus pasang "pendengar klik" di masing-masing.
   Pas diklik, ambil ISI atribut data-modal-open itu (contoh: "modalTambahItem")
   -> itulah id modal yang harus dibuka.
   ------------------------------------------------------------------------- */
function initModalOpenButtons() {
  var tombolPembuka = document.querySelectorAll("[data-modal-open]");

  tombolPembuka.forEach(function (btn) {
    btn.addEventListener("click", function () {
      var idModalTujuan = btn.getAttribute("data-modal-open");
      openModal(idModalTujuan);
    });
  });
}

/* -------------------------------------------------------------------------
   2. Tombol penutup modal (tombol "X" atau "Batal" DI DALAM modal)
   Sama seperti di atas, tapi pas ketemu tombolnya, kita perlu tahu
   "modal yang mana yang harus ditutup?" -- caranya: telusuri ke ATAS dari
   tombol itu (lewat elemen-elemen pembungkusnya) sampai ketemu elemen
   yang punya atribut [data-modal] (itu kotak modal-nya sendiri).
   `.closest()` ini kayak nanya "kotak besar mana ya yang lagi ngebungkus
   tombol ini?" -- jadi 1 fungsi ini otomatis kepake buat modal MANAPUN,
   gak perlu ditulis manual satu-satu tiap modal.
   ------------------------------------------------------------------------- */
function initModalCloseButtons() {
  var tombolPenutup = document.querySelectorAll("[data-modal-close]");

  tombolPenutup.forEach(function (btn) {
    btn.addEventListener("click", function () {
      var modalPembungkus = btn.closest("[data-modal]");
      closeModal(modalPembungkus);
    });
  });
}

/* -------------------------------------------------------------------------
   3. Klik di area gelap DI LUAR kotak modal -> modal ikut tertutup
   Elemen [data-modal] itu sendiri adalah LAYAR GELAP yang menutupi
   seluruh halaman (lihat CSS .modal-overlay), sedangkan kotak modal
   putih/gelapnya ada DI DALAM elemen itu.
   Jadi kalau target klik = elemen [data-modal] itu SENDIRI (bukan
   sesuatu di dalamnya), berarti user klik area gelapnya -> tutup modal.
   Kalau klik DI DALAM kotak modal, jangan ditutup (biar gak ke-close
   pas lagi ngisi form).
   ------------------------------------------------------------------------- */
function initModalOverlayClickOutside() {
  var semuaLayarModal = document.querySelectorAll("[data-modal]");

  semuaLayarModal.forEach(function (layarModal) {
    layarModal.addEventListener("click", function (e) {
      var yangDiklikAdalahLayarGelapnyaSendiri = (e.target === layarModal);
      if (yangDiklikAdalahLayarGelapnyaSendiri) {
        closeModal(layarModal);
      }
    });
  });
}

/* -------------------------------------------------------------------------
   4. Tombol Escape di keyboard -> tutup modal yang lagi kebuka
   ------------------------------------------------------------------------- */
function initModalEscapeKey() {
  document.addEventListener("keydown", function (e) {
    if (e.key !== "Escape") return;

    var modalYangSedangTerbuka = document.querySelectorAll("[data-modal].is-open");
    modalYangSedangTerbuka.forEach(function (modal) {
      closeModal(modal);
    });
  });
}
