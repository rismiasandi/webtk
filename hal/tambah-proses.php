<?php
//mulai proses tambah data

//cek dahulu, jika tombol tambah di klik
if(isset($_POST['tambah'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$no_induk	= $_POST['no_induk'];	//membuat variabel $nis dan datanya dari inputan NIS
	$Nama		= $_POST['Nama'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$Jkel		= $_POST['Jkel'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$TTL		= $_POST['TTL'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$alamat		= $_POST['alamat'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$Nama_ortu	= $_POST['Nama_ortu'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$id_kelas	= $_POST['id_kelas'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysql_query("INSERT INTO siswa VALUES( '$no_induk', '$Nama', '$Jkel',  '$TTL', '$alamat', '$Nama_ortu', '$id_kelas')") or die(mysql_error());
	
	//jika query input sukses
	if($input){
		
		echo 'Data berhasil di tambahkan! ';		//Pesan jika proses tambah sukses
		echo '<a href="contact.php?page=lihat_siswa">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="?page=tambah">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>