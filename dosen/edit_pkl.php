<link href="./css/styles.css" rel="stylesheet" />
<?php
session_start();
include("../template/headerdosen.php");  
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$id = $_GET['idedit'];

// mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])){
    //execute the query
    $result = $db->query(" SELECT * FROM rekap_pkl WHERE id_mahasiswa=" .$id. " ");
    if (!$result){
        die ("Could not the query database: <br />" . $db->error);
    } else {
        while ($row = $result->fetch_object()){
            $nama = $row->nama;
            $nim = $row->nim;
            $sks = $row->sks;
            $ipk = $row->ipk;
            $status_kelulusan = $row->status_kelulusan;
            $angkatan = $row->angkatan;
            
        }
    }
}else{
    $valid = TRUE; //flag validasi
    if (isset($_POST["submit"])){
        $nama = test_input($_POST["nama"]);
        if ($nama == ''){
            $error_nama = "Nama harus diisi";
            $valid = FALSE;
        }

        $nim = test_input($_POST["nim"]);
        if ($nim == ''){
            $error_nim = "NIM harus diisi";
            $valid = FALSE;
        }

        $sks = test_input($_POST["sks"]);
        if ($sks == ''){
            $error_sks = "SKS harus disi";
            $valid = FALSE;
        }

        $ipk = test_input($_POST["ipk"]);
        if ($ipk == ''){
            $error_ipk = "IPK harus diisi";
            $valid = FALSE;
        }

        $status_kelulusan = test_input($_POST["status_kelulusan"]);
        if ($status_kelulusan == ''){
            $error_status_kelulusan = "status kelulusan harus diisi";
            $valid = FALSE;
        }

        $angkatan = test_input($_POST["angkatan"]);
        if ($angkatan == ''){
            $error_angkatan = "angkatan harus diisi";
            $valid = FALSE;
        }

        //update data into database
        if ($valid){
            //escape inputs data
            //asign a query
            $query = " UPDATE rekap_pkl SET nama='".$nama."', nim='".$nim."', sks='".$sks."' , ipk='".$ipk."',status_kelulusan='".$status_kelulusan."' , angkatan='".$angkatan."' WHERE id_mahasiswa=".$id." ";
            //execute the query
            $result = $db->query($query);
            if (!$result){
                die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
            } else{
                //ketika sudah di submit , maka akan langsung pindah ke halaman view_customer.php
                $db->close();
              echo "<script>alert('Data berhasil diupdate');window.location='rekapPkl.php';</script>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="../../assets/datatables/datatables.min.css"/>
        <link rel="stylesheet" href="../../assets/css/AdminLTE.min.css">
        <link rel="stylesheet" href="../../assets/css/skins/_all-skins.min.css">
        <title>Dashboard Operator</title>
    </head>
    <body class="hold-transition skin-blue sidebar-mini" >
    <div id="layoutSidenav_content">
    <section class="content-header">
        <div class="container mt-3">
            <div class="card ">
        <div class="card-header">Edit Data PKL</div>
                <div class="card-body">
                    <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?idedit=' .$id;?>">
                        <div class="form-group">
                            <label for="nama">Nama :</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama;?>">
                            <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                            <div class="text-danger"><?php if (isset($error_nama)) echo $error_nama;?></div>
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM:</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim;?>">
                            <div class="text-danger"><?php if (isset($error_nim)) echo $error_nim;?></div>
                        </div>
                        <div class="form-group">
                            <label for="sks">SKS:</label>
                            <input type="text" class="form-control" id="sks" name="sks" value="<?php echo $sks;?>">
                            <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                            <div class="text-danger"><?php if (isset($error_sks)) echo $error_sks;?></div>
                        </div>
                        <div class="form-group">
                            <label for="ipk">IPK:</label>
                            <input type="text" class="form-control" id="ipk" name="ipk" value="<?php echo $ipk;?>">
                            <!-- Fungsi isset() memeriksa apakah suatu variabel disetel, yang berarti variabel tersebut harus dideklarasikan dan bukan NULL. -->
                            <div class="text-danger"><?php if (isset($error_ipk)) echo $error_ipk;?></div>
                        </div>
                        <div class ="form-group">
                            <label for="status_kelulusan">status kelulusan:</label>
                            <select class="form-control" id="status_kelulusan" name="status_kelulusan">
                                <option value="lulus">lulus</option>
                                <option value="belum lulus">belum lulus</option>
                            </select>
                            <div class="text-danger"><?php if (isset($error_status_kelulusan)) echo $error_status_kelulusan;?></div>
                        </div>
                        <div class ="form-group">
                            <label for="angkatan">angkatan:</label>
                            <select class="form-control" id="angkatan" name="angkatan">
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                            <div class="text-danger"><?php if (isset($error_angkatan)) echo $error_angkatan;?></div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit">Submit</button>
                        <a href="rekapPkl.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>