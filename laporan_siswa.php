<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Data Siswa</title>
</head>

<body>
    <script>
		window.load = print_d();
		function print_d(){
			window.print();
		}
	</script>

	<?php
include "koneksi.php";
$query=mysql_query("select * from tbl_biodata");
?>

	
<table width="941" height="279" border="0">
  <tr>
    <td width="254" rowspan="3"><center><img src="img/logofix.jpg"  width="100" height="100" /></center></td>
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
	
		<tr bgcolor="#999">
  <td height="30" align="center" style="border-bottom:solid 1px #000000; border-right:solid 1px #000000; border-top:solid 1px #000000; border-left:solid 1px #000000;"><strong>No</strong></td>
  <td align="center" style="border-bottom:solid 1px #000000; border-right:solid 1px #000000; border-top:solid 1px #000000;"><strong>Photo</strong></td>
  <td align="center" style="border-bottom:solid 1px #000000; border-right:solid 1px #000000; border-top:solid 1px #000000;"><strong>No_induk</strong></td>
  <td align="center" style="border-bottom:solid 1px #000000; border-right:solid 1px #000000; border-top:solid 1px #000000;"><strong>Nama</strong></td>
  <td align="center" style="border-bottom:solid 1px #000000; border-right:solid 1px #000000; border-top:solid 1px #000000;"><strong>Jkel</strong></td>
  <td align="center" style="border-bottom:solid 1px #000000; border-right:solid 1px #000000; border-top:solid 1px #000000;"><strong>TTL</strong></td>
  <td align="center" style="border-bottom:solid 1px #000000; border-right:solid 1px #000000; border-top:solid 1px #000000;"><strong>alamat</strong></td>
  <td align="center" style="border-bottom:solid 1px #000000; border-right:solid 1px #000000; border-top:solid 1px #000000;"><strong>Nama_ortu</strong></td>
  <td align="center" style="border-bottom:solid 1px #000000; border-right:solid 1px #000000; border-top:solid 1px #000000;"><strong>id_kelas</strong></td>
</tr>
		
		<?php
$no = 0;
while($row=mysql_fetch_array($query)){
 ?>
 <tr>
  <td align="center" style="border-bottom:solid 1px #000000; border-right:solid 1px #000000; border-left:solid 1px #000000;"><?php echo $no=$no+1;?></td>
  <td style="border-bottom:solid 1px #000000; border-right:solid 1px #000000;"><a href="./photo/<?php echo $row['photo'];?>" target="_blank"><img src="./photo/<?php echo $row['photo'];?>" width="100" height="100" title="<?php echo $row['photo'];?>"></a></td>
  <td style="border-bottom:solid 1px #000000; border-right:solid 1px #000000;"><?php echo ucwords($row['No_induk']);?></td>
  <td style="border-bottom:solid 1px #000000; border-right:solid 1px #000000;"><?php echo ucwords($row['Nama']);?></td>
  <td style="border-bottom:solid 1px #000000; border-right:solid 1px #000000;"><?php echo $row['Jkel'];?></td>
  <td style="border-bottom:solid 1px #000000; border-right:solid 1px #000000;"><?php echo $row['TTL'];?></td>
  <td style="border-bottom:solid 1px #000000; border-right:solid 1px #000000;"><?php echo $row['alamat'];?></td>
  <td style="border-bottom:solid 1px #000000; border-right:solid 1px #000000;"><?php echo $row['Nama_ortu'];?></td>
  <td style="border-bottom:solid 1px #000000; border-right:solid 1px #000000;"><?php echo $row['id_kelas'];?></td>

  </td>
 </tr>
			
	
	<?php
}
?>
</table>
<h1>&nbsp;</h1>
</body>
</html>