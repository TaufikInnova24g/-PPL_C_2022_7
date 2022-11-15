<?php

require_once('../lib/connect.php');

$nama = $db->real_escape_string($_GET['nama']);
$query = " SELECT * FROM `mahasiswa` WHERE Nama LIKE '%". $nama . "%' ";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}

while($row = $result->fetch_object()){
    echo '<br>';
    echo 'NIM: '.$row->NIM.'<br >';
    echo 'Nama: '.$row->Nama.'<br >';
    echo 'Angkatan: '.$row->Angkatan.'<br >';
    echo 'Semester: '.$row->semester.'<br >';
}

$result-> free();
$db->close();
?>