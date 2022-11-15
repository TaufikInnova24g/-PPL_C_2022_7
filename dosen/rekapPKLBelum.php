<?php include("../template/headerdosen.php");
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="width: 80%;">
            <h3 class="mt-4 mb-4">Rekap PKL</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <b>Rekap PKL Mahasiswa Informatika</b>
                </div>
                <div class="card-body">
                    <div class="row row-cols-9 align-items-center m-2">
                        <div class="col"><b>2016</b></div>
                        <div class="col"><b>2017</b></div>
                        <div class="col"><b>2018</b></div>
                        <div class="col"><b>2019</b></div>
                        <div class="col"><b>2020</b></div>
                        <div class="col"><b>2021</b></div>
                        <div class="col"></div>
                    </div>
                    <div class="row row-cols-9 align-items-center m-2">
                        <div class="col"><a class="btn btn-success" role="button" href="#">121</a></div>
                        <div class="col"><a class="btn btn-success" role="button" href="#">121</a></div>
                        <div class="col"><a class="btn btn-success" role="button" href="#">121</a></div>
                        <div class="col"><a class="btn btn-success" role="button" href="#">121</a></div>
                        <div class="col"><a class="btn btn-success" role="button" href="#">121</a></div>
                        <div class="col"><a class="btn btn-success" role="button" href="#">121</a></div>
                        <div class="col"><a class="btn btn-success" role="button" href="#"></a> Sudah</div>
                    </div>
                    <div class="row row-cols-9 align-items-center m-2">
                        <div class="col"><a style="color: #fff" class="btn btn-info" role="button" href="#">2</a></div>
                        <div class="col"><a style="color: #fff" class="btn btn-info" role="button" href="#">2</a></div>
                        <div class="col"><a style="color: #fff" class="btn btn-info" role="button" href="#">2</a></div>
                        <div class="col"><a style="color: #fff" class="btn btn-info" role="button" href="#">2</a></div>
                        <div class="col"><a style="color: #fff" class="btn btn-info" role="button" href="#">2</a></div>
                        <div class="col"><a style="color: #fff" class="btn btn-info" role="button" href="rekapPKLBelum.php">2</a></div>
                        <div class="col"><a class="btn btn-info" role="button" href="#"></a> Belum</div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <b>Belum Terverifikasi</b>
                </div>
                <div class="card-body">
                    <table class="table" id="datatablesSimple1">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Angkatan</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Angkatan</th>
                                <th>Nilai</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Tiger Nixon</td>
                                <td>240601XXXXXXXX</td>
                                <td>2021</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Tiger Nixon</td>
                                <td>240601XXXXXXXX</td>
                                <td>2021</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <a style="color: #fff" class="btn btn-primary float-end" role="button" href="verifkhs.php">Cetak</a>

            <!-- Modal -->
            <div class="modal fade" id="verifModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Data Verified</h5>
                        </div>
                        <div class="modal-body">
                            Data updated and verified.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='verifpkl.php'"
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Berkas PKL</h5>
                            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <embed src="../Files/contoh.pdf" frameborder="0" width="100%" height="500px">
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <?php include("../template/footeruniversal.php")?>