<?php include("../template/headerdosen.php");
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="width: 80%;">
            <h3 class="mt-4 mb-4">Progres Studi</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <b>Pencarian Progres Studi Individu</b>
                </div>
                <div class="card-body">
                    <input type="text" name="mhs" id="mhs" class="form-control" oninput="showMahasiswa(this.value)"
                        placeholder=" Masukkan nama mahasiswa ...">
                        <?php require_once('../lib/connect.php');

                        // Asign A Query
                        $query = "SELECT * FROM mahasiswa ORDER BY NIM";
                        $result = $db->query($query);

                        if (!$result) {
                            die("Could not query the database: <br>" . $db->error);
                        }

                        $result->free();
                        $db->close();
                        ?>
                </div>
            </div>
            <div class="card mb-4" id="detailMHS"></div>
            <a style="color: #fff" class="btn btn-primary float-end" role="button" href="verifkhs.php">Cetak</a>            
    </main>

    <?php include("../template/footeruniversal.php")?>