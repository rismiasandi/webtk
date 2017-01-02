<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD </title>
</head>
<body>
	<center><h2>Edit Data Siswa</h2></center>
	
	<h3>Form Data Siswa</h3>
	
	<?php
	//proses mengambil data ke database untuk ditampilkan di form edit berdasarkan siswa_id yg didapatkan dari GET id -> edit.php?id=siswa_id
	
	//include atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
	$id = $_GET['id'];
	//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
	$show = mysql_query("SELECT * FROM siswa WHERE no_induk='$id'");
	
	//cek apakah data dari hasil query ada atau tidak
	if(mysql_num_rows($show) == 0){
		
		//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
		echo '<script>window.history.back()</script>';
		
	}else{
	
		//jika data ditemukan, maka membuat variabel $data
		$data = mysql_fetch_assoc($show);	//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
	
	}
	?>
	
	<form action="?page=edit-proses" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">	<!-- membuat inputan hidden dan nilainya adalah siswa_id -->
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>Nomor Induk</td>
				<td>:</td>
				<td><input type="text" name="no_induk" value="<?php echo $data['No_induk']; ?>" required></td>	<!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input type="text" name="Nama" size="30" value="<?php echo $data['Nama']; ?>" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><input type="text" name="Jkel" size="30" value="<?php echo $data['Jkel']; ?>"required></td> <!-- value diambil dari hasil query -->
			</tr>
			
			<tr>
				<td>Tempat Tanggal Lahir</td>
				<td>:</td>
				<td><input type="text" name="TTL" size="30" value="<?php echo $data['TTL']; ?>" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="alamat" size="30" value="<?php echo $data['alamat']; ?>" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Nama Orang Tua</td>
				<td>:</td>
				<td><input type="text" name="Nama_ortu" size="30" value="<?php echo $data['Nama_ortu']; ?>" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td>
					<select name="id_kelas" required>
						<option value="">Pilih Kelas</option>
						 <?php
		  $query_kelas = mysql_query("select id_kelas,Nama_kelas
										   from kelas");
		  while($data1 = mysql_fetch_array($query_kelas)){
		  	if($data['id_kelas']==$data1['id_kelas']){
				echo "<option value=$data1[id_kelas] selected>$data1[Nama_kelas]</option>";
				}
				else{
					echo"<option value=$data1[id_kelas]>$data1[Nama_kelas]</option>";
				}
		  }
		  ?>
					</select>
				</td>
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