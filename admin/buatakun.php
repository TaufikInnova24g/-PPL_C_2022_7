<?php include("../template/headeradmin.php"); ?>

<?php
    error_reporting(0);
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

        if(isset($_POST["tambah"])){
            $valid = TRUE;
            $nim = test_input($_POST["inputnim"]);
            if(empty($nim)){
                $error_nim = "NIM tidak boleh kosong!";
                $valid = FALSE;
            } elseif(!preg_match("/^[0-9]*$/",$nim)){
                $error_nim = "NIM hanya dapat berupa angka!";
                $valid = FALSE;
            }
        
            $nama = test_input($_POST["inputnama"]);
            if(empty($nama)){
                $error_nama = "Nama tidak boleh kosong!";
                $valid = FALSE;
            } elseif(!preg_match("/^[a-zA-Z ]*$/",$nama)){
                $error_nama = "Nama hanya dapat berupa alphabet dan spasi!";
                $valid = FALSE;
            }
        
            $email = test_input($_POST["inputemail"]);
            if($email == ""){
                $error_email = "E-mail harus diisi!";
                $valid = FALSE;
            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error_email = "Format Email Salah!";
                $valid = FALSE;
            }

            $nohp = test_input($_POST["inputhp"]);
            if(empty($nohp)){
                $error_hp = "No HP tidak boleh kosong!";
                $valid = FALSE;
            } elseif(!preg_match("/^[0-9]*$/",$nohp)){
                $error_hp = "No Handphone hanya dapat berupa angka!";
                $valid = FALSE;
            }
            $alamat = test_input($_POST["inputalamat"]);
            if(empty($alamat)){
                $error_alamat = "Alamat tidak boleh kosong!";
                $valid = FALSE;
            }
            if(!$_FILES['inputfoto']['error']>0){
                $filename = $_FILES["inputfoto"]["name"];
                $tempname = $_FILES["inputfoto"]["tmp_name"];
                $folder = "../assets/imginput/" . $filename;
                $allowed = array('jpeg', 'png', 'jpg', 'pjp', 'pjpeg', 'jfif');
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!in_array($ext, $allowed)) {
                    $error_foto = 'Extensi Salah';
                    $valid = FALSE;
                }
            }else{
                $error_foto = "Foto tidak boleh kosong!";
                $valid = FALSE;
            }
            $kabupaten=$_POST['inputkabupaten'];
            if(empty($_POST['inputkabupaten'])){
                $error_kabupaten = "Kabupaten tidak boleh kosong!";
                $valid = FALSE;
            }
            $doswal=$_POST['inputdosen'];
            if(empty($_POST['inputdosen'])){
                $error_dosen = "Dosen Wali tidak boleh kosong!";
                $valid = FALSE;
            }
            $username = str_replace(' ', '', $nama);
            
            if($valid){
                $queryakun = "INSERT INTO `mahasiswa` VALUES(".(int)$nim.",'$nama','$email','$alamat','$nohp',2022,1,'Aktif','$folder','$username',".(int)$kabupaten.",".(int)$doswal.")";
                $queryirs = $db -> query("INSERT INTO `irs`(`Semester_Aktif`, `Jumlah_SKS`, `Berkas_IRS`, `Status`, `NIM`) VALUES (1,22,NULL,'Sudah','$nim')");
                $querykhs = $db -> query("INSERT INTO `khs`(`Semester_Aktif`, `SKS_Semester`, `SKS_Kumulatif`, `IP_Semester`, `IP_Kumulatif`, `Berkas_KHS`, `Status`, `NIM`) VALUES (1,22,0,0,0,NULL,'Sudah','$nim')");
                $querypkl = $db -> query("INSERT INTO `pkl`(`Status`, `Nilai`, `Berkas_PKL`, `Status_Verif`, `NIM`) VALUES ('Belum Aktif',NULL,NULL,'Sudah','$nim')");
                $queryskripsi = $db -> query("INSERT INTO `skripsi`(`Status`, `Nilai`, `Berkas_IRS`, `Lama_Studi(tahun)`, `Tanggal_Sidang`, `Status_Verif`, `NIM`) VALUES ('Belum Aktif',NULL,NULL,0,NULL,'belum','$nim')");
                $result = $db -> query($queryakun);
                
                if(!$result) {
                    die("Tidak bisa menyelesaikan query </br>". $db -> error."</br> Query:".$query);
                }else{
                    move_uploaded_file($tempname, $folder);
                    $stat_db = "Berhasil Di Input";
                }
            }
            else{
                $stat_db = "Gagal Di Input";
            }
        }
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid" style="width: 70%;">
            <h3 class="my-3">Buat Akun Baru</h3>
            <div class="row">
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            <b>Input Data</b>
                        </div>
                        <div class="card-body">
                            <div class="container overflow-hidden">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="inputnim" class="col-sm-2 col-form-label">NIM</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="inputnim" 
                                            name="inputnim"
                                            value="<?php if(isset($nim)) echo $nim ?>">
                                            <div class="error" style="color:red"><?php if(isset($error_nim)) echo $error_nim ?></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputemail" class="col-sm-2 col-form-label">E-mail</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputemail" 
                                            name="inputemail"
                                            value="<?php if(isset($email)) echo $email ?>">
                                            <div class="error" style="color:red"><?php if(isset($error_email)) echo $error_email ?></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputnama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputnama" 
                                            name="inputnama"
                                            value="<?php if(isset($nama)) echo $nama ?>">
                                            <div class="error" style="color:red"><?php if(isset($error_nama)) echo $error_nama ?></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputnama" class="col-sm-2 col-form-label">Dosen Wali</label>
                                        <div class="col-sm-10">
                                            <select type="select" class="form-select" id="inputdosen" 
                                            name="inputdosen">
                                            <option value="">-- Dosen Wali --</option>
                                            <?php
                                                $dos = "SELECT * FROM dosen WHERE Status!='Cuti'";
                                                $resultdosen = $db->query($dos);
                                                while ($namados = $resultdosen->fetch_object()){
                                                    echo
                                                    '<option value="'.$namados->NIP.'">'.$namados->Nama.'</option>';
                                                }
                                            ?>
                                            </select>
                                            <div class="error" style="color:red"><?php if(isset($error_kabupaten)) echo $error_kabupaten ?></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputhp" class="col-sm-2 col-form-label">No HP</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="inputhp" 
                                            name="inputhp" value="<?php if(isset($nohp)) echo $nohp ?>">
                                            <div class="error" style="color:red"><?php if(isset($error_hp)) echo $error_hp ?></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputnama" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" id="inputalamat" 
                                            name="inputalamat" 
                                            value="<?php if(isset($alamat)) echo $alamat ?>"><?php if(isset($alamat)) echo $alamat ?></textarea>
                                            <div class="error" style="color:red"><?php if(isset($error_alamat)) echo $error_alamat ?></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputnama" class="col-sm-2 col-form-label">Kabupaten</label>
                                        <div class="col-sm-10">
                                            <select type="select" class="form-select" id="inputkabupaten" 
                                            name="inputkabupaten">
                                            <option value="">-- Kabupaten Asal --</option>
                                            <?php
                                                $kabquery = "SELECT * FROM kabupaten";
                                                $rslt = $db->query($kabquery);
                                                while ($namakab = $rslt->fetch_object()){
                                                    echo
                                                    '<option value="'.$namakab->kode.'">'.$namakab->nama.'</option>';
                                                }
                                            ?>
                                            </select>
                                            <div class="error" style="color:red"><?php if(isset($error_kabupaten)) echo $error_kabupaten ?></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="" class="col-sm-2 col-form-label">Upload Foto</label>
                                        <div class="col-sm-10">
                                            <input id="inputfoto" name="inputfoto" type="file" class="form-control" accept="image/png, image/jpg, image/jpeg">
                                            <div class="error" style="color:red"><?php if(isset($error_foto)) echo $error_foto ?></div>
                                        </div>
                                    </div>
                                    <button type="submit" name="tambah" value="tambah" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div><h5><?php echo $stat_db ?><h5></div>
                </div>
            </div>
    </main>


    <?php include("../template/footeruniversal.php"); ?>