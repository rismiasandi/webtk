
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD</title>
</head>
<body>
	<center><h2>Tambah Data Siswa</h2></center>
	
	
	<h3>Form Data Siswa</h3>
	
	<form action="?page=tambah-proses" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">	<!-- membuat inputan hidden dan nilainya adalah siswa_id -->
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>Nomor Induk</td>
				<td>:</td>
				<td><input type="text" name="no_induk"  required></td>	<!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input type="text" name="Nama" size="30" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><input type="text" name="Jkel" size="30" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Tempat Tanggal Lahir</td>
				<td>:</td>
				<td><input type="text" name="TTL" size="30" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="alamat" size="30" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Nama Orang Tua</td>
				<td>:</td>
				<td><input type="text" name="Nama_ortu" size="30" required></td> <!-- value diambil dari hasil query -->
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
				<td><input type="submit" name="tambah" value="tambah"></td>
			</tr>
		</table>
	</form>
</body>
</html>