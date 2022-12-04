<?php include("../template/headeradmin.php"); 
$nama_admin = $db->query("SELECT admin.nama AS nama_admin FROM admin,user WHERE admin.username = user.username AND admin.username = '$username'")->fetch_object()->nama_admin;
$NIP_admin = $db->query("SELECT admin.NIP AS NIP_admin FROM admin,user WHERE admin.username = user.username AND admin.username = '$username'")->fetch_object()->NIP_admin;
$email_admin = $db->query("SELECT email FROM user WHERE username = '$username'")->fetch_object()->email;
$count_mahasiswa = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa")->fetch_object()->jumlah;
$count_mahasiswa_aktif = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa where Status = 'Aktif'")->fetch_object()->jumlah;
$count_mahasiswa_cuti = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa where Status != 'Aktif'")->fetch_object()->jumlah;
$count_mahasiswa_lulus = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa where Status = 'Lulus'")->fetch_object()->jumlah;

?>

<body>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid mx-auto px-4" style="width: 80%;">
                <h3 class="my-3">Dashboard Admin</h3>
                <div class="row">
                    <div class="col">
                        <di class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                <b>Informasi Operator</b>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-4 profil-admin">
                                    <img src="../assets/images/user.png" class="" alt="ProfilePicture  ">
                                </div>
                                <div class="col-md-8">
                                    <div div class="card-body">
                                        <div class="container overflow-hidden">
                                            <div class="nama-profil-admin">
                                                <ul class="list-unstyled">
                                                    <li><span class="fw-bold">Nama&emsp;: &emsp;</span><?php echo $nama_admin ?></li>
                                                    <li> <span class="fw-bold">NIP&emsp;&emsp;: &emsp;</span><?php echo $NIP_admin ?></li>
                                                    <li><span class="fw-bold">Email&emsp;: &emsp;</span><?php echo $email_admin ?></li>
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
                            <b>Rekap Status Mahasiswa Informatika</b>
                        </div>

                        <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-xs-6 bg-info text-white">
                                    <div class="bs-blue text-white">  
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
                                    <div class="bs-blue text-white">  
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
                                    <div class="bs-blue text-white">  
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
                </div>
            </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <b>Data Rekap Mahasiswa</b>
                    </div>
                    <div class="card-body tabel-mahasiswa cell-border">
                        <table id="admin-tabel-mahasiswa" class="cell-border dataTable table" cellspacing="1" width="100%">
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
                                    <td><a class='btn btn-primary' onclick='view_data(".$row->NIM.")'>Edit</a>
                                    </td>";
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <div id="updata">
                            <div class="modal fade" id="updatedata" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="">Update Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="modalup" class="form-control" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="upnama">Nama:</label>
                                        <input type="text" name="upnama" id="upnama" class="form-control">
                                    </div><br/>
                                    <div class="form-group">
                                        <label for="upalamat">Alamat:</label>
                                        <textarea type="text" name="upalamat" id="upalamat" class="form-control"></textarea>
                                    </div><br/>
                                    <div class="form-group">
                                        <label for>No Handphone:</label>
                                        <input type="text" name="upnohp" id="upnohp" class="form-control" pattern="[0-9]+" required>
                                    </div><br/>
                                    <div class="form-group">
                                        <label for>Status:</label>
                                        <select id="upstat" name="upstat" class="form-select" value="" required>
                                            <option name="upstat" value="Aktif">Aktif</option>
                                            <option name="upstat" value="Cuti">Cuti</option>
                                            <option name="upstat" value="Meninggal">Meninggal</option>
                                            <option name="upstat" value="Mangkir">Mangkir</option>
                                            <option name="upstat" value="Drop-out">Drop-out</option>
                                            <option name="upstat" value="Undur Diri">Undur Diri</option>
                                            <option name="upstat" value="Lulus">Lulus</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success" id="tomboledit" name="tomboledit">Update</button>
                                    <input type="hidden" name="" id="hiddenuid">
                                </div>
                                </form>
                                <div id="notif"></div>
                                </div>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </main>
        <?php include("../template/footeruniversal.php") ?>