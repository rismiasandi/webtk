<?
include('koneksi.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD</title>
</head>
<body>
	<center>
	  <h2>Tambah Data Golongan</h2></center>
	
	<p><a href="?page=golongan">Beranda</a> / <a href="?page=tambah-golongan">Tambah Data</a></p>
	
	<h3>Tambah Data Golongan</h3>
	
	<form action="?page=tambah-golongan-proses" method="post">
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>Id Golongan</td>
				<td>:</td>
				<td><input type="text" name="id" required></td>
			</tr>
			<tr>
				<td>Nama Golongan</td>
				<td>:</td>
				<td><input type="text" name="nama" size="30" required></td>
			</tr>
			
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah"></td>
			</tr>
		</table>
	</form>
</body>
</html>