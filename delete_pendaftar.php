<?php
    

    session_start();
    include_once("connection.php");
    $boleh_akses = array(1);

    if(!isset($_SESSION['sudahLogin'])){
        header("Location: logout.php");
    }else{
        $level_user = $_SESSION['level_user'];
        if (!in_array($level_user,$boleh_akses)){
            header("Location: logout.php");
        }else{
            $id_pendaftar = $_GET['id_pendaftar'];
    
            $$result = mysqli_query($conn,"DELETE FROM tabel_pendaftaran WHERE id_pendaftar=$id_pendaftar");
            header ("location: list_pendaftar.php");

        }
    }
?>