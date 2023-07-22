<?php 
require 'function.php';

if ( isset($_POST["register"])) {
    if (registrasi($_POST) > 0 ) {
        print
        "<script>
            alert('user baru berhasil ditambahkan!')
        </script>";
    } else {
        print mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>   
    <link href="dist/output.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <section class="bg-slate-700 h-screen flex justify-center items-center">
        <div class="w-3/4 md:w-3/5 lg:w-5/12 lg:mx-auto bg-neutral-200 flex rounded-2xl justify-center">
            <div class="col flex items-center justify-center">
                <img src="img/hanifganteng.png" class="w-48 sm:w-52 md:w-56 lg:w-60 lg:mb-1">
            </div>
            <div class="col flex items-center justify-center ">
                <form action="" method="post">
                    <h1 class="text-2xl font-semibold mt-10 text-center text-slate-900 lg:text-3xl">Register</h1>
                    <ul class="mt-8 flex flex-col gap-4 m-3">
                        <li class="flex items-center">
                            <i class="fa-solid fa-user ml-2 absolute text-neutral-400"></i>
                            <input type="text" name="username" id="username" placeholder="username" autocomplete="off" class="w-full rounded-lg bg-neutral-100 focus:bg-white shadow-sm h-8 lg:h-10 pl-8 outline-none transition-all duration-150 text-xs lg:text-md" />
                            <label for="username"></label>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-lock ml-2 absolute text-neutral-400"></i>
                            <input type="password" name="password" id="password" placeholder="password" class="w-full rounded-lg bg-neutral-100 focus:bg-white shadow-sm h-8 pl-8 outline-none transition-all duration-150 text-xs lg:text-md lg:h-10" />
                            <label for="password"></label>
                        </li>
                        <li class="flex items-center">
                            <i class="fa-solid fa-lock ml-2 absolute text-neutral-400"></i>
                            <input type="password" name="password2" id="password2" placeholder="konfirmasi password" class="w-full rounded-lg bg-neutral-100 focus:bg-white shadow-sm h-8 pl-8 outline-none transition-all duration-150 text-[8px] lg:text-sm lg:h-10" />
                            <label for="password2"></label>
                        </li>
                        <li >
                            <button type="submit" name="register" class="w-full font-semibold mb-3 text-sm hover:underline hover:text-slate-400">Register!</button>
                            <div class="flex justify-end">
                                <a href="login.php" class="italic text-[8px] md:text-xs pt-4">Login</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
</body>
</html>