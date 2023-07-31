<?php
include_once("connection.php");

if($_POST){

    $file_upload = $_FILES['photo'];

    if ($file_upload['name'] != ""){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $gender = $_POST['gender'];
        $agama = $_POST['agama'];
        $sekolah = $_POST['sekolah'];
        $photo = $file_upload['name'];

    $result = mysqli_query($conn,"INSERT INTO tabel_pendaftaran(nama, alamat, gender, agama, sekolah, profil_picture) VALUES('$nama','$alamat', '$gender', '$agama', '$sekolah','$photo')");
    
    move_uploaded_file($file_upload['tmp_name'],
        __DIR__."/uploads/". $photo);
    
    header ("location: list_pendaftar.php");
    }else {
        echo "Pendaftaran gagal";
    }

    /*
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah'];


    $result = mysqli_query($conn,"INSERT INTO tabel_pendaftaran(nama, alamat, gender, agama, sekolah) VALUES('$nama','$alamat', '$gender', '$agama', '$sekolah')");
    header ("location: list_pendaftar.php"); */
}


