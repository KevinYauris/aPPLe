<?php
require_once "dbconnect/dbconnect.php";
require_once "functions.php";
opendb();

function RedirectTo($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

if(isset($_POST['tambahPemeliharaan'])){
	# BACA DATA DALAM FORM, masukkan datake variabel
	$errMsg = "";
	$idPemeliharaan=secure(trim($_POST['idPemeliharaan']));
	$idAlat=secure(trim($_POST['idAlat']));	
	$startBroken=secure(trim($_POST['startBroken']));
	$startRepair=secure(trim($_POST['startRepair']));
	$finishRepair=secure(trim($_POST['finishRepair']));
		
	$sql  = "INSERT INTO pemeliharaan (id_kerusakan, id_alat, start_broken, start_repair, finish_repair)
			VALUES ('$idPemeliharaan','$idAlat', '$startBroken','$startRepair','$finishRepair')";
	$res = querydb($sql);
	
	if($res){
		
		$errMsg .= "<div class=\"alert alert-success alert-dismissible\" role=\"alert\">";
		$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
		$errMsg .= "SUKSESS !!! Data sudah disimpan !!!";
		$errMsg .= "</div>";
		
	}else{
		$errMsg .= "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";
		$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
		$errMsg .= "GAGAL !!! Data tidak bisa disimpan !!!";
		$errMsg .= "</div>";
	}
				
	$data = array('msg1'=>$errMsg,'msg2'=>'');
	echo json_encode($data);
}	
//EDIT PEMINJAMAN
IF(isset($_GET['idPeminjaman'])){
	$errMsg = "";
	$idPeminjaman=$_GET['idPeminjaman'];
	$idAlat=htmlspecialchars($_POST['idAlat']);	
	$noIdentitas=htmlspecialchars($_POST['noIdentitas']);
	$namaPeminjam=htmlspecialchars($_POST['namaPeminjam']);
	$kategoriPeminjam=htmlspecialchars($_POST['kategoriPeminjam']);
	$kegiatan=htmlspecialchars($_POST['kegiatan']);
	$waktuPeminjaman=htmlspecialchars($_POST['waktuPeminjaman']);
	$durasi=htmlspecialchars($_POST['durasi']);
	$status=htmlspecialchars($_POST['status']);

		# SIMPAN DATA KE DATABASE. 
		// Jika tidak menemukan error, simpan data ke database
		//$kodeBaru	= buatKode("ma_user", "UID");
		//$txtPassword2 = MD5($inpPassword);
		
		$qry="UPDATE peminjaman SET no_identitas='$noIdentitas', nama_peminjam='$namaPeminjam',kategori_peminjam='$kategoriPeminjam',kegiatan='$kegiatan', waktu_peminjaman='$waktuPeminjaman', durasi='$durasi', status='$status'
			 WHERE id_Peminjaman='$idPeminjaman'";
		$hsl = querydb($qry);
	
	
	RedirectToPeminjaman('peminjaman.php', false);
}	

if(isset($_POST['hapusPemeliharaan'])){

	$errMsg = "";
	
	$idPemeliharaan=$_POST['idPemeliharaan'];
	
	$qri="DELETE FROM pemeliharaan WHERE id_kerusakan='".$idPemeliharaan."'";	
	$res=querydb($qri);
	if($res){
		$errMsg .="<div class=\"alert alert-success alert-dismissible\" role=\"alert\">";
		$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
		$errMsg .= "SUKSES !!! Data sudah dihapus!!!";
		$errMsg .= "</div>";
	}else{
		$errMsg .="<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">";
		$errMsg .= "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>";
		$errMsg .= "GAGAL !!! Data tidak bisa dihapus !!!";
		$errMsg .= "</div>";
	}
	
	//convert data menjadi json format
	$data = array('msg1'=>$errMsg,'msg2'=>'');
	echo json_encode($data);
	
}
?>
