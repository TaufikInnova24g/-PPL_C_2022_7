<?php include('../lib/connect.php'); 
session_start();
$username = $_SESSION['username'];
$foto = $db->query("SELECT admin.Foto FROM user,admin WHERE admin.username = user.username AND admin.username = '$username'")->fetch_object()->Foto;
$Nama = $db->query("SELECT admin.Nama FROM user,admin WHERE admin.username = user.username AND admin.username = '$username'")->fetch_object()->Nama;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Operator</title>
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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css"> 
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.dataTables.min.css"> 
        <link rel="shortcut icon" href="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/header.css" rel="stylesheet" />
        <link href="../css/admin.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-primary">
            <a class="navbar-brand ps-3" href="../admin/dashboardAdmin.php">
              <img src="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" alt="logo undip" width = 40 height = 40> <b class="">Dashboard Operator</b>
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
                            <p><?php echo $Nama ?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                            </div>
                            <section class="sidebar" style="">
                            <ul class="sidebar-menu">
                            <li>
                                <a href="../admin/dashboardAdmin.php" style="text-decoration:none; color: black;">
                                    <i class="fa fa-th"></i> <span>Dashboard</span> <i class=""></i>
                                </a>
                            </li>
                            <li>
                                <a href="../admin/buatakun.php" style="text-decoration:none; color: black;">
                                    <i class="fa fa-th"></i> <span>Entry Mahasiswa</span> <i class=""></i>
                                </a>
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