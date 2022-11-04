<?php

include("../template/headerdosen.php");  

    if(isset($_GET['iddel'])){
        $delete = mysqli_query($db, "DELETE FROM rekap_skripsi WHERE id_mahasiswa = '".$_GET['iddel']."'");
        echo '<script>window.location="rekapSkripsi.php"</script>';
    }