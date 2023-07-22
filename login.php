<?php 
session_start();
// cek cookie
if( isset($_COOKIE['id']) && isset  ($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if( isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require 'function.php';

if ( isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ) {

        // cek passwordnya
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if( isset($_POST['remember'])) {
                setcookie('id', $row['id'], time()*6);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
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
    
    
    <?php if( isset($error)) : ?> 
        <p>Username / Password salah!</p>
    <?php endif; ?>


    <section class="bg-gradient-to-r from-neutral-400 to-slate-800 h-screen flex justify-center items-center">
        <div class="h-fit w-4/5 sm:w-3/6 lg:w-2/6 bg-neutral-50 rounded-2xl shadow-md flex justify-center"> 
            <div class="col">
                <form action="" method="post">
                    <h1 class="text-4xl text-center mt-10 font-semibold">Login Cuyy</h1>
                    <ul class="mt-12 flex flex-col">
                            <li class="flex items-center">
                                <i class="fa-solid fa-user ml-2 absolute text-neutral-400"></i>
                                <input type="text" name="username" id="username" placeholder="username" autocomplete="off" class="w-full rounded-lg bg-neutral-100 focus:bg-white shadow-sm h-10 pl-8 outline-none transition-all duration-150" />
                                <label for="username"></label>
                            </li>
                            <li class="flex items-center">
                                <i class="fa-solid fa-lock ml-2 absolute text-neutral-400"></i>
                                <input type="password" name="password" id="password" placeholder="password" class="w-full rounded-lg bg-neutral-100 focus:bg-white shadow-sm h-10 pl-8 outline-none transition-all duration-150" />
                                <label for="password"></label>
                            </li>
                            <li>
                                <input type="checkbox" name="remember" id="remember" class="mt-4 mr-2">
                                <label for="remember" class="text-neutral-400">Remember</label>
                            </li>
                            <li>
                                <button type="submit" name="login" class="w-full rounded-full bg-gradient-to-r from-indigo-400 to-pink-500 mt-6 h-11 text-white font-semibold text-xl shadow-md hover:shadow-xl hover:to-pink-400 transition-all duration-300">Login</button>
                            </li>
                            <li>
                                <p class="text-neutral-400 text-center mt-12 mb-2">Ga punya akun yaa? <a class="font-bold text-indigo-300 hover:underline hover:cursor-pointer" href="registrasi.php">Bikin Disini!</a></p>
                            </li>
                        </ul>
                </form>
            </div>
        </div>
    </section>
</body>
</html>