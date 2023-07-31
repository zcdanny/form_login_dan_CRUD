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
        <?php 

        function showSelectedRadio($value_a, $value_b){
            $view = "";
            if ($value_a == $value_b){
                $view = "checked";
            }

            return $view;
        }

        function showSelectedCombo($value_a, $value_b){
            $view = "";
            if ($value_a == $value_b){
                $view = "selected";
            }

            return $view;
        }
        include_once("connection.php");
        $id_pendaftar = $_GET['id_pendaftar'];
        
        $result= mysqli_query($conn,"SELECT * FROM tabel_pendaftaran WHERE id_pendaftar=$id_pendaftar");
        while($user_data = mysqli_fetch_array($result)) {
            $nama = $user_data['nama'];
            $alamat = $user_data['alamat'];
            $gender = $user_data['gender'];
            $agama = $user_data['agama'];
            $sekolah = $user_data['sekolah'];
            $photo = $user_data['profil_picture'];
        }
        ?>
        <h1> Edit Formulir Pendaftaran Siswa baru </h1>

        <a href="index.php">Home</a>

        <form action="proses_edit.php" method="post" enctype="multipart/form-data">
            <label class="display-block" for="nama" >Nama :</label>
            <input type="text" name="nama" id="nama" value="<?php echo $nama;?>">

            <label class="display-block" for="alamat">Alamat :</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10"><?php echo $alamat;?></textarea>

            <label class="display-block" for="gender">Jenis Kelamin :</label>
            <input type="radio" name="gender" id="gender" value="Laki-Laki"
            <?php
                echo showSelectedRadio("Laki-Laki",$gender);
            ?>
            >
            <label>Laki - Laki</label>
            <input type="radio" name="gender" id="gender" value="perempuan"
            <?php
                echo showSelectedRadio("perempuan",$gender);
            ?>>
            <label>Perempuan</label>
            
            <label class="display-block" for="agama">Agama :</label>
             <select name="agama" id="agama">
                <option value="islam"<?php echo showSelectedCombo ("islam",$agama);?>>Islam</option>
                <option value="katolik"<?php echo showSelectedCombo ("katolik",$agama);?>>Katolik</option>
                <option value="protestan"<?php echo showSelectedCombo ("protestan",$agama);?>>Kristen</option>
                <option value="hindu"<?php echo showSelectedCombo ("hindu",$agama);?>>Hindu</option>
                <option value="budha"<?php echo showSelectedCombo ("budha",$agama);?>>Budha</option>
                <option value="aliran kepercayaan"<?php echo showSelectedCombo ("aliran kepercayaan",$agama);?>>Aliran Kepercayaan </option>
                </select>
                <label for="photo" class="display-block">Upload Photo :</label>

                <img class="img-before" src="uploads/<?php echo $photo; ?>" alt="">
                <input type="file" name="photo" id="photo" accept="image/*">

                <label class="display-block" for="sekolah">Sekolah Asal : </label>
                <input type="text" name="sekolah" id="sekolah"
                value="<?php echo $sekolah;?>">
                <input type="hidden" name="id_pendaftar"
                value="<?php echo $id_pendaftar;?>">
                <input type="submit" value="Edit">
        </form>
    </main>  
</body>
</html>