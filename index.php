<?php 
session_start();

if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';
$siswa = query("SELECT * FROM siswa");

// tombol cari diclick
if ( isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="dist/output.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</head>
<body style="background-color: #191F22; color: #eaeaea;">
    <!-- navbar section -->
    <section>
        <div class="container mx-auto">
            <div class="row flex justify-between p-3">
                <div >
                    <a href="logout.php" class="hover:text-red-500 transition duration-300">Logout</a>
                </div>
                <div class="">
                    <a href="tambah.php" class="tambah-siswa hover:text-blue-500 transition duration-300">Tambah Data Siswa</a>
                </div>
            </div>
        </div>
    </section>
    <!-- navbar section END -->
    
    <!-- dafsearch -->
    <section>
        <div class="container mx-auto">
            <div class="row flex mt-3 px-3 ">
                <div class="">
                    <h1 class="font-bold text-2xl italic sm:text-3xl lg:text-4xl"><span class="text-slate-500">Daftar</span> Siswa</h1>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <form action="" method="post" class="w-full flex justify-center">
                        <input type="text" name="keyword" autofocus placeholder="masukan keyword" autocomplete="off" id="keyword" class="rounded-md mt-4 text-black text-xs sm:text-sm w-2/5 h-8">
                        <button type="submit" name="cari" id="tombol-cari">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- dafsearch END -->

    <!-- hero section -->
    <div id="container">
        <div class="row">
            <table class=" p-4 mt-2 gap-2 mx-auto text-black overflow-hidden text-[9px] sm:w-full sm:text-xs md:text-sm lg:text-lg w-full h-auto">
                <tr class="text-white font-semibold">
                    <th class="border bg-slate-600 border-white ">No.</th>
                    <th class="border bg-slate-600 border-white">Aksi</th>
                    <th class="border bg-slate-600 border-white">Gambar</th>
                    <th class="border bg-slate-600 border-white">Kelas</th>
                    <th class="border bg-slate-600 border-white">Nama</th>
                    <th class="border bg-slate-600 border-white">Umur</th>
                    <th class="border bg-slate-600 border-white">Status</th>
                </tr>

                <?php $i = 1;  ?>
                <?php foreach( $siswa as $row) : ?>
                <tr class="text-center ">
                    <td class="border bg-slate-300 border-white"><?= $i; ?></td>
                    <td class="border bg-slate-300 border-white">
                        <a href="ubah.php?id=<?= $row["id"]?>" class=" font-semibold hover:text-lime-400 transition duration-300">Ubah</a> | 
                        <a href="hapus.php?id=<?= $row["id"]?>" onclick="return confirm('yakin cuy?');" class="font-semibold hover:text-red-700 transition duration-300">Hapus</a>
                    </td>
                    <td class="border bg-slate-300 border-white"><img src="img/<?= $row["gambar"]?>" class="mx-auto w-16 h-auto sm:w-24 md:w-28 lg:w-32"></td>
                    <td class="border bg-slate-300 border-white"><?= $row["kelas"] ?></td>
                    <td class="border bg-slate-300 border-white"><?= $row["nama"] ?></td>
                    <td class="border bg-slate-300 border-white"><?= $row["umur"] ?></td>
                    <td class="border bg-slate-300 border-white"><?= $row["status"] ?></td>
                </tr>
                <?php $i++ ?>
                <?php endforeach ?>
            </table>
        </div>
    </div>
    <!-- hero section END -->
</body>
</html>