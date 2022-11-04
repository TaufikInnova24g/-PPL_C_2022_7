<?php include("../template/headerdosen.php");
$NIP_dosen = $db->query("SELECT dosen.NIP AS NIP_dosen FROM dosen,user WHERE dosen.username = user.username AND dosen.username = '$username'")->fetch_object()->NIP_dosen;
$aktif_2016 = $db->query("SELECT COUNT(mahasiswa.NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen. " AND mahasiswa.Status = 'Aktif' AND mahasiswa.Angkatan = 2016")->fetch_object()->jumlah;
$aktif_2017 = $db->query("SELECT COUNT(mahasiswa.NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen. " AND mahasiswa.Status = 'Aktif' AND mahasiswa.Angkatan = 2017")->fetch_object()->jumlah;
$aktif_2018 = $db->query("SELECT COUNT(mahasiswa.NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen. " AND mahasiswa.Status = 'Aktif' AND mahasiswa.Angkatan = 2018")->fetch_object()->jumlah;
$aktif_2019 = $db->query("SELECT COUNT(mahasiswa.NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen. " AND mahasiswa.Status = 'Aktif' AND mahasiswa.Angkatan = 2019")->fetch_object()->jumlah;
$aktif_2020 = $db->query("SELECT COUNT(mahasiswa.NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen. " AND mahasiswa.Status = 'Aktif' AND mahasiswa.Angkatan = 2020")->fetch_object()->jumlah;
$aktif_2021 = $db->query("SELECT COUNT(mahasiswa.NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen. " AND mahasiswa.Status = 'Aktif' AND mahasiswa.Angkatan = 2021")->fetch_object()->jumlah;
$count_mhs_wali = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen)->fetch_object()->jumlah;
$count_mhs_wali_aktif = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen. " AND mahasiswa.Status = 'Aktif'")->fetch_object()->jumlah;
$count_mhs_wali_nonaktif = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen. " AND mahasiswa.Status = 'Cuti'")->fetch_object()->jumlah;
$count_mhs_wali_lulusPKL = $db->query("SELECT COUNT(pkl.NIM) AS jumlah FROM mahasiswa, pkl WHERE mahasiswa.NIM = pkl.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND pkl.Status = 'Lulus'")->fetch_object()->jumlah;
$count_mhs_wali_lulusSkripsi = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND skripsi.Status = 'Lulus'")->fetch_object()->jumlah;
?>
<div id="layoutSidenav_content">
    <main>
        <br>
        <div class="container-fluid px-4" style="width: 90%;">
        <div class="text-center" style="border: #4609ee;" >
        <h2>Data Rekap Status Mahasiswa Informatika</h2>
        </div>
            <div class="container-fluid mx-auto px-4" style="width: 80%;">
                <div class="row">
                    <div class="col">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 bg-info text-white">
                                            
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h1><?php echo $count_mhs_wali_aktif ?></h1>
                                                    </div>
                                                    <div class="card-subtitle">
                                                        <p>Jumlah Mahasiswa Aktif</p>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 bg-primary text-white">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h1><?php echo $count_mhs_wali_nonaktif ?></h1>
                                                    </div>
                                                    <div class="card-subtitle">
                                                        <p>Jumlah Mahasiswa Non Aktif</p>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 bg-success text-white">
                                            
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h1><?php echo $count_mhs_wali_lulusPKL ?></h1>
                                                    </div>
                                                    <div class="card-subtitle">
                                                        <p>Jumlah Mahasiswa Lulus Skripsi</p>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 bg-secondary text-white">
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h1><?php echo $count_mhs_wali_lulusSkripsi ?></h1>
                                                    </div>
                                                    <div class="card-subtitle">
                                                        <p>Jumlah Mahasiswa Lulus PKL</p>
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
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Semester</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = "SELECT * FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen;
                                $result = $db->query($query);
                                $i=1;
                                while ($row = $result->fetch_object()) {
                                    echo "<tr>
                                    <td>".$i."</td>
                                    <td>".$row->Nama."</td>
                                    <td>".$row->NIM."</td>
                                    <td>".$row->No_Hp."</td>
                                    <td>".$row->Alamat."</td>
                                    <td>".$row->Email."</td>
                                    <td>".$row->semester."</td>
                                    <td>".$row->Status."</td>
                                    <td><a onclick='view_data(".$row->NIM.")'></a>
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