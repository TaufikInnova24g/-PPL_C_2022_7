<?php
session_start();
include("../template/headerdosen.php");  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dosen</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        </head>
<body class="hold-transition skin-blue sidebar-mini" >
<div id="layoutSidenav_content">
    <div class="wrapper">
      <!-- <div class="content-wrapper"> -->
        <section class="content-header">
        <div class="container mt-2">
            <div class="card">
                <div class="card-header">Tambah Data Skripsi</div>
                <div class="card-body">
                    <form method="POST" autocomplete="on">
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php if (isset($nama)) echo $nama;?>">
                            <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                            <div class="text-danger"><?php if (isset($error_nama)) echo $error_nama;?></div>
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM:</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php if (isset($nim)) echo $nim;?>">
                            <div class="text-danger"><?php if (isset($error_nim)) echo $error_nim;?></div>
                        </div>
                        <div class="form-group">
                            <label for="sks">SKS:</label>
                            <input type="text" class="form-control" id="sks" name="sks" value="<?php if (isset($sks)) echo $sks;?>">
                            <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                            <div class="text-danger"><?php if (isset($error_sks)) echo $error_sks;?></div>
                        </div>
                        <div class="form-group">
                            <label for="ipk">IPK:</label>
                            <input type="text" class="form-control" id="ipk" name="ipk" value="<?php if (isset($ipk)) echo $ipk;?>">
                            <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                            <div class="text-danger"><?php if (isset($error_ipk)) echo $error_ipk;?></div>
                        </div>
                        <div class ="form-group">
                            <label for="status_kelulusan">Status Kelulusan:</label>
                            <select class="form-control" id="status_kelulusan" name="status_kelulusan">
                                <option value="">Pilih Status</option>
                                <option value="lulus">Lulus</option>
                                <option value="belum lulus">Belum Lulus</option>
                            </select>
                            <div class="text-danger"><?php if (isset($error_status_kelulusan)) echo $error_status_kelulusan;?></div>
                        </div>
                        <div class ="form-group">
                            <label for="angkatan">Angkatan:</label>
                            <select class="form-control" id="angkatan" name="status_kelulusan">
                                <option value="">Pilih angkatan</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                            <div class="text-danger"><?php if (isset($error_angkatan)) echo $error_angkatan;?></div>
                        </div>
                        <br>
                        <button type="button" onclick="add_skripsi()" class="btn btn-primary" name="submit" value="submit">Submit</button>
                        <a href="rekapSkripsi.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
                <div id="demo"></div>
            </div>
        </div>
    </div>
    
    <script src="ajax/ajaxskripsi.js"></script>
</body>
</html>