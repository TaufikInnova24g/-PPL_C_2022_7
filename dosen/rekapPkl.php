<?php
session_start();
include("../template/headerdosen.php");
$query ="SELECT * FROM rekap_pkl ORDER BY nama DESC";  
$result = mysqli_query($db, $query);
$NIP_dosen = $db->query("SELECT dosen.NIP AS NIP_dosen FROM dosen,user WHERE dosen.username = user.username AND dosen.username = '$username'")->fetch_object()->NIP_dosen;
$lulusskripsi_2016 = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND skripsi.Status = 'Lulus' AND mahasiswa.Angkatan = 2016")->fetch_object()->jumlah;
$belumskripsi_2016 = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND (skripsi.Status = 'Belum Lulus' OR skripsi.Status = 'Belum Aktif') AND mahasiswa.Angkatan = 2016")->fetch_object()->jumlah;
$lulusskripsi_2017 = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND skripsi.Status = 'Lulus' AND mahasiswa.Angkatan = 2017")->fetch_object()->jumlah;
$belumskripsi_2017 = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND (skripsi.Status = 'Belum Lulus' OR skripsi.Status = 'Belum Aktif') AND mahasiswa.Angkatan = 2017")->fetch_object()->jumlah;
$lulusskripsi_2018 = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND skripsi.Status = 'Lulus' AND mahasiswa.Angkatan = 2018")->fetch_object()->jumlah;
$belumskripsi_2018 = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND (skripsi.Status = 'Belum Lulus' OR skripsi.Status = 'Belum Aktif') AND mahasiswa.Angkatan = 2018")->fetch_object()->jumlah;
$lulusskripsi_2019 = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND skripsi.Status = 'Lulus' AND mahasiswa.Angkatan = 2019")->fetch_object()->jumlah;
$belumskripsi_2019 = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND (skripsi.Status = 'Belum Lulus' OR skripsi.Status = 'Belum Aktif') AND mahasiswa.Angkatan = 2019")->fetch_object()->jumlah;
$lulusskripsi_2020 = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND skripsi.Status = 'Lulus' AND mahasiswa.Angkatan = 2020")->fetch_object()->jumlah;
$belumskripsi_2020 = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND (skripsi.Status = 'Belum Lulus' OR skripsi.Status = 'Belum Aktif') AND mahasiswa.Angkatan = 2020")->fetch_object()->jumlah;
$lulusskripsi_2021 = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND skripsi.Status = 'Lulus' AND mahasiswa.Angkatan = 2021")->fetch_object()->jumlah;
$belumskripsi_2021 = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND (skripsi.Status = 'Belum Lulus' OR skripsi.Status = 'Belum Aktif') AND mahasiswa.Angkatan = 2021")->fetch_object()->jumlah;

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
<div id="layoutSidenav_content">
<div>
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="text-center" style="border: #4609ee;" >
        <h2>Data Rekap  PKL Mahasiswa Informatika</h2>
        </div>
            <div class="card" style="border: #ccc; margin-top: 1cm;">
            <table class="table  mb-auto text-center" style="">
                    <thead>
                        <tr>
                            <th><button type="button" class="btn btn-primary"z onclick="btn_clik(this.value)" value="2016" style="background: #613fe5;width:100px">2016</button></th>
                            <th><button type="button" class="btn btn-primary" onclick="btn_clik(this.value)" value="2017" style="background: #613fe5;width:100px">2017</button></th>
                            <th><button type="button" class="btn btn-primary" onclick="btn_clik(this.value)" value="2018" style="background: #613fe5;width:100px">2018</button></th>
                            <th><button type="button" class="btn btn-primary" onclick="btn_clik(this.value)" value="2019" style="background: #613fe5;width:100px">2019</button></th>
                            <th><button type="button" class="btn btn-primary" onclick="btn_clik(this.value)" value="2020" style="background: #613fe5;width:100px">2020</button></th>
                            <th><button type="button" class="btn btn-primary" onclick="btn_clik(this.value)" value="2021" style="background: #613fe5;width:100px">2021</button></th>                            
                            <th><button type="button" class="btn btn-primary" onclick="btn_clik(this.value)" value="2022" style="background: #613fe5;width:100px">2022</button></th>
                            </tr>
                    </thead>
                  </table>
            </div>
            <div>      
        </section>  
           <br /><br />  
           <div class="container"> 
           <p><a type="button" class="btn btn-success button-add" href="add_pkl.php">(+) Tambah Data</a></p>   
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                                <tr>  
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>SKS</th>
                                <th>IPK</th>
                                <th>Status Kelulusan</th>
                                <th>Angkatan</th>
                                <th>Edit</th>
                               </tr>  
                          </thead>  
                          <?php 
                          $no = 1; 
                          while($row = mysqli_fetch_array($result))  
                          {  ?>
                            <tr>
                              <td><?php echo $no++ ?></td>
                              <td><?php echo $row['nama']?></td>
                              <td><?php echo $row['nim']?></td>
                              <td><?php echo $row['sks']?></td>
                              <td><?php echo $row['ipk']?></td>
                              <td><?php echo $row['status_kelulusan']?></td>
                              <td><?php echo $row['angkatan']?></td>
                              <td>
                                <a type="button" class="btn btn-warning button-edit" href="edit_pkl.php?idedit=<?php echo $row['id_mahasiswa']?>">Edit</a> 
                                <a type="button" class="btn btn-danger button-delete" href="delete_pkl.php?iddel=<?php echo $row['id_mahasiswa']?>" onclick="return confirm('Apakah data yang ingin di hapus sudah benar?')">Delete</a>
                              </td>
                          </tr> 
                        <?php } ?>  
                     </table>  
                </div>  
           </div> 
           </div>
             
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
    </main>

    <?php include("../template/footeruniversal.php")?>