<?php
	include('koneksi.php');

	$response = array();
	$query=mysql_query("SELECT * FROM siswa ORDER BY No_induk DESC") or die(mysql_error());

	$response["siswa"] = array();
	while($data=mysql_fetch_assoc($query)){
		$sis = array();
    	$sis["No_induk"] = $data["No_induk"];
    	$sis["Nama"] = $data["Nama"];
    	$sis["Jkel"] = $data["Jkel"];
    	$sis["TTL"] = $data["TTL"];
    	$sis["alamat"] = $data["alamat"];
    	$sis["Nama_ortu"] = $data["Nama_ortu"];
    	$sis["id_kelas"] = $data["id_kelas"];
		array_push($response["siswa"], $sis);
	}
	echo json_encode($response);
?>