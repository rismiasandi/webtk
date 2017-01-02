<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD</title>
</head>
<body>
	<center><h2>Data Golongan</h2></center>
	
	<p><a href="?page=golongan">Beranda</a> / <a href="?page=tambah-golongan">Tambah Data</a></p>
	
	
	
	<table cellpadding="5" cellspacing="0" border="1"align="center">
		<tr bgcolor="#CCCCCC">
			<th><font color="black">No.</font></th>
			<th><font color="black">Id Golongan</font></th>
			<th><font color="black">Nama Golongan</font></th>
			<th><font color="black">Opsi</font></th>
		</tr>
		
		<?php
		//iclude file koneksi ke database
		include('koneksi.php');
		
		//query ke database dg SELECT table siswa diurutkan berdasarkan NIS paling besar
		$query = mysql_query("SELECT * from golongan 
				 ORDER BY gol_id
") or die(mysql_error());
		
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
					echo '<td>'.$data['gol_id'].'</td>';	
					echo '<td>'.$data['gol_nama'].'</td>';	//menampilkan data nama lengkap dari database
					echo '<td><a href="?page=edit-golongan&id='.$data['gol_id'].'">Edit</a> / <a href="?page=hapus-golongan&id='.$data['gol_id'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
				
				$no++;	//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>
	</table>
</body>
</html>