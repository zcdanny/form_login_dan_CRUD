<?php

    session_start();
    $boleh_akses = array(1);

    if(!isset($_SESSION['sudahLogin'])){
        header("Location: logout.php");
    }else{
        $level_user = $_SESSION['level_user'];
        if (!in_array($level_user,$boleh_akses)){
            header("Location: logout.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Comatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <main>
        <h1> Formulir Pendaftaran Siswa baru </h1>
        <form action="proses_add.php" method="post" 
        enctype="multipart/form-data">
            <label for="nama" class="display-block">Nama :</label>
            <input type="text" name="nama" id="nama">

            <label for="alamat" class="display-block">Alamat :</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea></br>

            <label for="gender" class="display-block">Jenis Kelamin :</label>
            <input type="radio" name="gender" id="gender" value="Laki-Laki">
            <label>Laki - Laki</label>
            <input type="radio" name="gender" id="gender" value="perempuan">
            <label>Perempuan</label>
            
            <label for="agama" class="display-block">Agama :</label>
             <select name="agama" id="agama">
                <option value="islam">Islam</option>
                <option value="katolik">Katolik</option>
                <option value="protestan">Kristen</option>
                <option value="hindu">Hindu</option>
                <option value="budha">Budha</option>
                <option value="aliran kepercayaan">Aliran Kepercayaan </option>
                </select>

                <label for="photo" class="display-block">Upload Photo :</label>
                <input type="file" name="photo" id="photo"
                accept="image/*">

                <label for="sekolah" class="display-block">Sekolah Asal : </label>
                <input type="text" name="sekolah" id="sekolah"></br>
                <input type="submit" value="tambah">
        </form>
    </main>  
</body>
</html>