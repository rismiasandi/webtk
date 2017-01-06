<?php
include "koneksi.php";
$No_induk=$_GET['No_induk'];
$row=mysql_fetch_array(mysql_query("select * from tbl_biodata where No_induk='$No_induk'"));
$photo=$row['photo'];

$query=mysql_query("delete from tbl_biodata where No_induk='$No_induk'");
if($query){
 $nama_file="./photo/".$photo;
 @unlink($nama_file);
    echo "<script language=\"Javascript\">\n";
    echo "confirmed = window.confirm('Data sudah di hapus!');";
    echo "</script>";
 echo "<a href=contact.php?page=lihat_siswa> <strong>View Data</strong></a>";
}
?>