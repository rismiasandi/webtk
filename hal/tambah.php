<?php
include "koneksi.php";
if(isset($_POST['submit'])){

	$No_induk	= $_POST['No_induk'];	//membuat variabel $nis dan datanya dari inputan NIS
	$Nama		= $_POST['Nama'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$Jkel		= $_POST['Jkel'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$TTL		= $_POST['TTL'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$alamat		= $_POST['alamat'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$Nama_ortu	= $_POST['Nama_ortu'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$id_kelas	= $_POST['id_kelas'];

 $nama_photo=$_FILES['photo']['name'];
 $type = $_FILES['photo']['type'];
 $ukuran=$_FILES['photo']['size'];
 
 if(empty($No_induk) || empty($Nama) || empty($Jkel) || empty($TTL) || empty($alamat) || empty($Nama_ortu)|| empty($id_kelas)){
  echo "<script language=\"Javascript\">\n";
  echo "confirmed = window.confirm('Maaf, Form belum lengkap!!');";
  echo "</script>";
  
 }else{  
  $query_induk=mysql_query("select * from tbl_biodata where No_induk='$No_induk'");
  $cek=mysql_num_rows($query_induk);
  if($cek>0){
   echo "<script language=\"Javascript\">\n";
   echo "confirmed = window.confirm('Maaf, Email sudah dipakai!!');";
   echo "</script>";
  }else{
   if($type != "image/gif"  &&  $type != "image/jpg"  && $type != "image/jpeg" && $type != "image/png") {
    echo "<script language=\"Javascript\">\n";
    echo "confirmed = window.confirm('File Yang Di izinkan Hanya jpg,jpeg,png,gif!!');";
    echo "</script>";
   }else{
    if($ukuran>1000000){
     echo "<script language=\"Javascript\">\n";
     echo "confirmed = window.confirm('File Yang Di izinkan Hanya berukuran kurang dari 1MB!!');";
     echo "</script>";
    }else{
     $uploaddir='./photo/';
     $rnd=date("m.d.y");    
     $nama_file_upload=$rnd.'-'.$nama_photo;
     $alamatfile=$uploaddir.$nama_file_upload;
     
     if (move_uploaded_file($_FILES['photo']['tmp_name'],$alamatfile))
     {
      $query=mysql_query("insert into tbl_biodata(No_induk,Nama,Jkel,TTL,alamat,Nama_ortu,id_kelas,photo,ukuran,type) 
         values('$No_induk','$Nama','$Jkel','$TTL','$alamat','$Nama_ortu','$id_kelas','$nama_file_upload','$ukuran','$type')");
       
      if($query){
       echo "<script language=\"Javascript\">\n";
       echo "confirmed = window.confirm('Data Anda berhasil disimpan');";
       echo "</script>";
      }else{
       echo mysql_query();
      }
     }else{
       echo "<script language=\"Javascript\">\n";
       echo "confirmed = window.confirm('Proses upload gagal');";
       echo "</script>";
      echo "<p>kode error = " . $_FILES['location']['error']."</p>";
     }
    }
   }
  }
 }
}else{
 unset($_POST['submit']);
}
?>

<html>
<head>
 <title>Biodata</title>
</head>
<body>
 <form action="" enctype="multipart/form-data" method="post" name="postform">      
 <table width="42%" border="0"  style="font-family:Verdana; size:6px; border-bottom:solid 1px #000000; border-right:solid 1px #000000; border-top:solid 1px #000000; border-left:solid 1px #000000; background:#999" align="center" cellpadding="3" cellspacing="3">
    <tr>
    <td colspan="3" align="center"><strong>FORM INPUT BIODATA</strong></td>
  </tr>
    <tr>
  <tr>
    <td width="146">No_induk</td>
    <td width="1">:</td>
    <td width="370"><input type="text" name="No_induk" size="30"/></td>
  </tr>
     <tr>
    <td width="146">Nama </td>
    <td width="1">:</td>
    <td width="370"><input type="text" name="Nama" size="30"/></td>
  </tr>
  <tr>
    <td>JKel</td>
    <td>:</td>
    <td><input type="text" name="Jkel" size="30"/></td>
  </tr>
  <tr>
    <td>TTL</td>
    <td>:</td>
    <td><input type="password" name="TTL" size="30"/></td>
  </tr>
    <tr>
    <td>alamat</td>
    <td>:</td>
    <td><input type="password" name="alamat" size="30"/></td>
  </tr>
    <tr>
    <td>Nama_ortu</td>
    <td>:</td>
    <td><input type="password" name="Nama_ortu" size="30"/></td>
  </tr>
  <tr>
    <td>Kelas</td>
    <td>:</td>
    <td>
    <select name="id_kelas">
   <option value="Nol kecil">Nol Kecil
   <option value="Nol besar">Nol Besar
    </select>
    </td>
  </tr>
  
  <tr>
    <td>Photo</td>
    <td>:</td>
    <td><input type="file" name="photo" size="30"/></td>
  </tr>
  <tr>
    <td colspan="3"><p></p></td>
  </tr>
 
  <tr>
    <td><input type="submit" name="submit" value="Submit" onClick="return confirm('Apakah Anda yakin?')" /></td>
    <td> </td>
    <td><a href="contact.php?page=lihat_siswa">[View Biodata]</a></td>
  </tr>
   </table>   
 </form>

</body>
</html>