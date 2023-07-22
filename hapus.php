<?php 
session_start();

if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'function.php';

$id = $_GET["id"];

if( hapus($id) > 0) {
    print "
        <script>
            alert('data berhasil dihapus!');
            document.location.href = 'index.php';
        </script>
    ";
} else {
    print "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'index.php';
        </script>
    ";
}
?>