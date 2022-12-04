<?php 
include("../template/headerdepartemen.php");
include("../lib/connect.php");
$count_dosen = $db->query("SELECT COUNT(NIP) AS jumlah FROM dosen")->fetch_object()->jumlah;
$count_dosen_aktif = $db->query("SELECT COUNT(NIP) AS jumlah FROM dosen where Status = 'Aktif'")->fetch_object()->jumlah;
$count_dosen_cuti = $db->query("SELECT COUNT(NIP) AS jumlah FROM dosen where Status != 'Aktif'")->fetch_object()->jumlah;
$count_mahasiswa = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa")->fetch_object()->jumlah;
$count_mahasiswa_aktif = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa where Status = 'Aktif'")->fetch_object()->jumlah;
$count_mahasiswa_cuti = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa where Status != 'Aktif'")->fetch_object()->jumlah;
$count_mahasiswa_lulus = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa where Status = 'Lulus'")->fetch_object()->jumlah;

?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIAP Undip</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="shortcut icon" href="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/departemen.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    </head>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="width: 80%">
            <h3 class="mt-4 mb-4">Dashboard Departemen</h3>
            <div class="row">
                <div class="col">
                    <di class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            <b>Informasi Operator</b>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-md-4 profil-departemen">
                                <img src="../assets/img/logo-undip.png" class="" alt="ProfilePicture  ">
                            </div>
                            <div class="col-md-8">
                                <div   div class="card-body">
                                    <div class="container overflow-hidden">
                                        <div class="nama-profil-departemen">
                                            <ul class="list-unstyled">
                                                <li><span    
                                                    class="fw-bold">Departemen&emsp;: &emsp;</span>Informatika</li>
                                                <li> <span
                                                    class="fw-bold">Fakultas&emsp;&emsp;&emsp;: &emsp;</span>Sains dan Matematika</li>
                                                <li><span
                                                    class="fw-bold">E-mail&emsp;&emsp;&emsp; &ensp;: &emsp;</span>Informatika@mail.com</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            <b>Rekap Status Dosen Informatika</b>
                        </div>
                        <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                            <div class="col-lg-3 col-xs-6 bg-primary text-white">
                                    <div class="small-box bg-primary text-white">   
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h1><?php echo $count_dosen_aktif ?></h1>
                                            </div>
                                            <div class="card-subtitle">
                                                <p>Jumlah Dosen Aktif</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-6 bg-info text-white">
                                    <div class="small-box bg-info text-white"> 
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h1><?php echo $count_dosen_cuti ?></h1>
                                            </div>
                                            <div class="card-subtitle">
                                                <p>Jumlah Dosen Cuti</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-xs-6 bg-success text-white">
                                    <div class="small-box bg-success text-white"> 
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h1><?php echo $count_dosen ?></h1>
                                            </div>
                                            <div class="card-subtitle">
                                                <p>Jumlah Mata Kuliah</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <b>Data Rekap Dosen</b>
                </div>
                <div class="card-body tabel-dosen cell-border">
                    <table id="admin-tabel-mahasiswa" class="cell-border dataTable" cellspacing="1" width="80%" >
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Email</th>
                                <th>Mengampu</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $query = "SELECT * FROM dosen   ";
                                $result = $db->query($query);
                                $i = 1;
                                while ($row = $result->fetch_object()) {
                                    echo "<tr>
                                    <td>".$row->Nama."</td>
                                    <td>".$row->NIP."</td>
                                    <td>".$row->Email."</td>
                                    <td>".$row->Mengampu."</td>
                                    <td>".$row->Status."</td>";
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container-fluid px-4" style="width: 80%">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            <b>Rekap Status Mahasiswa Informatika</b>
                        </div>
                        <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-xs-6 bg-info text-white">
                                    <div class="bg-info text-white">  
                                        <div class="icon">
                                            <div class="card-title">
                                                <h1><?php echo $count_mahasiswa_aktif ?></h1>
                                            </div>
                                            <div class="icon">
                                                <h4>Jumlah mahasiswa Aktif</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-xs-6 bg-primary text-white">
                                    <div class="bg-primary text-white">  
                                        <div class="icon">
                                            <div class="card-title">
                                                <h1><?php echo $count_mahasiswa ?></h1>
                                            </div>
                                            <div class="icon">
                                                <h4>Jumlah mahasiswa</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-xs-6 bg-secondary text-white">
                                    <div class="bg-secondary text-white">  
                                        <div class="icon">
                                            <div class="card-title">
                                                <h1><?php echo $count_mahasiswa_cuti ?></h1>
                                            </div>
                                            <div class="icon">
                                                <h4>Jumlah mahasiswa cuti</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-xs-6 bg-dark text-white">
                                    <div class="bg-dark text-white">  
                                        <div class="icon">
                                            <div class="card-title">
                                                <h1><?php echo $count_mahasiswa_lulus ?></h1>
                                            </div>
                                            <div class="icon">
                                                <h4>Jumlah mahasiswa lulus</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card mb-4">
            <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <b>Data Rekap Mahasiswa</b>
                </div>
                <div class="card-body tabel-dosen cell-border">
                    <table id="admin-tabel-mahasiswa" class="cell-border dataTable" cellspacing="1" width="80%" >
                        <thead>
                            <tr>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Semester</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = "SELECT * FROM mahasiswa";
                                $result = $db->query($query);
                                $i=1;
                                while ($row = $result->fetch_object()) {
                                    echo "<tr>
                                    <td>".$row->Nama."</td>
                                    <td>".$row->NIM."</td>
                                    <td>".$row->Email."</td>
                                    <td>".$row->Alamat."</td>
                                    <td>".$row->No_Hp."</td>
                                    <td>".$row->semester."</td>
                                    <td>".$row->Status."</td>
                                    <td><a onclick='view_data(".$row->NIM.")'></a>
                                    </td>";
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php include("../template/footeruniversal.php")?>

    </main>



