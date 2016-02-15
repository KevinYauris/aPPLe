<?php

if(!empty($_GET['open'])){$open=trim($_GET['open']);}else{$open="";}
	switch($open)  
	{
		case '' : include 'home.php'; break;
		case 'alat' : include 'alat.php'; break;
		case 'peminjaman' : include 'peminjaman.php'; break;
		case 'pemeliharaan' : include 'pemeliharaan.php'; break;
		case 'peminjaman_addpage' : include 'peminjaman_addpage.php'; break;
		case 'pemeliharaan_addpage' : include 'pemeliharaan_addpage.php'; break;
	}
?>
