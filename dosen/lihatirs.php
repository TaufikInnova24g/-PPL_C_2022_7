<?php include("../template/headerdosen.php");

$querylihatirs = "SELECT mahasiswa.NIM,mahasiswa.Nama FROM mahasiswa,irs WHERE mahasiswa.NIM = irs.NIM AND irs.status!='Belum'";
$result = $db->query($querylihatirs);



?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="width: 80%;">
            <h3 class="mt-4 mb-4">Verifikasi Berkas -> IRS -> Lihat</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <b>Belum Terverifikasi</b>
                    <a class="btn btn-danger float-end" role="button" href="verifirs.php">Back</a>
                </div>
                <div class="card-body">
                    <table class="table" id="datatablesSimple1">
                        <thead class="table-light">
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>240601XXXXXXXX</td>
                                <td>Tiger Nixon</td>
                                <td><a class='btn btn-primary' href="#" id="verif" data-bs-toggle="modal"
                                        data-bs-target="#verifModal">Verify</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mb-4">
                <div class="row row-cols-2">
                    <div class="col">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Semester Aktif</h5>
                            </div>
                            <input type="text" name="input1" id="input1" class="form-control" disabled>
                            <i class="fa fa-circle-info"></i><small> Semester yang ditempuh TP 2022/2023</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Jumlah SKS yang Diambil</h5>
                            </div>
                            <input type="text" name="input2" id="input2" class="form-control" disabled>
                            <i class="fa fa-circle-info"></i><small> IP Semester Lalu : 3.9 - Maksimum SKS 24</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Berkas IRS</h5>
                            </div>
                            <a href="#" class="btn btn-success" role="button" id="pdf" data-bs-toggle="modal"
                                data-bs-target="#pdfModal">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="verifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Data Verified</h5>
                </div>
                <div class="modal-body">
                    Data updated and verified.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="window.location.href='verifirs.php'"
                        data-bs-dismiss="modal"> OK</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Berkas IRS</h5>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <embed src="../Files/contoh.pdf" frameborder="0" width="100%" height="500px">
                </div>
            </div>
        </div>
    </div>

    <?php include("../template/footeruniversal.php")?>