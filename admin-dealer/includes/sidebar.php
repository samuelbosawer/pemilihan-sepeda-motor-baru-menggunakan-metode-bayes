  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?php if ($halaman !== 'index.php') echo 'collapsed'; ?> " href="index">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($halaman !== 'motor-index.php') echo 'collapsed'; ?> " href="motor-index">
        <i class="bi bi-menu-button-wide"></i>
          <span>Motor</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($halaman !== 'pemesanan-index.php') echo 'collapsed'; ?> " href="pemesanan-index">
        <i class="bi bi-file-earmark-text"></i>
          <span>Transaksi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed " onclick= "return confirm ('Anda yakin ingin keluar ?')" href="logout">
        <i class="bi bi-box-arrow-right"></i>
          <span>Keluar</span>
        </a>
      </li>
    </ul>
  </aside><!-- End Sidebar-->