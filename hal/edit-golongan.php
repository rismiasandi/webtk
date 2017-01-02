<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD </title>
</head>
<body>
	<center><h2>Edit Data Golongan</h2></center>
	
	<p><a href="?page=golongan">Beranda</a> / <a href="?page=tambah-golongan">Tambah Data</a></p>
	
	<h3>Edit Data Golongan</h3>
	
	<?php
	//proses mengambil data ke database untuk ditampilkan di form edit berdasarkan siswa_id yg didapatkan dari GET id -> edit.php?id=siswa_id
	
	//include atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
	$id = $_GET['id'];
	//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
	$show = mysql_query("SELECT * FROM golongan WHERE gol_id='$id'");
	
	//cek apakah data dari hasil query ada atau tidak
	if(mysql_num_rows($show) == 0){
		
		//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
		echo '<script>window.history.back()</script>';
		
	}else{
	
		//jika data ditemukan, maka membuat variabel $data
		$data = mysql_fetch_assoc($show);	//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
	
	}
	?>
	
	<form action="?page=edit-golongan-proses" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">	<!-- membuat inputan hidden dan nilainya adalah siswa_id -->
		<table cellpadding="3" cellspacing="0">
			
			<tr>
				<td>Id Golongan</td>
				<td>:</td>
				<td><input type="text" name="id" size="30" value="<?php echo $data['gol_id']; ?>" disabled ></td> <!-- value diambil dari hasil query -->
			</tr>
            <tr>
				<td>Nama Golongan</td>
				<td>:</td>
				<td><input type="text" name="nama" size="30" value="<?php echo $data['gol_nama']; ?>" required></td> <!-- value diambil dari hasil query -->
			</tr>
			
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><input type="submit" name="simpan" value="Simpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>