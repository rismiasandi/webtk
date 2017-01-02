<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Data Siswa</title>
</head>

<body>
<table width="941" height="279" border="0">
  <tr>
    <td width="254" rowspan="3"><center><img src="img/logo TK.png"  width="100" height="100" /></center></td>
    <td width="671"><h1><CENTER>TK MELATI</CENTER></h1></td>
  </tr>
  <tr>
    <td><center>Jalan Mastrip No 1 Sumbersari - Jember - Jawa Timur</center></td>
  </tr>
  <tr>
    <td height="31"><center>Telepon : (0331) 321-330-540 Email : tkmelatijember@gmail.com</center></td>
  </tr>
  <tr>
    <td height="167" colspan="2"><hr/><br/><CENTER>
      <strong>LAPORAN DATA SISWA TK MELATI TAHUN PELAJARAN 2016/2017</strong></CENTER><br/>
	  
	  
	  <table cellpadding="5" cellspacing="0" border="1" align="center">
	
		<tr bgcolor="#CCCCCC"> 
			<th><font color="black">No.</font></th>
			<th><font color="black">Nomor Induk</font></th>
			<th><font color="black">Nama Lengkap</font></th>
			<th><font color="black">Jenis Kelamin</font></th>
			<th><font color="black">Tempat Tanggal Lahir</font></th>
			<th><font color="black">Alamat</font></th>
			<th><font color="black">Nama Orang tua</font></th>
			<th><font color="black">Kelas</font></th>
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
					//disini hanya utuk melihat ..................................................................   echo '<td><a href="?page=edit&id='.$data['mhs_id'].'">Edit</a> / <a href="?page=hapus&id='.$data['mhs_id'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
				
				$no++;	//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>
	</table>
	  <br/>
	  
    </td>
	</tr>
	
</table>
<h1>&nbsp;</h1>
</body>
</html>