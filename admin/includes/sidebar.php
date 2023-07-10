  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link  <?php if ($halaman !== 'index.php') echo 'collapsed'; ?>" href="index">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link <?php if ($halaman !== 'kriteria-index.php') echo 'collapsed'; ?>" href="kriteria-index">
        <i class="bi bi-menu-button-wide"></i>
          <span>Kriteria</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($halaman !== 'sub-kriteria-index.php') echo 'collapsed'; ?>" href="sub-kriteria-index">
        <i class="bi bi-menu-button-wide"></i>
          <span>Sub Kriteria</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($halaman !== 'customer-index.php') echo 'collapsed'; ?> " href="customer-index">
        <i class="bi bi bi-journal-text"></i>
          <span>Customer</span>
        </a>
      </li>
      <li class="nav-item <?php if ($halaman !== 'dealer.php') echo 'collapsed'; ?>  ">
        <a class="nav-link collapsed " data-bs-target="#dealer" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Dealer</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="dealer" class="nav-content collapse<?php if ($halaman === 'dealer.php') echo 'show'; ?>  " data-bs-parent="#sidebar-nav">
          <li>
            <a href="dealer" class=" text-decoration-none">
              <i class="bi bi-circle"></i><span>Semua</span>
            </a>
          </li>
          <li>
          <li>
            <a href="dealer?name=honda" class="text-decoration-none" >
              <i class="bi bi-circle"></i><span>Honda</span>
            </a>
          </li>
          <li>
            <a href="dealer?name=yahama" class="text-decoration-none">
              <i class="bi bi-circle"></i><span>Yahama</span>
            </a>
          </li>
          <li>
            <a href="dealer?name=kawasaki" class="text-decoration-none">
              <i class="bi bi-circle"></i><span>Kawasaki</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item ">
        <a class="nav-link <?php if ($halaman !== 'motor.php') echo 'collapsed'; ?> " data-bs-target="#motor" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Motor</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="motor" class="nav-content collapse <?php if ($halaman === 'motor.php') echo 'show'; ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="motor" class=" text-decoration-none">
              <i class="bi bi-circle"></i><span>Semua</span>
            </a>
          </li>
          <li>
          <li>
            <a href="motor?name=honda" class="text-decoration-none" >
              <i class="bi bi-circle"></i><span>Honda</span>
            </a>
          </li>
          <li>
            <a href="motor?name=yahama" class="text-decoration-none">
              <i class="bi bi-circle"></i><span>Yahama</span>
            </a>
          </li>
          <li>
            <a href="motor?name=kawasaki" class="text-decoration-none">
              <i class="bi bi-circle"></i><span>Kawasaki</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item ">
        <a class="nav-link <?php if ($halaman !== 'pemesanan-index.php') echo 'collapsed'; ?>" href="pemesanan-index">
        <i class="bi bi-file-earmark-text"></i>
          <span>Pemesanan</span>
        </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link collapsed" onclick= "return confirm ('Anda yakin ingin keluar ?')" href="logout">
        <i class="bi bi-box-arrow-right"></i>
          <span>Keluar</span>
        </a>
      </li>
    </ul>
  </aside><!-- End Sidebar-->