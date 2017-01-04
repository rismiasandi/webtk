<?php ob_start();
@session_start(); 
session_destroy(); 

if (headers_sent()) {
    die("Redirect failed. Please click on this link: <a href=login.php>login</a>");
}
else{
    exit(header("location:contact.php?page=lihat_siswa"));
}

ob_flush();
?>
