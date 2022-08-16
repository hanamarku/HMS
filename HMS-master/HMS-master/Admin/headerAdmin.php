
<?php
require "Connection.php";
session_start();

if($_SESSION['emri_rol'] != 'admin'){
  header('Location: http://localhost/hms-project/HMS-master/HMS-master/error404.html');
}

if(!isset($_SESSION['username'])){
  header('Location: http://localhost/hms-project/HMS-master/HMS-master/login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin Dashboard</title>

  <link href="../images/logo.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>


 

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="http://localhost/hms-project/HMS-master/HMS-master/index.php" class="logo d-flex align-items-center">
        <!-- <img src="assets/img/logo copy.png" alt=""> -->
        <span class="d-none d-lg-block">Heal & Health</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

  

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0"  style="text-decoration-line: none;" href="#" data-bs-toggle="dropdown">
            <!-- <img src="../assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION["username"];?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION["username"];?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/hms-project/HMS-master/HMS-master/Admin/indexAdmin.php">
                <i class="bi bi-person"></i>
                <span>Profili im</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/hms-project/HMS-master/HMS-master/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Dil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/hms-project/HMS-master/HMS-master/ndrysho_fjalekalim.php">
              <i class="fa fa-key" aria-hidden="true"></i>
                <span>Ndrysho Fjalekalim</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

  </header>


  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/hms-project/HMS-master/HMS-master/Admin/indexAdmin.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-building"></i><span>Dapartamentet</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/hms-project/HMS-master/HMS-master/Admin/departamentArea/index.php">
              <i class="bi bi-circle"></i><span>Shiko Departamentet</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item" >
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-video2"></i><span>Pacientet</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/hms-project/HMS-master/HMS-master/Admin/patientArea/index.php">
              <i class="bi bi-circle"></i><span>Shiko Pacientët</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item" >
        <a class="nav-link collapsed" data-bs-target="#forms-nav1" data-bs-toggle="collapse" href="#">
        <i class="bi bi-person-video2"></i><span>Pacientet Ne Nevoje</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/hms-project/HMS-master/HMS-master/Admin/pacientNevoje/index.php">
              <i class="bi bi-circle"></i><span>Pacient ne nevoje</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="fa fa-user-md"></i><span>Doktoret</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/hms-project/HMS-master/HMS-master/Admin/doktorArea/index.php">
              <i class="bi bi-circle"></i><span>Shiko Doktoret</span>
            </a>
          </li>  
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-chat-dots"></i><span>Feedback</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/hms-project/HMS-master/HMS-master/Admin/FeedbackAdmin/index.php">
              <i class="bi bi-circle"></i><span>Feedback</span>
            </a>
          </li>
      
        </ul>
      </li>
    </ul>

  </aside>
    </section>
  </main>

 <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script> 
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- <script src="../assets/js/main.js"></script> -->
