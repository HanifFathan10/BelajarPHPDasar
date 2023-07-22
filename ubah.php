<?php 
session_start();

if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

// ambil data di URL
$id = $_GET["id"];
// query data siswa berdasarkan id nya
$s = query("SELECT * FROM siswa WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"])) {
    if(ubah($_POST) > 0) {
        print "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        print "
        <script>
            alert('data gagal diubah');
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
    <h1>Ubah data Siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $s["id"]; ?>" >
        <input type="hidden" name="gambarLama" value="<?= $s["gambar"]; ?>" >
        <ul>
            <li>
                <label for="nama">Nama :</label>
                <input type="text" name="nama" id="nama" required value="<?= $s["nama"] ?>">
            </li>
            <li>
                <label for="kelas">Kelas :</label>
                <input type="text" name="kelas" id="kelas" required value="<?= $s["kelas"] ?>">
            </li>
            <li>
                <label for="umur">Umur :</label>
                <input type="text" name="umur" id="umur" required value="<?= $s["umur"] ?>">
            </li>
            <li>
                <label for="status">Status :</label>
                <input type="text" name="status" id="status" required value="<?= $s["status"] ?>">
            </li>
            <li>
                <label for="gambar">Gambar :</label> <br>
                <img src="img/<?= $s["gambar"] ?>"> <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>