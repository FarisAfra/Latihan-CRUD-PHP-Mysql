<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style/StyleNavbar.css">
    <link rel="stylesheet" href="Style/StyleHome.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">"
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">"
    <title>Home</title>
</head>
<body>
    
<!-- navbar -->
<nav class="navbar1">
  <div class="logo_item">
      <i class="bx bx-menu" id="sidebarOpen"></i>
      <i class="bx bx-cog"></i>Dashboard Admin
  </div>

  <div class="navbar_content">
      <i class="bi bi-grid"></i>
      <i class='bx bx-sun' id="darkLight"></i>
      <div class="dropdown">
        <i class='bx bx-bell dropdown-toggle'></i>
        <div class="dropdown-menu notification">
          <div class="notification-header">Notifikasi</div>
          <ul class="notification-list" id="notification-list">
            <li><b>Tidak Ada </b>Notifikasi Terbaru</li>        
          </ul>
          <div class="notification-footer">
            <a href="#">Lihat semua notifikasi</a>
          </div>
        </div>
      </div>
  </div>
</nav>

    <!-- sidebar -->
    <nav class="sidebar">
      <div class="menu_content">
        <ul class="menu_items">
          <div class="menu_title menu_dahsboard"></div>

          <li class="item">
            <a href="Dashboard.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-home-alt"></i>
              </span>
              <span class="navlink" >Dashboard</span>
            </a>
          </li>
          
        </ul>

        <ul class="menu_items">
          <div class="menu_title menu_db"></div>

          <li class="item">
            <a href="Akun.php" class="nav_link">
              <span class="navlink_icon">
                <i class='bx bx-user-plus' ></i>
              </span>
              <span class="navlink" >Data Akun</span>
            </a>
          </li>

          <li class="item">
            <a href="Mahasiswa.php" class="nav_link">
              <span class="navlink_icon">
                <i class='bx bxs-user-badge'></i>
                <!-- <i class='bx bxs-book'></i> -->
              </span>
              <span class="navlink">Data Mahasiswa</span>
            </a>
          </li>
          
        </ul>
        <ul class="menu_items">
          <div class="menu_title menu_setting"></div>
          
          <li class="item">
            <a href="index.php" class="nav_link">
              <span class="navlink_icon">
                <i class='bx bx-log-in-circle' ></i>
              </span>
              <span class="navlink">Log Out</span>
            </a>
          </li>
        </ul>

        <!-- Sidebar Open / Close -->
        <div class="bottom_content">
          <div class="bottom expand_sidebar">
            <span> Expand</span>
            <i class='bx bx-log-in' ></i>
          </div>
          <div class="bottom collapse_sidebar">
            <span> Collapse</span>
            <i class='bx bx-log-out'></i>
          </div>
        </div>
      </div>
    </nav>

    <!-- JavaScript -->
    <script src="JavaScript/Navbar.js"></script>
</body>
</html>