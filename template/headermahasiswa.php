<?php include('../lib/connect.php'); 
// error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header('../login.php');
    exit;
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$username = $_SESSION['username'];
$nim = $db->query("SELECT user.nim FROM user WHERE username = '$username'")->fetch_object()->nim;
$foto = $db->query("SELECT mahasiswa.Foto FROM user,mahasiswa WHERE mahasiswa.username = user.username AND mahasiswa.username = '$username'")->fetch_object()->Foto;
$nama_mahasiswa = $db->query("SELECT mahasiswa.nama AS nama_mahasiswa FROM mahasiswa,user WHERE mahasiswa.username = user.username AND mahasiswa.username = '$username'")->fetch_object()->nama_mahasiswa;
$ipquery = "SELECT IP_Semester FROM khs,mahasiswa WHERE mahasiswa.username = '$username' AND khs.nim = mahasiswa.nim";

$ip = $db->query($ipquery)->fetch_object()->IP_Semester;

if($ip >= 3){
    $sksmax = 24;
}else{
    $sksmax = 22;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mahasiswa</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href= "https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="../assets/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"/>
        <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">
        <!-- batas -->
        <link rel="shortcut icon" href="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css">
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/mahasiswa.css" rel="stylesheet"/>
        <link href="../css/header.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <a class="navbar-brand ps-3" href="dashboardDSN.php">
              <img src="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" alt="logo undip" width = 40 height = 40> <b class="">Dashboard Mahasiswa</b>
            </a>
    </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                         <div class="user-panel">
                            <div class="pull-left image">
                            <img src="../assets/images/user.png" class="img-rounded" alt="User Image">
                            </div>
                            <div class="pull-left info">
                            <p><?php echo $nama_mahasiswa ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                            </div>
                            <section class="sidebar" style="">
                            <ul class="sidebar-menu">
                            <li>
                                <a href="../mahasiswa/dashboardMHS.php" style="text-decoration:none; color: black;">
                                    <i class="fa fa-th"></i> <span>Dashboard</span> <i class=""></i>
                                </a>
                            </li>
                            <li>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                              <div class="fa fa-th"><i class=""></i></div>
                              Progres Akademik
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                          </a>
                          <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                              <nav class="sb-sidenav-menu-nested nav">
                                  <a class="nav-link" href="irs.php">IRS</a>
                                  <a class="nav-link" href="khs.php">KHS</a>
                                  <a class="nav-link" href="pkl.php">PKL</a>
                                  <a class="nav-link" href="skripsi.php">Skripsi</a>
                              </nav>
                          </div>
                            </li>
                            <li>
                                <a href="../logout.php" style="text-decoration:none;color: black;">
                                    <i class="fa fa-th"></i> <span>Logout</span> <i class=""></i>
                                </a>
                            </li>
                            </ul>
                        </section>
                        </div>
                    </div>
                </nav>
            </div>
        <!-- Batas -->
        <!-- <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                          <a class="nav-link" href="../mahasiswa/dashboardMHS.php">
                              <div class="sb-nav-link-icon"><i class="	fas fa-home"></i></div>
                              Dashboard
                          </a>
                          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                              Progres Akademik
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                          </a>
                          <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                              <nav class="sb-sidenav-menu-nested nav">
                                  <a class="nav-link" href="irs.php">IRS</a>
                                  <a class="nav-link" href="khs.php">KHS</a>
                                  <a class="nav-link" href="pkl.php">PKL</a>
                                  <a class="nav-link" href="skripsi.php">Skripsi</a>
                              </nav>
                          </div>
                          <a class="nav-link" href="../logout.php">
                              <div class="sb-nav-link-icon"><i class="fa fa-sign-out"></i></div>
                              Keluar
                          </a>
                        </div>
                    </div>
                </nav>
            </div> -->