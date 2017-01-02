<?php
//mulai proses edit data

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$id			= $_POST['id'];	//membuat variabel $id dan datanya dari inputan hidden id
	$no_induk	= $_POST['no_induk'];	//membuat variabel $nis dan datanya dari inputan NIS
	$Nama		= $_POST['Nama'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$Jkel		= $_POST['Jkel'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$TTL		= $_POST['TTL'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$alamat		= $_POST['alamat'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$Nama_ortu	= $_POST['Nama_ortu'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$id_kelas	= $_POST['id_kelas'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	
	
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysql_query("UPDATE siswa SET no_induk='$no_induk', Nama='$Nama', Jkel='$Jkel', alamat='$alamat', Nama_ortu='$Nama_ortu', id_kelas='$id_kelas' WHERE no_induk='$id'") or die(mysql_error());
	
	//jika query update sukses
	if($update){
		
		echo 'Data berhasil di simpan! ';		//Pesan jika proses simpan sukses
		echo '<a href="contact.php?page=lihat_siswa">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="?page=edit&id='.$id.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}

}else{	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';

}
?>