<?php include("../template/headermahasiswa.php"); 

if (isset($_POST["submit"])){
    $valid = TRUE; 
    $sks = test_input($_POST["sks"]);
    if (empty($sks)){
        $error_sks = "SKS is required";
        $valid = FALSE;
    }elseif (!preg_match("/^[0-9 ]*$/", $sks)){
        $error_sks = "Only number allowed";
        $valid = FALSE;
    }elseif((int)$sks > $sksmax){
        $error_sks = "SKS Maksimal ".$sksmax;
        $valid = FALSE;
    }

    $semester = test_input($_POST["semester"]);
    if (empty($semester)){
        $error_semester = "Semester is required";
        $valid = FALSE;
    }
    elseif (!preg_match("/^[0-9 ]*$/", $semester)){
        $error_semester = "Only number allowed";
        $valid = FALSE;
    }elseif((int)$semester > 14){
        $error_semester = "Semester Maksimal 14";
        $valid = FALSE;
    }

    if (!$_FILES['berkas_irs']['error']>0){
        $filename = $_FILES["berkas_irs"]["name"];
        $tempname = $_FILES["berkas_irs"]["tmp_name"];
        $folder = "../assets/irs/" . $filename;
        $allowed = array('pdf');
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $error_berkas_irs = 'Extensi Salah';
            $valid = FALSE;
        }
    }else{
        $error_berkas_irs = "IRS file is required";
        $valid = FALSE;
    }

    //Add data into database
    if ($valid){
        //assign a query
        $query = "UPDATE irs SET jumlah_sks = $sks ,semester_aktif = $semester ,berkas_irs = '$folder' WHERE nim= '$nim' "; 
        
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
    <div class="container-fluid px-0" style="width: 40%">
        <main>
        <h3 class="my-1" style="text-align: center">IRS Mahasiswa</h3>   
            <div class="card mt-3">
                <div class="card-header" style = "background-color:grey;" >
                    <div class = "justify-content-center align-items-center" style="display: flex; justify-content: space-between; align-items: center; width: 100%; padding-left: 32px; padding-right: 32px; padding-top: 5px; padding-bottom: 5px;">
                    <h3  style="text-align: center">Input Data IRS</h3>    
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
                            <label for="">Jumlah SKS yang diambil</label>
                            <div class="input-group">
                            <input id="sks" name="sks" type="number" aria-describedby="HelpBlock" class="form-control" placeholder = "Jumlah SKS maks adalah <?php echo $sksmax ?>">
                            </div>
                            <div class="error" style="color:red"><?php if (isset($error_sks)) echo $error_sks ?></div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Semester Aktif</label>
                            <div class="input-group">
                                <input id="semester" name="semester" type="number" aria-describedby="HelpBlock" class="form-control" placeholder = "Semester Yang Sedang Ditempuh">
                            </div>
                            <div class="error" style="color:red"><?php if (isset($error_semester)) echo $error_semester ?></div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="">Berkas IRS</label>
                            <div class="input-group">
                                <input id="berkas_irs" name="berkas_irs" type="file" aria-describedby="HelpBlock" class="form-control" accept="application/pdf">
                            </div>
                            <div class="error" style="color:red"><?php if (isset($error_berkas_irs)) echo $error_berkas_irs ?></div>
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