<?php
include "koneksi.php";
//jika klik tombol update
if(isset($_POST['submit'])){
 $No_induk	= $_POST['No_induk'];	//membuat variabel $nis dan datanya dari inputan NIS
	$Nama		= $_POST['Nama'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$Jkel		= $_POST['Jkel'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$TTL		= $_POST['TTL'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$alamat		= $_POST['alamat'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$Nama_ortu	= $_POST['Nama_ortu'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$id_kelas	= $_POST['id_kelas'];

 $photo_lama=$_POST['photo_lama'];
 $nama_photo=$_FILES['photo']['name'];
 
   
 if(empty($No_induk) || empty($Nama) || empty($Jkel) || empty($TTL) || empty($alamat) || empty($Nama_ortu)|| empty($id_kelas)){
  echo "<script language=\"Javascript\">\n";
  echo "confirmed = window.confirm('Maaf, Form belum lengkap!!');";
  echo "</script>";
 }else{  
  if(empty($_FILES['photo']['name'])){
    $nama_file_upload=$photo_lama;
    $type=$_POST['type'];
    $ukuran=$_POST['ukuran'];    
    $query=mysql_query("update tbl_biodata set No_induk='$No_induk',Nama='$Nama',Jkel='$Jkel',TTL='$TTL',alamat='$alamat',Nama_ortu='$Nama_ortu',id_kelas='$id_kelas',photo='$nama_file_upload',ukuran='$ukuran',type='$type' where No_induk='$No_induk'");
   }else{    
    $type=$_FILES['photo']['type'];
    $ukuran=$_FILES['photo']['size'];  
    $uploaddir='./photo/';
    $rnd=date("m.d.y");    
    $nama_file_upload=$rnd.'-'.$nama_photo;
    $alamatfile=$uploaddir.$nama_file_upload;
    
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
      @unlink("./photo/".$photo_lama);
      $upload=move_uploaded_file($_FILES['photo']['tmp_name'],$alamatfile);
     $query=mysql_query("update tbl_biodata set No_induk='$No_induk',Nama='$Nama',Jkel='$Jkel',TTL='$TTL',alamat='$alamat',Nama_ortu='$Nama_ortu',id_kelas='$id_kelas',photo='$nama_file_upload',ukuran='$ukuran',type='$type' where No_induk='$No_induk'");
     }
    }
   }
   
   if($query){
    echo "<script language=\"Javascript\">\n";
    echo "confirmed = window.confirm('Data Anda berhasil disimpan');";
    echo "</script>";
   }else{
    echo mysql_query();
   }
 }
}else{
 unset($_POST['submit']);
} 
//deskripsi form edit
$No_induk=$_GET['No_induk'];
$row=mysql_fetch_array(mysql_query("select * from tbl_biodata where No_induk='$No_induk'"));
$No_induk=$row['No_induk'];
$Nama=$row['Nama'];
$Jkel=$row['Jkel'];
$TTL=$row['TTL'];
$alamat=$row['alamat'];
$id_kelas=$row['id_kelas'];
$Nama_ortu=$row['Nama_ortu'];
$photo=$row['photo'];
$ukuran=$row['ukuran'];
$type=$row['type'];


?>
<html>
<head>
 <title>Biodata</title>
</head>
<body>
 <form action="" method="post"  enctype="multipart/form-data" name="postform"> 
    <input type="hidden" name="No_induk" value="<?php echo $No_induk;?>" />
    <input type="hidden" name="Nama" value="<?php echo $Nama;?>" />
    <input type="hidden" name="photo_lama" value="<?php echo $photo?>" />
    <input type="hidden" name="ukuran" value="<?php echo $ukuran;?>" />
    <input type="hidden" name="type" value="<?php echo $type?>" />
 <table width="42%" border="0"  style="font-family:Verdana; size:6px; border-bottom:solid 1px #000000; border-right:solid 1px #000000; border-top:solid 1px #000000; border-left:solid 1px #000000; background:#999" align="center" cellpadding="3" cellspacing="3">
    <tr>
    <td colspan="3" align="center"><strong>FORM EDIT BIODATA</strong></td>
  </tr>
    <tr>
      <td colspan="3" align="center"><img src="./photo/<?php echo $photo;?>" width="100" height="100"></td>
    </tr>
    <tr>
      <td width="189">Nomor_induk</td>
      <td width="8">:</td>
      <td width="440"><input type="text" name="No_induk" value="<?php echo $No_induk; ?>" size="30"/></td>
    </tr>
      <tr>
      <td width="189">Nama</td>
      <td width="8">:</td>
      <td width="440"><input type="text" name="Nama" value="<?php echo $Nama; ?>" size="30"/></td>
    </tr>
	
	      <tr>
      <td width="189">Jkel</td>
      <td width="8">:</td>
      <td width="440"><input type="text" name="Jkel" value="<?php echo $Jkel; ?>" size="30"/></td>
    </tr>
	      <tr>
      <td width="189">TTL</td>
      <td width="8">:</td>
      <td width="440"><input type="text" name="TTL" value="<?php echo $TTL; ?>" size="30"/></td>
    </tr>
	      <tr>
      <td width="189">alamat</td>
      <td width="8">:</td>
      <td width="440"><input type="text" name="alamat" value="<?php echo $alamat; ?>" size="30"/></td>
    </tr>
	      <tr>
      <td width="189">Nama ortu</td>
      <td width="8">:</td>
      <td width="440"><input type="text" name="Nama_ortu" value="<?php echo $Nama_ortu; ?>" size="30"/></td>
    </tr>
	
 <tr>
      <td>Id kelas</td>
      <td>:</td>
      <td>
      <select name="id_kelas">
        <option value="Nol kecil" <?php if($id_kelas=='Nol kecil'){ echo "selected='selected'";} ?>>Nol kecil
        <option value="Nol besar" <?php if($id_kelas=='Nol besar'){ echo "selected='selected'";} ?>>Nol besar
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
      <td><input type="submit" name="submit"  value="Update" onClick="return confirm('Apakah Anda yakin akan mengubah data?')"/></td>
      <td> </td>
   <td><a href="contact.php?page=lihat_siswa"><strong>[View Biodata]</strong></a></td>
 </tr>
    </table>
   
 </form>

</body>
</html>