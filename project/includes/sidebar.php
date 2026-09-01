<?php
/**
 * Shared warehouse sidebar.
 * Set $currentPage before including this file.
 */
?>
    <!-- ============================================================
         SIDEBAR (menu navigasi kiri) - SAMA di semua halaman.
         Elemen dengan class "is-active" menandakan halaman yang sedang dibuka.
         Semua icon di sidebar ini pakai Feather Icons (SVG asli, di-copy dari
         package "feather-icons", bukan gambar buatan sendiri).
         ============================================================ -->
    <aside class="sidebar" id="sidebar">

      <!-- Header sidebar: logo/brand + tombol notifikasi + tombol collapse sidebar -->
      <div class="sidebar-header" id="sidebarHeader">
        <div class="sidebar-header__brand" id="sidebarBrand">
          <span class="sidebar-header__logo" id="sidebarLogo" aria-hidden="true">
            <img src="assets/img/formiga-icon.svg" alt="Formiga" style="width: 22px; height: 22px;">
          </span>
          <!-- TODO: ganti "Nama App" dengan nama aplikasi kamu -->
          <span id="sidebarAppName">Formiga</span>
        </div>
        <div class="sidebar-header__actions" id="sidebarHeaderActions">
          <!-- Tombol lonceng -> menuju halaman notifications.php -->
          <a href="notifications.php" target="contentFrame" id="navBtnNotifications" class="icon-btn" title="Notifikasi">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            <span class="icon-btn__badge" id="notifUnreadBadge"></span>
          </a>
          <!-- Tombol ini fungsinya NUTUP/BUKA sidebar (lihat assets/js/main.js) -->
          <button type="button" id="navBtnSidebarToggle" class="icon-btn" title="Tutup sidebar">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
          </button>
        </div>
      </div>

      <!-- Navigasi utama: Search, Home, Dashboard, Item -->
      <nav class="sidebar-nav-main" id="sidebarNavMain">
        <button type="button" id="navBtnSearch" class="sidebar-link" data-nav-page="search" data-page="search">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          <span class="sidebar-link__label">Search</span>
        </button>
        <a href="home.php" target="contentFrame" id="navLinkHome" class="sidebar-link" data-nav-page="home" data-page="home">
          <span class="sidebar-link__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></span>
          <span class="sidebar-link__label">Home</span>
        </a>
        <a href="dashboard.php" target="contentFrame" id="navLinkDashboard" class="sidebar-link" data-nav-page="dashboard" data-page="dashboard">
          <span class="sidebar-link__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg></span>
          <span class="sidebar-link__label">Dashboard</span>
        </a>
        <a href="item.php" target="contentFrame" id="navLinkItem" class="sidebar-link" data-nav-page="item" data-page="item">
          <span class="sidebar-link__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg></span>
          <span class="sidebar-link__label">Item</span>
        </a>
      </nav>

      <div class="sidebar-divider" id="sidebarDivider"></div>

      <!-- Grup: INVENTORY -->
      <section class="sidebar-group" id="sidebarGroupInventory">
        <div class="sidebar-group__header">
          <span class="sidebar-group__title">Inventory</span>
          <!-- Catatan: fitur "tambah tab baru" sengaja TIDAK dibuat sesuai permintaan -->
        </div>
        <nav class="sidebar-group__nav" id="sidebarNavInventory">
        <a href="stock-in-out.php" target="contentFrame" id="navLinkStockInOut" class="sidebar-link" data-nav-page="stock-in-out" data-page="stock-in-out">
          <span class="sidebar-link__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg></span>
          <span class="sidebar-link__label">Stock In/Out</span>
        </a>
        <a href="warehouses.php" target="contentFrame" id="navLinkWarehouses" class="sidebar-link" data-nav-page="warehouses" data-page="warehouses">
          <span class="sidebar-link__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg></span>
          <span class="sidebar-link__label">Warehouses</span>
        </a>
        <a href="categories.php" target="contentFrame" id="navLinkCategories" class="sidebar-link" data-nav-page="categories" data-page="categories">
          <span class="sidebar-link__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg></span>
          <span class="sidebar-link__label">Categories</span>
        </a>
        <a href="suppliers.php" target="contentFrame" id="navLinkSuppliers" class="sidebar-link" data-nav-page="suppliers" data-page="suppliers">
          <span class="sidebar-link__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg></span>
          <span class="sidebar-link__label">Suppliers</span>
        </a>
        </nav>
      </section>

      <!-- Grup: REPORTS -->
      <section class="sidebar-group" id="sidebarGroupReports">
        <div class="sidebar-group__header">
          <span class="sidebar-group__title">Reports</span>
        </div>
        <nav class="sidebar-group__nav" id="sidebarNavReports">
        <a href="stock-report.php" target="contentFrame" id="navLinkStockReport" class="sidebar-link" data-nav-page="stock-report" data-page="stock-report">
          <span class="sidebar-link__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg></span>
          <span class="sidebar-link__label">Stock Report</span>
        </a>
        <a href="valuation-report.php" target="contentFrame" id="navLinkValuationReport" class="sidebar-link" data-nav-page="valuation-report" data-page="valuation-report">
          <span class="sidebar-link__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg></span>
          <span class="sidebar-link__label">Valuation Report</span>
        </a>
        <a href="transaction-history.php" target="contentFrame" id="navLinkTransactionHistory" class="sidebar-link" data-nav-page="transaction-history" data-page="transaction-history">
          <span class="sidebar-link__icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></span>
          <span class="sidebar-link__label">Transaction History</span>
        </a>
        </nav>
      </section>

      <!-- Footer sidebar: kartu profil user, menuju profile.php -->
      <div class="sidebar-footer" id="sidebarFooter">
        <a href="profile.php" target="contentFrame" id="sidebarUserProfile" class="sidebar-user">
          <!-- TODO(backend): ganti "U" & "User" dengan inisial/nama user yang login -->
          <span class="sidebar-user__avatar" id="sidebarUserAvatar">U</span>
          <span class="sidebar-user__meta">
            <span class="sidebar-user__name" id="sidebarUserName">User</span>
            <span class="sidebar-user__role" id="sidebarUserRole">Lihat Profil</span>
          </span>
          <span class="sidebar-user__chevron"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg></span>
        </a>
      </div>

    </aside>
