<?php

require '../function.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM siswa WHERE nama LIKE '%$keyword%' OR kelas LIKE '%$keyword%' OR umur LIKE '%$keyword%' OR status LIKE '%$keyword%'";
$siswa = query($query);
?>

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