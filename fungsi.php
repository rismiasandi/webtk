<?php

function getPage($page){
	if ($page != ""){
		include("hal/".$page.".php");
	}
	else{
		include("hal/mahasiswa.php");
	}
}
?>