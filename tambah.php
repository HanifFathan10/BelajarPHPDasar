<?php 
session_start();

if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"])) {

    

    // cek apakah data berhasil ditambahkan atau tidak 
    if(tambah($_POST) > 0) {
        print "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        print "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = 'index.php';
        </script>
    ";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data Siswa</title>
</head>
<body>
    <h1>Tambah data Siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="kelas">Kelas :</label>
                <input type="text" name="kelas" id="kelas" required>
            </li>
            <li>
                <label for="umur">Umur :</label>
                <input type="text" name="umur" id="umur" required>
            </li>
            <li>
                <label for="status">Status :</label>
                <input type="text" name="status" id="status" required>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>