<?php
    include '../lib/connect.php';

    extract($_POST);
    
    if(isset($_POST['updateid']) && isset($_POST['updateid']) != ''){
        $id = $_POST['updateid'];
        $queryview = "SELECT * FROM mahasiswa WHERE NIM = '$id'";
        $data = mysqli_query($db,$queryview);
        $re = array();
        
        if(mysqli_num_rows($data) > 0){
            while ($row = mysqli_fetch_assoc($data)){
                $re = $row;
            }
        }
        echo json_encode($re);
    }

    if(isset($_POST['upid'])){
        $uid =$_POST['upid'];
        $upnama = $_POST['upnama'];
        $upalamat= $_POST['upalamat'];
        $upstat = $_POST['upstat'];
        $upnohp = $_POST['upnohp'];
        $queryedit = "UPDATE mahasiswa
        SET Nama='$upnama',
            Alamat='$upalamat',
            Status='$upstat',
            no_hp='$upnohp' 
        WHERE nim = $uid";
        if(mysqli_query($db,$queryedit)){
            echo "Data Terupdate";
        }
    }
?>