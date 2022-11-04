<?php include("../template/headermahasiswa.php"); 


if (isset($_POST["submit"])){
    $valid = TRUE; 
    $nilai = test_input($_POST["nilai"]);
    if (empty($nilai)){
        $error_nilai = "Score is required";
        $valid = FALSE;
    }
    else if(!filter_var($nilai, FILTER_VALIDATE_FLOAT)){
        $error_nilai = "Format nilai salah, gunakan format decimal 4.00";
        $valid = FALSE;
    }

    $status = $_POST["status"];
    if(!isset($_POST["status"])){
        $error_status = "Status is required";
        $valid = FALSE;
    }

    if (!$_FILES['berkas_pkl']['error']>0){
        $filename = $_FILES["berkas_pkl"]["name"];
        $tempname = $_FILES["berkas_pkl"]["tmp_name"];
        $folder = "../assets/pkl/" . $filename;
        $allowed = array('pdf');
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $error_berkas_pkl = 'Extensi Salah';
            $valid = FALSE;
        }
    }else{
        $error_berkas_pkl = "PKL file is required";
        $valid = FALSE;
    }

    //Add data into database
    if ($valid){
        //assign a query
        $query = "UPDATE `pkl` SET `Nilai`=$nilai,`Berkas_PKL`='$folder', `Status`='$status' WHERE `NIM`='$nim' "; 
        // Execute the query
        $result = $db->query($query);
        if (!$result){
            die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
        }else{
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
        <h3 class="my-3" style="text-align: center">PKL Mahasiswa</h3>
        <main>
        <div class="card mt-3">
        <div class="card-header" style = "background-color:grey;" >
        <div class = "justify-content-center align-items-center" style="display: flex; justify-content: space-between; align-items: center; width: 100%; padding-left: 32px; padding-right: 32px; padding-top: 5px; padding-bottom: 5px;">
                    <h3 class="my-1" style="text-align: center">Input Data PKL</h3>    
                    <div style="display: flex; justify-content: flex-start; align-items: center; flex-grow: 0; flex-shrink: 0; position: relative; gap: 8px;">
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
                            <label for="">Status PKL</label>
                            <div class="input-group">
                                <select id="status" name="status" type="text" aria-describedby="HelpBlock" class="form-select" required="required" >
                                    <option value="">----</option>
                                    <option value="Lulus">Lulus</option>
                                    <option value="Sedang Menempuh">Sedang Menempuh</option>
                                    <option value="Belum Aktif">Belum Aktif</option>
                                    <option value="Belum Lulus">Belum Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Nilai PKL</label>
                            <div class="input-group"> 
                                <input id="nilai" name="nilai" type="number" step="0.01" aria-describedby="HelpBlock" required="required" class="form-control">
                            </div>
                            <div class="error"><?php if (isset($error_nilai)) echo $error_nilai ?></div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Input Berkas PKL</label>
                            <div class="input-group">
                                <input id="berkas_pkl" name="berkas_pkl" type="file" aria-describedby="HelpBlock" required="required" class="form-control" accept = "application/pdf">
                            </div>
                            <div class="error"><?php if (isset($error_berkas_pkl)) echo $error_berkas_pkl ?></div>
                        </div>
                        <div class="form-group mb-4">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            <button name="cancel" type="cancel" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </div>

    <?php include("../template/footeruniversal.php") ?>
    
    