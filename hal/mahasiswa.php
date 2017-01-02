<?php session_start(); 

if(!isset($_SESSION['UserData']['Username'])){
	header("location:login.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD</title>
</head>
<body>
	<form method="POST" action="">
	<center><h2>Edit Data Mahasiswa</h2></center>
	
	
	
	
    	<p style="color:black"><center><font color="black">Pencarian Berdasarkan</font>
      <select name="kategori">
        <option value="no_induk">Nomor Induk</option>
        <option value="Nama">Nama Lengkap</option>
        <option value="Jkel">Jenis Kelamin</option>
        <option value="alamat">Alamat</option>
		 <option value="Nama_ortu">Nama Orangtua</option>
		  <option value="id_kelas">ID Kelas</option>
      </select>
    <input name="tcari" type="text" id="txt_cari">
    <input name="bcari" type="submit" value="Cari">
	</center></p>

    
	
	<table cellpadding="5" cellspacing="0" border="1" align="center">
	
		<tr bgcolor="#CCCCCC"> 
			<th><font color="black">No.</fontth>
			<th><font color="black">Nomor Induk</font></th>
			<th><center><font color="black">Nama Lengkap</font><center></th>
			<th><font color="black">Jenis Kelamin</font></th>
			<th><font color="black">Tempat Tanggal Lahir</font></th>
			<th><center><font color="black">Alamat</font></center></</th>
			<th><font color="black">Nama Orang tua</font></th>
			<th><font color="black">Kelas</font></th>
			<th><center><font color="black">Opsi</font></center></th>
		</tr>
		
		<?php
		//iclude file koneksi ke database
		include('koneksi.php');
		
		if (isset($_POST['bcari'])) { 
		$tcari = $_POST['tcari'];
		$kategori=$_POST['kategori'];
		
		$query = mysql_query("SELECT siswa.no_induk , siswa.Nama, siswa.Jkel , siswa.TTL , siswa.alamat,siswa.Nama_ortu,siswa.id_kelas,kelas.id_kelas,kelas.Nama_kelas from siswa
                 inner join kelas using (id_kelas) 
				 where $kategori LIKE '%$tcari%'
				 ORDER BY no_induk") or die(mysql_error());
		}else{

		//query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
		$query = mysql_query("SELECT siswa.no_induk , siswa.Nama, siswa.Jkel , siswa.TTL , siswa.alamat,siswa.Nama_ortu,siswa.id_kelas,kelas.id_kelas,kelas.nama_kelas from siswa
				 inner join kelas using (id_kelas) 
                 ORDER BY no_induk
") or die(mysql_error()); }
		
		//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
		if(mysql_num_rows($query) == 0){	//ini artinya jika data hasil query di atas kosong
			
			//jika data kosong, maka akan menampilkan row kosong
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			
		}else{	//else ini artinya jika data hasil query ada (data diu database tidak kosong)
			
			//jika data tidak kosong, maka akan melakukan perulangan while
			$no = 1;	//membuat variabel $no untuk membuat nomor urut
			while($data = mysql_fetch_assoc($query)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
				
				//menampilkan row dengan data di database
				echo '<tr>';
					echo '<td>'.$no.'</td>';	//menampilkan nomor urut
					echo '<td>'.$data['no_induk'].'</td>';	//menampilkan data nis dari database
					echo '<td>'.$data['Nama'].'</td>';	//menampilkan data nama lengkap dari database
					echo '<td>'.$data['Jkel'].'</td>';	//menampilkan data kelas dari database
					echo '<td>'.$data['TTL'].'</td>';	//menampilkan data jurusan dari database
					echo '<td>'.$data['alamat'].'</td>';	//menampilkan data jurusan dari database
					echo '<td>'.$data['Nama_ortu'].'</td>';	//menampilkan data jurusan dari database
					echo '<td>'.$data['id_kelas'].'</td>';	//menampilkan data jurusan dari database
					echo '<td><a href="?page=edit&id='.$data['no_induk'].'">Edit</a> / <a href="?page=hapus&id='.$data['no_induk'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
				
				$no++;	//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>
	</table>
		</form><br/>
<p align=center><a href="?page=tambah">Tambah Data</a> | <a href="laporan_siswa.php">Laporan Siswa</a> | <a href="?page=logout">Logout</a> </p>
</body>
</html>