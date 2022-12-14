<?php include("../template/headermahasiswa.php"); ?>
<?php
    //get mahasiswa nim from session
    // $id = $_GET['nim'];
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    

    if (!isset($_POST["submit"])) {
        $query = "SELECT * FROM mahasiswa WHERE nim='".$nim."' ";
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br />".$db->error."<br>Query: ".$query);
        }
        else{
            while($row = $result->fetch_object()){
                $nim = $row->nim;
                $name = $row->nama;
                $email = $row->email;
                $nohp = $row->no_hp;
            }
        }
        $query2 = "SELECT * FROM user WHERE nim=".$nim." ";
        $result = $db->query($query);
        if (!$result) {
            die ("Could not query the database: <br />".$db->error."<br>Query: ".$query);
        }
        else{
            while($row = $result->fetch_object()){
                $email_univ = $row->email;
            }
        }
    }
        else {
            $valid = TRUE;
            $nim = test_input($_POST["nim"]);
            if(empty($nim)){
                $error_nim = "NIM tidak boleh kosong!";
                $valid = FALSE;
            } elseif(!preg_match("/^[0-9]*$/",$nim)){
                $error_nim = "NIM hanya dapat berupa angka!";
                $valid = FALSE;
            }
        
            $name = test_input($_POST["name"]);
            if(empty($name)){
                $error_name = "Nama tidak boleh kosong!";
                $valid = FALSE;
            } elseif(!preg_match("/^[a-zA-Z ]*$/",$name)){
                $error_name = "Nama hanya dapat berupa alphabet dan spasi!";
                $valid = FALSE;
            }
        
            $email = $_POST["email"];
            if($email == ""){
                $error_email = "E-mail harus diisi!";
                $valid = FALSE;
            } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error_email = "Format email salah";
                $valid = FALSE;
            }

            $nohp = test_input($_POST["nohp"]);
            if(empty($nohp)){
                $error_hp = "No HP tidak boleh kosong!";
                $valid = FALSE;
            } elseif(!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/",$nohp)){
                $error_hp = "No Handphone hanya dapat berupa angka!";
                $valid = FALSE;
            }

            $email_univ = test_input($_POST["email_univ"]);
            if($email_univ == ""){
                $error_email_univ = "E-mail harus diisi!";
                $valid = FALSE;
            } elseif(!filter_var($email_univ, FILTER_VALIDATE_EMAIL)){
                $error_email_univ = "Format email salah";
                $valid = FALSE;
            }          

            if($valid){
                $query = "UPDATE mahasiswa SET name='".$name."', nim='".$nim."', email='".$email."', nohp='".$nohp."', email_univ='".$email_univ."',";
                $result = $db -> query($query);
                if (move_uploaded_file($tempname, $folder)) {
                    echo "<h3>  Image uploaded successfully!</h3>";
                }
                if(!$result) {
                    die("Tidak bisa menyelesaikan query </br>". $db -> error."</br> Query:".$query);
                } else {
                    $db -> close();
                    header("Location: dashboardMS.php");
                }
            }
        }
?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4" style="width: 40%">
        <h3 class="my-3" style="text-align: center">Dashboard -> Update Data</h3>
        <main>
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; padding-left: 32px; padding-right: 32px; padding-top: 16px; padding-bottom: 16px; background: #586af5;">
                        <div style="display: flex; justify-content: flex-start; align-items: center; flex-grow: 0; flex-shrink: 0; position: relative; gap: 8px;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-grow: 0; flex-shrink: 0; width: 24px; height: 24px; position: relative;" preserveAspectRatio="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#DEE1FD"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 7C12.5523 7 13 7.44772 13 8V12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12V8C11 7.44772 11.4477 7 12 7Z" fill="#DEE1FD"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11 16C11 15.4477 11.4477 15 12 15H12.01C12.5623 15 13.01 15.4477 13.01 16C13.01 16.5523 12.5623 17 12.01 17H12C11.4477 17 11 16.5523 11 16Z" fill="#DEE1FD"></path>
                            </svg>
                            <p style="flex-grow: 0; flex-shrink: 0; text-align: left; color: #fff;">
                                <span style="flex-grow: 0; flex-shrink: 0; font-size: 16px; font-weight: 500; text-align: left; color: #fff;">Data
                                    yang sudah dimasukkan tidak dapat diubah</span><br /><span style="flex-grow: 0; flex-shrink: 0; font-size: 13px; text-align: left; color: #fff;">Jika ingin
                                    ada perubahan data, hubungi operator program studi segera !</span>
                            </p>
                        </div>
                        <div style="display: flex; justify-content: flex-start; align-items: center; flex-grow: 0; flex-shrink: 0; position: relative; gap: 24px;">
                            <p style="flex-grow: 0; flex-shrink: 0; font-size: 18px; font-weight: 600; text-align: left; color: #fff;">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form class="form-irs">
                        <div class="form-group mb-3">
                            <label for="">Nama Lengkap</label>
                            <div class="input-group">
                                <input id="name" name="name" type="text" aria-describedby="HelpBlock" class="form-control" value="<?= $name; ?>">
                                <div class="error"><?php if (isset($error_name)) echo $error_name ?></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">NIM</label>
                            <div class="input-group">
                                <input id="nim" name="nim" type="text" aria-describedby="HelpBlock" class="form-control" value="<?= $nim; ?>">
                                <div class="error"><?php if (isset($error_nim)) echo $error_nim ?></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email Pribadi</label>
                            <div class="input-group">
                                <input id="email" name="email" type="text" aria-describedby="HelpBlock" class="form-control" value="<?= $email; ?>">
                                <div class="error"><?php if (isset($error_email)) echo $error_email ?></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Nomor Handphone</label>
                            <div class="input-group">
                                <input id="nohp" name="nohp" type="text" aria-describedby="HelpBlock" class="form-control" value="<?= $nohp; ?>">
                                <div class="error"><?php if (isset($error_nohp)) echo $error_nohp ?></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email Universitas</label>
                            <div class="input-group">
                                <input id="email_univ" name="email_univ" type="text" aria-describedby="HelpBlock" class="form-control" value="<?= $email_univ; ?>" disabled>
                                <div class="error"><?php if (isset($error_email_univ)) echo $error_email_univ ?></div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Program Studi</label>
                            <div class="input-group">
                                <input id="prodi" name="prodi" type="text" aria-describedby="HelpBlock" class="form-control" placeholder="S1 Informtika" disabled></input>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Fakultas</label>
                            <div class="input-group">
                                <input id="fakultas" name="fakultas" type="text" aria-describedby="HelpBlock" class="form-control" disabled placeholder="Sains dan Matematika"></input>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Upload Foto</label>
                            <div class="input-group">
                                <input id="foto" name="foto" type="file" aria-describedby="HelpBlock" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </main>
    </div>

    <?php include("../template/footeruniversal.php") ?>