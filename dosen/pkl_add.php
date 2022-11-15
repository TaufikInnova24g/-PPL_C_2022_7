<?php
include("../template/headerdosen.php");  
$nama = $db->real_escape_string($_POST['nama']);
$nim = $db->real_escape_string($_POST['nim']);
$sks = $db->real_escape_string($_POST['sks']);
$ipk = $db->real_escape_string($_POST['ipk']);
$status_kelulusan = $db->real_escape_string($_POST['status_kelulusan']);
$angkatan = $db->real_escape_string($_POST['angkatan']);


$query = "INSERT INTO rekap_pkl (nama, nim, ipk, sks, status_kelulusan,  angkatan) VALUES ('".$nama."','".$nim."','".$ipk."','".$sks."','".$status_kelulusan."','".$angkatan."')"; 
// Execute the query
$result = $db->query($query);
if (!$result) {
    echo '<div class="alert alert-danger alert-dismissible">
                <strong>Error!</strong> Could not query the database<br>' .
        $db->error . '<br>query = ' . $query .
        '</div>';
} else {
    echo '<div class="alert alert-success alert-dismissible">
                <strong>Success!</strong> Data has been added.<br>
                nama: ' . $_POST['nama'] . '<br>
                nim: ' . $_POST['nim'] . '<br>
                ipk: ' . $_POST['ipk'] . '<br>
                sks: ' . $_POST['sks'] . '<br>
                status_kelulusan: ' . $_POST['status_kelulusan'] . '<br>
                angkatan: ' . $_POST['angkatan'] . '<br>
                </div>';
}
//close db connection
$db->close();