<?php include("../template/headerdosen.php");?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="width: 80%;">
            <h3 class="mt-4 mb-4">Verifikasi Berkas PKL</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <b>Belum Terverifikasi</b>
                </div>
                <div class="card-body">
                    <table class="table dataTable" id="datatablesSimple1">
                        <thead class="table-light">
                        <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $query = "SELECT mahasiswa.NIM,mahasiswa.Nama FROM mahasiswa,pkl WHERE mahasiswa.NIM = pkl.NIM AND pkl.status_verif ='Belum'";
                                $result = $db->query($query);
                                $i = 1;
                                while ($row = $result->fetch_object()) {
                                    echo "<tr>
                                    <td>".$i."</td>
                                    <td>".$row->NIM."</td>
                                    <td>".$row->Nama."</td>
                                    <td><a class='btn btn-primary' href='lihatpkl.php'>Lihat</a></td>";
                                    $i++;                        
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <b>Sudah Terverifikasi</b>
                </div>
                <div class="card-body">
                    <table class="table dataTable" id="datatablesSimple2">
                        <thead class="table-light">
                        <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                $query = "SELECT mahasiswa.NIM,mahasiswa.Nama FROM mahasiswa,pkl WHERE mahasiswa.NIM = pkl.NIM AND pkl.status_verif !='Belum'";
                                $result = $db->query($query);
                                $i = 1;
                                while ($row = $result->fetch_object()) {
                                    echo "<tr>
                                    <td>".$i."</td>
                                    <td>".$row->NIM."</td>
                                    <td>".$row->Nama."</td>
                                    <td><a class='btn btn-primary' href='lihatpkl.php'>Lihat</a></td>";
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