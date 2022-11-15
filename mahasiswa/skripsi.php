<?php include("../template/headermahasiswa.php"); 

if (isset($_POST["submit"])){
        $valid = TRUE; 
        $nilai = test_input($_POST["nilai"]);
        if (empty($nilai)){
            $error_nilai = "Score is required";
            $valid = FALSE;
        }
        elseif (!preg_match("/^[A-D ]*$/", $nilai)){
            $error_nilai = "Only character allowed";
            $valid = FALSE;
        }

        $lama_studi = test_input($_POST["lama_studi"]);
        if (empty($lama_studi)){
            $error_lama_studi = "Length of study is required";
            $valid = FALSE;
        }
        elseif (!preg_match("/^[0-9 ]*$/", $lama_studi)){
            $error_lama_studi = "Only number allowed";
            $valid = FALSE;
        }

        $status = $_POST["status"];
        if(!isset($_POST["status"])){
            $error_status = "Status is required";
            $valid = FALSE;
        }

        $tanggal_sidang = $_POST["tanggal_sidang"];
        if (!isset($tanggal_sidang)){
            $error_tanggal_sidang = "Date of trial thesis is required";
            $valid = FALSE;
        }

        if (!$_FILES['berkas_skripsi']['error']>0){
            $filename = $_FILES["berkas_skripsi"]["name"];
            $tempname = $_FILES["berkas_skripsi"]["tmp_name"];
            $folder = "../assets/skripsi/" . $filename;
            $allowed = array('pdf');
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                $error_berkas_skripsi = 'Extensi Salah';
                $valid = FALSE;
            }
        }else{
            $error_berkas_skripsi = "Skripsi file is required";
            $valid = FALSE;
        }

        //Add data into database
        if ($valid){

            $query = "UPDATE skripsi SET Status='$status',Nilai='$nilai',Berkas_IRS='$folder',Lama_Studi_tahun=$lama_studi, Tanggal_Sidang='$tanggal_sidang' WHERE nim = '$nim' "; 
            // Execute the query
            $result = $db->query($query);
            if (!$result){
                die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
            } else{
                move_uploaded_file($tempname, $folder);
                $stat_db = "Berhasil Di Input";
            }
            
        }else{
            $stat_db = "Gagal Di Input";
        }
}
?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4" style="width: 40%">
        <h3 class="my-3" style="text-align: center">Skripsi Mahasiswa</h3>
        <main>
        <div class="card mt-3">
        <div class="card-header" style = "background-color:grey;" >
        <div class = "justify-content-center align-items-center" style="display: flex; justify-content: space-between; align-items: center; width: 100%; padding-left: 32px; padding-right: 32px; padding-top: 5px; padding-bottom: 5px;">
                    <h3 class="my-3" style="text-align: center">Input Data Skripsi</h3>    
                    <div style="display: flex; justify-content: flex-start; align-items: center; flex-grow: 0; flex-shrink: 0; position: relative; gap: 8px;">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#DEE1FD"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 7C12.5523 7 13 7.44772 13 8V12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12V8C11 7.44772 11.4477 7 12 7Z" fill="#DEE1FD"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11 16C11 15.4477 11.4477 15 12 15H12.01C12.5623 15 13.01 15.4477 13.01 16C13.01 16.5523 12.5623 17 12.01 17H12C11.4477 17 11 16.5523 11 16Z" fill="#DEE1FD"></path>
                            </svg>
                           
                        </div>
                        <div style="display: flex; justify-content: flex-start; align-items: center; flex-grow: 0; flex-shrink: 0; position: relative; gap: 24px;">
                            <p style="flex-grow: 0; flex-shrink: 0; font-size: 18px; font-weight: 600; text-align: left; color: #fff;">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-irs" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                            <label for="">Status Skripsi</label>
                            <div class="input-group">
                                <select id="status" name="status" type="text" aria-describedby="HelpBlock" class="form-select">
                                <option value="">--</option>
                                    <option value="Lulus">Lulus</option>
                                    <option value="Sedang Menempuh">Sedang Menempuh</option>
                                    <option value="Belum Aktif">Belum Aktif</option>
                                    <option value="Belum Lulus">Belum Lulus</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Nilai</label>
                            <div class="input-group">
                                <select id="nilai" name="nilai" type="text" aria-describedby="HelpBlock" required="required" class="form-select">
                                <option value="">--</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                            <div class="error"><?php if (isset($error_nilai)) echo $error_nilai ?></div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Lama Studi</label>
                            <div class="input-group">
                                <input id="lama_studi" name="lama_studi" type="number" aria-describedby="HelpBlock" required="required" class="form-control">
                            </div>
                            <div class="error"><?php if (isset($error_lama_studi)) echo $error_lama_studi ?></div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Tanggal Sidang</label>
                            <div class="input-group date">
                                <input id="tanggal_sidang" name="tanggal_sidang" type="date" aria-describedby="HelpBlock" required="required" class="form-control">
                            </div>
                            <div class="error"><?php if (isset($error_tanggal_sidang)) echo $error_tanggal_sidang ?></div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Input Berkas Sidang Skripsi</label>
                            <div class="input-group">
                                <input id="berkas_skripsi" name="berkas_skripsi" type="file" aria-describedby="HelpBlock" required="required" class="form-control" accept = "application/pdf">
                            </div>
                            <div class="error"><?php if (isset($error_berkas_skripsi)) echo $error_berkas_skripsi ?></div>
                        </div>
                        <div class="form-group mb-4">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </div>

    <?php include("../template/footeruniversal.php") ?>